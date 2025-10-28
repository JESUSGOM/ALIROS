<?php
    require ("fpdf/fpdf.php");
    //echo var_dump($_POST);
    $fdpf = new FPDF();
    $sfpdf->AddPage('L','A4');
    $sfpdf->Output('Fichero.pdf','D');
    ob_end_flush();
    // class pdf extends FPDF {
    //     public function header(){
    //         $this->SetFont('Arial', 'B', 12);
    //         $this->Write(5, 'Centro Educativo Colonia La Paz');

    //     }

    //     public function footer(){
    //         $this->SetFont('Arial','B',6);
    //         $this->SetY(-15);
    //         $this->Write(5, 'San Miguel, El Salvador');
    //     }
    // }

    

?>