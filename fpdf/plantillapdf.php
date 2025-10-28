<?php
    require 'fpdf/fpdf.php';

    class PDF extends FPDF
    {
        //Cabecera de página.
        function Header()
        {
            //Logo
            $this->Image("img/logoinforme.jpg", 10, 5, 13);
            $this->SetFont("Calibri", "B", 7);
            $this->Cell(25);
            $this->Cell(140, 5, utf8_decode("Laborsord, S.L."));

        }

        //Pié de págiina.
        function Footer()
        {
            //Posición a 1,5 cm del final
            $this->SetFont('Calibri','',9);
            $this->Cell(0,10,'Página ' .$this->PageNo()- '/{nb}', 0,0, 'C');
        }
    }

?>