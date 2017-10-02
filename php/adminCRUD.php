<?php 
include 'connect.php';
if($_POST){
	if($_POST["operacion"]=="crearClub"){

		$nombre_club=$_POST["nombre_club"];
		$liga=$_POST["liga"];
		$abreviatura=$_POST["abreviatura"];
		$usuario=$_POST["usuario"];
		$password=md5($_POST["password"]);

		if (mysqli_query($enlace, "INSERT INTO clubs (id, club, abreviatura, liga, usuario, password) VALUES (NULL, '$nombre_club', '$abreviatura', '$liga', '$usuario', '$password')") === TRUE) {
			echo "exito";
		}else{
			echo "error interno";
		}

	}elseif($_POST["operacion"]=="crearUsuario"){

		$identificacion = $_POST['identificacion'];
		$nombres=$_POST["nombres"];
		$apellidos=$_POST["apellidos"];
		$email=$_POST["email"];
		$telefono=$_POST["telefono"];
		$fecha_nacimineto=$_POST["fecha_nacimineto"];
			if($_POST['genero']==1){
				$genero="m";
			}else{
				$genero="f";
			}
		$nombre_contacto=$_POST["nombre_contacto"];
		$telefono_contacto=$_POST["telefono_contacto"];



		if (mysqli_query($enlace, "INSERT INTO competidor(identificacion, nombres, apellidos, email, telefono, fecha_nacimineto,genero, nombre_contacto, telefono_contacto) VALUES('$identificacion','$nombres','$apellidos','$email','$telefono','$fecha_nacimineto','$genero','$nombre_contacto','$telefono_contacto')") === TRUE) {
			echo "exito";
		}else{
			echo "error interno";
		}

	}elseif($_POST["operacion"]=="getSelectPruebas"){

	$id_y_pruebas = mysqli_query($enlace, "SELECT i.id,jornada,i.prueba,p.prueba as nombre,UPPER(i.genero) as genero,n.id as id_categoria,n.nombre as categoria FROM jornadas_pruebas i, pruebas p, nombre_categoria n WHERE i.prueba=p.id AND i.categoria=n.id ORDER by i.id ASC" );


		$resul= "<div class='form-group margin-bottonx15'><label for='prueba' class='col-sm-2 control-label'>Prueba</label><div class='col-sm-10'><select id='prueba' name='prueba' class='form-control'> <option value='0'>Seleccionar una Prueba</option>";
		while($rowpruebas = mysqli_fetch_assoc($id_y_pruebas)){

		$resul= $resul."<option data-id='".$rowpruebas['id']."' data-prueba='".$rowpruebas['prueba']."' data-genero='".$rowpruebas['genero']."' data-categoria='".$rowpruebas['id_categoria']."'>(".$rowpruebas['genero'].") ".utf8_encode($rowpruebas['categoria'])." |".$rowpruebas['nombre']."</option>";

		}
		$resul= $resul."</select></div></div>";

		echo $resul;

	}elseif($_POST["operacion"]=="getPruebas"){

    $prueba =$_POST["prueba"];
    $genero =$_POST["genero"];
    $categoria =$_POST["categoria"];
    $id_jornada_prueba=$_POST["id_jornada_prueba"];


        $resulNumCarriles = mysqli_query ($enlace,"SELECT * FROM `carriles` WHERE id=1 ");


        while($rowCategoria = mysqli_fetch_assoc($resulNumCarriles)){
            $num_carriles =$rowCategoria["num_carriles"];
        }




        $resulParaWhereIN = mysqli_query ($enlace,"SELECT * FROM union_categorias WHERE id_nombre=".$categoria);

        $strCategoriaIn = "";
        while($rowCategoria = mysqli_fetch_assoc($resulParaWhereIN)){
            $strCategoriaIn .=$rowCategoria["categoria"].",";
        }
        $strCategoriaIn= substr($strCategoriaIn,0,-1);

//		$sql="SELECT comcia.club , comdor.identificacion,concat_ws(' ',comdor.nombres,comdor.apellidos) AS nombre ,cl.abreviatura, comcia.prueba, comcia.tiempo FROM competencia comcia, competidor comdor, categoria_com catecom , clubs cl where comcia.prueba=$prueba AND comcia.competidor=comdor.identificacion AND comdor.genero=\"$genero\" AND catecom.identificacion=comdor.identificacion AND comcia.club=cl.id AND catecom.categoria=$categoria ORDER by comcia.tiempo";
        $sql="SELECT comcia.club , comdor.identificacion,concat_ws(' ',comdor.nombres,comdor.apellidos) AS nombre ,cl.abreviatura, comcia.prueba, comcia.tiempo FROM competencia comcia, competidor comdor, categoria_com catecom , clubs cl where comcia.prueba=$prueba AND comcia.competidor=comdor.identificacion AND comdor.genero='$genero' AND catecom.identificacion=comdor.identificacion AND comcia.club=cl.id AND catecom.categoria IN (".$strCategoriaIn.") ORDER by comcia.tiempo";
		$result1 = mysqli_query($enlace, $sql );

        if($num_carriles==8)
            $posiciones= array(4,5,3,6,2,7,1,8);
        elseif ($num_carriles==6)
            $posiciones= array(3,4,2,5,1,6);

		$pila= array();
		$afinal = array();

		while($row1 = mysqli_fetch_assoc($result1)){
			$pila[]=$row1;
		}
	    /* liberar el conjunto de resultados */
	    mysqli_free_result($result1);

		while(count($pila)!=0){

		$los8=array();
		$cantiEnpila=count($pila);
			if($cantiEnpila>=$num_carriles){
			    for ($i=0;$i<$num_carriles;$i++) {
			    	
			    	$los8[$posiciones[$i]]=array_shift($pila);
			    	
			    }
			}else{
				if($cantiEnpila>=3){
				    for ($i=0;$i<$cantiEnpila;$i++) {
				    	
				    	$los8[$posiciones[$i]]=array_shift($pila);
				    	
				    }
				}elseif ($cantiEnpila==2) {
					if(count($afinal)!=0){
						$los8[$posiciones[0]]=array_pop($afinal[(count($afinal)-1)]);
						$los8[$posiciones[1]]=array_shift($pila);
						$los8[$posiciones[2]]=array_shift($pila);
					}else{
						$los8[$posiciones[0]]=array_shift($pila);
						$los8[$posiciones[1]]=array_shift($pila);
					}
				}else{
					if(count($afinal)!=0){
						$aux1=array_pop($afinal[(count($afinal)-1)]);
						$aux2=array_pop($afinal[(count($afinal)-1)]);
						$los8[$posiciones[0]]=$aux2;
						$los8[$posiciones[1]]=$aux1;
						$los8[$posiciones[2]]=array_shift($pila);
					}else{
						$los8[$posiciones[0]]=array_shift($pila);
					}
				}
			}

			$afinal[]=$los8;

		}

		$sqlact="SELECT id_competidor,tiempo FROM resultados WHERE id_jornada_prueba=$id_jornada_prueba";
		
		$actu = mysqli_query($enlace, $sqlact );
		$arrayAActualizar=array();
		if(!empty($actu)){
			while($fila = mysqli_fetch_assoc($actu)){
				$arrayAActualizar[$fila["id_competidor"]]=$fila["tiempo"];
			}
		}
	//die(print_r($arrayAActualizar,true));
		//desde aqui cominaza la parte de imprimir 

		$munSerie=count($afinal);
		$numS=0;
		$result=(empty($arrayAActualizar))?"<div class='row'><input type='text' id='operacion' name='operacion' value='setResultados' hidden>":"<div class='row'><input type='text' id='operacion' name='operacion' value='updateResultados' hidden>";

		for($i=($munSerie-1);$i>=0;$i--){
			$numS++;

			$result= $result."<div class='col-sm-6'><h3>Serie ".($numS)."</h3>" ;
			$numCompeti=count($afinal[$i]);
			
			$impreinicial=0;
            if($num_carriles==8) {
                if ($numCompeti == 1 || $numCompeti == 2) {
                    $impreinicial = 4;
                } elseif ($numCompeti == 3 || $numCompeti == 4) {
                    $impreinicial = 3;
                } elseif ($numCompeti == 5 || $numCompeti == 6) {
                    $impreinicial = 2;
                } elseif ($numCompeti == 7 || $numCompeti == 8) {
                    $impreinicial = 1;
                }
            }elseif ($num_carriles==6){
                if ($numCompeti == 1 || $numCompeti == 2) {
                    $impreinicial = 3;
                } elseif ($numCompeti == 3 || $numCompeti == 4) {
                    $impreinicial = 2;
                } elseif ($numCompeti == 5 || $numCompeti == 6) {
                    $impreinicial = 1;
                }

            }
			for($j=$impreinicial;$j<($impreinicial+$numCompeti);$j++){

				$nameidentifi=print_r($afinal[$i][$j]["identificacion"],true);
				$nombrecom=print_r($afinal[$i][$j]["nombre"],true);


				$resultadosf="<div class='col-sm-8'>";
				$resultadosf=$resultadosf."<label for='$nameidentifi'> $j $nombrecom</label> ";
				$resultadosf=$resultadosf." </div><div class='col-sm-4'> ";

				if(empty($arrayAActualizar)){
				$resultadosf=$resultadosf." <input type='text' class='form-control resultado' id='$nameidentifi' name='$nameidentifi' placeholder='00.00.00' maxlength='8'>";
				}else{
				$resultadosf=$resultadosf." <input type='text' class='form-control resultado' id='$nameidentifi' name='$nameidentifi' value='".$arrayAActualizar[$nameidentifi]."' maxlength='8'>";					
				}

				$resultadosf=$resultadosf." </div> ";

				$result=$result.$resultadosf;
			}

			$result=$result."</div>";

		}
		if(empty($arrayAActualizar)){
			$result=$result."</div><div class='row'><div class='hidden' id='mostrarExitoResul'></div><div class='row'><div class='col-sm-12'><button type='submit' class='btn btn-default center-block'>Registrar Resultados</button></div></div></div>";
		}else{
			$result=$result."</div><div class='row'><br><div class='hidden' id='mostrarExitoResul'></div><br><div class='row'><div class='col-sm-12'><button type='submit' class='btn btn-default center-block'>Actualizar Resultados</button></div></div></div>";
		}
		    
echo $result;

	}elseif($_POST["operacion"]=="setResultados"){

		  $id_jornada_prueba=$_POST["id_jornada_prueba"];
		  foreach ($_POST as $key => $value) {
		  	if($key!="operacion")
		  		if($key!="id_jornada_prueba"){

					if (mysqli_query($enlace, "INSERT INTO resultados(id, id_jornada_prueba, id_competidor, tiempo) VALUES (NULL,'$id_jornada_prueba','$key','$value')") === TRUE) {
						
					}else{
						//echo "error interno";
						printf("Error: %s\n", mysqli_error($enlace));
					}



		  		}

		    
		  }
		  echo "Registro exitoso";
		
	}elseif($_POST["operacion"]=="updateResultados"){

		  $id_jornada_prueba=$_POST["id_jornada_prueba"];
		  foreach ($_POST as $key => $value) {
		  	if($key!="operacion")
		  		if($key!="id_jornada_prueba"){

					if (mysqli_query($enlace, "UPDATE resultados SET tiempo = '$value' WHERE id_jornada_prueba =$id_jornada_prueba AND id_competidor=$key") === TRUE) {
						
					}else{
						//echo "error interno";
						printf("Error: %s\n", mysqli_error($enlace));
					}



		  		}

		    
		  }
		  echo "Actualización exitosa";


	}elseif($_POST["operacion"]=="pagoUsuario"){
		$idUsuario=$_POST["idUsuario"];
		$fecha=$_POST["fecha"];
        $fecha_inicio=$_POST["fecha_inicio"];
		$valor=$_POST["valor"];

        $result1 = mysqli_query($enlace, "SELECT id FROM pagos WHERE id_usuario='$idUsuario'" );

        if( mysqli_num_rows($result1)==0){
            if (mysqli_query($enlace, "INSERT INTO pagos(id, id_usuario, fecha, valor) VALUES (NULL,$idUsuario,'$fecha','$valor')") === TRUE) {

            }else{
                //echo "error interno";
                printf("Error: %s\n", mysqli_error($enlace));
            }
        }else{
            if (mysqli_query($enlace, "UPDATE pagos SET fecha = '$fecha', valor='$valor' WHERE id_usuario =$idUsuario") === TRUE) {

            }else{
                //echo "error interno";
                printf("Error: %s\n", mysqli_error($enlace));
            }
        }


        if (mysqli_query($enlace, "INSERT INTO historial_pagos(id, id_usuario,fecha_inicio ,fecha, valor) VALUES (NULL,$idUsuario,'$fecha_inicio','$fecha','$valor')") === TRUE) {

        }else{
            //echo "error interno";
            printf("Error: %s\n", mysqli_error($enlace));
        }


	echo "Cuota registrada";
	}elseif($_POST["operacion"]=="getHistorial"){
        $idUsuario=$_POST["identificacion"];

        $result1 = mysqli_query($enlace, "SELECT * FROM `historial_pagos` WHERE id_usuario='$idUsuario'" );

        if( mysqli_num_rows($result1)!=0){
            $html = "";
            while($fila = mysqli_fetch_assoc($result1)){
                $html = $html."<tr><td>".$fila['fecha_inicio']."</td><td>".$fila['fecha']."</td><td>".$fila['valor']."</td></tr>";
            }
        }

        echo $html;

    }elseif ($_POST["operacion"]=="iniciarCampeonato"){

        if (mysqli_query($enlace, "DELETE FROM resultados") !== TRUE) {
            printf("Error: %s\n", mysqli_error($enlace));
        }

        if (mysqli_query($enlace, "DELETE FROM nombre_categoria") !== TRUE) {
            printf("Error: %s\n", mysqli_error($enlace));
        }

        if (mysqli_query($enlace, "DELETE FROM categoria_com") !== TRUE) {
            printf("Error: %s\n", mysqli_error($enlace));
        }

        if (mysqli_query($enlace, "DELETE FROM competencia") !== TRUE) {
            printf("Error: %s\n", mysqli_error($enlace));
        }

        if (mysqli_query($enlace, "DELETE FROM pruebas") !== TRUE) {
            printf("Error: %s\n", mysqli_error($enlace));
        }

        if (mysqli_query($enlace, "DELETE FROM jornadas_pruebas") !== TRUE) {
            printf("Error: %s\n", mysqli_error($enlace));
        }

        if (mysqli_query($enlace, "UPDATE carriles SET id=1,num_carriles=6") === TRUE) {

        }else{
            //echo "error interno";
            printf("Error: %s\n", mysqli_error($enlace));
        }


        echo "exito";

    }elseif ($_POST["operacion"]=="cambiarNumCarriles"){

        $num_carrilesPos = $_POST["num_carriles"];
        if (mysqli_query($enlace, "UPDATE carriles SET id=1,num_carriles=".$num_carrilesPos ) === TRUE) {

        }else{
            //echo "error interno";
            printf("Error: %s\n", mysqli_error($enlace));
        }
    }
}

 ?>