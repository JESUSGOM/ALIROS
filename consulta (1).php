<?php
    include("db.php");
    include("variables.php");
    require 'include/user_sesion.php';
    //header('Content-Type: text/html; charset=ISO-8859-1');
    $tipo = '';
    if (isset($_POST["entrada"])){
        echo var_dump($_POST);
        echo "recibiendo datos";
        $usuariorecibido = $_POST["usuario"];
        $laclaverecibida = $_POST["clave"];
        $MayUsu = strtoupper($usuariorecibido);
        $Maycla = strtoupper($laclaverecibida);
        echo $usuariorecibido;
        echo nl2br("\n");
        echo $laclaverecibida;
        echo nl2br("\n");
        echo $MayUsu;
        echo nl2br("\n");
        echo $Maycla;
        echo nl2br("\n");
        $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Mi-@cc3s0-es-p@ra-@L1R0!','Conlabac');
        mysqli_set_charset($conn, "utf8");
        $query = "SELECT UsuDni, UsuClave, UsuCentro, UsuNombre, UsuApellidoUno, UsuApellidoDos, 
        UsuTipo FROM Usuarios 
        WHERE UsuDni = '".$MayUsu."' AND UsuClave = '".$Maycla."'";
        echo nl2br("\n");
        echo "la query es = ";
        echo nl2br("\n");
        echo $query;
        echo nl2br("\n");

        $resultado = mysqli_query($conn, $query);
        if($resultado = mysqli_query($conn, $query)){
            while($fila = mysqli_fetch_row($resultado)){
                echo $fila[0];
                echo nl2br("\n");
                echo $fila[1];
                echo nl2br("\n");
                echo $fila[2];
                echo nl2br("\n");
                echo $fila[3];
                echo nl2br("\n");
                echo $fila[4];
                echo nl2br("\n");
                echo $fila[5];
                echo nl2br("\n");
                echo $fila[6];
                echo nl2br("\n");
                $usuariorecibido = $fila[0];
                $laclaverecibida = $fila[1];
                $centro = $fila[2];
                $nombre = $fila[3];
                $apellidoUno = $fila[4];
                $apellidoDos = $fila[5];
                $tipo = $fila[6];
                
                echo "El tipo es = ";
                echo $tipo;
                session_start();
                $_SESSION["usuario"] = $usuariorecibido;
                $_SESSION["suclave"] = $laclaverecibida;
                $_SESSION["centro"] = $centro;
                $_SESSION["nombre"] = $nombre;
                $_SESSION["apellidoUno"] = $apellidoUno;
                $_SESSION["apellidoDos"] = $apellidoDos;
                $_SESSION["tipo"] = $tipo;
                $_SESSION["iniciada"] = true;
                echo nl2br("\n");
                print "<p>$_SESSION[tipo]</p>";
                echo $_SESSION["tipo"];
                print "<p> $tipo </p>";
                $nombreCompleto = $apellidoUno + " " + $apellidoDos + ", " + $nombre;
                echo $nombreCompleto;
            }
            $usulog = new UserSession($usuariorecibido, $laclaverecibida, $nombre,
            $apellidoUno, $apellidoDos, $tipo, $centro);
            echo nl2br("\n");
            echo $tipo;
            echo " <-> ";
            echo $apellidoDos;
            $query2 = "SELECT CenDen FROM Centros WHERE CenId = '".$centro."'";
            if($resultados = mysqli_query($conn, $query2)){
                while($fila2 = mysqli_fetch_array($resultados)){
                    $centroNombre = $fila2[0];
                }
            }
            $usulog->ponNombreAlCentro($centro, $centroNombre);
            
            if($tipo == "U"){
                $destinatario = "conserjeriaitc@laborsordtic.org";
                $iplocal = strval($_SERVER['REMOTE_ADDR']);
                if($centro == 1){
                    $remitente = $nombre;
                    $emailremite = 'conserjeriaitc@laborsordtic.org';
                    $destinatario = "conserjeriaitc@laborsordtic.org";
                    $asunto = "Acceso en Aliros WEB TF";
                    $cuerpo = 'JHola, soy ' .$nombre. ' del ITC de Tenerife. \n Informarte que he accedido a la aplicación ALIROS en la fecha y hora indicada en este email. \n Saludos.';
                    echo $iplocal;
                    //header("location: enviamoscorreo.php?nomrem=$remitente & emarem=$emailremite & emades=$emailremite & asunto=$asunto & cuerpo=$cuerpo");
                    if($iplocal == "213.231.80.31"){
                        header("location: principal.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nombre & cen=$centroNombre & num=$centro & ide=$usuariorecibido");
                    } else {
                        header("locatioon: index.php");
                    }
                }
                if($centro == 2){
                    $remitente = $nombre;
                    $emailremite = 'conserjeriaitc@laborsordtic.org';
                    $destinatario = "conserjeriaitc@laborsordtic.org";
                    $asunto = "Acceso en Aliros GC";
                    $cuerpo = "JHola, soy " + $nombre + " del ITC de Las Palmas. \n Informarte que he accedido a la aplicación ALIROS en la fecha y hora indicada en este email. \n Saludos.";
                    echo $iplocal;
                    if($iplocal == "62.174.94.163"){
                        header("location: principal.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nombre & cen=$centroNombre & num=$centro & ide=$usuariorecibido");
                    } else {
                        header("locatioon: index.php");
                    }
                }
                
                //header("location: principal.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nombre & cen=$centroNombre & num=$centro & ide=$usuariorecibido");
            }
            if($tipo == "P"){
                if($centro == 1){
                    $remitente = $nombre;
                    $emailremite = 'conserjeriaitc@laborsordtic.org';
                    $destinatario = "conserjeriaitc@laborsordtic.org";
                    $asunto = "Acceso en Aliros WEB TF";
                    $cuerpo = 'JHola, soy ' .$nombre. ' del ITC de Tenerife. \n Informarte que he accedido a la aplicación ALIROS en la fecha y hora indicada en este email. \n Saludos.';
                    header("location: enviamoscorreo.php?nomrem=$remitente & emarem=$emailremite & emades=$emailremite & asunto=$asunto & cuerpo=$cuerpo");
                }
                if($centro == 2){
                    $remitente = $nombre;
                    $emailremite = 'conserjeriaitc@laborsordtic.org';
                    $destinatario = "conserjeriaitc@laborsordtic.org";
                    $asunto = "Acceso en Aliros GC";
                    $cuerpo = "JHola, soy " + $nombre + " del ITC de Las Palmas. \n Informarte que he accedido a la aplicación ALIROS en la fecha y hora indicada en este email. \n Saludos.";
                    header("location: enviamoscorreo.php?nomrem=$remitente & emarem=$emailremite & emades=$emailremite & asunto=$asunto & cuerpo=$cuerpo");
                }
                
                header("location: principal.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nombre & cen=$centroNombre & num=$centro & ide=$usuariorecibido");
            }
            if($tipo == "T"){
                header("principalUno.php");
                die();
            }   
            if($tipo == "A"){
                header("location: principal3.php?apu=$apellidoUno $ apd=$apellidoDos & nom=$nombre & cen=$centroNombre & num=$centro & ide=$usuariorecibido");
            }
        }
        if($resultado <> mysqli_query($conn, $query)){
            echo '<script>alert("Usuario y/o contraseña incorrectos")</script>';
            header("location: index.php");
        }
        
        
    } 
    
        
        /*header("Location: principal.php");*/
?>