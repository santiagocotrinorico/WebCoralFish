<?php 
include 'connect.php';
if($_POST){

	if($_POST["operacion"]=="insertCompetidor"){

//echo "el valor del limite es :".$_POST["limite"];
			if($_POST['genero']==1){
				$genero="m";
			}else{
				$genero="f";
			}

			if (mysqli_query($enlace, "INSERT INTO competidor(identificacion, nombres, apellidos, email, telefono, fecha_nacimineto,genero, nombre_contacto, telefono_contacto) VALUES (\"".$_POST['identificacion']."\",\"".$_POST['nombres']."\",\"".$_POST['apellidos']."\",\"\",\"\",\"".$_POST['fechaNacimiento']."\",\"".$genero."\",\"\",\"\")") === TRUE) {

				if (mysqli_query($enlace, "INSERT INTO categoria_com(categoria, identificacion) VALUES (".$_POST['categoria'].",\"".$_POST['identificacion']."\")") === TRUE) { 

						for($i=1; $i<=$_POST["limite"]; $i++){

							if($_POST["prueba".$i]!=0){

								if($_POST["tiempo1".$i]==""){
									insertPruebas($_POST["club"],$_POST["identificacion"],$_POST["prueba".$i],"59.59.99");
								}else{
									insertPruebas($_POST["club"],$_POST["identificacion"],$_POST["prueba".$i],$_POST["tiempo1".$i]);
								}
								
								if($_POST["prueba2".$i]!=0){
									if($_POST["tiempo2".$i]==""){
										insertPruebas($_POST["club"],$_POST["identificacion"],$_POST["prueba2".$i],"59.59.99");
									}else{
										insertPruebas($_POST["club"],$_POST["identificacion"],$_POST["prueba2".$i],$_POST["tiempo2".$i]);
									}
									
								}
								
							}

						}//fin for	
				}
				echo "exito";
			}else{
				echo "error interno";
			}



//fin insercompetidor
	}if($_POST["operacion"]=="updateCompetidor"){
        mysqli_query($enlace,"UPDATE categoria_com SET categoria=".$_POST['categoria']." WHERE identificacion=\"".$_POST['identificacion']."\""); 
			deliteCompetidor($_POST["identificacion"]);

				for($i=1; $i<=$_POST["limite"]; $i++){

					if($_POST["prueba".$i]!=0){

						if($_POST["tiempo1".$i]==""){
							insertPruebas($_POST["club"],$_POST["identificacion"],$_POST["prueba".$i],"59.59.99");
						}else{
							insertPruebas($_POST["club"],$_POST["identificacion"],$_POST["prueba".$i],$_POST["tiempo1".$i]);
						}
						
						if($_POST["prueba2".$i]!=0){
							if($_POST["tiempo2".$i]==""){
								insertPruebas($_POST["club"],$_POST["identificacion"],$_POST["prueba2".$i],"59.59.99");
							}else{
								insertPruebas($_POST["club"],$_POST["identificacion"],$_POST["prueba2".$i],$_POST["tiempo2".$i]);
							}
							
						}
						
					}

				}//fin for
	}
}elseif($_GET){

global $enlace;

	if($_GET["opera"]=="tablaCompetidor"){

$sql="SELECT cdor.identificacion, cdor.nombres, cdor.apellidos, cdor.genero FROM competencia ccia, competidor cdor WHERE ccia.club=".$_GET["club"]." and ccia.competidor=cdor.identificacion group by cdor.identificacion ORDER by cdor.identificacion ASC";

		$result1 = mysqli_query($enlace, $sql );


			$enviar="<table class=\"table\"><thead><tr><th>#</th><th>Identificación</th><th>Nombre</th><th>Apellido</th><th>genero</th></tr></thead><tbody>";

		    /* obtener array asociativo */
		    $i=0;
		    while ($row1 = mysqli_fetch_assoc($result1)) {
		      $i++;  
		      $enviar=$enviar."<tr><td>".$i."</td><td>".$row1["identificacion"]."</td><td>".$row1["nombres"]."</td><td>".$row1["apellidos"]."</td><td>".$row1["genero"]."</td></tr>";
		    }

		    $enviar=$enviar."</tbody></table>";
		    echo $enviar;
		    
		    


	}elseif($_GET["opera"]=="competidor"){

		$competidor;

		$result = mysqli_query($enlace, "SELECT identificacion, nombres, apellidos, fecha_nacimineto, genero FROM competidor WHERE identificacion=\"".$_GET["ideCompetidor"]."\"");

		    if(mysqli_num_rows($result)!=0){
		       $row = mysqli_fetch_assoc($result);
			       $competidor = array(
			       		"canti" => 1,
					    "nombres" => $row["nombres"],
					    "apellidos" => $row["apellidos"],
					    "fecha_nacimineto" => $row["fecha_nacimineto"],
					    "genero" => $row["genero"]
					);

		    }else{
			       $competidor = array(
			       	    "canti" => 0
					);


		    }
		   
		echo "{\"competidor\":[".json_encode($competidor, JSON_PRETTY_PRINT)."]}";

	}

}


function insertPruebas($club, $competidor, $prueba, $tiempo){

 global $enlace;
//echo "<br>INSERT INTO competencia(club, competidor, prueba, tiempo) VALUES (".$club.",\"".$competidor."\",". $prueba.",\"".$tiempo."\")";

			if (mysqli_query($enlace, "INSERT INTO competencia(club, competidor, prueba, tiempo) VALUES (".$club.",\"".$competidor."\",". $prueba.",\"".$tiempo."\")") === TRUE) {
			    
			}else{
				echo "error interno";
			}

}

function deliteCompetidor($competidor){
	global $enlace;
	
				if (mysqli_query($enlace, "DELETE FROM competencia WHERE competidor=\"".$competidor."\"") === TRUE) {
			    
			}else{
				echo "error interno";
			}
}

 ?>