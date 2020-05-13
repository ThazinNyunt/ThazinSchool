<?php
include('services.php');
require('fpdf.php');

$courseId = $_GET['course_id'];
$userId= $_GET['user_id'];
$course = getCourseByCourseId2($courseId);
$user = searchUser($userId);
$courseName = $course['course_name'];
$userName = $user['user_name'];

$date =date('Y-m-d');

function drawTextCenter($pdf, $text, $y) {
    $paperWidth = 297;
    $paperHeight = 210 ;

    $textWidth = $pdf->GetStringWidth($text);
    $x = ($paperWidth/2) - ($textWidth/2);
    $pdf->SetXY($x , $y);
    $pdf->Cell(0,0, $text);
}


$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();


$pdf->Rect(20, 20, 297 - 40, 210 - 40, 'D');

$pdf->SetFont('Arial','B', 18);
drawTextCenter($pdf, "ThazinSchool", 40);

$pdf->SetFont('Arial','B', 38);
drawTextCenter($pdf, "Certificate of Completion", 55);

$pdf->SetFont('Arial','B', 20);
drawTextCenter($pdf, "is hereby granted to", 90);

$pdf->SetFont('Arial','B', 48);
drawTextCenter($pdf, $userName, 105);

$pdf->SetFont('Arial','B', 18);
drawTextCenter($pdf, "To certify that he/she completed to satification", 145);

$pdf->SetFont('Arial','B', 40);
drawTextCenter($pdf, $courseName, 160);

$pdf->SetFont('Arial','B', 16);
drawTextCenter($pdf,"Granted Date: ". $date, 180);

$pdf->Output();
?>