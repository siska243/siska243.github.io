<?php
require_once __DIR__ . '/../vendor/autoload.php';

class Pdf {

    public function __construct()
    {
        try {
            $this->pdfLibrary = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'margin_header' => 15]);
        } catch (MpdfException $e) {
        }

        $this->loader = new \Twig\Loader\FilesystemLoader('../templates/');
    }
    /**
     * @return \Twig\Environment
     */
    public function getTemplate():\Twig\Environment
    {

        return new \Twig\Environment($this->loader);

    }

    /**
     * @return \Twig\Environment
     */
    public function Bonjour()
    {
        return $this->getTemplate();
    }


    public function PdfPrint()
    {
        $this->pdfLibrary->AddPage();
        $this->pdfLibrary->AddPage();
        $this->pdfLibrary->WriteHTML("<h1>Bonjour</h1>");
        $this->pdfLibrary->Output();
    }
}