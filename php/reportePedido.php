<?php  
require_once("../fpdf/fpdf.php");
require_once("pedido.php");

class PDF extends FPDF{
function Header(){
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(70,10,'Reporte de pedido',1,0,'C');
    // Salto de línea
    $this->Ln(20);
}
}
$pdf = new PDF();
//pie de pagina
$pdf ->AliasNBPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);


$obj = new Pedido();
$resultado = $obj->consulta();
$pdf->SetFont('Arial','B',7);
$pdf->Cell(20,10,"fecha",1,0,'C');
$pdf->Cell(20,10,"IDcliente",1,0,'C');
$pdf->Cell(20,10,"precio",1,0,'C');
$pdf->Cell(20,10,"cantidad",1,0,'C');
$pdf->Cell(20,10,"direccion",1,0,'C');
$pdf->Cell(20,10,"IDproducto",1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',8);
while($fila = $resultado->fetch_assoc()){
    //     ancho,alto,text,borde,no idea,alineación
$pdf->Cell(20,10,$fila["fecha"],1,0,'C');
$pdf->Cell(20,10,$fila["IDcliente"],1,0,'C');
$pdf->Cell(20,10,$fila["precio"],1,0,'C');
$pdf->Cell(20,10,$fila["cantidad"],1,0,'C');
$pdf->Cell(20,10,$fila["direccion"],1,0,'C');
$pdf->Cell(20,10,$fila["IDproducto"],1,0,'C');
$pdf->Ln();
}

$pdf->Output();
?>