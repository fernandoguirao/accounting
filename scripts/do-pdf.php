<?php

if (isset($_POST['variable'])) {

$variable = $_POST['variable'];
$estilos = '<style> .factura {background-color:white;}.factura,.fact p,.fact h5,.fact h4,.fact table { font-family:arial; color:#434343; font-size:12px; } .fact h4 { text-transform:uppercase; } .fact h5 { line-height:1.5; margin:0; } .fact p { margin:0; } .fact .container { max-width:700px; } #logoF { float:left; } #datosHeader { position:absolute; right:50px; text-align: right; padding-top:45px; margin-bottom:30px; } .secciones { clear:both; } .cuadro.cIzq { background-color:#efefef; } .cuadro { width:42%; float:left; padding:1% 4% 3%; margin-bottom:30px; } .cuadro p { line-height:1.5; } .fact tr,.fact td,.fact th { border:0px; margin:0; padding:5px; text-align: left; } .fact td,.fact th { padding:10px 12px; } .fact table { width:100%; } .fact tr { background-color:#f3f3f3; } .franja { background-color:#d9d9d9; font-weight:bolder; } .no-franja { background-color:white; } .fact table { margin:20px 0; } .tLittle th { font-size:11px; } .tLittle td { font-weight:bold; font-size:13px; } .fact p { line-height:1.6; } </style>';

//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('classes/tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Bueninvento SL');
$pdf->SetTitle('Accouting, Bueninvento 2013-2014');
$pdf->SetSubject('Accounting');
$pdf->SetKeywords('Bueninvento, accounting');

// set default header data
/* $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128)); */
/* $pdf->setFooterData(array(0,64,0), array(0,64,128)); */

// set header and footer fonts

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetPageOrientation(V);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 12, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();


// Set some content to print
$html = <<<EOD
$estilos 
$variable
EOD;

// Print text using writeHTMLCell()
$logoBueninvento = $_POST['logoBueninvento'];
$datosFactura = $_POST['datosFactura'];
$datosCliente = $_POST['datosCliente'];
$datosBueninvento = $_POST['datosBueninvento'];



$pdf->SetFont('helvetica', '', 12, '', 'false');

$pdf->writeHTMLCell(70, 50, '', 10, $logoBueninvento, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(70, 50, 125, 20, $datosFactura, 0, 1, false, true, 'R', true);

$pdf->writeHTMLCell(70, 50, '', 60, $datosBueninvento, 0, 1, false, true, 'L', true);
$pdf->writeHTMLCell(70, 50, 105, 60, $datosCliente, 0, 1, false, true, 'L', true);

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, false, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('bueninvento.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+

}

?>