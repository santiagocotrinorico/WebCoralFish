<?php 
include 'connect.php';

$nose= mysqli_query($enlace, "SELECT comp.competidor, c.nombres, c.apellidos,(SELECT jp.jornada FROM jornadas_pruebas jp WHERE jp.prueba=p.id GROUP by prueba) as jornada, p.prueba , comp.tiempo FROM competidor c, competencia comp, pruebas p WHERE comp.prueba=p.id AND comp.club=3 AND comp.competidor=c.identificacion" ); 
    /* obtener el array de objetos */
    /* obtener el array asociativo */
    /* obtener array asociativo */
    while ($row = mysqli_fetch_assoc($nose)) {
        printf ("%s | %s | %s | ( %s )  %s\n <br>", $row["competidor"], $row["nombres"], $row["apellidos"], $row["jornada"], $row["prueba"]);
    }

    /* liberar el conjunto de resultados */
    mysqli_free_result($nose);




 ?>	