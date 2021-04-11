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

    public function Body()
    {
        $template =$this->getTemplate();
        return $template->render('fiche.html.twig');
    }
    public function Footer()
    {
        $template=$this->getTemplate();
        return $template->render('footer.html.twig');
    }


    public function BuildPdf()
    {
        $this->pdfLibrary->AddPage('','','','','',0,0,5,0,0,10);
        $this->pdfLibrary->setAuthor('Emmanuel SIMISI');
        $this->pdfLibrary->setHTMLFOOTER($this->Footer());
        $this->pdfLibrary->WriteHTML($this->Body());
        $this->pdfLibrary->Output('fiche-adhesion.pdf',I);
    }
}