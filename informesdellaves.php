<?php
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    session_start();
    require 'include/user_sesion.php';
?>
<div class="container">
    <div class="row" width="100%">
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
            $rolUsuario = $_POST['rol'];
            $cargoUsuario = $_POST['car'];
            $fecha = date("Ymd");
            $estaidentificado = strval($identifico);
            $estaidentificacion = "**".substr($estaidentificado,2,2)."*".substr($estaidentificado,5,1)."**".substr($estaidentificado,8,1);
            print"
                <p>
                    <b>
                        $espacio $espacio 
                        $espacio $cenden 
                        $espacio Usuario->
                    </b> 
                    $estaidentificacion $espacio 
                    $apell1 $espacio 
                    $apell2 $coma 
                    $nom $espacio
                    $cargoUsuario
                </p>";
        ?>
    </div>
    <div class="row" width="100%">
        <div class=" col-md-12">
            <div class="card text-center" style="align-items: center;">
                <div class="card-body">
                    <h6 class="card-title">Relación de llaves</h6>
                    <form action="listadogeneraldellaves.php" method="POST">
                        <input type="hidden" name="apu" value="<?php echo $apell1;?>"/>
                        <input type="hidden" name="apd" value="<?php echo $apell2;?>"/>
                        <input type="hidden" name="nom" value="<?php echo $nom;?>"/>
                        <input type="hidden" name="cen" value="<?php echo $cenden;?>"/>
                        <input type="hidden" name="num" value="<?php echo $numero;?>"/>
                        <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                        <input type="hidden" name="rol" value="<?php echo $rolUsuario;?>"/>
                        <input type="hidden" name="car" value="<?php echo $cargoUsuario;?>"/>
                        <input type="submit" class="btn btn-success btn-block" name="listageneralllaves" value="Llaves del centro">
                    </form>
                </div>
            </div>
        </div>
        <div class=" col-md-12">
            <div class="card text-center" style="align-items: center;">
                <div class="card-body">
                    <h6 class="card-title">Movimientos de llaves</h6>
                    <form action="movimientosdellaves.php" method="POST">
                        <input type="hidden" name="apu" value="<?php echo $apell1;?>"/>
                        <input type="hidden" name="apd" value="<?php echo $apell2;?>"/>
                        <input type="hidden" name="nom" value="<?php echo $nom;?>"/>
                        <input type="hidden" name="cen" value="<?php echo $cenden;?>"/>
                        <input type="hidden" name="num" value="<?php echo $numero;?>"/>
                        <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                        <input type="hidden" name="rol" value="<?php echo $rolUsuario;?>"/>
                        <input type="hidden" name="car" value="<?php echo $cargoUsuario;?>"/>
                        <input type="submit" class="btn btn-success btn-block" name="listageneralllaves" value="Llaves">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row" width="100%">
        <div class="col-md-12">
            <div class="card text-center" style="align-items: center;">
                <div class="card-body">
                    <form action="" method="POST">
                        <input type="hidden" name="apu" value="<?php echo $apell1;?>"/>
                        <input type="hidden" name="apd" value="<?php echo $apell2;?>"/>
                        <input type="hidden" name="nom" value="<?php echo $nom;?>"/>
                        <input type="hidden" name="cen" value="<?php echo $cenden;?>"/>
                        <input type="hidden" name="num" value="<?php echo $numero;?>"/>
                        <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                        <input type="hidden" name="rol" value="<?php echo $rolUsuario;?>"/>
                        <input type="hidden" name="car" value="<?php echo $cargoUsuario;?>"/>
                        <div class="row" width="100%">
                            <input style="background-color: #489F48; font-weight:bold;" type="button" 
                            onclick="history.back()" name="Página anterior" value="Página anterior">                        
                        </div>
                    </form>
                <?php
                //echo "<br>";
                $ejercicioElegido = $_POST["ejercicio"];
                $ejercicioElegido = $mostrarAno + "%";
                //echo "Ejercicio seleccionado = $ejercicioElegido";
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<div class="footer" style="background-color: black; position: absolute; bottom: 0; width: 100%; height: 40px; color: white; text-align: center;">
    &copy; 2020-2025 Gombeth Software's
</div>-->