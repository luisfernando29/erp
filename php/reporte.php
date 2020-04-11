<?php
require_once("fpdf182/fpdf.php");

$pdf= new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B', 16);
$pdf->Cell(40,10,'Hola mundo');
$pdf->Ln();
$pdf->Output();
$pdf->Output
?>