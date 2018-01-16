<?php 

$enlace = mysqli_connect("localhost", "root", "", "coralfish");

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}
$num= $_GET["jornada"];
$genero= $_GET["genero"];
$categoria= $_GET["categoria"];
/*$result = mysqli_query($enlace, "SELECT p.id, p.prueba FROM jornadas_pruebas jp,pruebas p WHERE jp.jornada=".$num." and jp.prueba=p.id");*/
$result = mysqli_query($enlace, "SELECT p.id, p.prueba FROM jornadas_pruebas j,pruebas p WHERE j.jornada=".$num." and j.genero='$genero' and j.categoria=".$categoria." and j.prueba=p.id GROUP BY j.prueba");



$enviar="<select class=\"form-control\" id=\"prueba$num\" name=\"prueba$num\"  onchange=\"select1($num)\"><option value=\"0\">Seleccione una Prueba</option>";
while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
	$enviar=$enviar."<option value=\"$row[0]\">$row[1]</option>";
}
$enviar=$enviar."</select>";

echo $enviar;
mysqli_close($enlace);


 ?>