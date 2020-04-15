<?php  
require_once("../fpdf/fpdf.php");
require_once("mobiliario.php");

class PDF extends FPDF{
function Header(){
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(70,10,'Reporte mobiliario',1,0,'C');
    // Salto de línea
    $this->Ln(20);
}
}
$pdf = new PDF();
//pie de pagina
$pdf ->AliasNBPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);


$obj = new Mobiliario();
$resultado = $obj->consulta();
$pdf->SetFont('Arial','B',7);

$pdf->Cell(20,10,"Nombre",1,0,'C');
$pdf->Cell(20,10,utf8_decode("Descripción"),1,0,'C');
$pdf->Cell(20,10,"cantidad",1,0,'C');
$pdf->Cell(20,10,"nic",1,0,'C');
$pdf->Cell(20,10,"tipo",1,0,'C');
$pdf->SetFont('Arial','',8);
while($fila = $resultado->fetch_assoc()){
    //     ancho,alto,text,borde,no idea,alineación
$pdf->Cell(20,10,$fila["nombre"],1,0,'C');
$pdf->Cell(20,10,$fila["descripcion"],1,0,'C');
$pdf->Cell(20,10,$fila["cantidad"],1,0,'C');
$pdf->Cell(20,10,$fila["nic"],1,0,'C');
$pdf->Cell(20,10,$fila["tipo"],1,0,'C');
$pdf->Ln();
}

$pdf->Output();
?>