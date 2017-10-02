INSERT INTO `jornadas_pruebas` (`id`, `jornada`, `prueba`, `genero`, `categoria`) 
VALUES
(NULL, '1', '1', 'f', '1'),
(NULL, '1', '1', 'm', '1'),
(NULL, '1', '1', 'f', '2'),
(NULL, '1', '1', 'm', '2'),
(NULL, '1', '1', 'm', '3'),
(NULL, '1', '1', 'f', '3'),
(NULL, '1', '2', 'f', '4'),
(NULL, '1', '2', 'm', '4'),
(NULL, '1', '2', 'f', '5'),
(NULL, '1', '2', 'm', '5'),
  (NULL, '1', '3', 'f', '1'),
  (NULL, '1', '3', 'm', '1'),
  (NULL, '1', '3', 'f', '2'),
  (NULL, '1', '3', 'm', '2'),
  (NULL, '1', '3', 'm', '3'),
  (NULL, '1', '3', 'f', '3'),
  (NULL, '1', '4', 'f', '4'),
  (NULL, '1', '4', 'm', '4'),
  (NULL, '1', '4', 'f', '5'),
  (NULL, '1', '4', 'm', '5'),
    (NULL, '1', '5', 'f', '1'),
    (NULL, '1', '5', 'm', '1'),
    (NULL, '1', '5', 'f', '2'),
    (NULL, '1', '5', 'm', '2'),
    (NULL, '1', '5', 'm', '3'),
    (NULL, '1', '5', 'f', '3'),
    (NULL, '1', '6', 'f', '4'),
    (NULL, '1', '6', 'm', '4'),
    (NULL, '1', '6', 'f', '5'),
    (NULL, '1', '6', 'm', '5');

INSERT INTO pruebas (id, prueba) VALUES
  (1, '25m Patada Libre'),
  (2, '100m C.I'),
  (3, '25m Patada Mariposa'),
  (4, '50m Pecho'),
  (5, '25m Patada Espalda'),
  (6, '50m Espalda'),
  (7, '4x25m C.I'),
  (8, '25m Espalda'),
  (9, '400m Libre'),
  (10,'25m Pecho'),
  (11,'50m Libre'),
  (12,'25m Libre'),
  (13, '50m Mariposa'),
  (14, '4x25M Libre');



INSERT INTO pruebas (id, prueba) VALUES

  (5, '200m Libre'),
  (6, '400m Libre'),
  (7, '800m Libre'),
  (8, '1500m Libre'),
  (9, '25m Patada Espalda'),


  (12, '100m Espalda'),
  (13, '200m Espalda'),
  (14, '25m Patada Pecho'),
  (15, '25m Pecho'),
  (16, '50m Pecho'),
  (17, '100m Pecho'),
  (18, '200m Pecho'),
  (19, '25m Mariposa'),
  (20, '50m Mariposa'),
  (21, '100m Mariposa'),
  (22, '200m Mariposa'),
  (23, '100m Comb. Ind.'),
  (24, '200m Comb. Ind.'),
  (25, '400m Comb. Ind.'),
  (26, '4x25m Relevo Libre'),
  (27, '4x25m Relevo C.I.\r\n'),
  (28, '4x50m Relevo Libre'),
  (29, '4x50m Relevo C.I.'),
  (30, '4x100m Relevo Libre'),
  (31, '4x100m Relevo C.I.'),
  (32, '4X200m Relevo Libre'),
  (33, '25m Ondulacion');

SELECT jornada FROM jornadas_pruebas jp WHERE jp.prueba=1 GROUP by prueba

SELECT jornada, prueba  FROM jornadas_pruebas WHERE 1 GROUP by prueba		

SELECT comp.competidor, c.nombres, c.apellidos, p.prueba , comp.tiempo FROM competidor c, competencia comp, pruebas p WHERE comp.prueba=p.id AND comp.club=3 AND comp.competidor=c.identificacion		


SELECT comp.competidor, c.nombres, c.apellidos,(SELECT jp.jornada FROM jornadas_pruebas jp WHERE jp.prueba=p.id GROUP by prueba) as jornada, p.prueba , comp.tiempo FROM competidor c, competencia comp, pruebas p WHERE comp.prueba=p.id AND comp.club=3 AND comp.competidor=c.identificacion


SELECT comp.identificacion ,concat_ws(' ',comp.nombres,comp.apellidos) AS nombre, result.tiempo 
FROM resultados result, competidor comp ,competencia comcia,clubs cl
where id_jornada_prueba=1  AND result.id_competidor=comp.identificacion 
ORDER BY result.tiempo ASC

SELECT * FROM `pagos` WHERE DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= fecha


