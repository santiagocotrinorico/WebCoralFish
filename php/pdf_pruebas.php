<?php
include 'connect.php';
require('fpdf/fpdf.php');

class PDF extends FPDF
{
protected $col = 0; // Columna actual
protected $y0;      // Ordenada de comienzo de la columna

function Header()
{

    // Logo
    $this->Image('../images/logos/LogoCCMeta.png',20,8,25);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    //$this->Cell(0);
    // Título
    $this->Cell(180,10,utf8_decode('CORPORACIÓN CLUB META'),0,1,'C');
    $this->SetFont('Arial','',12);
    $this->Cell(180,5,utf8_decode('Festival Intercolegiados de Natación'),0,1,'C');
    $this->Cell(180,5,'Junio 15 de 2018',0,1,'C');
    $this->Ln(1);
    $this->SetFont('Arial','',10);
    $this->Cell(6);
    $this->Cell(180,5,utf8_decode('Calentamiento: 07:00 a.m. Sesión Competencias: 08:30 a.m. / Piscina 25 mts'),'B',1,'C');
    $this->Cell(180,5,utf8_decode('Piscina Corporación Club Meta - Villavicencio (Meta)'),'B',1,'C');
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
    $this->Cell(0,4,utf8_decode('::: Sistema de Información Coral Fish - SICOF :::'),0,1,'C');
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

function AcceptPageBreak()
{
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

    $resulNumCarriles = mysqli_query ($enlace,"SELECT * FROM `carriles` WHERE id=1 ");


    while($rowCategoria = mysqli_fetch_assoc($resulNumCarriles)){
        $num_carriles =$rowCategoria["num_carriles"];
    }

/*$id_y_pruebas = mysqli_query($enlace, "SELECT c.prueba As id, p.prueba FROM competencia c, pruebas p, competidor cdor where c.prueba=p.id AND c.competidor=cdor.identificacion AND cdor.genero=\"".$genero."\" GROUP BY c.prueba" );*/
$id_y_pruebas = mysqli_query($enlace, "SELECT i.id,jornada,i.prueba,p.prueba as nombre,UPPER(i.genero) as genero,n.id as id_categoria,n.nombre as categoria FROM jornadas_pruebas i, pruebas p, nombre_categoria n WHERE i.prueba=p.id AND i.categoria=n.id ORDER by i.id ASC " );


while($rowpruebas = mysqli_fetch_assoc($id_y_pruebas)){
$this->SetFont('Times','',14);


if($jornadas!=$rowpruebas["jornada"]){
	$jornadas=$rowpruebas["jornada"];
	$this->Ln(5);
    $this->Cell(40,9," Jornada # ".$jornadas,'B',1,'C');
}


$this->SetFont('Times','B',11);
$this->Cell(40,7,$cont." (".$rowpruebas['genero'].") ".$rowpruebas['categoria'],0,2,'C');
$this->Cell(40,5,utf8_decode($rowpruebas['nombre']),0,1);
$cont++;

$resulParaWhereIN = mysqli_query ($enlace,"SELECT * FROM union_categorias WHERE id_nombre=".$rowpruebas['id_categoria']);

$strCategoriaIn = "";

    $mix=0;

    while($rowCategoria = mysqli_fetch_assoc($resulParaWhereIN)){
        $strCategoriaIn .=$rowCategoria["categoria"].",";
        $mix++;
		}

        if ($mix==0) {
            continue;
        }

    $strCategoriaIn= substr($strCategoriaIn,0,-1);



//    $this->Cell(40,5,utf8_decode("( ".$strCategoriaIn." )"),0,1,'C');
//		$sql="SELECT comcia.club , concat_ws(' ',comdor.nombres,comdor.apellidos) AS nombre ,cl.abreviatura, comcia.prueba, comcia.tiempo FROM competencia comcia, competidor comdor, categoria_com catecom , clubs cl where comcia.prueba=".$rowpruebas['prueba']." AND comcia.competidor=comdor.identificacion AND comdor.genero=\"".$rowpruebas['genero']."\" AND catecom.identificacion=comdor.identificacion AND comcia.club=cl.id AND catecom.categoria=".$rowpruebas['categoria']." ORDER by comcia.tiempo";
		$sql="SELECT comcia.club , concat_ws(' ',comdor.nombres,comdor.apellidos) AS nombre ,cl.abreviatura, comcia.prueba, comcia.tiempo FROM competencia comcia, competidor comdor, categoria_com catecom , clubs cl where comcia.prueba=".$rowpruebas['prueba']." AND comcia.competidor=comdor.identificacion AND comdor.genero=\"".$rowpruebas['genero']."\" AND catecom.identificacion=comdor.identificacion AND comcia.club=cl.id AND catecom.categoria IN (".$strCategoriaIn.") ORDER by comcia.tiempo";

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

		//desde aqui cominaza la parte de imprimir

		$this->SetFont('Times','',8);
		$munSerie=count($afinal);
		$numS=0;
		for($i=($munSerie-1);$i>=0;$i--){
			$numS++;

			$this->Cell(40,8,"Serie ".$numS,0,1);

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


				$this->Cell(3,4,$j.' ',0,0);
				$nomCom = "";
				if(strlen(utf8_decode(print_r($afinal[$i][$j]["nombre"],true)))>22) {
                    $nomCom = substr(utf8_decode(print_r($afinal[$i][$j]["nombre"], true)), 0, 22)."...";
                }else{
                    $nomCom = utf8_decode(print_r($afinal[$i][$j]["nombre"],true));
                }

				$this->Cell(28,4,$nomCom,0,0);
				$this->SetFont('Times','',6);
				$this->Cell(7,4,utf8_decode(print_r($afinal[$i][$j]["abreviatura"],true)),0,0);
				$this->SetFont('Times','',8);
				$tiempo=print_r($afinal[$i][$j]["tiempo"],true);
				$this->Cell(20,4,(($tiempo=="59.59.99") ? " n.t " : $tiempo),0,1);
			}

		}
    $this->Ln();
}
mysqli_free_result($id_y_pruebas);

    $this->Ln();
    // Cita en itálica
    $this->SetFont('','I');
    $this->Cell(0,5,utf8_decode('(Fin de Competencias. Gracias por tu participación)'));
    // Volver a la primera columna
    $this->SetCol(0);
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
//nombre del archivo PDF
$title = utf8_decode('Programación Cora Fish');
$pdf->SetTitle($title);
$pdf->SetAuthor('CoralFish');
$pdf->PrintChapter();
$pdf->Output();
?>
    $pdf->Cell(0,4,'Imprimiendo línea número '.$i,0,1);
$pdf->Output();
?>