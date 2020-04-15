<?php  
require_once("../fpdf/fpdf.php");
require_once("materiaprima.php");

class PDF extends FPDF{
function Header(){
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    // Título
    $this->Cell(70,10,'Reporte de Materiaprima',1,0,'C');
    // Salto de línea
    $this->Ln(20);
}
}
$pdf = new PDF();
//pie de pagina
$pdf ->AliasNBPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);


$obj = new Materiaprima();
$resultado = $obj->consulta();
$pdf->SetFont('Arial','B',7);
$pdf->Cell(20,10,"nombre",1,0,'C');
$pdf->Cell(20,10,utf8_decode("tipo"),1,0,'C');
$pdf->Cell(20,10,"descripcion",1,0,'C');
$pdf->Cell(20,10,"precio",1,0,'C');
$pdf->Cell(20,10,utf8_decode("stock"),1,0,'C');
$pdf->Cell(20,10,utf8_decode("existencias"),1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',8);
while($fila = $resultado->fetch_assoc()){
    //     ancho,alto,text,borde,no idea,alineación
$pdf->Cell(20,10,$fila["nombre"],1,0,'C');
$pdf->Cell(20,10,$fila["tipo"],1,0,'C');
$pdf->Cell(20,10,$fila["descripcion"],1,0,'C');
$pdf->Cell(20,10,$fila["precio"],1,0,'C');
$pdf->Cell(20,10,$fila["stock"],1,0,'C');
$pdf->Cell(20,10,$fila["existencias"],1,0,'C');
$pdf->Ln();
}

$pdf->Output();
?>