<?php

use Dompdf\Dompdf;

    require_once("db.php");
    //require_once("include/header.php");
    require_once("variables.php");
    session_start();
    require 'include/user_sesion.php';
    require 'fpdf/fpdf.php';
    //require_once('TCPDF-mail/tcpdf_include.php');
    //require_once('TCPDF-mail/tcpdf.php');
    date_default_timezone_get('Europe/London');
    /**
     * AddPage(orientación[PORTAIT, LANDSCAPE], Tamaño[A3, A4, A5, LETTER, LEGAL], rotación),
     * SetFont(tipo[COURIER, HELVETICA, ARIAL, TIMES, SYMBOL, ZAPDINGBATS], estilo[normao, B, I, U], tamaño)
     * Cell(ancho, alto, texto, bordes, ? alineación, rellenar, link)
     * OutPut(destino[I, D, F, S], nombre_archivo, utf8)
     */

    //class MYPDF extends TCPDF {
    //    public function Headerpdf(){
    //        $image_file = 'img/logoitc-30.png';
    //        $this->Image($image_file, 10,10,15,'','PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    //        $this->SetFont('helvetica', '', 10);
    //        $this->Cell(0, 15, '', 0, false, 'C', 0, '', 0, false, 'M', 'M');

            
    //    }
    //}
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        //echo var_dump($_POST);
        echo "<br>";
        //echo $mesano = $_POST['mesano'];
        echo "<br>";
        //echo $ano = $_POST['ano'];
        echo "<br>";
        //echo $opcion = $_POST['miopcion'];
        echo "<br>";
        //echo $mandato = $_POST['comunicdo'];
        $fpdf = new FPDF('L','mm','A4');
        //Creamos y montamos portada
        $textotitulo = "Informe mensual Servicio ITC por Envera Empleo, S.L.U. 
        (CEE) para el periodo: ".$esmes."/".$esaño.". Prestado en ".$deno. "";
        $textotitulo .= ".pdf";
        $sfpdf->SetTitle($textotitulo);
        $sfpdf->SetTopMargin(0);
        /******************************Añadimos portada******************************/
        $sfpdf->AddPage('L','A4',0);
        $sfpdf->Image('img/logoitc-30.pnt', 5,5,10,40);
        $sfpdf->Image('img/PortadInformeEnvera.png', 20, 20, 200, 280);
        $sfpdf->Output($textotitulo,'D');
        ob_end_flush();
    ?>
</body>
</html>