<?php  
require_once("../fpdf/fpdf.php");
require_once("cliente.php");

class PDF extends FPDF{
function Header(){
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(70,10,'Reporte Cliente',1,0,'C');
    // Salto de línea
    $this->Ln(20);
}
}
$pdf = new PDF();
//pie de pagina
$pdf ->AliasNBPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);


$obj = new Cliente();
$resultado = $obj->consulta();
$pdf->SetFont('Arial','B',7);
$pdf->Cell(20,10,"Nombre",1,0,'C');
$pdf->Cell(20,10,utf8_decode("Direccion"),1,0,'C');
$pdf->Cell(20,10,"telefono",1,0,'C');
$pdf->Cell(20,10,"correo",1,0,'C');
$pdf->Cell(20,10,"Ape. paterno",1,0,'C');
$pdf->Cell(20,10,utf8_decode("Ape. materno"),1,0,'C');
$pdf->Cell(20,10,utf8_decode("sexo"),1,0,'C');
$pdf->Cell(20,10,utf8_decode("fecha de nacimineto"),1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',8);
while($fila = $resultado->fetch_assoc()){
    //     ancho,alto,text,borde,no idea,alineación
$pdf->Cell(20,10,$fila["nombre"],1,0,'C');
$pdf->Cell(20,10,$fila["direccion"],1,0,'C');
$pdf->Cell(20,10,$fila["telefono"],1,0,'C');
$pdf->Cell(20,10,$fila["correo"],1,0,'C');
$pdf->Cell(20,10,$fila["apepaterno"],1,0,'C');
$pdf->Cell(20,10,$fila["apematerno"],1,0,'C');
$pdf->Cell(20,10,$fila["sexo"],1,0,'C');
$pdf->Cell(20,10,$fila["fenacimiento"],1,0,'C');
$pdf->Ln();
}

$pdf->Output();
?>