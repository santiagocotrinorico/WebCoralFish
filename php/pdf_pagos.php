<?php
include 'connect.php';
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
   // $this->Image('images/LogoCoralFish.png',20,8,25);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Reporte Pagos',0,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$sqlAldia ="SELECT concat_ws(' ',comdor.nombres,comdor.apellidos) AS nombre, comdor.telefono,pagos.fecha ,pagos.valor FROM pagos, competidor comdor WHERE CURDATE() <= fecha AND comdor.identificacion=pagos.id_usuario";
$result1 = mysqli_query($enlace, $sqlAldia );

$pdf->SetFont('Times','',18);
$pdf->Cell(0,10,'Nadadores al dia',0,1);
$pdf->ln(3);
$pdf->SetFont('Times','B',12);
            $pdf->Cell(90,10,"Nombre",0,0);
            $pdf->Cell(30,10,"Telefono",0,0);
            $pdf->Cell(30,10,"Pago hasta",0,0);
            $pdf->Cell(30,10,"Valor",0,1);
            $pdf->SetFont('Times','',12);
        while($row1 = mysqli_fetch_assoc($result1)){
            $pdf->Cell(90,10,''.utf8_decode($row1["nombre"]),0,0);
            $pdf->Cell(30,10,''.$row1["telefono"],0,0);
            $pdf->Cell(30,10,''.$row1["fecha"],0,0);
            $pdf->Cell(30,10,''.number_format($row1["valor"],0,",","."),0,1);
            
        }
$pdf->ln(15);
$sqlEnmora ="SELECT concat_ws(' ',comdor.nombres,comdor.apellidos) AS nombre, comdor.telefono,pagos.fecha ,pagos.valor FROM pagos, competidor comdor WHERE CURDATE() >= fecha AND comdor.identificacion=pagos.id_usuario";
$result2 = mysqli_query($enlace, $sqlEnmora );


$pdf->SetFont('Times','',18);
$pdf->Cell(0,10,'Nadadores en mora',0,1);
$pdf->ln(3);
$pdf->SetFont('Times','B',12);
            $pdf->Cell(90,10,"Nombre",0,0);
            $pdf->Cell(30,10,"Telefono",0,0);
            $pdf->Cell(30,10,"Mora desde",0,0);
            $pdf->Cell(30,10,"Valor",0,1);
            $pdf->SetFont('Times','',12);
        while($row2 = mysqli_fetch_assoc($result2)){
            $pdf->Cell(90,10,''.utf8_decode($row2["nombre"]),0,0);
            $pdf->Cell(30,10,''.$row2["telefono"],0,0);
            $pdf->Cell(30,10,''.$row2["fecha"],0,0);
            $pdf->Cell(30,10,''.number_format($row2["valor"],0,",","."),0,1);
            
        }
$pdf->Output();
?>