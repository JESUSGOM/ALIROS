<?php  
    require_once("db.php");
    //header('Content-Type: text/html; charset=ISO-8859-1');
    require_once("include/header.php");
    require_once("variables.php");
?>
<div class="container p-4">
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
            $estaidentificado = strval($identifico);
            $estaidentificacion = "**".substr($estaidentificado,2,2)."*".substr($estaidentificado,5,1)."**".substr($estaidentificado,8,1);
            $fecha = date("Ymd");
            //echo var_dump($_POST);
            $laquery = "SELECT * FROM Movadoj 
            WHERE MovCentro = '" .$numero. "' AND MovFechaEntrada = '" .$fecha. "' AND MovFechaSalida IS NULL ORDER BY NovNombre ASC'";
            $resultado = mysqli_query($conn, $laquery);
            print"<p><b>$cenden $espacio Usuario-></b> $estaidentificacion $espacio $apell1 $espacio $apell1 $coma $nom</p>";
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
                    <input type="submit" class="btn btn-success btn-block"
                    name="generalvisitantes" value="General de Visitantes">
                </form>
                <form action="" method="POST">
                    <input type="submit" class="btn btn-success btn-block"
                    disabled name="" value="">   
                </form>
                <form action="lisgralmovi.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apell1;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apell2;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nom;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $cenden;?>"/>
                    <input type="hidden" name="num" value="<?php echo $numero;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="generalconmovimientos" value="General con Movimientos">   
                </form>
                <form action="" method="POST">
                    <input type="submit" class="btn btn-success btn-block"
                    disabled name="" value="">   
                </form>
                form action="entrefechas.php" method="POST">
                    <input type="hidden" name="apu" value="<?php echo $apell1;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apell2;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nom;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $cenden;?>"/>
                    <input type="hidden" name="num" value="<?php echo $numero;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="submit" class="btn btn-success btn-block"
                    name="generalconmovimientos" value="General con Movimientos Fechas">   
                </form>
                <form action="" method="POST">
                    <input type="submit" class="btn btn-success btn-block"
                    disabled name="" value="">   
                </form>
            </div>
        </div>
        
        
    </div>
    
</div>