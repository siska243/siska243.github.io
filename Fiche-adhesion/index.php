<?php

require_once __DIR__ . '/../vendor/autoload.php';
require '../Php/Pdf.php';

$pdf = new Pdf();
$pdf->BuildPdf();


