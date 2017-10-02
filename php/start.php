<?php 
include 'connect.php';

$jornadas="";
$cont = 1;

$id_y_pruebas = mysqli_query($enlace, "SELECT i.id,jornada,i.prueba,p.prueba as nombre,UPPER(i.genero) as genero,i.categoria FROM jornadas_pruebas i, pruebas p WHERE i.prueba=p.id" );

while($rowpruebas = mysqli_fetch_assoc($id_y_pruebas)){

if($jornadas!=$rowpruebas["jornada"]){
	$jornadas=$rowpruebas["jornada"];
	echo "<h2>Jornada ".$jornadas."</h2>";
}


echo "<br>".$cont." (".$rowpruebas['genero'].") ".$rowpruebas['categoria']." años |".$rowpruebas['nombre']."<br><br>";
$cont++;
		$sql="SELECT comcia.club , concat_ws(' ',comdor.nombres,comdor.apellidos) AS nombre ,cl.abreviatura, comcia.prueba, comcia.tiempo FROM competencia comcia, competidor comdor, categoria_com catecom , clubs cl where comcia.prueba=".$rowpruebas['prueba']." AND comcia.competidor=comdor.identificacion AND comdor.genero=\"".$rowpruebas['genero']."\" AND catecom.identificacion=comdor.identificacion AND comcia.club=cl.id AND catecom.categoria=".$rowpruebas['categoria']." ORDER by comcia.tiempo";    

				$result1 = mysqli_query($enlace, $sql );

		$posiciones= array(4,5,3,6,2,7,1,8);

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
			if($cantiEnpila>=8){
			    for ($i=0;$i<8;$i++) {
			    	
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

		//desde aqui cominaza la parte de imprimir 
		
		$munSerie=count($afinal);
		$numS=0;

		
		for($i=($munSerie-1);$i>=0;$i--){
			$numS++;
			
			echo "Serie ".($numS)."<br>" ;

			$numCompeti=count($afinal[$i]);
			
			$impreinicial=0;
				if($numCompeti==1||$numCompeti==2){
					$impreinicial=4;
				}elseif($numCompeti==3||$numCompeti==4){
					$impreinicial=3;
				}elseif($numCompeti==5||$numCompeti==6){
					$impreinicial=2;
				}elseif($numCompeti==7||$numCompeti==8){
					$impreinicial=1;
				}
			for($j=$impreinicial;$j<($impreinicial+$numCompeti);$j++){
				$resultadosf="";
				$resultadosf=$resultadosf."".$j."  ";

				$resultadosf=$resultadosf.print_r($afinal[$i][$j]["nombre"],true);
				$resultadosf=$resultadosf."  ";
				$resultadosf=$resultadosf.print_r($afinal[$i][$j]["tiempo"],true);
				$resultadosf=$resultadosf." <br> ";

				echo $resultadosf;
			}
		}

}
mysqli_free_result($id_y_pruebas);


 ?>