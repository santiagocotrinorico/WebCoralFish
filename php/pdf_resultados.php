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

/*$id_y_pruebas = mysqli_query($enlace, "SELECT c.prueba As id, p.prueba FROM competencia c, pruebas p, competidor cdor where c.prueba=p.id AND c.competidor=cdor.identificacion AND cdor.genero=\"".$genero."\" GROUP BY c.prueba" );*/
$id_y_pruebas = mysqli_query($enlace, "SELECT i.id,jornada,i.prueba,p.prueba as nombre,UPPER(i.genero) as genero,n.id as id_categoria,n.nombre as categoria FROM jornadas_pruebas i, pruebas p, nombre_categoria n WHERE i.prueba=p.id AND i.categoria=n.id ORDER by i.id ASC " );


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
		$sql="SELECT comp.identificacion ,concat_ws(' ',comp.nombres,comp.apellidos) AS nombre, cl.abreviatura,result.tiempo FROM resultados result, competidor comp ,competencia comcia,clubs cl where id_jornada_prueba=$id_jornada_prueba AND result.id_competidor=comp.identificacion AND comcia.club=cl.id AND comcia.competidor= comp.identificacion GROUP by comp.identificacion ORDER BY result.tiempo ASC";    

		$result1 = mysqli_query($enlace, $sql );

$con=0;
$tiempo ="";
$con2 = -1;

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
                    }else{
                        $this->Cell(3,4,$con.' ',0,0);
                        $con2 = -1;
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
                    $this->Cell(15,4,($row1["tiempo"]),0,1);
                }


				$tiempo = $row1["tiempo"];
		}


    $this->Ln();


}
mysqli_free_result($id_y_pruebas);

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