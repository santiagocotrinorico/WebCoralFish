<?php
include 'connect.php';
require('fpdf/fpdf.php');
require('Resultados.php');

class PDF extends FPDF
{
protected $col = 0; // Columna actual
protected $y0;      // Ordenada de comienzo de la columna

function Header()
{

    // Logo
    $this->Image('../images/LogoCaribes.png',20,8,25);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    //$this->Cell(0);
    // Título
    $this->Cell(180,10,utf8_decode('CARIBES ACUÁTICOS'),0,1,'C');
    $this->SetFont('Arial','',12);
    $this->Cell(6);
    $this->Cell(180,5,utf8_decode('Resultados I Festi-Torneo de Natación Caribes'),0,1,'C');
    $this->Cell(180,5,'Octubre 28 de 2017',0,1,'C');
    $this->Ln(1);
    $this->SetFont('Arial','',10);
    $this->Cell(6);
    $this->Cell(180,5,utf8_decode('Piscinas Olímpicas, Complejo Deportivo José Eustasio Rivera - Villavicencio [Meta]'),'B',1,'C');
    // Salto de línea
    $this->Ln(10);
    $this->y0 = $this->GetY();
}

function Footer()
{
    // Pie de página
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->SetTextColor(128);
    $this->Cell(0,4,utf8_decode('Sistematización CoralFish '),0,1,'C');
    $this->Cell(0,4,utf8_decode('Página '.$this->PageNo()),0,0,'C');
}

function SetCol($col)
{
    // Establecer la posición de una columna dada
    $this->col = $col;
    $x = 10+$col*65;
    $this->SetLeftMargin($x);
    $this->SetX($x);
}

function AcceptPageBreak(){
    // Método que acepta o no el salto automático de página
    if($this->col<2)
    {
        // Ir a la siguiente columna
        $this->SetCol($this->col+1);
        // Establecer la ordenada al principio
        $this->SetY($this->y0);
        // Seguir en esta página
        return false;
    }
    else
    {
        // Volver a la primera columna
        $this->SetCol(0);
        // Salto de página
        return true;
    }
}

function ChapterTitle( $label)
{
    // Título
    $this->SetFont('Arial','',12);
    $this->SetFillColor(0,255,255);
    $this->Cell(0,6,"$label",0,1,'L',true);
    $this->Ln(4);
    // Guardar ordenada
    $this->y0 = $this->GetY();
}

function ChapterBody()
{
global $enlace;
$jornadas="";
$cont = 1;

/*$id_y_pruebas = mysqli_query($enlace, "SELECT c.prueba As id, p.prueba FROM competencia c, pruebas p, competidor cdor where c.prueba=p.id AND 
c.competidor=cdor.identificacion AND cdor.genero=\"".$genero."\" GROUP BY c.prueba" );*/
$id_y_pruebas = mysqli_query($enlace, "SELECT i.id,jornada,i.prueba,p.prueba as nombre,UPPER(i.genero) as genero,n.id as id_categoria,n.nombre as categoria 
FROM jornadas_pruebas i, pruebas p, nombre_categoria n WHERE i.prueba=p.id AND i.categoria=n.id ORDER by i.id ASC " );


while($rowpruebas = mysqli_fetch_assoc($id_y_pruebas)){
$this->SetFont('Times','',14);

if($jornadas!=$rowpruebas["jornada"]){
	$jornadas=$rowpruebas["jornada"];
	$this->Cell(40,9,"Jornada".$jornadas,0,1);
}


$this->SetFont('Times','',11);
    $this->Cell(58,5,$cont." (".$rowpruebas['genero'].") ".$rowpruebas['categoria'],0,2,'C');
    $this->SetFont('Times','',10);
    $this->Cell(58,4,utf8_decode($rowpruebas['nombre']),0,1,'C');

$cont++;
$id_jornada_prueba=$rowpruebas['id'];
		$sql="SELECT comp.identificacion ,concat_ws(' ',comp.nombres,comp.apellidos) AS nombre, cl.abreviatura, cl.id AS club, result.tiempo FROM resultados result, 
competidor comp ,competencia comcia,clubs cl where id_jornada_prueba=$id_jornada_prueba AND result.id_competidor=comp.identificacion AND 
comcia.club=cl.id AND comcia.competidor= comp.identificacion GROUP by comp.identificacion ORDER BY result.tiempo ASC";    

		$result1 = mysqli_query($enlace, $sql );

$con=0;
$tiempo ="";
$con2 = -1;

//Variable para guadar el puntaje obtenido inicia con el puntaje maximo
$puntos = 0;
		while($row1 = mysqli_fetch_assoc($result1)){
			
			$con++;
				$this->SetFont('Times','',8);
				
				if($row1["tiempo"]=="99.99.99"||$row1["tiempo"]=="99.99.98"){
                    $this->Cell(3,4,'  ',0,0);
                }else{
                    if($tiempo==$row1["tiempo"]){
                        if($con2==-1)
                            $con2 = $con - 1;
                        $this->Cell(3,4,$con2.' ',0,0);
						$puntos = $this->calcularPuntos($con2);
                    }else{
                        $this->Cell(3,4,$con.' ',0,0);
                        $con2 = -1;
						$puntos = $this->calcularPuntos($con);
                    }
                }

            $nomCom = "";
            if(strlen(utf8_decode($row1["nombre"]))>26) {
                $nomCom = substr(utf8_decode($row1["nombre"]), 0, 26)."...";
            }else{
                $nomCom = utf8_decode($row1["nombre"]);
            }

            $this->Cell(33,4,$nomCom,0,0);

				$this->SetFont('Times','',6);
				$this->Cell(7,4,utf8_decode($row1["abreviatura"]),0,0);
				$this->SetFont('Times','',8);

				if($row1["tiempo"]=="99.99.98"){
                    $this->Cell(15,4,"D.Q",0,1);
                }elseif ($row1["tiempo"]=="99.99.99"){
                    $this->Cell(15,4,"N.S",0,1);
                }else{
                    $this->Cell(15,4,($row1["tiempo"]."   (".$puntos."Pts)"),0,1);
                }
	
				$tiempo = $row1["tiempo"];
				
				
		}
		$this->Ln();

}
mysqli_free_result($id_y_pruebas);

    $this->Ln();
    // Cita en itálica
    $this->SetFont('','I');
    //$this->Cell(0,5,'(fin del extracto)');
    // Volver a la primera columna
    $this->SetCol(0);
	
	//////////////////////////////////////////////////
	//OBTENER PUNTOS Y MEDALLAS
	/////////////////////////////////////////////////
	$puesto = 1;
	$i = 0;
	$resultado;
	
	$clubs = mysqli_query($enlace, "SELECT DISTINCT club.id, club.club FROM competencia comp, clubs club where comp.club = club.id " );
	
	while($rowclubs = mysqli_fetch_assoc($clubs)){
		
		//Puntos
		$hombres = 0;
		$mujeres = 0;
		
		//Medallas
		$oro = 0;
		$plata = 0;
		$bronce = 0;
		
		//Obtener el id del club
		$club = $rowclubs['id'];
		
		$sql="SELECT * FROM resultados r
				INNER JOIN jornadas_pruebas jp on jp.id = r.id_jornada_prueba
				INNER JOIN competencia cia on (cia.prueba = jp.prueba and cia.competidor = r.id_competidor)
				INNER JOIN competidor dor on dor.identificacion = r.id_competidor
				where cia.club = $club";    

		$competencias = mysqli_query($enlace, $sql );
		
		while($competencia = mysqli_fetch_assoc($competencias)){
			$prueba = $competencia['id_jornada_prueba'];
			$competidor = $competencia['id_competidor'];
			
			$posicion = $this->calcularPosicion($prueba, $competidor);
			$puntos = 0;
			switch ($posicion) {
				case 1:
					$puntos = 9;
					$oro = $oro + 1;
					break;
				case 2:
					$puntos = 7;
					$plata = $plata + 1;
					break;
				case 3:
					$puntos = 6;
					$bronce = $bronce + 1;
					break;
				case 4:
					$puntos = 5;
					break;
				case 5:
					$puntos = 4;
					break;
				case 6:
					$puntos = 3;
					break;
				case 7:
					$puntos = 2;
					break;
				case 8:
					$puntos = 1;
					break;
			}
			if($competencia['genero'] == 'm'){
				$hombres = $hombres + $puntos;
			}
			else{
				$mujeres = $mujeres + $puntos;
			}
		}
		
		$total_puntos = $hombres + $mujeres;
		$total_medallas = $oro + $plata + $bronce;
		
		
		$clase = new Resultados();
		$clase->setNombreClub(utf8_decode($rowclubs["club"]));
		
		$clase->setMasculino($hombres);
		$clase->setFemenino($mujeres);
		$clase->setPuntos($total_puntos);
		
		$clase->setOro($oro);
		$clase->setPlata($plata);
		$clase->setBronce($bronce);
		$clase->setMedallas($total_medallas);
		
		$resultado[$i] = $clase;
		$i++;
		
	}
	
	//////////////////////////////////////////////////
	//CLASIFICACIÓN POR PUNTOS
	/////////////////////////////////////////////////
    $this->AddPage();
	$this->SetFont('Times','B',11);
	$this->Cell(180,5,utf8_decode('CLASIFICACIÓN CLUBES POR PUNTOS'),0,1,'C');
	$this->Ln();
	$this->Cell(20,4,"Puesto",0,0);
	$this->Cell(100,4,"Club",0,0);
	$this->Cell(10,4,"M" ,0,0);
	$this->Cell(10,4,"F" ,0,0);
	$this->Cell(5,4,"Pts" ,0,0);
	$this->Ln();
	$this->SetFont('Times','',11);
	
	//Ordenar por puntos ASC
	for($i=1;$i<sizeof($resultado);$i++)
	{
		for($j=0;$j<sizeof($resultado)-$i;$j++)
		{
			if($resultado[$j]->getPuntos()<$resultado[$j+1]->getPuntos())
			{
				$k=$resultado[$j+1];
				$resultado[$j+1]=$resultado[$j];
				$resultado[$j]=$k;
			}
		}
	}
	
	$puesto = 0;
	$puntos_anterior = "";
	$puesto_aux = -1;
	$result = 0;

	for($i=0;$i<sizeof($resultado);$i++){
		$puesto++;
		$pruntos = $resultado[$i];
	    if($puntos_anterior == $pruntos->getPuntos()){
			if($puesto_aux == -1)
			{
				$puesto_aux = $puesto - 1;
			    $result = $puesto_aux;	
			}
		    $result = $puesto_aux;
		}
		else{
			$puesto_aux = -1;
			$result = $puesto;
		}
		
		$puntos_anterior = $pruntos->getPuntos();
			
		$this->Cell(20,4,$result,0,0);
		$this->Cell(100,4,$pruntos->getNombreClub(),0,0);
		$this->Cell(10,4,$pruntos->getMasculino(),0,0);
		$this->Cell(10,4,$pruntos->getFemenino(),0,0);
		$this->Cell(5,4,$pruntos->getPuntos(),0,0);
		
		$this->Ln();
	
	}
	//////////////////////////////////////////////////
	//CLASIFICACIÓN POR MEDALLAS
	/////////////////////////////////////////////////	  
	$this->AddPage();	
	$this->SetFont('Times','B',11);
	$this->Cell(180,5,utf8_decode('CLASIFICACIÓN CLUBES POR MEDALLAS'),0,1,'C');
	$this->Ln();
	$this->Cell(20,4,"Puesto",0,0);
	$this->Cell(100,4,"Club",0,0);
	$this->Cell(15,4,"Oro" ,0,0);
	$this->Cell(15,4,"Plata" ,0,0);
	$this->Cell(15,4,"Bronce" ,0,0);
	$this->Cell(5,4,"Medallas" ,0,0);
	$this->Ln();
	$this->SetFont('Times','',11);
	
	$puesto = 1;
	
	//Ordenar por medallas ASC
	for($i=1;$i<sizeof($resultado);$i++)
	{
		for($j=0;$j<sizeof($resultado)-$i;$j++)
		{
			if($resultado[$j]->getMedallas()<$resultado[$j+1]->getMedallas())
			{
				$k=$resultado[$j+1];
				$resultado[$j+1]=$resultado[$j];
				$resultado[$j]=$k;
			}
		}
	}

	for($i=0;$i<sizeof($resultado);$i++){
		
		$medallas = $resultado[$i];
		$this->Cell(20,4,$puesto,0,0);
		$this->Cell(100,4,$medallas->getNombreClub(),0,0);
		$this->Cell(15,4,$medallas->getOro(),0,0);
		$this->Cell(15,4,$medallas->getPlata(),0,0);
		$this->Cell(15,4,$medallas->getBronce(),0,0);
		$this->Cell(5,4,$medallas->getMedallas(),0,0);
		
		$this->Ln();
		
		$puesto++;
	}
}

//FUNCION QUE RETORNA LA POSICION DE UN COMPETIDOR EN UNA PRUEBA
function calcularPosicion($id_jornada_prueba, $id_competidor)
{
	global $enlace;
	$sql="SELECT comp.identificacion ,concat_ws(' ',comp.nombres,comp.apellidos) AS nombre, cl.abreviatura,result.tiempo FROM resultados result, 
	competidor comp ,competencia comcia,clubs cl where id_jornada_prueba=$id_jornada_prueba AND result.id_competidor=comp.identificacion AND 
	comcia.club=cl.id AND comcia.competidor= comp.identificacion GROUP by comp.identificacion ORDER BY result.tiempo ASC";    
	$resultados = mysqli_query($enlace, $sql );
	$posicion = 0;
	$tiempo_anterior = "";
	$posicion_aux = -1;
	$result = 0;
	while($resultado = mysqli_fetch_assoc($resultados)){
		$posicion ++;
		if($tiempo_anterior == $resultado["tiempo"]){
			if($posicion_aux == -1)
			{
				$posicion_aux = $posicion - 1;
			    $result = $posicion_aux;	
			}
		    $result = $posicion_aux;
		}
		else{
			$posicion_aux = -1;
			$result = $posicion;
		}
		if($resultado["identificacion"] == $id_competidor){
			return $result;
		}
		$tiempo_anterior = $resultado["tiempo"];
	}
}

function calcularPuntos($posicion)
{
	$puntos = 0;
	switch ($posicion) {
					case 1:
						$puntos = 9;
						break;
					case 2:
						$puntos = 7;
						break;
					case 3:
						$puntos = 6;
						break;
					case 4:
						$puntos = 5;
						break;
					case 5:
						$puntos = 4;
						break;
					case 6:
						$puntos = 3;
						break;
					case 7:
						$puntos = 2;
						break;
					case 8:
						$puntos = 1;
						break;
 }
 return $puntos;
}

function PrintChapter( )
{
    // Añadir capítulo
    $this->AddPage();
    //$this->ChapterTitle('Mujeres');
    $this->ChapterBody();
    //$this->AddPage();
    //$this->ChapterTitle('Hombres');
    //$this->ChapterBody("m");
}
}

$pdf = new PDF();
$title = 'Resultados Campeonato';
$pdf->SetTitle($title);
$pdf->SetAuthor('CoralFish');
$pdf->PrintChapter();
$pdf->Output();
?>
    $pdf->Cell(0,4,'Imprimiendo línea número '.$i,0,1);
$pdf->Output();
?>