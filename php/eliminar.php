<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
protected $col = 0; // Columna actual
protected $y0;      // Ordenada de comienzo de la columna

function Header()
{
    // Logo
    $this->Image('images/LogoCoralFish.png',20,8,25);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    //$this->Cell(0);
    // Título
    $this->Cell(180,10,'Colar Fish',0,1,'C');
    $this->SetFont('Arial','',12);
    $this->Cell(180,5,'Campeonato Interclubes De Natacion - Juvenil I',0,1,'C');
    $this->Cell(180,5,'17 - 20 De Febrero De 2016',0,1,'C');
    $this->Ln(1);
    $this->SetFont('Arial','',10);
    $this->Cell(6);
    $this->Cell(180,5,'Jornada 1 Warm Up-Calentamiento: 2016-Feb-18 07:30 Session-Competencias: 08:30','B',1,'C');
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
    $this->Cell(0,10,utf8_decode('Página '.$this->PageNo()),0,0,'C');
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

function ChapterBody($genero)
{
    // Abrir fichero de texto
   // $txt = file_get_contents($file);
    // Fuente
    $this->SetFont('Times','',12);
    // Imprimir texto en una columna de 6 cm de ancho
   // $this->MultiCell(60,5,$txt);
    if($genero=="f"){
	    for($i=1;$i<=300;$i++)
	    $this->Cell(0,4,'Imprimiendo línea mujers '.$i,0,1);
	}else{
		for($i=1;$i<=520;$i++)
	    $this->Cell(0,4,'Imprimiendo línea Hombresss '.$i,0,1);
	}
    $this->Ln();
    // Cita en itálica
    $this->SetFont('','I');
    $this->Cell(0,5,'(fin del extracto)');
    // Volver a la primera columna
    $this->SetCol(0);
}

function PrintChapter( )
{
    // Añadir capítulo
    $this->AddPage();
    $this->ChapterTitle('Mujeres');
    $this->ChapterBody("f");
    $this->AddPage();
    $this->ChapterTitle('Hombres');
    $this->ChapterBody("m");
}
}

$pdf = new PDF();
$title = '20000 Leguas de Viaje Submarino';
$pdf->SetTitle($title);
$pdf->SetAuthor('CoralFish');
$pdf->PrintChapter();
$pdf->Output();
?>
    $pdf->Cell(0,4,'Imprimiendo línea número '.$i,0,1);
$pdf->Output();
?>