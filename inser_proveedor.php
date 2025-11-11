<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
    require_once("db.php");
    //require_once("include/header.php");
    require_once("variables.php");
    header('Content-Type: text/html; charset=UTF-8');
    //error_reporting(E_ALL);
    //ini_set('display_errors', 1);
    //Verificar conexión
    
    
    //$conn->conectar();
    
    
    //session_start();
    $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Mi-@cc3s0-es-p@ra-@L1R0!','Conlabac');
    mysqli_set_charset($conn, "utf8");
    if($conn->connect_error){
        die("Fallo en la conexión: " . $conn->connect_error);
    }
    
    //var_dump($_POST);
    //$_POST[''];
    $apellidoUno = $_POST['apu'];
    $apellidoDos = $_POST['apd'];
    $nom = $_POST['nombre'];
    $centro = $_POST['centro'];
    //echo "<br/>";
    $numero = $_POST['numero'];
    $cif = $_POST['prdCif'];
    //echo "<br/>";
    $email = $_POST['prdEmail'];
    //echo "<br/>";
    $denominacion = $_POST['prdDenominacion'];
    //echo "<br/>";
    $contacto = $_POST['prdContacto'];
    //echo "<br/>";
    $telefono = $_POST['prdTelefono'];
    //echo "<br/>";
    $url = $_POST['url'];
    //echo "<br/>";
    $direccion = $_POST['prdDireccion'];
    //echo "<br/>";
    $pais = $_POST['pais'];
    //echo "<br/>";
    $provincia = $_POST['provincia'];
    //echo "<br/>";
    $municipio = $_POST['municipio'];
    //echo "<br/>";
    $codigopostal = $_POST['prdCodigo_postal'];
    //echo "<br/>";
    $nota = $_POST['prdNotas'];
    //echo "<br/>";
    $fechaalta = $_POST['prdFecha_alta'];
    //echo "<br/>";
    $fechaexpiracion = $_POST['prdFechaExpiracion'];
    //echo "<br/>";

    //echo "Provincia con código = " . $provincia;
    $obtenerProvincia = "SELECT Provincia FROM Provincias WHERE idProvincia = $provincia";
    
    //echo "<br/>";
    //echo $obtenerProvincia;
    $resultadoProvincia = mysqli_query($conn, $obtenerProvincia);
    while($mostrar = mysqli_fetch_array($resultadoProvincia)) {
        $nombreObtenido = $mostrar[0];
    }

    
    //echo "<br/>";
    //echo $nombreObtenido;
    $obtenerMunicipio = "SELECT Municipio FROM Municipios WHERE idMunicipio = $municipio";
    $resultadoMunicipio = mysqli_query($conn, $obtenerMunicipio);
    while($mostramos = mysqli_fetch_array($resultadoMunicipio)){
        $nombreMunicipio = $mostramos[0];
    }
    //echo "<br/>";
    //echo $nombreMunicipio;
    /**
    *$query = "INSERT INTO Proveedores (PrdCif, PrdCentro, PrdDenominacion, PrdContacto, 
    *    PrdTelefono, PrdEmail, PrdDireccion, PrdProvincia, PrdMunicipio, PrdPais, 
    *    PrdCodigopostal, PrdWeb, PrdNotaas)
    *VALUES('".$cif."','".$numero."','".$denominacion."','".$contacto."',
    *'".$telefono."','".$email."','".$direccion."',".$provincia."','".$municipio."','".$pais."',
    *'".$codigopostal."','".$url."','".$nota."')";
    */
    $query = "INSERT INTO Proveedores (PrdCif, PrdCentro, PrdDenominacion, PrdContacto, PrdTelefono, PrdEmail,
    PrdDireccion, PrdProvincia, PrdMunicipio, PrdPais, PrdCodigopostal, PrdWeb, PrdNotas, PrdFechaAlta,
    PrdFechaExpiracion) 
    VALUES('".$cif."','".$numero."','".$denominacion."','".$contacto."','".$telefono."','".$email."'
    ,'".$direccion."','".$nombreObtenido."','".$nombreMunicipio."','".$pais."','".$codigopostal."','".$url."'
    ,'".$nota."','".$fechaalta."','".$fechaexpiracion."')";

    //echo $query;

    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Error de la insesión: " . mysqli_error($conn));
    }
    
    //"<a href=\"javascript:history.go(-2)\">GO BACK</a>";
    //mysqli_query($conn, $query);
    header("Location: principalitc.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nom & cen=$centro & num=$numero");
    //header("location: principalitc.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nom & cen=$centro & num=$numero");
?>
   

</body>
</html>

