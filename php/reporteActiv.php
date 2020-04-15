<?php  
require_once("../fpdf/fpdf.php");
require_once("actividad.php");

class PDF extends FPDF{
function Header(){
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(70,10,'Reporte de actividad',1,0,'C');
    // Salto de línea
    $this->Ln(20);
}
}
$pdf = new PDF();
//pie de pagina
$pdf ->AliasNBPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);


$obj = new Actividad();
$resultado = $obj->consulta();
$pdf->SetFont('Arial','B',7);

$pdf->Cell(20,10,"registro",1,0,'C');
$pdf->Cell(20,10,utf8_decode("IDusuario"),1,0,'C');
$pdf->Cell(20,10,"movimiento de actividades",1,0,'C');
$pdf->Cell(20,10,"movimiento de tabla",1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',8);
while($fila = $resultado->fetch_assoc()){
    //     ancho,alto,text,borde,no idea,alineación
$pdf->Cell(20,10,$fila["registro"],1,0,'C');
$pdf->Cell(20,10,$fila["IDusuario"],1,0,'C');
$pdf->Cell(20,10,$fila["movimiento_act"],1,0,'C');
$pdf->Cell(20,10,$fila["movimiento_tabla"],1,0,'C');
}

$pdf->Output();
?>