<?php

require_once('TCPDF/tcpdf.php');
require_once "bd.php";

$db = createDbConnection();

class MYPDF extends TCPDF
{
	public function Header()
	{
		// Logo
		$this->Image('assets/img/logo.png', 5, 3, 38.6);
		// Title
		// set font
		$this->SetFont('times', 'U', 16);

		// set color for background
		$this->SetFillColor(255, 255, 255);

		$this->SetX($this->GetX() + 70);
		$this->MultiCell(55, 5, '51ème EXPOSITION', 0, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
		$this->SetY($this->GetY() + 10);
		$this->SetX($this->GetX() + 65);
		$this->MultiCell(65, 5, 'INTERNATIONALE DE', 0, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
		$this->SetY($this->GetY() + 10);
		$this->SetX($this->GetX() + 85);
		$this->MultiCell(25, 5, 'ROSES', 0, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
	}
}

// create new PDF document
$pdf = new MYPDF('P', PDF_UNIT, 'A5', true, 'UTF-8', false);

// set document information
$pdf->SetTitle('Exporose');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setPrintFooter(false);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// add a page
$query = mysqli_query($db, "SELECT COUNT(id_palmares) FROM palmares;");
$result = mysqli_fetch_array($query);
$prix = $result[0];

$query2 = mysqli_query($db, "SELECT nom_palmares FROM palmares;");
/*
$query3 = mysqli_query($db, "SELECT prenom_producteur from producteur,bouquet WHERE producteur.id_producteur=bouquet.id_producteur;");

$query4 = mysqli_query($db, "SELECT nom_variete from bouquet;");

$query_ville = mysqli_query($db, "SELECT ville from producteur,bouquet WHERE producteur.id_producteur=bouquet.id_producteur;");

$query_numero = mysqli_query($db, "SELECT id_bouquet from bouquet;");
*/
for ($i = 1; $i <= $prix; $i++) {

	$row = mysqli_fetch_array($query2);
	$palmares = $row['nom_palmares'];

	/*
	$row2 = mysqli_fetch_array($query3);
	$prenom = $row2['prenom_producteur'];

	$row3 = mysqli_fetch_array($query4);
	$variete = $row3['nom_variete'];

	$row_ville = mysqli_fetch_array($query_ville);
	$ville_bouquet = $row_ville['ville'];

	$row_numero = mysqli_fetch_array($query_numero);
	$numero_bouquet = $row_numero['id_bouquet'];
	*/

	$pdf->setPrintHeader(true);
	$pdf->AddPage();

	// set color for background
	$pdf->SetFillColor(255, 255, 255);

	$pdf->SetFont('times', '', 30);
	$pdf->SetY($pdf->GetY() + 30);
	$pdf->SetX($pdf->GetX() + -5);
	$pdf->MultiCell(130, 5, $palmares, 0, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
	$pdf->SetFont('times', '', 26);
	$pdf->SetY($pdf->GetY() + 45);
	$pdf->SetX($pdf->GetX() + -5);
	$pdf->MultiCell(130, 5, '«Participant»', 0, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
	$pdf->SetFont('times', '', 30);
	$pdf->SetY($pdf->GetY() + 30);
	$pdf->SetX($pdf->GetX() + -5);
	$pdf->MultiCell(130, 5, 'aaa', 0, 'C', 1, 0, '', '', true, 0, false, false, 40, '');
	$pdf->SetFont('times', '', 20);
	$pdf->SetY($pdf->GetY() + 30);
	$pdf->SetX($pdf->GetX() + -5);
	$pdf->MultiCell(130, 5, 'aaa', 0, 'C', 0, 0, '', '', true, 0, false, false, 40, '');

	$pdf->setPrintHeader(false);
	$pdf->AddPage();

	$pdf->SetFont('times', '', 20);
	$pdf->SetY($pdf->GetY() + 60);
	$pdf->SetX($pdf->GetX() + -5);
	$pdf->MultiCell(130, 5, 'aaa', 0, 'C', 0, 0, '', '', true, 0, false, false, 40, '');
}

$pdf->Output();
