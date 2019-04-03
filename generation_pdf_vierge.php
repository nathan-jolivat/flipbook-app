<?php
//============================================================+
// Génération d'un fichier PDF Matrice
//============================================================+


// Include the main TCPDF library (search for installation path).
require_once('includes/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Web Concepteurs 2017');
$pdf->SetTitle('Flipeo');
$pdf->SetSubject('Flipeo');
$pdf->SetKeywords('Flipeo, CESI');

// set default header data
/*$pdf->SetHeaderData(
	PDF_HEADER_LOGO, 
	PDF_HEADER_LOGO_WIDTH, 
	"FLIPEO", 
	"Une application du CESI");
*/
// set header and footer fonts
/*$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
*/

$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));


// remove default header/footer
$pdf->setPrintHeader(false);


// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetMargins(9, 0, 11);

//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(0, 0, 0, 0);

// set cell margins
$pdf->setCellMargins(0, 0, 0, 0);

// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// Ligne 1
$pdf->writeHTMLCell(95, 53, 9, 7, '<img src="flipbook.jpg">', 1, 0, 0, true, '', '', true);
$pdf->writeHTMLCell(95, 53, 104, 7, '<img src="flipbook.jpg">', 1, 0, 0, true, '', '', true);

$x = $pdf->getX();
$y = $pdf->getY();

// Ligne 2
$pdf->writeHTMLCell(95, 53, 9, 60, '<img src="flipbook.jpg">', 1, 0, 1, true, '', '', true);
$pdf->writeHTMLCell(95, 53, 104, 60, '<img src="flipbook.jpg">', 1, 0, 0, true, '', '', true);

// Ligne 3
$pdf->writeHTMLCell(95, 53, 9, 113, '<img src="flipbook.jpg">', 1, 0, 0, true, '', '', true);
$pdf->writeHTMLCell(95, 53, 104, 113, '<img src="flipbook.jpg">', 1, 0, 0, true, '', '', true);

// Ligne 4
$pdf->writeHTMLCell(95, 53, 9, 166, '<img src="flipbook.jpg">', 1, 0, 0, true, '', '', true);
$pdf->writeHTMLCell(95, 53, 104, 166, '<img src="flipbook.jpg">', 1, 0, 1, true, '', '', true);

// Ligne 5
$pdf->writeHTMLCell(95, 53, 9, 218, '<img src="flipbook.jpg">', 1, 0, 0, true, '', '', true);
$pdf->writeHTMLCell(95, 53, 104, 218, '<img src="flipbook.jpg">', 1, 0, 0, true, '', '', true);

//$pdf->Ln(4);


// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('flipeo.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
