# This is a compilation of queries on a database called 'tienda'
# The goal is to learn basic queries

USE tienda;

# 1 Llista el nom de tots els productes que hi ha en la taula "producto".
SELECT producto.nombre AS nombre_producto FROM producto;

# 2 Llista els noms i els preus de tots els productes de la taula "producto".
SELECT producto.nombre AS nombre_producto, precio FROM tienda.producto;

# 3 Llista totes les columnes de la taula "producto".
SELECT * FROM tienda.producto;

# 4 Llista el nom dels "productos", el preu en euros i el preu en dòlars nord-americans (USD).
SELECT producto.nombre AS nombre_producto, precio AS precio_eur, CAST(precio*1.21 AS DECIMAL(10,2)) AS precio_usd FROM tienda.producto;

# 5 Llista el nom dels "productos", el preu en euros i el preu en dòlars nord-americans. Utilitza els següents àlies per a les columnes: nom de "producto", euros, dòlars nord-americans.
SELECT producto.nombre AS 'nom de "producto"', precio AS 'euros', CAST(precio*1.21 AS DECIMAL(10,2)) AS 'dólars nord-americans' FROM tienda.producto;

# 6 Llista els noms i els preus de tots els productes de la taula "producto", convertint els noms a majúscula.
SELECT UPPER(producto.nombre) AS nombre_producto, precio FROM tienda.producto;

# 7 Llista els noms i els preus de tots els productes de la taula "producto", convertint els noms a minúscula.
SELECT LOWER(producto.nombre) AS nombre_producto, precio FROM tienda.producto;

# 8 Llista el nom de tots els fabricants en una columna, i en una altra columna obtingui en majúscules els dos primers caràcters del nom del fabricant.
SELECT fabricante.nombre, UPPER(LEFT(fabricante.nombre, 2)) AS fabricante_id FROM tienda.fabricante;

# 9 Llista els noms i els preus de tots els productes de la taula "producto", arrodonint el valor del preu.
SELECT producto.nombre, ROUND(precio) FROM tienda.producto;

# 10 Llista els noms i els preus de tots els productes de la taula "producto", truncant el valor del preu per a mostrar-lo sense cap xifra decimal.
SELECT producto.nombre, SUBSTRING_INDEX(precio, '.', 1) AS precios_truncados FROM tienda.producto;

# 11 Llista el codi dels fabricants que tenen productes en la taula "producto".
SELECT fabricante.codigo FROM tienda.fabricante INNER JOIN tienda.producto ON tienda.fabricante.codigo = tienda.producto.codigo_fabricante;

# 12 Llista el codi dels fabricants que tenen productes en la taula "producto", eliminant els codis que apareixen repetits.
SELECT DISTINCT fabricante.codigo FROM tienda.fabricante INNER JOIN tienda.producto ON tienda.fabricante.codigo = tienda.producto.codigo_fabricante;

# 13 Llista els noms dels fabricants ordenats de manera ascendent.
SELECT fabricante.nombre AS nombre_fabricante FROM tienda.fabricante ORDER BY fabricante.nombre ASC;

# 14 Llista els noms dels fabricants ordenats de manera descendent.
SELECT fabricante.nombre AS nombre_fabricante FROM tienda.fabricante ORDER BY fabricante.nombre DESC;

# 15 Llista els noms dels productes ordenats, en primer lloc, pel nom de manera ascendent i, en segon lloc, pel preu de manera descendent.
SELECT producto.nombre AS nombre_producto, precio FROM tienda.producto ORDER BY producto.nombre ASC, precio DESC;

# 16 Retorna una llista amb les 5 primeres files de la taula "fabricante".
SELECT * FROM tienda.fabricante LIMIT 5;

# 17 Retorna una llista amb 2 files a partir de la quarta fila de la taula "fabricante". La quarta fila també s'ha d'incloure en la resposta.
SELECT * FROM tienda.fabricante LIMIT 2 OFFSET 3;

# 18 Llista el nom i el preu del producte més barat. (Utilitza solament les clàusules ORDER BY i LIMIT). NOTA: Aquí no podries usar MIN(preu), necessitaries GROUP BY
SELECT producto.nombre AS nombre_producto, precio FROM tienda.producto ORDER BY precio ASC LIMIT 1;

# 19 Llista el nom i el preu del producte més car. (Fes servir solament les clàusules ORDER BY i LIMIT). NOTA: Aquí no podries usar MAX(preu), necessitaries GROUP BY.
SELECT producto.nombre AS nombre_producto, precio FROM tienda.producto ORDER BY precio DESC LIMIT 1;

# 20 Llista el nom de tots els productes del fabricant el codi de fabricant del qual és igual a 2.
SELECT producto.nombre AS nombre_producto FROM tienda.producto WHERE producto.codigo_fabricante = 2;

# 21 Retorna una llista amb el nom del producte, preu i nom de fabricant de tots els productes de la base de dades.
SELECT producto.nombre AS nombre_producto, precio, fabricante.nombre AS nombre_fabricante FROM tienda.producto INNER JOIN tienda.fabricante ON producto.codigo_fabricante = fabricante.codigo;

# 22 Retorna una llista amb el nom del producte, preu i nom de fabricant de tots els productes de la base de dades. Ordena el resultat pel nom del fabricant, per ordre alfabètic.
SELECT producto.nombre AS nombre_producto, precio, fabricante.nombre AS nombre_fabricante FROM tienda.producto INNER JOIN tienda.fabricante ON producto.codigo_fabricante = fabricante.codigo ORDER BY nombre_fabricante ASC;

# 23 Retorna una llista amb el codi del producte, nom del producte, codi del fabricant i nom del fabricant, de tots els productes de la base de dades.
SELECT producto.codigo AS codigo_producto, producto.nombre AS nombre_producto, fabricante.codigo AS codigo_fabricante, fabricante.nombre AS nombre_fabricante FROM tienda.producto INNER JOIN tienda.fabricante ON producto.codigo_fabricante = fabricante.codigo;

# 24 Retorna el nom del producte, el seu preu i el nom del seu fabricant, del producte més barat.
SELECT producto.nombre AS nombre_producto, MIN(precio), fabricante.nombre AS nombre_fabricante FROM tienda.producto INNER JOIN tienda.fabricante ON producto.codigo_fabricante = fabricante.codigo;

# 25 Retorna el nom del producte, el seu preu i el nom del seu fabricant, del producte més car.
SELECT producto.nombre AS nombre_producto, MAX(precio), fabricante.nombre AS nombre_fabricante FROM tienda.producto INNER JOIN tienda.fabricante ON producto.codigo_fabricante = fabricante.codigo;

# 26 Retorna una llista de tots els productes del fabricant Lenovo.
SELECT producto.nombre AS nombre_producto FROM tienda.producto INNER JOIN tienda.fabricante ON producto.codigo_fabricante = fabricante.codigo WHERE fabricante.nombre = 'lenovo';

# 27 Retorna una llista de tots els productes del fabricant Crucial que tinguin un preu major que 200 €.
SELECT producto.nombre AS nombre_producto_mayor_200€ FROM tienda.producto INNER JOIN tienda.fabricante ON producto.codigo_fabricante = fabricante.codigo WHERE fabricante.nombre = 'crucial' AND precio > 200;

# 28 Retorna una llista amb tots els productes dels fabricants Asus, Hewlett-Packard i Seagate. Sense utilitzar l'operador IN.'
SELECT producto.nombre AS nombre_producto, fabricante.nombre FROM tienda.producto INNER JOIN tienda.fabricante ON producto.codigo_fabricante = fabricante.codigo WHERE fabricante.nombre = "Asus" OR fabricante.nombre = "Hewlett-Packard" OR fabricante.nombre = "Seagate";

# 29 Retorna un llistat amb tots els productes dels fabricants Asus, Hewlett-Packard i Seagate. Usant l'operador IN.'
SELECT producto.nombre AS nombre_producto, fabricante.nombre FROM tienda.producto INNER JOIN tienda.fabricante ON producto.codigo_fabricante = fabricante.codigo WHERE fabricante.nombre IN ("Asus","Hewlett-Packard", "Seagate");

# 30 Retorna un llistat amb el nom i el preu de tots els productes dels fabricants el nom dels quals acabi per la vocal e.
SELECT producto.nombre AS nombre_producto, precio FROM tienda.producto INNER JOIN tienda.fabricante ON producto.codigo_fabricante = fabricante.codigo WHERE RIGHT(fabricante.nombre, 1) = 'e';

# 31 Retorna un llistat amb el nom i el preu de tots els productes dels fabricants dels quals contingui el caràcter w en el seu nom.
SELECT producto.nombre AS nombre_producto, precio FROM tienda.producto INNER JOIN tienda.fabricante ON producto.codigo_fabricante = fabricante.codigo WHERE fabricante.nombre LIKE '%w%';

# 32 Retorna un llistat amb el nom de producte, preu i nom de fabricant, de tots els productes que tinguin un preu major o igual a 180 €. Ordena el resultat, en primer lloc, pel preu (en ordre descendent) i, en segon lloc, pel nom (en ordre ascendent).
SELECT producto.nombre AS nombre_producto, precio, fabricante.nombre AS nombre_fabricante FROM tienda.producto INNER JOIN tienda.fabricante ON producto.codigo_fabricante = fabricante.codigo WHERE precio >= 180 ORDER BY precio DESC, producto.nombre ASC;

# 33 Retorna un llistat amb el codi i el nom de fabricant, solament d'aquells fabricants que tenen productes associats en la base de dades.'
SELECT DISTINCT fabricante.codigo AS codigo_fabricante, fabricante.nombre AS nombre_fabricante FROM tienda.fabricante INNER JOIN tienda.producto ON fabricante.codigo = producto.codigo_fabricante;

# 34 Retorna un llistat de tots els fabricants que existeixen en la base de dades, juntament amb els productes que té cadascun d'ells. El llistat haurà de mostrar també aquells fabricants que no tenen productes associats.'
SELECT fabricante.nombre AS nombre_fabricante, producto.nombre AS nombre_producto FROM tienda.fabricante LEFT JOIN tienda.producto ON fabricante.codigo = producto.codigo_fabricante;

# 35 Retorna un llistat on només apareguin aquells fabricants que no tenen cap producte associat.
SELECT fabricante.nombre AS nombre_fabricante FROM tienda.fabricante LEFT JOIN tienda.producto ON fabricante.codigo = producto.codigo_fabricante WHERE producto.nombre IS NULL;

# 36 Retorna tots els productes del fabricant Lenovo. (Sense utilitzar INNER JOIN).
SELECT producto.nombre AS nombre_producto FROM tienda.fabricante LEFT JOIN tienda.producto ON fabricante.codigo = producto.codigo_fabricante WHERE fabricante.nombre = 'lenovo' and producto.nombre IS NOT NULL;

# 37 Retorna totes les dades dels productes que tenen el mateix preu que el producte més car del fabricant Lenovo. (Sense fer servir INNER JOIN).
SELECT * FROM tienda.producto WHERE precio = ( SELECT MAX(precio) FROM tienda.producto LEFT JOIN tienda.fabricante ON producto.codigo_fabricante = fabricante.codigo WHERE fabricante.nombre = 'lenovo' );

# 38 Llista el nom del producte més car del fabricant Lenovo.
SELECT producto.nombre FROM tienda.producto LEFT JOIN tienda.fabricante ON producto.codigo_fabricante = fabricante.codigo WHERE fabricante.nombre = 'lenovo' ORDER BY precio DESC LIMIT 1;

# 39 Llista el nom del producte més barat del fabricant Hewlett-Packard.
SELECT producto.nombre FROM tienda.producto LEFT JOIN tienda.fabricante ON producto.codigo_fabricante = fabricante.codigo WHERE fabricante.nombre = 'Hewlett-Packard' ORDER BY precio ASC LIMIT 1;

# 40 Retorna tots els productes de la base de dades que tenen un preu major o igual al producte més car del fabricant Lenovo.
SELECT * FROM tienda.producto WHERE precio >= (SELECT precio FROM tienda.producto LEFT JOIN tienda.fabricante ON producto.codigo_fabricante = fabricante.codigo WHERE fabricante.nombre = 'lenovo' ORDER BY precio DESC LIMIT 1);

# 41 Llista tots els productes del fabricant Asus que tenen un preu superior al preu mitjà de tots els seus productes.
SELECT producto.nombre FROM tienda.producto INNER JOIN tienda.fabricante ON producto.codigo_fabricante = fabricante.codigo WHERE precio > (SELECT AVG(precio) FROM tienda.producto LEFT JOIN tienda.fabricante ON producto.codigo_fabricante = fabricante.codigo WHERE fabricante.nombre = 'Asus')	AND fabricante.nombre = (SELECT fabricante.nombre FROM tienda.fabricante WHERE fabricante.nombre = 'Asus');

############################################################################################################
# This is a compilation of queries on a database called 'universidad'
# The goal is to learn basic queries

USE universidad;

# 1 Retorna un llistat amb el primer cognom, segon cognom i el nom de tots els/les alumnes. El llistat haurà d'estar ordenat alfabèticament de menor a major pel primer cognom, segon cognom i nom.'
SELECT DISTINCT apellido1, apellido2, persona.nombre FROM universidad.persona WHERE persona.tipo = 'alumno' ORDER BY apellido1 ASC, apellido2 ASC, persona.nombre ASC;

# 2 Esbrina el nom i els dos cognoms dels/les alumnes que no han donat d'alta el seu número de telèfon en la base de dades.'
SELECT DISTINCT persona.nombre, apellido1, apellido2 FROM universidad.persona WHERE persona.tipo = 'alumno' AND telefono IS NULL ORDER BY apellido1 ASC, apellido2 ASC, persona.nombre ASC;

# 3 Retorna el llistat dels/les alumnes que van néixer en 1999.
SELECT DISTINCT persona.nombre, apellido1, apellido2 FROM universidad.persona WHERE persona.tipo = 'alumno' AND  YEAR(fecha_nacimiento) = '1999' ORDER BY apellido1 ASC, apellido2 ASC, persona.nombre ASC;

# 4 Retorna el llistat de professors/es que no han donat d'alta el seu número de telèfon en la base de dades i a més el seu NIF acaba en K.'
SELECT DISTINCT persona.nombre, apellido1, apellido2 FROM universidad.persona WHERE persona.tipo = 'profesor' AND  telefono IS NULL AND UPPER(RIGHT(nif,1)) ='K' ORDER BY apellido1 ASC, apellido2 ASC, persona.nombre ASC;

# 5 Retorna el llistat de les assignatures que s'imparteixen en el primer quadrimestre, en el tercer curs del grau que té l'identificador 7.
SELECT asignatura.nombre FROM universidad.asignatura WHERE cuatrimestre = 1 AND curso = 3 AND id_grado = 7;

# 6 Retorna un llistat dels professors/es juntament amb el nom del departament al qual estan vinculats/des. El llistat ha de retornar quatre columnes, primer cognom, segon cognom, nom i nom del departament. El resultat estarà ordenat alfabèticament de menor a major pels cognoms i el nom.
SELECT apellido1, apellido2, persona.nombre, departamento.nombre FROM profesor INNER JOIN persona ON profesor.id_profesor = persona.id INNER JOIN departamento ON id_departamento = departamento.id ORDER BY apellido1, apellido2, persona.nombre ASC;

# 7 Retorna un llistat amb el nom de les assignatures, any d'inici i any de fi del curs escolar de l'alumne/a amb NIF 26902806M.
SELECT asignatura.nombre, curso_escolar.anyo_inicio, curso_escolar.anyo_fin FROM universidad.alumno_se_matricula_asignatura INNER JOIN asignatura ON id_asignatura = asignatura.id INNER JOIN curso_escolar ON id_curso_escolar = curso_escolar.id INNER JOIN persona ON id_alumno = persona.id WHERE UPPER(persona.nif) = '26902806M';

# 8 Retorna un llistat amb el nom de tots els departaments que tenen professors/es que imparteixen alguna assignatura en el Grau en Enginyeria Informàtica (Pla 2015).
SELECT DISTINCT departamento.nombre FROM profesor INNER JOIN (SELECT DISTINCT asignatura.nombre, asignatura.id_profesor FROM asignatura INNER JOIN grado ON asignatura.id_grado = grado.id INNER JOIN profesor ON asignatura.id_profesor = profesor.id_profesor WHERE grado.nombre = 'Grado en Ingeniería Informática (Plan 2015)') AS subq ON profesor.id_profesor = subq.id_profesor INNER JOIN departamento ON profesor.id_departamento = departamento.id;

# 9 Retorna un llistat amb tots els/les alumnes que s'han matriculat en alguna assignatura durant el curs escolar 2018/2019.'
SELECT DISTINCT apellido1, apellido2, persona.nombre FROM universidad.alumno_se_matricula_asignatura INNER JOIN persona ON alumno_se_matricula_asignatura.id_alumno = persona.id INNER JOIN curso_escolar ON alumno_se_matricula_asignatura.id_curso_escolar = curso_escolar.id WHERE alumno_se_matricula_asignatura.id_asignatura IS NOT NULL AND curso_escolar.anyo_inicio = '2018' AND curso_escolar.anyo_fin = '2019';

## Resol les 6 següents consultes utilitzant les clàusules LEFT JOIN i RIGHT JOIN.

# 10 Retorna un llistat amb els noms de tots els professors/es i els departaments que tenen vinculats/des. El llistat també ha de mostrar aquells professors/es que no tenen cap departament associat. El llistat ha de retornar quatre columnes, nom del departament, primer cognom, segon cognom i nom del professor/a. El resultat estarà ordenat alfabèticament de menor a major pel nom del departament, cognoms i el nom.
SELECT departamento.nombre, apellido1, apellido2, persona.nombre FROM profesor LEFT JOIN persona ON profesor.id_profesor = persona.id LEFT JOIN departamento ON profesor.id_departamento = departamento.id WHERE persona.tipo = 'profesor' ORDER BY departamento.nombre, apellido1, apellido2, persona.nombre ASC;

# 11 Retorna un llistat amb els professors/es que no estan associats a un departament.
# Nota: el model no deixa entrar valors a taula 'profesor' que no tinguin undepartament associat 'id_departament NOT NULL'
#		Per aquest motiu, consultarem la taula 'persona' per si hi ha una persona tipus 'profesor' que no sigui present a taula 'profesor'.
SELECT apellido1, apellido2, persona.nombre FROM persona LEFT JOIN profesor ON persona.id = profesor.id_profesor WHERE persona.tipo = 'profesor' AND profesor.id_profesor IS NULL;

# 12 Retorna un llistat amb els departaments que no tenen professors/es associats.
SELECT departamento.nombre FROM profesor RIGHT JOIN departamento ON profesor.id_departamento = departamento.id WHERE profesor.id_profesor IS NULL;

# 13 Retorna un llistat amb els professors/es que no imparteixen cap assignatura.
SELECT apellido1, apellido2, persona.nombre FROM profesor left JOIN persona ON profesor.id_profesor = persona.id LEFT JOIN asignatura ON profesor.id_profesor = asignatura.id_profesor WHERE asignatura.id_profesor IS NULL;

# 14 Retorna un llistat amb les assignatures que no tenen un professor/a assignat.
SELECT asignatura.nombre FROM asignatura LEFT JOIN profesor ON asignatura.id_profesor = profesor.id_profesor WHERE profesor.id_profesor IS NULL ORDER BY asignatura.nombre ;

# 15 Retorna un llistat amb tots els departaments que no han impartit assignatures en cap curs escolar.
# (aprofitaré la query del exercici #8 com a subquery d'aquesta.)'
SELECT departamento.nombre FROM departamento WHERE departamento.nombre NOT IN (SELECT DISTINCT departamento.nombre FROM profesor INNER JOIN (SELECT DISTINCT asignatura.nombre, asignatura.id_profesor FROM asignatura INNER JOIN grado ON asignatura.id_grado = grado.id INNER JOIN profesor ON asignatura.id_profesor = profesor.id_profesor WHERE grado.nombre = 'Grado en Ingeniería Informática (Plan 2015)') AS subq ON profesor.id_profesor = subq.id_profesor INNER JOIN departamento ON profesor.id_departamento = departamento.id);

## Consultes resum:

# 16 Retorna el nombre total d'alumnes que hi ha.'
SELECT COUNT(persona.id) FROM persona WHERE tipo = 'alumno';

# 17 Calcula quants/es alumnes van néixer en 1999.
SELECT COUNT(persona.id) FROM persona WHERE tipo = 'alumno' and YEAR(fecha_nacimiento) = '1999' ;

# 18 Calcula quants/es professors/es hi ha en cada departament. El resultat només ha de mostrar dues columnes, una amb el nom del departament i una altra amb el nombre de professors/es que hi ha en aquest departament. El resultat només ha d'incloure els departaments que tenen professors/es associats i haurà d'estar ordenat de major a menor pel nombre de professors/es.
SELECT departamento.nombre AS nom_departamento, COUNT(profesor.id_profesor) AS num_profesores FROM profesor INNER JOIN departamento ON profesor.id_departamento = departamento.id GROUP BY profesor.id_departamento ORDER BY COUNT(profesor.id_profesor) DESC;

# 19 Retorna un llistat amb tots els departaments i el nombre de professors/es que hi ha en cadascun d'ells. Té en compte que poden existir departaments que no tenen professors/es associats/des. Aquests departaments també han d'aparèixer en el llistat.
SELECT departamento.nombre AS nom_departamento, COUNT(profesor.id_profesor) AS num_profesores FROM departamento INNER JOIN profesor ON departamento.id = profesor.id_departamento GROUP BY departamento.nombre ORDER BY COUNT(profesor.id_profesor) DESC;

# 20 Retorna un llistat amb el nom de tots els graus existents en la base de dades i el nombre d'assignatures que té cadascun. Té en compte que poden existir graus que no tenen assignatures associades. Aquests graus també han d'aparèixer en el llistat. El resultat haurà d'estar ordenat de major a menor pel nombre d'assignatures.
SELECT grado.nombre AS nombre_grado, COUNT(asignatura.id) AS num_asignaturas FROM grado LEFT JOIN asignatura ON grado.id = asignatura.id_grado GROUP BY grado.nombre ORDER BY num_asignaturas DESC;

# 21 Retorna un llistat amb el nom de tots els graus existents en la base de dades i el nombre d'assignatures que té cadascun, dels graus que tinguin més de 40 assignatures associades.'
SELECT grado.nombre AS nombre_grado, COUNT(asignatura.id) AS num_asignaturas FROM grado LEFT JOIN asignatura ON grado.id = asignatura.id_grado GROUP BY grado.nombre HAVING COUNT(asignatura.id) > 40 ORDER BY num_asignaturas DESC;
 
# 22 Retorna un llistat que mostri el nom dels graus i la suma del nombre total de crèdits que hi ha per a cada tipus d'assignatura. El resultat ha de tenir tres columnes: nom del grau, tipus d'assignatura i la suma dels crèdits de totes les assignatures que hi ha d'aquest tipus.'
SELECT grado.nombre AS nombre_grado, asignatura.tipo as tipo_asignatura, SUM(asignatura.creditos) AS creditos FROM grado INNER JOIN asignatura ON grado.id = asignatura.id_grado GROUP BY grado.nombre, asignatura.tipo;

# 23 Retorna un llistat que mostri quants/es alumnes s'han matriculat d'alguna assignatura en cadascun dels cursos escolars. El resultat haurà de mostrar dues columnes, una columna amb l'any d'inici del curs escolar i una altra amb el nombre d'alumnes matriculats/des.'
SELECT curso_escolar.anyo_inicio, COUNT(alumno_se_matricula_asignatura.id_alumno) AS alumnos_matriculados FROM curso_escolar INNER JOIN alumno_se_matricula_asignatura ON curso_escolar.id = alumno_se_matricula_asignatura.id_curso_escolar GROUP BY curso_escolar.anyo_inicio;

# 24 Retorna un llistat amb el nombre d'assignatures que imparteix cada professor/a. El llistat ha de tenir en compte aquells professors/es que no imparteixen cap assignatura. El resultat mostrarà cinc columnes: id, nom, primer cognom, segon cognom i nombre d'assignatures. El resultat estarà ordenat de major a menor pel nombre d'assignatures.'
SELECT profesor.id_profesor, persona.nombre, apellido1, apellido2, COUNT(asignatura.id) AS num_asig_impartidas FROM profesor INNER JOIN persona ON profesor.id_profesor = persona.id LEFT JOIN asignatura ON profesor.id_profesor = asignatura.id_profesor GROUP BY profesor.id_profesor ORDER BY COUNT(asignatura.id) DESC;

# 25 Retorna totes les dades de l'alumne més jove.'
SELECT * FROM persona WHERE persona.tipo = 'alumno' AND YEAR(persona.fecha_nacimiento) = (SELECT MAX(YEAR(fecha_nacimiento)) FROM persona WHERE tipo = 'alumno');

# 26 Retorna un llistat amb els professors/es que tenen un departament associat i que no imparteixen cap assignatura.
# Nota: els professors a la taula 'profesor' tenen forçossament departament associat per la qual cosa partirem d'aquesta taula.'
SELECT persona.nombre, apellido1, apellido2 FROM profesor INNER JOIN persona ON profesor.id_profesor = persona.id LEFT JOIN asignatura ON profesor.id_profesor = asignatura.id_profesor WHERE asignatura.id_profesor IS NULL;