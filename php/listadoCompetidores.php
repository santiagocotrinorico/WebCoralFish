<?php
include 'connect.php';
require('fpdf/fpdf.php');
session_start();


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
    $this->Cell(180,10,utf8_decode('Reporte de Inscripción'),0,1,'C');
    $this->SetFont('Arial','',12);
    $this->Cell(180,5,utf8_decode('Festival Intercolegiados de Natación Corp. Club Meta'),0,1,'C');
    $this->Cell(180,5,'Junio 15 de 2018',0,1,'C');
    $this->Ln(1);
    $this->SetFont('Arial','',10);
    $this->Cell(6);
    $this->Cell(180,5,' Listado de competidores del Club '.$_SESSION["usuario"],'B',1,'C');
    // Salto de línea
     $this->Cell(180,5,utf8_decode(' Sistema de Información Coral Fish - SICOF '),0,1,'C');
    $this->Ln(10);
    $this->y0 = $this->GetY();
}

function Footer()
{
    // Pie de página
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->SetTextColor(128);
    $this->Cell(0,10,utf8_decode('Página '.$this->PageNo()),0,0,'C');
}

function SetCol($col)
{
    // Establecer la posición de una columna dada
    $this->col = $col;
    $x = 10+$col*80;
    $this->SetLeftMargin($x);
    $this->SetX($x);
}

function AcceptPageBreak()
{
    // Método que acepta o no el salto automático de página
    if($this->col<1)
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
$cont = 1;

$club = $_SESSION["id"];

// $nose= mysqli_query($enlace, "SELECT comp.competidor, c.nombres, c.apellidos,(SELECT jp.jornada FROM jornadas_pruebas jp WHERE jp.prueba=p.id GROUP by prueba) as jornada, p.prueba , comp.tiempo FROM competidor c, competencia comp, pruebas p WHERE comp.prueba=p.id AND comp.club=3 AND comp.competidor=c.identificacion" ); 
//     /* obtener el array de objetos */
//     /* obtener el array asociativo */
//     /* obtener array asociativo */
//     while ($row = mysqli_fetch_assoc($nose)) {
//        // printf ("%s | %s | %s | ( %s )  %s\n <br>", $row["competidor"], $row["nombres"], $row["apellidos"], $row["jornada"], $row["prueba"]);
//        $this->Cell(80,6,$cont.") ".utf8_decode($row["nombres"]." ".$row["apellidos"]),1,1);
//     }

//     /* liberar el conjunto de resultados */
//     mysqli_free_result($nose);


$competidores= mysqli_query($enlace, "SELECT comp.competidor, c.nombres, c.apellidos,(SELECT jp.jornada FROM jornadas_pruebas jp WHERE jp.prueba=p.id GROUP by prueba) as jornada, p.prueba , comp.tiempo FROM competidor c, competencia comp, pruebas p WHERE comp.prueba=p.id AND comp.club=$club AND comp.competidor=c.identificacion ORDER by c.identificacion ASC" );

$idCompetidor="";

$num = 1;
while($rowcompetidores = mysqli_fetch_assoc($competidores)){
$this->SetFont('Times','',12);

	if($idCompetidor!=$rowcompetidores["competidor"]){
		$idCompetidor=$rowcompetidores["competidor"];

		if($cont!=1){
			$this->Ln(3);
		}
		$this->Cell(10,6,' ',0,0);
		$this->Cell(80,6,$cont.") ".utf8_decode($rowcompetidores["nombres"]." ".$rowcompetidores["apellidos"]),0,1);
        $num=1;
		$cont++;
	}

$this->SetFont('Times','',8);
$this->Cell(15,4,' ',0,0);
$this->Cell(10,4,$num.") ",0,0);
$this->Cell(40,4,''.$rowcompetidores["prueba"],0,0);
$this->Cell(20,4,''.$rowcompetidores["tiempo"],0,1);

    $num++;
//$this->Cell(80,6,$cont.") ".utf8_decode($rowcompetidores["nombres"]." ".$rowcompetidores["apellidos"]),1,1);


}


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
$title = 'Reporte de inscripcion';
$pdf->SetTitle($title);
$pdf->SetAuthor('CoralFish');
$pdf->PrintChapter();
$pdf->Output();
?>
    $pdf->Cell(0,4,'Imprimiendo línea número '.$i,0,1);
$pdf->Output();
?>