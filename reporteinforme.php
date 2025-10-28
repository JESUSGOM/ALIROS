<?php
    //require("db.php");
    require("variables.php");
    //require("include/user_sesion.php");
    require("fpdf/fpdf.php");
    //session_start();
    echo var_dump($_POST);
    echo "<br>";
    $mesno = $_POST['mesano'];
    $cen = $_POST['miopcion'];
    $denomino = "";
    $esnombremes = "";
    echo "Mes y anio: ";
    echo $mesno;
    echo "<br>";
    echo "Número de centro: ";
    echo $cen;
    $anio = substr($mesno, 0, 4);
    echo "<br>";
    echo "anio = ";
    echo $anio;
    echo "<br>";
    $mes = substr($mesno, 5, 2);
    echo "Mes = ";
    echo $mes;
    echo "<br>";
    echo "El número del centro es ";
    echo $cen;
    echo "<br>";
    echo "Tipo de dato referene al número del centro";
    echo gettype($cen);
    echo "<br>";
    $mysqli = new mysqli('mysql-5705.dinaserver.com', 'Conacelbs','C0n@celbs','Conlabac');
    if($mysqli->connect_errno)
    {
        echo "Conexión faliida: ";
        echo $mysqli->connect_error;
        echo "<br>";
    } else {
        echo "Conexión realizada";
        echo "<br>";
        $q = "SELECT * FROM Centros WHERE CenId = '".$cen."'";
        if($resultado = $mysqli->query($q)){
            while($fila = $resultado->fetch_row()){
                $denomino = $fila[1];
                echo "Valore denominación recibido de la base de datos = ";
                echo $denomino;
                echo "<br>";
            }
            $resultado->close();
        }
    }

    //Ponemos el nombre del mes en letras.
    switch($mes){
        case 1:
            $esnombremes = "enero";
            break;
        case 2:
            $esnombremes = "febrero";
            break;
        case 3:
            $esnombremes = "marzo";
            break;
        case 4:
            $esnombremes = "abril";
            break;
        case 5:
            $esnombremes = "mayo";
            break;
        case 6:
            $esnombremes = "junio";
            break;
        case 7:
            $esnombremes = "julio";
            break;
        case 8:
            $esnombremes = "agosto";
            break;
        case 9:
            $esnombremes = "septiembre";
            break;
        case 10:
            $esnombremes = "octubre";
            break;
        case 11:
            $esnombremes = "noviembre";
            break;
        case 12:
            $esnombremes = "diciembre";
            break;
    }
    echo "<br>";
    echo "Mes seleccionado = ";
    echo $esnombremes;
    echo "<br>";
    $linea = 35;
    $mipdf = new FPDF();
    $tituloDocumento = "Informe mensual '".$esnombremes."'. Para el ITC de '".$denomino."'";
    $mipdf->SetTitle($tituloDocumento);
    //$mipdf->SetTopMargin(0);
    //$mipdf->SetLeftMargin(0);
    //$mipdf->SetRightMargin(0);
    //**************Añadimos la portada **************************************//
    $mipdf->AddPage('P','A4',0);
    $mipdf->SetFont('Arial','B',16);
    $mipdf->Cell(40, 5, "'.$tituloDocumento.'");
    //$sfpdf->Image('img/portada-informe-tenerife.jpg', 20, 20, 200, 280);
    $sfpdf->Output();

?>