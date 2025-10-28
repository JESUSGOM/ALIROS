<?php
    include("db.php");
    include("variables.php");
    require 'include/user_sesion.php';
    $tipo = '';
    $ipen = '';
    echo var_dump($_POST);
    $usuariorecibido = $_POST['usuario'];
    $claverecibida = $_POST['clave'];
    $MayUsu = strtoupper($usuariorecibido);
    $Maycla = strtoupper($claverecibida);
    //echo nl2br("\n");
    //echo "Usuario recibido ".$usuariorecibido;
    //echo nl2br("\n");
    //echo "Contraseña llega ".$claverecibida;
    $iplocal = strval($_SERVER['REMOTE_ADDR']);
    echo nl2br("\n");
    echo $iplocal;
    echo nl2br("\n");
    //echo nl2br("\n");
    //echo "Ip capturada = ".$iplocal;
    //Si la ip es de gran canaria y son estos codigos de entrada
    if($iplocal == "62.174.94.163"){
        if((strtoupper($usuariorecibido) == "44306265P") ||
            (strtoupper($usuariorecibido) == "35035003T") ||
            (strtoupper($usuariorecibido) == "42789192S") ||
            (strtoupper($usuariorecibido) == "42863837W") ||
            (strtoupper($usuariorecibido) == "44707763H"))
            {
                $query = "SELECT UsuDni, UsuClave, UsuCentro, UsuNombre, UsuApellidoUno, UsuApellidoDos, 
                        UsuTipo FROM Usuarios 
                        WHERE UsuDni = '".$MayUsu."' AND UsuClave = '".$Maycla."'";
                $resultado = mysqli_query($conn, $query);
                while($fila = mysqli_fetch_row($resultado)){
                    $usuarioverificado = $fila[0];
                    $claveverificada = $fila[1];
                    $centro = $fila[2];
                    $nombre = $fila[3];
                    $apellidoUno = $fila[4];
                    $apellidoDos = $fila[5]; 
                    $tipoUsuario = $fila[6];
                    $q2 = "SELECT * FROM Centros WHERE CenId = '".$centro."'";
                    $res2 = mysqli_query($conn, $q2);
                    while($lin = mysqli_fetch_row($res2)){
                        $centroNombre = $lin[1];
                    }
                }
            }
        //header("location: principal.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nombre & cen=$centroNombre & num=$centro & ide=$usuarioverificado");
    }
    //Si la ip es de gran canaria y son estos codigos de entrada
    if($iplocal == "88.26.225.144"){
        if((strtoupper($usuariorecibido) == "38038009T") ||
            (strtoupper($usuariorecibido) == "42063964T") ||
            (strtoupper($usuariorecibido) == "42789192S") ||
            (strtoupper($usuariorecibido) == "43809916E"))
            { 
                $query = "SELECT UsuDni, UsuClave, UsuCentro, UsuNombre, UsuApellidoUno, UsuApellidoDos, 
                        UsuTipo FROM Usuarios 
                        WHERE UsuDni = '".$MayUsu."' AND UsuClave = '".$Maycla."'";
                $resultado = mysqli_query($conn, $query);
                while($fila = mysqli_fetch_row($resultado)){
                    $usuarioverificado = $fila[0];
                    $claveverificada = $fila[1];
                    $centro = $fila[2];
                    $nombre = $fila[3];
                    $apellidoUno = $fila[4];
                    $apellidoDos = $fila[5]; 
                    $tipoUsuario = $fila[6];
                    $q2 = "SELECT * FROM Centros WHERE CenId = '".$centro."'";
                    $res2 = mysqli_query($conn, $q2);
                    while($lin = mysqli_fetch_row($res2)){
                        $centroNombre = $lin[1];
                    }
                }    
            }
        //header("location: principal.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nombre & cen=$centroNombre & num=$centro & ide=$usuarioverificado");   
    }
    //Sin capturar la IP y el usuario es
    if((strtoupper($usuariorecibido) == "42086955Z") || (strtoupper($usuariorecibo) == "42086599A")){
         $query = "SELECT UsuDni, UsuClave, UsuCentro, UsuNombre, UsuApellidoUno, UsuApellidoDos, 
                    UsuTipo FROM Usuarios 
                    WHERE UsuDni = '".$MayUsu."' AND UsuClave = '".$Maycla."'";
            $resultado = mysqli_query($conn, $query);
            while($fila = mysqli_fetch_row($resultado)){
                $usuarioverificado = $fila[0];
                $claveverificada = $fila[1];
                $centro = $fila[2];
                $nombre = $fila[3];
                $apellidoUno = $fila[4];
                $apellidoDos = $fila[5]; 
                $tipoUsuario = $fila[6];
                $q2 = "SELECT * FROM Centros WHERE CenId = '".$centro."'";
                $res2 = mysqli_query($conn, $q2);
                while($lin = mysqli_fetch_row($res2)){
                    $centroNombre = $lin[1];
                }
            } 
        //header("location: principal.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nombre & cen=$centroNombre & num=$centro & ide=$usuarioverificado");       
    }
    //Sin capturar la IP y el usuario es
    if((strtoupper($usuariorecibido) == "38501292M")){
        $query = "SELECT UsuDni, UsuClave, UsuCentro, UsuNombre, UsuApellidoUno, UsuApellidoDos, 
                   UsuTipo FROM Usuarios 
                   WHERE UsuDni = '".$MayUsu."' AND UsuClave = '".$Maycla."'";
        $resultado = mysqli_query($conn, $query);
        while($fila = mysqli_fetch_row($resultado)){
            $usuarioverificado = $fila[0];
            $claveverificada = $fila[1];
            $centro = $fila[2];
            $nombre = $fila[3];
            $apellidoUno = $fila[4];
            $apellidoDos = $fila[5]; 
            $tipoUsuario = $fila[6];
            $q2 = "SELECT * FROM Centros WHERE CenId = '".$centro."'";
            $res2 = mysqli_query($conn, $q2);
            while($lin = mysqli_fetch_row($res2)){
                $centroNombre = $lin[1];
            }
        } 
        //header("location: principal3.php?apu=$apellidoUno $ apd=$apellidoDos & nom=$nombre & cen=$centroNombre & num=$centro & ide=$usuariorecibido");       
   }
   switch($iplocal)
   {
        //IP de gran canaria
        case ($iplocal == "62.174.94.163"):
            if(($usuariorecibido == "44306265P") || ($usuariorecibido == "35035003T") || ($usuariorecibido == "42789192S") || ($usuariorecibido == "42863837W") || ($usuariorecibido == "44707763H")){
                $query = "SELECT UsuDni, UsuClave, UsuCentro, UsuNombre, UsuApellidoUno, UsuApellidoDos, 
                        UsuTipo FROM Usuarios 
                        WHERE UsuDni = '".$MayUsu."' AND UsuClave = '".$Maycla."'";
                $resultado = mysqli_query($conn, $query);
                while($fila = mysqli_fetch_row($resultado)){
                    $usuarioverificado = $fila[0];
                    $claveverificada = $fila[1];
                    $centro = $fila[2];
                    $nombre = $fila[3];
                    $apellidoUno = $fila[4];
                    $apellidoDos = $fila[5]; 
                    $tipoUsuario = $fila[6];
                    $q2 = "SELECT * FROM Centros WHERE CenId = '".$centro."'";
                    $res2 = mysqli_query($conn, $q2);
                    while($lin = mysqli_fetch_row($res2)){
                        $centroNombre = $lin[1];
                    }
                }
                //header("location: principal.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nombre & cen=$centroNombre & num=$centro & ide=$usuarioverificado");
            }
            break;
        case ($iplocal == "88.26.225.144"):
            if(($usuariorecibido == "38038009T") || ($usuariorecibido == "42063964T") || ($usuariorecibido == "42789192S") || ($usuariorecibido == "43809916E")){
                $query = "SELECT UsuDni, UsuClave, UsuCentro, UsuNombre, UsuApellidoUno, UsuApellidoDos, 
                        UsuTipo FROM Usuarios 
                        WHERE UsuDni = '".$MayUsu."' AND UsuClave = '".$Maycla."'";
                $resultado = mysqli_query($conn, $query);
                while($fila = mysqli_fetch_row($resultado)){
                    $usuarioverificado = $fila[0];
                    $claveverificada = $fila[1];
                    $centro = $fila[2];
                    $nombre = $fila[3];
                    $apellidoUno = $fila[4];
                    $apellidoDos = $fila[5]; 
                    $tipoUsuario = $fila[6];
                    $q2 = "SELECT * FROM Centros WHERE CenId = '".$centro."'";
                    $res2 = mysqli_query($conn, $q2);
                    while($lin = mysqli_fetch_row($res2)){
                        $centroNombre = $lin[1];
                    }
                }    
                //header("location: principal.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nombre & cen=$centroNombre & num=$centro & ide=$usuarioverificado");
            }
            break;
        case (($iplocal <> "62.174.94.163") && ($iplocal <> "88.26.225.144")):
            if(($usuariorecibido == "42086955Z") || ($usuariorecibido == "42086599A")){
                if(($usuariorecibido == "38038009T") || ($usuariorecibido == "42063964T") || ($usuariorecibido == "42789192S") || ($usuariorecibido == "43809916E")){
                    $query = "SELECT UsuDni, UsuClave, UsuCentro, UsuNombre, UsuApellidoUno, UsuApellidoDos, 
                            UsuTipo FROM Usuarios 
                            WHERE UsuDni = '".$MayUsu."' AND UsuClave = '".$Maycla."'";
                    $resultado = mysqli_query($conn, $query);
                    while($fila = mysqli_fetch_row($resultado)){
                        $usuarioverificado = $fila[0];
                        $claveverificada = $fila[1];
                        $centro = $fila[2];
                        $nombre = $fila[3];
                        $apellidoUno = $fila[4];
                        $apellidoDos = $fila[5]; 
                        $tipoUsuario = $fila[6];
                        $q2 = "SELECT * FROM Centros WHERE CenId = '".$centro."'";
                        $res2 = mysqli_query($conn, $q2);
                        while($lin = mysqli_fetch_row($res2)){
                            $centroNombre = $lin[1];
                        }
                    }  
                //header("location: principal.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nombre & cen=$centroNombre & num=$centro & ide=$usuarioverificado");  
            }
            if(($usuariorecibido == "38501292M")){
                $query = "SELECT UsuDni, UsuClave, UsuCentro, UsuNombre, UsuApellidoUno, UsuApellidoDos, 
                            UsuTipo FROM Usuarios 
                            WHERE UsuDni = '".$MayUsu."' AND UsuClave = '".$Maycla."'";
                $resultado = mysqli_query($conn, $query);
                while($fila = mysqli_fetch_row($resultado)){
                    $usuarioverificado = $fila[0];
                    $claveverificada = $fila[1];
                    $centro = $fila[2];
                    $nombre = $fila[3];
                    $apellidoUno = $fila[4];
                    $apellidoDos = $fila[5]; 
                    $tipoUsuario = $fila[6];
                    $q2 = "SELECT * FROM Centros WHERE CenId = '".$centro."'";
                    $res2 = mysqli_query($conn, $q2);
                    while($lin = mysqli_fetch_row($res2)){
                        $centroNombre = $lin[1];
                    }
                }  
                //header("location: principal3.php?apu=$apellidoUno $ apd=$apellidoDos & nom=$nombre & cen=$centroNombre & num=$centro & ide=$usuariorecibido");       
            }
            break;
        default:
            echo "";
            break;
   }
        

?>