<?php
require_once("db.php");
require_once("variables.php");
session_start();
require 'include/user_sesion.php';
require ("fpdf/fpdf.php");
//echo var_dump($_POST);
$mesano = $_POST['mesano'];
$sucursal = $_POST['sucursal'];
$centro = $_POST['centro'];
$centros = intval($centro);
$centroden = $_POST['centroden'];
$comunico = $_POST['comunico'];
$esnmes = substr($mesano,5,2);
$esnano = substr($mesano,0,4);
$elmes = intval($esnmes);
$elanio = intval($esnano);
$diafactura = date("d",(mktime(0,0,0,$elmes+1,1,$elanio)-1));
$esndia = strval($diafactura);
$esnmes = strval($elmes);
$esnanio = strval($esnano);
$esmesanio = str_replace("-", "", $mesano);
$esmesanio = $esmesanio. "%";
$totalconteoderegistros = 0;
//Capturamos el nombre del centro según se recibe la variable $centros
$conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs', 'Pass@LIr0S', 'Conlabac');
mysqli_set_charset($conn, "utf8");
$misql = "SELECT CenDen FROM Centros WHERE CenId = $centros";
$result = mysqli_query($conn, $misql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)) {
        $centroden = $row['CenDen'];
        //echo $centroden;
    }
}
switch($esnmes){
    case "1":
        $esmes = "enero";
        break;
    case "2":
        $esmes = "febrero";
        break;
    case "3":
        $esmes = "marzo";
        break;
    case "4":
        $esmes = "abril";
        break;
    case "5":
        $esmes = "mayo";
        break;
    case "6":
        $esmes = "junio";
        break;
    case "7":
        $esmes = "julio";
        break;
    case "8":
        $esmes = "agosto";
        break;
    case "9":
        $esmes = "septiembre";
        break;
    case "10":
        $esmes = "octubre";
        break;
    case "11":
        $esmes = "noviembre";
        break;
    case "12":
        $esmes = "diciembre";
        break;
}
$fechatotalfacctura = $esndia . " de " . $esmes . " de " . $esnanio;
$MayusEsmes = strtoupper($esmes);
$altolinea = 6;
class PDF extends FPDF
{
    function Header()
    {
        $this->Image('img/logoitcizq.png',15,5,30);
        $this->SetFont('Arial','B',15);
        $this->SetXY(135, 5); // Posiciona la celda en Y=5
        $this->Cell(60,10,utf8_decode('Servicio de Recepción'),1,0,'I');
        $this->Image('img/Envera_Logo_79_30.png',254,5,30);
        $this->Ln(20); // Avanza 20mm para el contenido del header
    }
    function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pag '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
/**
 *
 * Creamos la portada del reporte.
 *
 */
$fila = 20;
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4');
$imageFile = 'img/Imagen1.png';
$imageWidth = 277;
$imageHeight = 138.5;
//Calculamos la posición X e Y para centrar la imagen
$x = ($pdf->GetPageWidth() - $imageWidth) / 2;
$y = ($pdf->GetPageHeight() - $imageHeight) / 2 -10;
$pdf->Image($imageFile, $x, $y, $imageWidth, $imageHeight);
$pdf->SetFillColor(218,77,98);
$pdf->SetTextColor(0,0,0);
/**
 * Fin de la portada del reporte
 */
/**
 * Creamos la primea página del reporte
 */
$pdf->AddPage('L','A4');
$pdf->SetFont('Arial','B',15);
$pdf->SetXY(10, $fila);
$pdf->Cell(138,7,'CLIENTE:',1,0,'L',true);
$pdf->SetXY(149, $fila);
$pdf->Cell(138,7,'CIF',1,0,'L',true);
$fila = $fila + 7;
$pdf->SetXY(10, $fila);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(138, 7, utf8_decode('SC 0870/2024'), 0, 0, 'L',true);
$pdf->SetXY(149, $fila);
$pdf->Cell(138,7,utf8_decode('A35313170'), 0, 0, 'L',true);
$fila = $fila + 7;
$pdf->SetFillColor(218,77,98);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(10, $fila);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(138,7,'DIRECCION:',1,0,'L',true);
$pdf->SetXY(149, $fila);
$pdf->Cell(138,7,'PERSONA DE CONTACTO',1,0,'L',true);
$fila = $fila + 7;
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(10, $fila);
$pdf->SetFont('Arial','',11);
$pdf->Cell(138, 7, utf8_decode('Calle Cebrián, 3. 35003-Las Palmas de Gran Canrair'), 0, 0, 'L',true);
$pdf->SetXY(149, $fila);
$pdf->Cell(138,7,utf8_decode('Adriana Domínguez Sicilia'), 0, 0, 'L',true);
$fila = $fila + 7;
$pdf->SetFont('Arial','B',15);
$pdf->SetXY(10, $fila);
$pdf->SetFillColor(218,77,98);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(138,7,'FECHA:',1,0,'L',true);
$fila = $fila + 7;
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(10, $fila);
$pdf->SetFont('Arial','',11);
$pdf->Cell(138, 7, utf8_decode($fechatotalfacctura), 0, 0, 'L',true);
$fila = $fila + 14;
$pdf->SetFont('Arial','B',15);
$pdf->SetXY(10, $fila);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(277,7,'INFORME MENSUAL DEL MES '.$MayusEsmes.'',0,0,'C',true);
$fila = $fila + 7;
$pdf->SetXY(10, $fila);
$posvlinea = 90;
$pdf->Line(10, $posvlinea, $pdf->GetPageWidth() - 20, $posvlinea);
//$pdf->Cell(277, 7, utf8_decode('El valor recibido del centro es '.$centro.
//', de tipo = '.gettype($centro).'. Y lo convertirmo al valor '.$centros.
//', que es de tipo = '.gettype($centros).''), 0, 0, 'L', true);
$fila = $fila + 7;
$pdf->SetXY(10, $fila);
$pdf->SetFont('Arial','',12);
$textoPrimero = "El servicio de auxiliares de recepción para el centro 
    insular de Las Palmas de Gran Canaria, del Instituto Tecnológico de Canarias, S.A., a ";
$textoSegundo = "partir de ahora: 'ITC' engloba la siguiente actividad:";
$textoTercero = "Se trata de un edificio que alberta seis plantas sobre rasante, planta baja
que hace de vestíbulo, dos sótanos de garaje, azotea transitable ";
$textoCuarto = "para uso de conservación. Cada una de las plantas tiene una superficie útil aproximada de 350 m². 
Las Plantas sobre rasante albergan ";
$textoQuinto = "dependencias destinadas a oficinas administrativas, 
despachos de Dirección, archivos y determinadas zonas comunes (pasillos, ascensores,";
$textoSexto = " caja de escaleras, baños y office).En la planta baja está ubicada la recepción del edificio
, la Sala de Juntas, Salón de Actos y el Centro de ";
$textoSexto2 = "Proceso de Datos (CPD). Las dos plantas bajo rasante, garajes, con capacidad para trece (13) 
plazas de aparcamiento cada una, comunicada ";
$textoSexto3 = "mediante caja de escaleras, ascensores con sus respectivos pasillos.";
$textoSeptimo = "La Fase 1ª del centro dispone de cubierta plana transitable para el uso
    de conservación, mientras que la cubierta de la Fase 2 es inclinada,";
$textoOctavo = "con algunos sectores en diente de sierra y otros a dos aguas.";
$textoNoveno = "El Centro también dispone de espacios exteriores alrededor del cuerpo flontal de la
    edificación, con un vial interior, espacios ajardinados y";
$textoDecimo = "aparcamientos al aire libre. El recinto se encuentra vallado.";
$textoDecimoPrimero = "Las Funciones que desarrolla Envera con su personal auxiliar de recepción son:";
$textoDecimoSegundo = "a. Apertura y cierre de puertas y ventanas al inicio y final de la jornada.";
$textoDecimoTercero = "b. Atención a la centralita telefónica, gestión del fax central y registro telefónico.";
$textoDecimoCuarto = "c. Atención -guía-orientación a visitantes, proveedores y clientes del ITC.";
$textoDecimoQuinto = "c. Atención -guía-orientación a visitantes, proveedores y clientes del ITC.";
$textoDecimoSexto = "d. Custodia del cuadro de llaves de servicio y control de la entrega/devolución de las mismas por los usuarios del edificio.";
$textoDecimoSeptimo = "e. Gestión centralizada de las entradas de correpondencia y paquetería.";
$textoDecimoOctavo = "f. Tareas propias de portería y recepción.";
$textoDecimoNoveno = "g. Operación rutinaria de equipos generales básicos del edificio.";
$textoVigesimo = "h. Participar en la faceta de comunicación e incidencias y/o alarmas en el edificio.";
$pdf->Cell(277, 7,utf8_decode(''.$textoPrimero.''),0,0,'J',true);
$fila = $fila + $altolinea;
$pdf->SetXY(10, $fila);
$pdf->SetFont('Arial','',12);
$pdf->Cell(277, 7,utf8_decode(''.$textoSegundo.''),0,0,'J',true);
$fila = $fila + $altolinea + $altolinea;
$pdf->SetXY(10, $fila);
$pdf->SetFont('Arial','',12);
$pdf->Cell(277, 7,utf8_decode(''.$textoTercero.''),0,0,'J',true);
$fila = $fila + $altolinea;
$pdf->SetXY(10, $fila);
$pdf->SetFont('Arial','',12);
$pdf->Cell(277, 7,utf8_decode(''.$textoCuarto.''),0,0,'J',true);
$fila = $fila + $altolinea;
$pdf->SetXY(10, $fila);
$pdf->SetFont('Arial','',12);
$pdf->Cell(277, 7,utf8_decode(''.$textoQuinto.''),0,0,'J',true);
$fila = $fila + $altolinea;
$pdf->SetXY(10, $fila);
$pdf->SetFont('Arial','',12);
$pdf->Cell(277, 7,utf8_decode(''.$textoSexto.''),0,0,'J',true);
$fila = $fila + $altolinea;
$pdf->SetXY(10, $fila);
$pdf->SetFont('Arial','',12);
$pdf->Cell(277, 7,utf8_decode(''.$textoSexto2.''),0,0,'J',true);
$fila = $fila + $altolinea;
$pdf->SetXY(10, $fila);
$pdf->SetFont('Arial','',12);
$pdf->Cell(277, 7,utf8_decode(''.$textoSexto3.''),0,0,'J',true);


/**
 * Fin de la primera página del reporte
 */
/**
 * Creamos la segunda página del reporte
 */
$pdf->AddPage('L','A4');
$fila = 20;
$pdf->SetXY(10, $fila);
$pdf->SetFont('Arial','',12);
$pdf->Cell(238,7,utf8_decode(''.$textoDecimoPrimero.''),0,0,'J',true);
$fila = $fila + $altolinea + $altolinea;
$pdf->SetXY(20, $fila);
$pdf->SetFont('Arial','',12);
$pdf->Cell(238, 7,utf8_decode(''.$textoDecimoSegundo.''),0,0,'J',true);
$fila = $fila + $altolinea + $altolinea - 2;
$pdf->SetXY(20, $fila);
$pdf->SetFont('Arial','',12);
$pdf->Cell(238, 7,utf8_decode(''.$textoDecimoTercero.''),0,0,'J',true);
$fila = $fila + $altolinea + $altolinea - 2;
$pdf->SetXY(20, $fila);
$pdf->SetFont('Arial','',12);
$pdf->Cell(238, 7,utf8_decode(''.$textoDecimoCuarto.''),0,0,'J',true);
$fila = $fila + $altolinea + $altolinea - 2;
$pdf->SetXY(20, $fila);
$pdf->SetFont('Arial','',12);
$pdf->Cell(238, 7,utf8_decode(''.$textoDecimoQuinto.''),0,0,'J',true);
$fila = $fila + $altolinea + $altolinea - 2;
$pdf->SetXY(20, $fila);
$pdf->SetFont('Arial','',12);
$pdf->Cell(238, 7,utf8_decode(''.$textoDecimoSexto.''),0,0,'J',true);
$fila = $fila + $altolinea + $altolinea - 2;
$pdf->SetXY(20, $fila);
$pdf->SetFont('Arial','',12);
$pdf->Cell(238, 7,utf8_decode(''.$textoDecimoSeptimo.''),0,0,'J',true);
$fila = $fila + $altolinea + $altolinea - 2;
$pdf->SetXY(20, $fila);
$pdf->SetFont('Arial','',12);
$pdf->Cell(238, 7,utf8_decode(''.$textoDecimoOctavo.''),0,0,'J',true);
$fila = $fila + $altolinea + $altolinea - 2;
$pdf->SetXY(20, $fila);
$pdf->SetFont('Arial','',12);
$pdf->Cell(238, 7,utf8_decode(''.$textoDecimoNoveno.''),0,0,'J',true);
$fila = $fila + $altolinea + $altolinea - 2;
$pdf->SetXY(20, $fila);
$pdf->SetFont('Arial','',12);
$pdf->Cell(238, 7,utf8_decode(''.$textoVigesimo.''),0,0,'J',true);
$fila = $fila + $altolinea + $altolinea;
$pdf->SetXY(10, $fila);
$pdf->SetFillColor(218,77,98);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(120,7,'HORARIO DEL SERVICIO',1,0,'C');
$fila = $fila + 7;
$pdf->SetXY(10, $fila);
$pdf->SetFillColor(218,77,98);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(120,7,'LUNES A VIERNES',1,0,'C',true);
$fila = $fila + 7;
$pdf->SetXY(10, $fila);
$pdf->SetFillColor(218,77,98);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',15);
$pdf->Cell(60,7,utf8_decode('MAÑANAS'),1,0,'C');
$pdf->SetXY(70, $fila);
$pdf->Cell(60,7,utf8_decode('TARDES'),1,0,'C');
$fila = $fila + 7;
$pdf->SetXY(10, $fila);
$pdf->SetFillColor(218,77,98);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',15);
$pdf->Cell(60,7,utf8_decode('6:45 - 12:00'),1,0,'C');
$pdf->SetXY(70, $fila);
$pdf->Cell(60,7,utf8_decode('12:00 - 17:15'),1,0,'C');
$fila = $fila + 7;
$pdf->SetXY(10, $fila);
$pdf->SetFillColor(218,77,98);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(60,7,utf8_decode('APERTURA:'),1,0,'C',true);
$pdf->SetXY(70, $fila);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(60,7,utf8_decode('CIERRE:'),1,0,'C',true);
$fila = $fila + 7;
$pdf->SetXY(10, $fila);
$pdf->SetFillColor(218,77,98);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',15);
$pdf->Cell(60,7,utf8_decode('6:45'),1,0,'C');
$pdf->SetFont('Arial','',15);
$pdf->SetXY(70, $fila);
$pdf->Cell(60,7,utf8_decode('17:15 '),1,0,'C');
$pdf->Ln(10);

/**
 * Fin de la segunda página del reporte.
 */
/**
 * Creamos la tercera página del reporte.
 */
/**
 * Comprobamos si hay aperturas extraordinarias en el mes del informe
 */
$mesinforme = $esnmes;
$anoinforme = $esnanio;
$valnmes = (int) $esnmes;
$valnanio = (int) $esnmes;


//    $lasql = "SELECT COUNT(*) FROM AperturasExtra WHERE MONTH(AeFecha) = .$esnmes. AND YEAR(AeFecha) = .$esnanio. AND AeCentro = .$centro.";
//    $result = mysqli_query($conn, $lasql);
//    $row = mysqli_fetch_array($result);
//    $contador = $row[0];
$stmt = $conn->prepare("SELECT COUNT(*) FROM AperturasExtra
                                  WHERE MONTH(AeFecha) = ?
                                  AND YEAR(AeFecha) = ?
                                  AND AeCentro = ?");
$stmt->bind_param("iii", $esnmes, $esnanio, $centro);
$stmt->execute();
$stmt->bind_result($contador);
$stmt->fetch();
if($contador > 0){
    $pdf->AddPage('L','A4');
    $fila = 20;
    //Encabezado de la tabla
    $pdf->SetXY(10, $fila);
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(277,7,utf8_decode('RELACIÓN DE APERTURAS EXTRAORDINARIAS'),1,0,'C');
    $fila += 7;
    $pdf->SetFillColor(218,77,98);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',15);
    $pdf->SetXY(10, $fila);
    $pdf->Cell(30,7,utf8_decode('FECHA'),1,0,'C',true);
    $pdf->Cell(40,7,utf8_decode('HORA INICIO'),1,0,'C',true);
    $pdf->Cell(40,7,utf8_decode('HORA FINAL'),1,0,'C',true);
    $pdf->Cell(167,7,utf8_decode('SERVICIO PRESTADO'),1,0,'C',true);
    $fila += 7;
    $pdf->SetXY(10, $fila);
    $pdf->SetFillColor(255, 255, 255);
    /**
     * Debo añadir aqui la consulta a la tabla AperturasExtra para el mes, año y centro seleccionado.
     * Ahora sigo a pelo con los de Julio para emitir el informe
     */
    $pdf->Cell(30,7, utf8_decode("25/07/2025"), 1, 0, 'C', true);
    $pdf->Cell(40,7,utf8_decode('17:15'),1,0,'C',true);
    $pdf->Cell(40,7,utf8_decode('18:45'),1,0,'C',true);
    $pdf->SetFont('Arial','',15);
    $pdf->Cell(167,7,utf8_decode('Rotura tubería baño planta baja'),1,0,'C',true);
    $pdf->SetFont('Arial','',15);

}
$pdf->AddPage('L','A4');
$fila = 20;
// Encabezado de la tabla
$pdf->SetXY(10, $fila);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(277,7,utf8_decode('PERSONAL ADSCRITO AL SERVICIO'),1,0,'C');
$fila += 7;
$pdf->SetFillColor(218,77,98);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(10, $fila);
$pdf->SetFont('Arial','',15);
$pdf->Cell(138,7,utf8_decode('APELLIDOS Y NOMBRE'),1,0,'C',true);
$pdf->SetXY(149, $fila);
$pdf->Cell(138,7,utf8_decode('PUESTO / CARGO'),1,0,'C',true);
$fila += 7; // Incrementamos $fila para la primera fila de datos
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs', 'Pass@LIr0S', 'Conlabac');
mysqli_set_charset($conn, "utf8");
// Consulta SQL corregida
// Asegúrate que $centro sea numérico, si no, usa comillas:
// $sql = "SELECT ... WHERE Usucentro = '$centro' AND UsuTipo = 'U'";
$sql = "SELECT UsuApellidoUno, UsuApellidoDos, UsuNombre, UsuCargo FROM Usuarios WHERE Usucentro = " . $centro . " AND UsuTipo = 'U'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        if($fila >= 169){ // Salto de página si es necesario
            $pdf->AddPage('L','A4');
            $fila = 20;
            // Encabezado de la tabla
            $pdf->SetXY(10, $fila);
            $pdf->SetFont('Arial','B',15);
            $pdf->Cell(277,7,utf8_decode('PERSONAL ADSCRITO AL SERVICIO'),1,0,'C');
            $fila += 7;
            $pdf->SetFillColor(218,77,98);
            $pdf->SetTextColor(0,0,0);
            $pdf->SetXY(10, $fila);
            $pdf->SetFont('Arial','',15);
            $pdf->Cell(138,7,utf8_decode('APELLIDOS Y NOMBRE'),1,0,'C',true);
            $pdf->SetXY(149, $fila);
            $pdf->Cell(138,7,utf8_decode('PUESTO / CARGO'),1,0,'C',true);
            $fila += 7; // Incrementamos $fila para la primera fila de datos
            $pdf->SetFillColor(255,255,255);
            $pdf->SetTextColor(0,0,0);
        }
        $pdf->SetXY(10, $fila); // Posición para los datos
        $pdf->Cell(138,7,utf8_decode($row['UsuApellidoUno'].' '.$row['UsuApellidoDos'].' '.$row['UsuNombre']),1,0,'L');
        $pdf->SetXY(149, $fila);
        $pdf->Cell(138,7,utf8_decode($row['UsuCargo']),1,0,'C');
        $fila += 7; // Incrementamos $fila para la siguiente fila
        //$pdf->SetFont('Arial','',15);
        //$pdf->Cell(130,7,utf8_decode(''),1,0,'L');
    }
}
/**
 * Fin de la tercera página del reporte.
 */
/**
 * Creamos la cuarta página del reporte.
 */
$pdf->AddPage('L','A4');
$fila = 20;
// Encabezado
$pdf->SetXY(10, $fila);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(277,7,utf8_decode('RELACIÓN DE INCIDENCIAS DEL SERVICIO'),1,0,'C');
$fila += 7;
$pdf->SetFillColor(218,77,98);
$pdf->SetTextColor(255);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(10, $fila);
$pdf->Cell(20,7,utf8_decode('FECHA'),1,0,'C',true);
$pdf->SetXY(30, $fila);
$pdf->Cell(15,7,utf8_decode('HORA'),1,0,'C',true);
$pdf->SetXY(45, $fila);
$pdf->Cell(30,7,utf8_decode('COMUNICADO A'),1,0,'C',true);
$pdf->SetXY(75, $fila);
$pdf->Cell(20,7,utf8_decode('FORMA'),1,0,'C',true);
$pdf->SetXY(95, $fila);
$pdf->Cell(40,7,utf8_decode('COMUNICADO POR'),1,0,'C',true);
$pdf->SetXY(135, $fila);
$pdf->Cell(152,7,utf8_decode('INCIDENCIA'),1,0,'C',true);
$fila += 7;
// Conexión a la base de datos
$conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs', 'Pass@LIr0S', 'Conlabac');
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");
// Consulta SQL (corregida) - Asegúrate de que $esmesanio tenga el formato correcto para tu campo IncFecha
$sql2 = "SELECT IncFecha, IncHora, IncTexto, IncComunicadoA, IncModoComunica, IncUsuario 
        FROM Incidencias 
        WHERE IncCentro = " . $centros . " AND IncFecha LIKE '" .$esmesanio."' ORDER BY IncFecha ASC, IncHora ASC";
// Imprimir la consulta para depuración (opcional)
// echo $sql2;
$result = mysqli_query($conn, $sql2);
if (!$result) {
    die("Error en la consulta: " . mysqli_error($conn));
}
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0);
$num_filas = mysqli_num_rows($result);
$contador = 0;
if(mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $contador++;
        $pdf->SetFont('Arial','',10);
        $pdf->SetXY(10, $fila); // X = 20
        $pdf->Cell(20,7,utf8_decode($row['IncFecha']),1,0,'C');
        $pdf->SetXY(30, $fila);  // X = 20 + 20 = 40
        $pdf->Cell(15,7,utf8_decode($row['IncHora']),1,0,'C');
        $pdf->SetXY(45, $fila); //  X = 40 + 20 = 60
        $pdf->SetFont('Arial','',6);
        $pdf->Cell(30, 7, utf8_decode($row['IncComunicadoA']), 1, 0, 'J');
        $pdf->SetXY(75, $fila);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(20, 7, utf8_decode($row['IncModoComunica']), 1, 0, 'C');
        $pdf->SetFont('Arial','',7);
        $pdf->SetXY(95, $fila);
        $pdf->Cell(40, 7, utf8_decode($row['IncUsuario']), 1, 0, 'C');
        $pdf->SetXY(135, $fila);
        $pdf->SetFont('Arial','',7);
        $textoTruncado = substr($row['IncTexto'], 0, 128);
        $pdf->Cell(152, 7, utf8_decode(''.$textoTruncado.''), 1, 'J');
        //$pdf->MultiCell(130, 7, utf8_decode($row['IncTexto']), 1, 'J');
        //$fila = $pdf->GetY(); // Obtiene la posición Y después del
        if($fila >= 176) {
            $pdf->AddPage('L','A4');
            $fila = 20;
            $pdf->SetXY(10, $fila);
            $pdf->SetFont('Arial','B',15);
            $pdf->Cell(277,7,utf8_decode('RELACIÓN DE INCIDENCIAS DEL SERVICIO'),1,0,'C');
            $fila += 7;
            $pdf->SetFillColor(218,77,98);
            $pdf->SetTextColor(255);
            $pdf->SetFont('Arial','',10);
            $pdf->SetXY(10, $fila);
            $pdf->Cell(20,7,utf8_decode('FECHA'),1,0,'C',true);
            $pdf->SetXY(30, $fila);
            $pdf->Cell(15,7,utf8_decode('HORA'),1,0,'C',true);
            $pdf->SetXY(45, $fila);
            $pdf->Cell(30,7,utf8_decode('COMUNICADO A'),1,0,'C',true);
            $pdf->SetXY(75, $fila);
            $pdf->Cell(20,7,utf8_decode('FORMA'),1,0,'C',true);
            $pdf->SetXY(95, $fila);
            $pdf->Cell(40,7,utf8_decode('COMUNICADO POR'),1,0,'C',true);
            $pdf->SetXY(135, $fila);
            $pdf->Cell(152,7,utf8_decode('INCIDENCIA'),1,0,'J',true);
            $fila += 7;
        }
        $fila += 7;
    }
}
/**
 * Fin de la cuarta página del reporte.
 */
/**
 * Creamos la quinta página del reporte.
 * Esta quinta página está dedicada a la estadística de visitas.
 */
$pdf->AddPage('L','A4');
$fila = 20;
$pdf->SetXY(10, $fila);
$pdf->SetFillColor(218,77,98);
$pdf->SetTextColor(255);
$pdf->SetFont('Arial', 'B', 12);
//Conectamos bbdd para obtener el número de registros de las visitas.
$conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs', 'Pass@LIr0S',
    'Conlabac');
mysqli_set_charset($conn, "utf8");
$elsql = "SELECT COUNT(*) AS Total FROM Movadoj WHERE MovCentro = $centros AND MovFechaEntrada LIKE '$esmesanio'";
$result = mysqli_query($conn, $elsql);
if($result){
    $row = mysqli_fetch_assoc($result);
    $totalconteoderegistros = $row['Total'];
}
// Anchuras de las columnas (suman 277, el ancho total)
$anchoDestino = 197;  // Aumentado
$anchoVeces = 40;    // Aumentado
$anchoPorcentaje = 40; // Aumentado

$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(277,7,utf8_decode('Total Visitas recibidas en el mes de '.$esmes. ' es de '.$totalconteoderegistros),1,0,'C',true);
$fila += 7;
$pdf->SetFillColor(218,77,98);
$pdf->SetTextColor(255);
$pdf->SetFont('Arial','', 12);
$pdf->SetXY(10, $fila);
$pdf->Cell($anchoDestino, 7 , utf8_decode('VISITAN A:'), 1, 0, 'C', true);
$pdf->SetXY(10 + $anchoDestino, $fila);
$pdf->Cell($anchoVeces, 7, utf8_decode('VECES:'), 1, 0, 'C', true);
$pdf->SetXY(10 + $anchoDestino + $anchoVeces, $fila);
$pdf->Cell($anchoPorcentaje, 7, utf8_decode('PORCENTAJE:'), 1, 0, 'C', true);
$fila += 7;

//Consulta obtimizada para obtener el núero de visitas y el porcentaje directamente
$lasql = "SELECT MovDestino, COUNT(*) AS num_visitas, 
                (COUNT(*) * 100.0 / $totalconteoderegistros) AS porcentaje
             FROM Movadoj 
             WHERE MovCentro = $centros AND MovFechaEntrada LIKE '$esmesanio'
             GROUP BY MovDestino"; // Agrupamos por destino
$resultadolasql = mysqli_query($conn, $lasql);
//Mostrar resultados en la tabla
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
while($mostrar = mysqli_fetch_assoc($resultadolasql)){
    $pdf->SetXY(10, $fila);
    $pdf->Cell($anchoDestino, 7, utf8_decode($mostrar['MovDestino']), 1, 0, 'L');

    $pdf->SetXY(10 + $anchoDestino, $fila);
    $pdf->Cell($anchoVeces, 7, utf8_decode($mostrar['num_visitas']), 1, 0, 'C');

    $pdf->SetXY(10 + $anchoDestino + $anchoVeces, $fila);
    $porcentajeFormateado = round($mostrar['porcentaje'], 2) . '%'; // Agregamos el signo de porcentaje
    $pdf->Cell($anchoPorcentaje, 7, $porcentajeFormateado, 1, 0, 'C');


    $fila += 7;

}


$pdf->Output();







?>