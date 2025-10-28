<?php
    require_once('tcpdf/examples/tcpdf_include.php');

    

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8',false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor("Jesús F. Gómez Bethencourt");
    $pdf->SetTitle('times', "Facturación ITC desde Laborsord, S.L.");
    $pdf->SetKeywords('Reporte, Persona, Laborsord');
    $pdf->SetPrintHeader(true);
    $pdf->SetPrintFooter(false);
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    $pdf->SetFont('times','B',7);
    $pdf->SetLeftMargin(15);
    $pdf->setPageOrientation('P','','');
    $pdf->setPageUnit('mm');
    $pdf->AddPage();
    $pdf->setJPEGQuality(75);
    $pdf->Image('img/logoinforme.jpg',2,2,44,36,'JPG','',true,150,'',false,false,1,false,false,false);
    //$pdf->Image('img/loginforme.jpg', 15, 140, 75, 113, 'JPG', 'http://www.tcpdf.org', '', true, 150, '', false, false, 1, false, false, false);
    
    
  
    $pdf->Output('informe facturacion.pdf','I');

?>