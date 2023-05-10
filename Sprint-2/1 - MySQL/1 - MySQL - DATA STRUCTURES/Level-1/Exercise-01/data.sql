USE optica;

INSERT INTO adreça (
    id,
    carrer,
    numero,
    pis,
    porta,
    ciutat,
    codi_postal,
    pais
  )
VALUES (NULL,'Alps',34,'Baixos','1','Canovelles',0901,'España'),
(NULL,'Girona',54,'3','A','Rialp',0902,'España'),
(NULL,'Ganduixer',230,'Atic','3','Barcelona',08001,'España'),
(NULL,'Roger de Flor',90,'4','2','Barcelona',08002,'España'),
(NULL,'Avda. Josep Tarradellas',123,'Baixos',NULL,'Barcelona',08003,'España'),
(NULL,'Ronda Sant Ramon',150,'4','1','Sant Boi de Llobregat',08830,'España'),
(NULL, 'Canonge', 12,'2',	'3',	'Calella de Palafrugell',	0834,'España'),
(NULL, 'Serrano',	256,	'Atico',	'1',	'Madrid',	28000,'España');

INSERT INTO proveidor (id, nom, telefon, fax, NIF)
VALUES (1, 'Gaming Optics SL', 936408318,NULL,'12345698A'),
        (2, 'MultiOpticas SA', 912005555,NULL,'23456789B'),
        (3, 'RayBan Inc.', 01555555,NULL,'45.45.54');

INSERT INTO client (
    id,
    nom,
    cognom1,
    cognom2,
    telefon,
    email,
    data_registre,
    prescriptor_id
  )
VALUES (4, 'Joanot', 'Martorell', 4 , 666555444, 'joanot@martorell.cat', NULL, NULL),
      (5, 'Pere', 'Camps', 5 , 666777888, 'pere_camps@gmail.com', '2023-05-05 23:23:23', 4),
      (6, 'Cristina', 'Aguilera', 6 , 666999666, 'cris@guilera.com', NULL, 4),
      (7,'Jaume',	'Codina',	7,	858585585,	'jc@yahoo.com',	NULL,	5),
      (8, 'Felip', 'Gonzalez', '8', 123456789, 'fg@moncloa.es', NULL, 4);


INSERT INTO marca (id, nom, proveidor_id)
VALUES (NULL,'Rayban',3),
      (NULL,'Oakley',1),
      (NULL,'MO',2);

INSERT INTO ulleres (
    id,
    marca_id,
    vidre_dret_graduacio,
    vidre_esquerre_graduacio,
    vidre_dret_color,
    vidre_esquerre_color,
    muntura_tipus,
    muntura_color,
    preu
  )
VALUES (NULL,1,'1.5','1.5','transparent','transparent','pasta','lila','500.0'),
      (NULL,3,'1.5','1.5','tintat','tintat','flotant','groc','700.0'),
      (NULL,2,'1.5','1.5','transparent','transparent','metàl·lica','negre','150.50'),
      (NULL,1,'0.0','0.0','tintat','tintat','pasta','vermell','350.0'),
      (NULL,1,'2.5','2.5','transparent','transparent','metàl·lica','blanc','200.0'),
      (NULL,2,'3.5','1.5','transparent','transparent','pasta','turquesa','90.0');

INSERT INTO venedor (id, nom, cognom1, cognom2)
VALUES (NULL, 'Francisco', 'Martinez', 'Zoroa'),
        (NULL, 'Marta', 'Pla','Gonzalez'),
        (NULL, 'Clara', 'Tur', 'Sala');

INSERT INTO venda (
    id,
    client_id,
    Venedor_id,
    data
  )
VALUES (NULL, 5, 3, '2023-01-01 10:30:00'),
      (NULL, 5, 2, '2023-01-15 10:30:00'),
      (NULL, 4, 1, '2023-02-01 10:30:00'),
      (NULL, 6, 3, '2023-02-15 10:30:00'),
      (NULL, 7, 1, '2023-03-01 10:30:00'),
      (NULL, 8, 2, '2023-03-15 10:30:00');

INSERT INTO venda_ulleres (venda_id, ulleres_id)
VALUES (1,4),
      (2,1),
      (3,2),
      (4,3),
      (5,5),
      (6,6);