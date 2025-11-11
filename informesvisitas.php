<?php  
    require_once("db.php");
    //header('Content-Type: text/html; charset=ISO-8859-1');
    require_once("include/header.php");
    require_once("variables.php");
?>
<div class="container-flex">
    <div class="row">
        <?php
            $espacio = " ";
            $coma = ", ";
            $apell1 = $_POST['apu'];
            if($apell1 == ""){
                echo "Parametro inexistente";
            }
            $apell2 = $_POST['apd'];
            $nom = $_POST['nom'];
            $cenden = $_POST['cen'];
            $numero = $_POST['num'];
            $identifico = $_POST['ide'];
            $rolusuario = $_POST['rol'];
            $cargoUsuario = $_POST['cargo'];
            $estaidentificado = strval($identifico);
            $estaidentificacion = "**".substr($estaidentificado,2,2)."*".substr($estaidentificado,5,1)."**".substr($estaidentificado,8,1);
            $fecha = date("Ymd");
            if($rolusuario == "Z"){
                $super = "SUPERUSUARIO";
            } else {
                $super = "";
            }        
            
            
            //echo var_dump($_POST);
            $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Mi-@cc3s0-es-p@ra-@L1R0!','Conlabac');
            mysqli_set_charset($conn, "utf8");
            $laquery = "SELECT * FROM Movadoj 
            WHERE MovCentro = '" .$numero. "' AND MovFechaEntrada = '" .$fecha. "' AND MovFechaSalida IS NULL ORDER BY NovNombre ASC'";
            $resultado = mysqli_query($conn, $laquery);
        print"
                <p>
                    <b>
                        $espacio $cenden 
                        $espacio Usuario->
                    </b>
                    $estaidentificacion $espacio 
                    $apell1 $espacio 
                    $apell2 $coma 
                    $nom $espacio 
                    $espacio $super
                    $espacio $cargoUsuario
                </p>";
        ?>
        
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body">
                <form action="" method="POST">
                    <input type="submit" class="btn btn-success btn-block"
                    disabled name="" value="">
                </form>
                <form action="listadogeneralvisitantes.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apell1;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apell2;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nom;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $cenden;?>"/>
                    <input type="hidden" name="num" value="<?php echo $numero;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="generalvisitantes" value="General de Visitantes">
                </form>
                <form action="" method="POST">
                    <input type="submit" class="btn btn-success btn-block"
                    disabled name="" value="">
                </form>
                <form action="lisgraljmovi2.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apell1;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apell2;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nom;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $cenden;?>"/>
                    <input type="hidden" name="num" value="<?php echo $numero;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="rol" value="<?php echo $rolusuario;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="generalconmovimientos" value="General con Movimientos">
                </form>
                
                <form action="" method="POST">
                    <input type="submit" class="btn btn-success btn-block"
                    disabled name="" value="">
                </form>
                <input style="background-color: #489F48; font-weight:bold;" type="button" 
                onclick="history.back()" name="Página anterior" value="Página anterior">
            </div>
        </div>
        
        
    </div>
    
</div>
<!--<div class="footer" style="background-color: black; position: absolute; bottom: 0; width: 100%; height: 40px; color: white; text-align: center;">
    &copy; 2020-2025 Gombeth Software's
</div>-->