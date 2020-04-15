<?php  
require_once("../fpdf/fpdf.php");
require_once("venta.php");

class PDF extends FPDF{
function Header(){
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(70,10,'Reporte venta',1,0,'C');
    // Salto de línea
    $this->Ln(20);
}
}
$pdf = new PDF();
//pie de pagina
$pdf ->AliasNBPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);


$obj = new Venta();
$resultado = $obj->consulta();
$pdf->SetFont('Arial','B',7);

$pdf->Cell(20,10,"fecha",1,0,'C');
$pdf->Cell(20,10,"IDCliente",1,0,'C');
$pdf->Cell(20,10,"total",1,0,'C');
$pdf->Cell(20,10,"tipo de pago",1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',8);
while($fila = $resultado->fetch_assoc()){
    //     ancho,alto,text,borde,no idea,alineación
$pdf->Cell(20,10,$fila["fecha"],1,0,'C');
$pdf->Cell(20,10,$fila["IDCliente"],1,0,'C');
$pdf->Cell(20,10,$fila["total"],1,0,'C');
$pdf->Cell(20,10,$fila["tipo_pago"],1,0,'C');
$pdf->Ln();
}

$pdf->Output();
?>