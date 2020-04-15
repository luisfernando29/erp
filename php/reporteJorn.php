<?php  
require_once("../fpdf/fpdf.php");
require_once("jornada.php");

class PDF extends FPDF{
function Header(){
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(70,10,'Reporte jornada',1,0,'C');
    // Salto de línea
    $this->Ln(20);
}
}
$pdf = new PDF();
//pie de pagina
$pdf ->AliasNBPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);


$obj = new Jornada();
$resultado = $obj->consulta();
$pdf->SetFont('Arial','B',7);

$pdf->Cell(20,10,"hrs trabajadas",1,0,'C');
$pdf->Cell(20,10,"dias trabajados",1,0,'C');
$pdf->Cell(20,10,"pago por hora",1,0,'C');
$pdf->Cell(20,10,"horas extra",1,0,'C');
$pdf->Cell(20,10,"bonos",1,0,'C');
$pdf->Cell(20,10,"ID del empleado",1,0,'C');

$pdf->Ln();
$pdf->SetFont('Arial','',8);
while($fila = $resultado->fetch_assoc()){
    //     ancho,alto,text,borde,no idea,alineación
$pdf->Cell(20,10,$fila["hrs_trabajadas"],1,0,'C');
$pdf->Cell(20,10,$fila["dias_trabajados"],1,0,'C');
$pdf->Cell(20,10,$fila["pago_hora"],1,0,'C');
$pdf->Cell(20,10,$fila["horas_extra"],1,0,'C');
$pdf->Cell(20,10,$fila["bonos"],1,0,'C');
$pdf->Cell(20,10,$fila["IDempleado"],1,0,'C');
$pdf->Ln();
}

$pdf->Output();
?>