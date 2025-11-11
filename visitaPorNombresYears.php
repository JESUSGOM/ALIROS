<?php  
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
?>

<div class="container-fluid p-4">
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
            $fecha = date("Ymd");
            $estaidentificado = strval($identifico);
            $estaidentificacion = "**".substr($estaidentificado,2,2)."*".substr($estaidentificado,5,1)."**".substr($estaidentificado,8,1);
            print"<p><b>$cenden $espacio Usuario-></b> $estaidentificacion $espacio $apell1 $espacio $apell2 $coma $nom $espacio $numero</p>";
        ?>
    </div>
    <div class="row" width="50%">
        <div class="col-md-6">
            <!-- Capturamos el año actual en PHP-->
            <form action="vistaPorNombresYearSi.php" method="POST">
                <?php
                    $elActual = date("Y");
                    //echo $elActual;
                    $diferenciaAnos = $elActual - 2020;
                    //echo "<br>";
                    //echo $diferenciaAnos;
                    $difanos = $diferenciaAnos + 1;
                    //echo "<br>";
                    //echo $difanos;
                    echo "<br>";
                    echo "Seleccione el año:";
                    ?>
                    <select name="ejercicio" onchenge="submit()">Indique el año (*) para todos.
                        <?php
                            for($i = 0; $i < $difanos; $i++){
                                //echo "Año ";
                                //echo $i;
                                $mostrarAno = $elActual - $i;
                                //echo " es = ";
                                //echo $mostrarAno;
                                //echo "<br>";
                                ?>
                                <option value="<?php echo $mostrarAno;?>"><?php echo $mostrarAno;?></option>
                                <?php
                            }
                        ?>
                    </select>
                    <input type="hidden" name="apu" value="<?php echo $apell1;?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apell2;?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nom;?>"/>
                    <input type="hidden" name="cen" value="<?php echo $cenden;?>"/>
                    <input type="hidden" name="num" value="<?php echo $numero;?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                    <input type="hidden" name="year" value="<?php echo $mostrarAno;?>"/>
                    <input style="background-color: #489F48; font-weight:bold;" id="Seleccionar" 
                    type="submit" value="Seleccionar">
                </form>
        </div>
    </div>
    <div class="row" width="50%">
        <div class="col-md-6">
            <?php
                echo "<br>";
            ?>
            <form action="" method="POST">
                <input type="hidden" name="apu" value="<?php echo $apell1;?>"/>
                <input type="hidden" name="apd" value="<?php echo $apell2;?>"/>
                <input type="hidden" name="nom" value="<?php echo $nom;?>"/>
                <input type="hidden" name="cen" value="<?php echo $cenden;?>"/>
                <input type="hidden" name="num" value="<?php echo $numero;?>"/>
                <input type="hidden" name="ide" value="<?php echo $identifico;?>"/>
                <input style="background-color: #8ADCEC; font-weight:bold;" type="button" 
                onclick="history.back()" name="Página anterior" value="Página anterior">
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