# Llista quants productes de tipus “Begudes” s'han venut en una determinada localitat.
SELECT adreça.localitat, COUNT(producte.tipus) AS Total_Begudes FROM comanda
INNER JOIN client ON comanda.client_id = client.client_id
INNER JOIN adreça ON adreça.id = client.client_id
INNER JOIN comanda_has_producte ON comanda_has_producte.comanda_id = comanda.id
INNER JOIN producte ON comanda_has_producte.producte_id = producte.id
WHERE producte.tipus = 'beguda' AND adreça.localitat = 'Coma-ruga';

# Llista quantes comandes ha efectuat un determinat empleat/da.
# Nota: entenc empleat com a repartidor que entrega a domicili (cuiner no efectua comandes)
SELECT persona.nom AS Nom_Repartidor, COUNT(comanda.id) AS Num_Comandes FROM comanda
INNER JOIN entrega_domicili ON comanda.id = entrega_domicili.comanda_id
INNER JOIN treballador ON entrega_domicili.treballador_id = treballador.treballador_id
INNER JOIN persona ON treballador.treballador_id = persona.id
WHERE treballador.treballador_id = 11;


# Other
SELECT botiga.id AS Botiga, comanda.id AS 'ID Comanda', comanda.preu_total AS Total, 
	(SELECT persona.nom FROM persona WHERE persona.id = client.client_id) AS 'Nom client',
    (SELECT producte.nom FROM producte WHERE comanda_has_producte.producte_id = producte.id) AS Productes
FROM botiga 
INNER JOIN adreça ON adreça.id = botiga.id
INNER JOIN comanda ON comanda.botiga_id = botiga.id
INNER JOIN client ON comanda.client_id = client.client_id
INNER JOIN persona ON client.client_id = persona.id
INNER JOIN entrega_domicili ON comanda.id = entrega_domicili.comanda_id
INNER JOIN treballador ON entrega_domicili.treballador_id = treballador.treballador_id
LEFT JOIN comanda_has_producte ON comanda_has_producte.comanda_id = comanda.id
LEFT JOIN producte ON producte.id = comanda_has_producte.producte_id
LEFT JOIN categoria ON categoria.id = producte.categoria_id
WHERE botiga.id = 1;
