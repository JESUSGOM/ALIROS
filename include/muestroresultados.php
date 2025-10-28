<?php
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    session_start();
    require 'include/user_sesion.php';
    require 'fpdf/fpdf.php';
    $tblviscab[] = array();
    $tblvisdet[][] = array();
    $tbldestino[] = array();
    $tblveces[] = array();
    $tblpesos[] = array();
    $f = 0;
    $c = 0;
    $g = 0;
    ob_start();
    
?>
<div class="card card-body">
    <?php
        echo nl2br("\n");
        echo "Conectado";
        echo $_POST['mesano'];
        echo nl2br("\n");
        $elmesano = $_POST['mesano'];
        echo nl2br("\n");
        echo substr($elmesano, 0, 4);
        echo substr($elmesano, 5, 2);
        $esmesano = substr($elmesano, 0, 4) . substr($elmesano, 5, 2) . "%";
        echo nl2br("\n");
        echo "variable esmesano = ";
        echo $esmesano;
        echo nl2br("\n");
        $tratocento = 1;
        $q = "SELECT * FROM Movadoj WHERE MovCentro = '" .$tratocento. "' AND MovFechaEntrada LIKE '".$esmesano."'";
        echo nl2br("\n");
        if($resultado = mysqli_query($conn, $q)){
            echo nl2br("\n");
            echo "Hemos obtenido registros";
            $registrosvisitas = mysqli_num_rows($resultado);
            echo nl2br("\n");
            echo $registrosvisitas;
        }
        
        echo nl2br("\n");
        print "<p>Registros obtenidos = $registrosvisitas</p>";
        echo nl2br("\n");
        $qq = "SELECT DISTINCT MovDestino FROM Movadoj WHERE MovCentro = '" .$tratocento. "' AND MovFechaEntrada LIKE '" .$esmesano."'";
        $resultad2 = mysqli_query($conn, $qq);
        while($mostrar =  mysqli_fetch_array($resultad2)){
            $tbldestino[$f] = $mostrar[0];
            echo $tbldestino[$f];
            //$f = $f+1;
            echo nl2br("\n");
            echo $f;
            echo nl2br("\n");
            $rr = "SELECT * FROM Movadoj WHERE MovDestino = '" .$mostrar[0]. "' AND MovFechaEntrada LIKE '" .$esmesano. "'";
            $resul3 = mysqli_query($conn, $rr);
            echo mysqli_num_rows($resul3);
            $tblveces[$f] = mysqli_num_rows($resul3);
            //echo nl2br("\n");
            $tblpesos[$f] = round(($tblveces[$f] / $registrosvisitas * 100),2);
            echo nl2br("\n");
            echo $tblpesos[$f];
            echo "%";
            echo nl2br("\n");
            $f = $f+1;
        }
        //echo sizeof($tbldestino);
        //print_r($tbldestino);
        echo nl2br("\n");
        echo "Reportamos incidencias";
        echo nl2br("\n");
        $in = "SELECT * FROM Incidencias WHERE IncCentro = '" .$tratocento. "' AND IncFecha LIKE '" .$esmesano. "'";
        $rin = mysqli_query($conn, $in);
        echo mysqli_num_rows($rin);
        $nin = mysqli_num_rows($rin);
        //echo $nin;
        echo nl2br("\n");
        while($verinci = mysqli_fetch_array($rin)){
            echo "<------------------------------->";
            echo $verinci[2];
            echo nl2br("\n");
            echo $verinci[3];
            echo nl2br("\n");
            echo $verinci[4];
            echo nl2br("\n");
            echo $verinci[5];
            echo nl2br("\n");
            echo $verinci[6];
            echo nl2br("\n");
            echo $verinci[7];
            echo nl2br("\n");
        }
        echo nl2br("\n");
        $kn = "SELECT * FROM KeyMoves WHERE KeyCentro = '" .$tratocento. "' AND KeyFechaEntrega LIKE '" .$esmesano. "'";
        
        if($rkn = mysqli_query($conn, $kn)){
            $nkn = mysqli_num_rows($rkn);
            echo nl2br("\n");
            echo $nkn;
        }
        $nkn = mysqli_num_rows($rkn);            
        echo nl2br("\n");
        echo $nkn;

        echo nl2br("\n");
        echo "Usuarios.:";
        $et = "SELECT * FROM Usuarios WHERE UsuCentro = '" .$tratocento. "' AND UsuTipo = 'U'";
        $ret = mysqli_query($conn, $et);
        while($datousuario = mysqli_fetch_array($ret)){
            echo nl2br("\n");
            echo "Nombre.: ";
            echo $datousuario[3];
            echo nl2br("\n");
            echo "Apellido.: ";
            echo $datousuario[4];
            echo nl2br("\n");
            echo "Apellido..: ";
            echo $datousuario[5];
        }
        $elmes = substr($esmesano, 4,2);
        echo nl2br("\n");
        echo $elmes;
        $elaño = substr($esmesano, 0,4);
        echo nl2br("\n");
        echo $elaño;
        echo nl2br("\n");
        switch($elmes){
            case 1:
                echo "Enero";
                break;
            case 2:
                echo "Febrero";
                break;
            case 2:
                echo "Marzo";
                break;
            case 2:
                echo "Abril";
                break;
            case 2:
                echo "Mayo";
                break;
            case 2:
                echo "Junio";
                break;
            case 2:
                echo "Julio";
                break;
            case 2:
                echo "Agosto";
                break;
            case 2:
                echo "Septiembre";
                break;
            case 2:
                echo "Octubre";
                break;
            case 2:
                echo "Noviembre";
                break;
            case 2:
                echo "Diciembre";
                break;

        }

        /** Generamos el pdf del centro Tenerife. */
        require('fpdf/fpdf.php');
        $sfpdf = new FPDF();
        $sfpdf->AddPage('P','A4',0);
        $sfpdf->SetFont('Calibri','',12);
        $sfpdf->Cell(80,10,'Esto es una celda de 40 x 10',1);        
        $sfpdf->Cell(50,10,'Celda de 50 x 10',1);
        $sfpdf->Ln(10);
        $sfpdf->SetFont('Arial','B',18);
        $pdf->Cell(80, 10, 'Esto es una celda de 40 x 10', 1);
        $pdf->Cell(50, 10, 'Celda de 50 x 10', 0);
        $pdf->Output();
        

    ?>
</div>
<div class="card card-body">
    <?php
        $tratocento = 2;  
        echo "Centro Cebrían.";
        $q = "SELECT * FROM Movadoj WHERE MovCentro = '" .$tratocento. "' AND MovFechaEntrada LIKE '".$esmesano."'";
        echo nl2br("\n");
        if($resultado = mysqli_query($conn, $q)){
            echo nl2br("\n");
            echo "Hemos obtenido registros";
            $registrosvisitas = mysqli_num_rows($resultado);
            echo nl2br("\n");
            echo $registrosvisitas;
        }
        echo nl2br("\n");
        $qq = "SELECT DISTINCT MovDestino FROM Movadoj WHERE MovCentro = '" .$tratocento. "' AND MovFechaEntrada LIKE '" .$esmesano."'";
        $resultad2 = mysqli_query($conn, $qq);
        while($mostrar =  mysqli_fetch_array($resultad2)){
            $tbldestino[$g] = $mostrar[0];
            echo $tbldestino[$g];
            //$g= $f+1;
            echo nl2br("\n");
            echo $g;
            echo nl2br("\n");
            $rr = "SELECT * FROM Movadoj WHERE MovDestino = '" .$mostrar[0]. "' AND MovFechaEntrada LIKE '" .$esmesano. "'";
            $resul3 = mysqli_query($conn, $rr);
            echo mysqli_num_rows($resul3);
            $tblveces[$g] = mysqli_num_rows($resul3);
            //echo nl2br("\n");
            $tblpesos[$g] = round(($tblveces[$g] / $registrosvisitas * 100),2);
            echo nl2br("\n");
            echo $tblpesos[$g];
            echo "%";
            echo nl2br("\n");
            $g= $g+1;
        }
        echo nl2br("\n");
        echo "Reportamos incidencias";
        echo nl2br("\n");
        $in = "SELECT * FROM Incidencias WHERE IncCentro = '" .$tratocento. "' AND IncFecha LIKE '" .$esmesano. "'";
        $rin = mysqli_query($conn, $in);
        echo mysqli_num_rows($rin);
        $nin = mysqli_num_rows($rin);
        //echo $nin;
        echo nl2br("\n");
        while($verinci = mysqli_fetch_array($rin)){
            echo "<------------------------------->";
            echo $verinci[2];
            echo nl2br("\n");
            echo $verinci[3];
            echo nl2br("\n");
            echo $verinci[4];
            echo nl2br("\n");
            echo $verinci[5];
            echo nl2br("\n");
            echo $verinci[6];
            echo nl2br("\n");
            echo $verinci[7];
            echo nl2br("\n");
        }
        echo nl2br("\n");
        $kn = "SELECT * FROM KeyMoves WHERE KeyCentro = '" .$tratocento. "' AND KeyFechaEntrega LIKE '" .$esmesano. "'";
        
        if($rkn = mysqli_query($conn, $kn)){
            $nkn = mysqli_num_rows($rkn);
            echo nl2br("\n");
            echo $nkn;
        }
        $nkn = mysqli_num_rows($rkn);            
        echo nl2br("\n");
        echo $nkn;
        echo nl2br("\n");
        echo "Usuarios.:";
        $et = "SELECT * FROM Usuarios WHERE UsuCentro = '" .$tratocento. "' AND UsuTipo = 'U'";
        $ret = mysqli_query($conn, $et);
        while($datousuario = mysqli_fetch_array($ret)){
            echo nl2br("\n");
            echo "Nombre.: ";
            echo $datousuario[3];
            echo nl2br("\n");
            echo "Apellido.: ";
            echo $datousuario[4];
            echo nl2br("\n");
            echo "Apellido..: ";
            echo $datousuario[5];
        }
        $elmes = substr($esmesano, 4,2);
        echo nl2br("\n");
        echo $elmes;
        $elaño = substr($esmesano, 0,4);
        echo nl2br("\n");
        echo $elaño;
        echo nl2br("\n");
        switch($elmes){
            case 1:
                echo "Enero";
                break;
            case 2:
                echo "Febrero";
                break;
            case 2:
                echo "Marzo";
                break;
            case 2:
                echo "Abril";
                break;
            case 2:
                echo "Mayo";
                break;
            case 2:
                echo "Junio";
                break;
            case 2:
                echo "Julio";
                break;
            case 2:
                echo "Agosto";
                break;
            case 2:
                echo "Septiembre";
                break;
            case 2:
                echo "Octubre";
                break;
            case 2:
                echo "Noviembre";
                break;
            case 2:
                echo "Diciembre";
                break;
        }
        //header("location: reporteTenerife.php");
    ?>
</div>

