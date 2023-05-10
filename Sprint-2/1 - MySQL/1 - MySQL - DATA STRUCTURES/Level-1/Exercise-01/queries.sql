SELECT venedor.nom AS Nom_Venedor, client.nom AS Nom_Client, marca.nom AS Marca, venda.data AS Data, subq.nom_prescriptor AS prescriptor
FROM venda
LEFT JOIN client ON venda.client_id = client.id
LEFT JOIN venedor ON venedor.id = venda.Venedor_id 
LEFT JOIN venda_ulleres ON venda.id = venda_ulleres.venda_id
LEFT JOIN ulleres ON venda_ulleres.ulleres_id = ulleres.id
LEFT JOIN marca ON ulleres.marca_id = marca.id
LEFT JOIN (SELECT client.nom AS nom_prescriptor, client.id AS id FROM client) AS subq ON client.prescriptor_id = subq.id
WHERE venda.data BETWEEN "2022-01-01 00:30:00" AND "2023-05-01 10:30:00"
ORDER BY venda.data ASC;

# Llista el total de compres (en EUR) d’un client/a.
 SELECT client.nom AS Nom_Client, SUM(ulleres.preu) AS Tota_Compres_EUR FROM client
 INNER JOIN venda ON client.id = venda.client_id
 INNER JOIN venda_ulleres ON venda.id = venda_ulleres.venda_id
 INNER JOIN ulleres ON venda_ulleres.ulleres_id = ulleres.id
 WHERE client.id = 6;

# Llista el total de compres (num de compres fetes) d’un client/a.
 SELECT client.nom AS Nom_Client, COUNT(venda.id) AS Nombre_Compres FROM client
 INNER JOIN venda ON client.id = venda.client_id
 WHERE client.id = 6;

# Llista les diferents ulleres que ha venut un empleat durant un any.
SELECT venedor.nom AS Nom_Venedor, DATE(venda.data) AS Data_Venda, ulleres.id AS ID_Ulleres, marca.nom AS Marca FROM venedor
INNER JOIN venda ON venedor.id = venda.venedor_id
INNER JOIN venda_ulleres ON venda.id = venda_ulleres.venda_id
INNER JOIN ulleres ON venda_ulleres.ulleres_id = ulleres.id
INNER JOIN marca ON ulleres.marca_id = marca.id
WHERE venedor.id = 3 AND venda.data >= DATE_SUB( NOW(), INTERVAL 1 YEAR);
 
# Llista els diferents proveïdors que han subministrat ulleres venudes amb èxit per l'òptica.
SELECT proveidor.nom AS Nom_Proveidor, marca.nom AS Marca, venda.data AS Data_Venda
FROM venda
INNER JOIN venda_ulleres ON venda.id = venda_ulleres.venda_id
INNER JOIN ulleres ON venda_ulleres.ulleres_id = ulleres.id
INNER JOIN marca ON ulleres.marca_id = marca.id
INNER JOIN proveidor ON proveidor.id = marca.proveidor_id;