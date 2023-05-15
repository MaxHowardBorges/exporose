<?php

require_once('TCPDF/tcpdf.php');

class MYPDF extends TCPDF
{



    public function Header() {
        // Logo
        $this->Image('logo.png', 8, 3, 30);
        // Title
        // set font
        $this->SetFont('times', 'B', 16);

        // set color for background
        $this->SetFillColor(255, 255, 255);

        $this->SetY($this->GetY() + 5);
        $this->SetX($this->GetX() + 25);
        $this->MultiCell(100, 5, 'PALMARES EXPO ROSE 2023', 0, '', 1, 0, '', '', true, 0, false, false, 40, '');
        $this->SetY($this->GetY() + 7);
        $this->SetX($this->GetX() + 25);
        $this->MultiCell(150, 5, '51ème Exposition Internationale de Roses', 0, '', 1, 0, '', '', true, 0, false, false, 40, '');
    }

    public function Footer() {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        $this->SetX(150);
        // Police Arial italique 8
        $this->SetFont('times', '', 10);
        // Numéro de page
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, 0, 'C');
    }

}

// create new PDF document
$pdf = new MYPDF('P', PDF_UNIT, 'A5', true, 'UTF-8', false);

// set document information
$pdf->SetTitle('Exporose');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// add a page
$pdf->setPrintFooter(true);
$pdf->AddPage();

// set color for background
$pdf->SetFillColor(255, 255, 255);

$pdf->SetLineWidth(0.5); // définit l'épaisseur de la ligne
$pdf->Line($pdf->GetX()-5, $pdf->GetY()+4, $pdf->GetX()+125, $pdf->GetY()+4); // dessine une ligne noire

$pdf->SetLineWidth(0.2); // définit l'épaisseur de la ligne

$pdf->SetFont('times', 'B', 12);
$pdf->SetY($pdf->GetY() + 12);
$pdf->SetX($pdf->GetX() + -5);
$pdf->MultiCell(130, 5, '1 Prix du Président de la République', 0, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetY($pdf->GetY() + 6);
$pdf->SetX($pdf->GetX() + -8);
$pdf->MultiCell(50, 5, 'Participant', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(45, 5, 'Ville', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(40, 5, 'Variété', 1, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'B', 13);
$pdf->SetY($pdf->GetY() + 6);
$pdf->SetX($pdf->GetX() + -8);
$pdf->MultiCell(50, 5, 'CONSTANT Gilbert', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 13);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(45, 5, 'Antibes', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 13);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(40, 5, 'TWINGO', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');

$pdf->SetFont('times', 'B', 12);
$pdf->SetY($pdf->GetY() + 12);
$pdf->SetX($pdf->GetX() + -5);
$pdf->MultiCell(130, 5, '1 Prix du Président de la République', 0, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetY($pdf->GetY() + 6);
$pdf->SetX($pdf->GetX() + -8);
$pdf->MultiCell(50, 5, 'Participant', 1, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(45, 5, 'Ville', 1, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(40, 5, 'Variété', 1, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'B', 13);
$pdf->SetY($pdf->GetY() + 6);
$pdf->SetX($pdf->GetX() + -8);
$pdf->MultiCell(50, 5, 'CONSTANT Gilbert', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 13);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(45, 5, 'Antibes', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 13);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(40, 5, 'TWINGO', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');

$pdf->SetFont('times', 'B', 12);
$pdf->SetY($pdf->GetY() + 12);
$pdf->SetX($pdf->GetX() + -5);
$pdf->MultiCell(130, 5, '1 Prix du Président de la République', 0, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetY($pdf->GetY() + 6);
$pdf->SetX($pdf->GetX() + -8);
$pdf->MultiCell(50, 5, 'Participant', 1, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(45, 5, 'Ville', 1, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(40, 5, 'Variété', 1, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'B', 13);
$pdf->SetY($pdf->GetY() + 6);
$pdf->SetX($pdf->GetX() + -8);
$pdf->MultiCell(50, 5, 'CONSTANT Gilbert', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 13);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(45, 5, 'Antibes', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 13);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(40, 5, 'TWINGO', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');

$pdf->SetFont('times', 'B', 12);
$pdf->SetY($pdf->GetY() + 12);
$pdf->SetX($pdf->GetX() + -5);
$pdf->MultiCell(130, 5, '1 Prix du Président de la République', 0, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetY($pdf->GetY() + 6);
$pdf->SetX($pdf->GetX() + -8);
$pdf->MultiCell(50, 5, 'Participant', 1, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(45, 5, 'Ville', 1, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(40, 5, 'Variété', 1, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'B', 13);
$pdf->SetY($pdf->GetY() + 6);
$pdf->SetX($pdf->GetX() + -8);
$pdf->MultiCell(50, 5, 'CONSTANT Gilbert', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 13);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(45, 5, 'Antibes', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 13);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(40, 5, 'TWINGO', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');

$pdf->SetFont('times', 'B', 12);
$pdf->SetY($pdf->GetY() + 12);
$pdf->SetX($pdf->GetX() + -5);
$pdf->MultiCell(130, 5, '1 Prix du Président de la République', 0, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetY($pdf->GetY() + 6);
$pdf->SetX($pdf->GetX() + -8);
$pdf->MultiCell(50, 5, 'Participant', 1, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(45, 5, 'Ville', 1, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(40, 5, 'Variété', 1, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'B', 13);
$pdf->SetY($pdf->GetY() + 6);
$pdf->SetX($pdf->GetX() + -8);
$pdf->MultiCell(50, 5, 'CONSTANT Gilbert', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 13);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(45, 5, 'Antibes', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 13);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(40, 5, 'TWINGO', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');

$pdf->SetFont('times', 'B', 12);
$pdf->SetY($pdf->GetY() + 12);
$pdf->SetX($pdf->GetX() + -5);
$pdf->MultiCell(130, 5, '1 Prix du Président de la République', 0, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetY($pdf->GetY() + 6);
$pdf->SetX($pdf->GetX() + -8);
$pdf->MultiCell(50, 5, 'Participant', 1, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(45, 5, 'Ville', 1, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(40, 5, 'Variété', 1, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'B', 13);
$pdf->SetY($pdf->GetY() + 6);
$pdf->SetX($pdf->GetX() + -8);
$pdf->MultiCell(50, 5, 'CONSTANT Gilbert', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 13);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(45, 5, 'Antibes', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 13);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(40, 5, 'TWINGO', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');


$pdf->setPrintHeader(true);
$pdf->AddPage();

// set color for background
$pdf->SetFillColor(255, 255, 255);

$pdf->SetLineWidth(0.5); // définit l'épaisseur de la ligne
$pdf->Line($pdf->GetX()-5, $pdf->GetY()+4, $pdf->GetX()+125, $pdf->GetY()+4); // dessine une ligne noire

$pdf->SetLineWidth(0.2); // définit l'épaisseur de la ligne

$pdf->SetFont('times', 'B', 12);
$pdf->SetY($pdf->GetY() + 12);
$pdf->SetX($pdf->GetX() + -5);
$pdf->MultiCell(130, 5, '1 Prix du Président de la République', 0, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetY($pdf->GetY() + 6);
$pdf->SetX($pdf->GetX() + -8);
$pdf->MultiCell(50, 5, 'Participant', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(45, 5, 'Ville', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(40, 5, 'Variété', 1, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'B', 13);
$pdf->SetY($pdf->GetY() + 6);
$pdf->SetX($pdf->GetX() + -8);
$pdf->MultiCell(50, 5, 'CONSTANT Gilbert', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 13);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(45, 5, 'Antibes', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 13);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(40, 5, 'TWINGO', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');

$pdf->SetFont('times', 'B', 12);
$pdf->SetY($pdf->GetY() + 12);
$pdf->SetX($pdf->GetX() + -5);
$pdf->MultiCell(130, 5, '1 Prix du Président de la République', 0, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetY($pdf->GetY() + 6);
$pdf->SetX($pdf->GetX() + -8);
$pdf->MultiCell(50, 5, 'Participant', 1, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(45, 5, 'Ville', 1, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(40, 5, 'Variété', 1, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'B', 13);
$pdf->SetY($pdf->GetY() + 6);
$pdf->SetX($pdf->GetX() + -8);
$pdf->MultiCell(50, 5, 'CONSTANT Gilbert', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 13);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(45, 5, 'Antibes', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 13);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(40, 5, 'TWINGO', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');

$pdf->SetFont('times', 'B', 12);
$pdf->SetY($pdf->GetY() + 12);
$pdf->SetX($pdf->GetX() + -5);
$pdf->MultiCell(130, 5, '1 Prix du Président de la République', 0, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetY($pdf->GetY() + 6);
$pdf->SetX($pdf->GetX() + -8);
$pdf->MultiCell(50, 5, 'Participant', 1, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(45, 5, 'Ville', 1, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(40, 5, 'Variété', 1, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'B', 13);
$pdf->SetY($pdf->GetY() + 6);
$pdf->SetX($pdf->GetX() + -8);
$pdf->MultiCell(50, 5, 'CONSTANT Gilbert', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 13);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(45, 5, 'Antibes', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 13);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(40, 5, 'TWINGO', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');

$pdf->SetFont('times', 'B', 12);
$pdf->SetY($pdf->GetY() + 12);
$pdf->SetX($pdf->GetX() + -5);
$pdf->MultiCell(130, 5, '1 Prix du Président de la République', 0, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetY($pdf->GetY() + 6);
$pdf->SetX($pdf->GetX() + -8);
$pdf->MultiCell(50, 5, 'Participant', 1, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(45, 5, 'Ville', 1, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 15);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(40, 5, 'Variété', 1, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFillColor(220, 220, 220);
$pdf->SetFont('times', 'B', 13);
$pdf->SetY($pdf->GetY() + 6);
$pdf->SetX($pdf->GetX() + -8);
$pdf->MultiCell(50, 5, 'CONSTANT Gilbert', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 13);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(45, 5, 'Antibes', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
$pdf->SetFont('times', 'B', 13);
$pdf->SetX($pdf->GetX() + 0);
$pdf->MultiCell(40, 5, 'TWINGO', 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');


$pdf->setPrintHeader(false);


$pdf->Output();
?>