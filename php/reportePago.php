<?php  
require_once("../fpdf/fpdf.php");
require_once("pago.php");

class PDF extends FPDF{
function Header(){
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(70,10,'Reporte de Pago',1,0,'C');
    // Salto de línea
    $this->Ln(20);
}
}
$pdf = new PDF();
//pie de pagina
$pdf ->AliasNBPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);


$obj = new Pago();
$resultado = $obj->consulta();
$pdf->SetFont('Arial','B',7);
$pdf->Cell(20,10,"nombre",1,0,'C');
$pdf->Cell(20,10,"Descripcion",1,0,'C');
$pdf->Cell(20,10,"Precio Venta",1,0,'C');
$pdf->Cell(20,10,"Precio Compra",1,0,'C');
$pdf->Cell(20,10,"Cantidad",1,0,'C');
$pdf->Cell(20,10,"Stock Minimo",1,0,'C');
$pdf->Cell(20,10,"Stock Maximo",1,0,'C');
$pdf->Cell(20,10,"Categoria",1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',8);
while($fila = $resultado->fetch_assoc()){
    //     ancho,alto,text,borde,no idea,alineación
$pdf->Cell(20,10,$fila["nombre"],1,0,'C');
$pdf->Cell(20,10,$fila["descripcion"],1,0,'C');
$pdf->Cell(20,10,$fila["preciov"],1,0,'C');
$pdf->Cell(20,10,$fila["precioc"],1,0,'C');
$pdf->Cell(20,10,$fila["cantidad"],1,0,'C');
$pdf->Cell(20,10,$fila["cantmin"],1,0,'C');
$pdf->Cell(20,10,$fila["cantmax"],1,0,'C');
$pdf->Cell(20,10,$fila["categoria"],1,0,'C');
$pdf->Ln();
}

$pdf->Output();
?>