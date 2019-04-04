<?php
//============================================================+
// Génération d'un fichier PDF Matrice
//============================================================+
function generateBlankPdf ( $flipTitle )
{
    // Include the main TCPDF library (search for installation path).
    require_once('includes/tcpdf.php');
    // Extend the TCPDF class to create custom Header and Footer
    class MYPDF extends TCPDF {
        public $flipTitle;
        // Page footer
        public function Footer() {
            // Page number
            $this->Cell(0, 10, "FLIPEO - CESI - " . $this->flipTitle . "  //  " . 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        }
    }
    // create new PDF document
    $pdf = new MYPDF( PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->flipTitle = $flipTitle;
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Web Concepteurs 2017');
    $pdf->SetTitle('Flipeo');
    $pdf->SetSubject('Flipeo');
    $pdf->SetKeywords('Flipeo, CESI');
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    // remove default header/footer
    $pdf->setPrintHeader(false);
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    // ---------------------------------------------------------
    // set font
    $pdf->SetFont('times', '', 10);
    // add a page
    $pdf->AddPage();
    // set cell padding
    $pdf->setCellPaddings(0, 0, 0, 0);
    // set cell margins
    $pdf->setCellMargins(0, 0, 0, 0);
    return $pdf;
}
function generateFlipBook ( $flipFolder, $flipTitle )
{
    $pdf = generateBlankPdf( $flipTitle );
    // Compteur
    $cpt = 1;
    // Parcours des images
    foreach ( glob($flipFolder . "/flipbook*.jpg") as $filename )
    {
        // Besoin de passer à une nouvelle page?
        if ( $cpt >10 )
        {
            $cpt = 1;

            // Add a page
            $pdf->AddPage();
        }
        switch ($cpt)
        {
            // Ligne 1
            case 1:
                $pdf->writeHTMLCell(95, 53, 9, 7, '<img src="' . $filename . '">', 1, 0, 0, true, '', '', true);
                break;
            case 2:
                $pdf->writeHTMLCell(95, 53, 104, 7, '<img src="' . $filename . '">', 1, 0, 0, true, '', '', true);
                break;

            // Ligne 2
            case 3:
                $pdf->writeHTMLCell(95, 53, 9, 60, '<img src="' . $filename . '">', 1, 0, 0, true, '', '', true);
                break;
            case 4:
                $pdf->writeHTMLCell(95, 53, 104, 60, '<img src="' . $filename .'">', 1, 0, 0, true, '', '', true);
                break;
            // Ligne 3
            case 5:
                $pdf->writeHTMLCell(95, 53, 9, 113, '<img src="' . $filename . '">', 1, 0, 0, true, '', '', true);
                break;
            case 6:
                $pdf->writeHTMLCell(95, 53, 104, 113, '<img src="' . $filename . '">', 1, 0, 1, true, '', '', true);
                break;
            // Ligne 4
            case 7:
                $pdf->writeHTMLCell(95, 53, 9, 166, '<img src="' . $filename . '">', 1, 0, 0, true, '', '', true);
                break;
            case 8:
                $pdf->writeHTMLCell(95, 53, 104, 166, '<img src="' . $filename . '">', 1, 0, 1, true, '', '', true);
                break;
            // Ligne 5
            case 9:
                $pdf->writeHTMLCell(95, 53, 9, 218, '<img src="' . $filename . '">', 1, 0, 0, true, '', '', true);
                break;
            case 10:
                $pdf->writeHTMLCell(95, 53, 104, 218, '<img src="' . $filename . '">', 1, 0, 1, true, '', '', true);
                break;
        }
        // Incrémentation du compteur
        $cpt++;
    }
    // move pointer to last page
    $pdf->lastPage();
    // ---------------------------------------------------------
    //Close and output PDF document
    $pdf->Output('flipeo.pdf', 'I');
}