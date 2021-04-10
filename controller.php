<?php
require_once __DIR__ . '/vendor/autoload.php';
require 'Pdf.php';
$ctr=new Pdf();
dd($ctr->PdfPrint());