<!DOCTYPE html>
<html>

<head>


</head>

<body>

<?php

require("../fpdf/fpdf.php");
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Times','',14);
$pdf->write(5,'For a link to page 2 - Click ');
$pdf->SetFont('','U');
$pdf->SetTextColor(0,0,255);
$link_to_pg2 = $pdf->AddLink();
$pdf->write(5,'here',$link_to_pg2);
$pdf->SetFont('');
//Second page
$pdf->AddPage();
$pdf->SetLink($link_to_pg2);
$pdf->Image('http://i1-scripts.softpedia-static.com/ico/php.gif',10,10,30,0,'','http://www.php.net');
$pdf->ln(20);
$pdf->SetTextColor(1);
$pdf->Cell(0,5,'This is a link and a clickable image', 0, 1, 'L');
$pdf->SetFont('','U');
$pdf->SetTextColor(0,0,255);
$pdf->Write(5,'www.oreilly.com','http://www.oreilly.com');
$pdf->Output();
?>
</body>
</html>