<?php

require_once('TCPDF/tcpdf.php');
require_once "bd.php";

$db = createDbConnection();

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


for($i=1;$i=9;$i++){

    $queryP = mysqli_query($db, "SELECT nom_palmares FROM palmares;");

    $queryN = mysqli_query($db, "SELECT id_bouquet, AVG(valeur_note) AS moyenne_note FROM note GROUP BY id_bouquet ORDER BY moyenne_note DESC;");


    $row = mysqli_fetch_array($queryN);
    $note = $row['valeur_note'];
    $bouquet = $row['id_bouquet'];

    $row2 = mysqli_fetch_array($queryP);
    $prix = $row2['nom_palmares'];

    $queryB = mysqli_query($db, "SELECT b.id_bouquet, b.nom_variete, b.id_producteur, p.nom_producteur, p.prenom_producteur, p.ville FROM bouquet b JOIN producteur p ON b.id_producteur = p.id_producteur;");

    $row3 = mysqli_fetch_array($queryB);

    $nom = $row3['nom_producteur'];
    $prenom = $row3['prenom_producteur'];
    $ville = $row3['ville'];
    $variete = $row3['nom_variete'];

    $pdf->SetFont('times', 'B', 12);
    $pdf->SetY($pdf->GetY() + 12);
    $pdf->SetX($pdf->GetX() + -5);
    $pdf->MultiCell(130, 5, $prix[$i], 0, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
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
    $pdf->MultiCell(50, 5, $nom[0], 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
    $pdf->SetFont('times', 'B', 13);
    $pdf->SetX($pdf->GetX() + 0);
    $pdf->MultiCell(45, 5, $ville[0], 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
    $pdf->SetFont('times', 'B', 13);
    $pdf->SetX($pdf->GetX() + 0);
    $pdf->MultiCell(40, 5, $variete[0], 1, 'C', 1, 0, '', '', true, 0, false, false, 40, '');

}

//$pdf->setPrintHeader(true);
//$pdf->AddPage();

// set color for background
$pdf->SetFillColor(255, 255, 255);


$pdf->setPrintHeader(false);


$pdf->Output();
?>