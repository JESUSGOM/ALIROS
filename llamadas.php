<?php  
    require_once("db.php");
    //header('Content-Type: text/html; charset=ISO-8859-1');
    require_once("include/header.php");
    require_once("variables.php");
    require_once("include/footer.php");
    session_start();
    
?>
<script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>

<div class="container p-4">
    <div class="row">
        <?php
            $identifico = $_POST['ide'];
            $espacio = " ";
            $coma = ", ";
            $apellidoUno = $_POST['apu'];
            if($apellidoUno == ""){
                echo "Parametro inexistente";
            }
            $apellidoDos = $_POST['apd'];
            $nombre = $_POST['nom'];
            $centroDen = $_POST['cen'];
            $numero = $_POST['num'];
            $estaidentificado = strval($identifico);
            $estaidentificacion = "**".substr($estaidentificado,2,2)."*".substr($estaidentificado,5,1)."**".substr($estaidentificado,8,1);
            print"<p><b>$espacio $centroDen $espacio Usuario-></b>$estaidentificacion $espacio $apellidoUno $espacio $apellidoDos $coma $nombre</p>";
            $result="";
            if(isset($_POST['llamada'])){
                require 'include/PHPMailerAutoload.php';
                require 'include/class.phpmailer.php';
                $mail = new PHPMailer;
                $mail->Mailer = 'smtp';
                $mail->Host='smtp.gmail.com';
                $mail->Port=587;
                $mail->SMTPAuth=true;
                $mail->SMTPSecure='tls';
                $mail->Username='conserjeriaitc@gmail.com';
                $mail->Password='B38501292';
                $mail->From = 'conserjeriaitc@gmail.com';
                $mail->FromName = $_POST['nom'];
                $mail->Timeout=30;
                $mail->addAddress($_POST['emilio']);
                $mail->isHTML(true);
                $mail->Subject='Aviso de llamda telefónica desde '.$_POST['cen'];
                $cuerpo = "Se ha recibido una llamada telefónica de: ";
                $cuerpo .= $_POST['emisor'];
                $cuerpo .= ', para ';
                $cuerpo .= $_POST['receptor'];
                $cuerpo .= '. \n )';
                $cuerpo .= 'Y le ha dejado un mensaje que dice: ';
                $cuerpo .= $_POST['mensaje'];

                $mail->Body= $cuerpo;
                $mail->AltBody = $cuerpo;
                $exito = $mail->send();
                while(!$exito){
                    echo $mail->ErrorInfo;
                }
                if(!$mail->send()){
                    $result="Algo esta mal, por favor inténtelo de nuevo.";
                }
            }
            
        ?>
    </div>
    <div class="row">
        <div class="card card-body">
            <form action="grabollamadas.php" method="POST" class="form">
                <div class="form-group mx-sm-3">
                    <input type="hidden" name="apu" value="<?php echo $apellidoUno; ?>"/>
                    <input type="hidden" name="apd" value="<?php echo $apellidoDos; ?>"/>
                    <input type="hidden" name="nom" value="<?php echo $nombre; ?>"/>
                    <input type="hidden" name="cen" value="<?php echo $centroDen; ?>"/>
                    <input type="hidden" name="num" value="<?php echo $numero; ?>"/>
                    <input type="hidden" name="ide" value="<?php echo $identifico; ?>"/>
                </div>
                <div class="form-group">
                    <input type="date" name="fecha" class="form-control" autofocus>
                </div>
                <div class="form-group">
                    <input type="time" name="hora" class="form-control" stpep="1">
                </div>
                <div class="form-group">
                    <input type="text" name="emisor" class="form-control"
                    placeholder="Quien llama">
                </div>
                <div class="form-group">
                    <input type="text" name="receptor" class="form-control"
                    placeholder="A quién llama">
                </div>
                <div class="form-group">
                    <input type="textarea" name="mensaje" class="form-control"
                    placeholder="Mensaje">
                </div>
                <div class="form-group">
                    <select name="emilio" id="emilis" class="form-control" size="1">
                        <option value="sincorreo">Elige persona</option>
                        <?php
                            //$qu = "SELECT *, CONCAT(RptNombre, ' ', RptApellidoUno, ' ', RptApellidoDos) As Datos FROM Retposto WHERE RptCentro = '" . $numero. "' 
                            //GROUP BY Datos ORDER BY RptNombre ASC";    
                            $Q2 = "SELECT CONCAT(RptNombre, ' ', RptApellidoUno, ' ', RptApellidoDos), RptEmail FROM `Retposto` WHERE RptCentro = 1 AND RptEmail<>'' ORDER BY RptNombre ASC";
                            $resultado = mysqli_query($conn, $Q2);
                            while($mostrar = mysqli_fetch_array($resultado)) {
                                //echo '<option value='.$mostrar[1].'>'.$mostrar[0].'</option>';
                                //echo '<option value="'.$mostrar[0].'" data-extra="'.$mostrar[1].'">'.$mostrar[0].'</option>';
                                //$valornombre = $mostrar[0];
                                echo '<option value="'.$mostrar[0].' | '.$mostrar[1].'">'.$mostrar[0].'</option>';
                            }
                        ?>   
                    </select>     
                    <!--<input type="hillen" name="nombrereceptor" value="<?php //echo $valornombre;?>"/> -->
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-block" name="llamada" value="Envíar">
                </div>
            </form>
        </div>
        <div class="card card-body">
            <input style="background-color: #489F48; font-weight:bold;" type="button" 
            onclick="history.back()" name="Página anterior" value="Página anterior">
        </div>
    </div> 
    <br>
    
    <?php
        header("location: principal.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nombre & cen=$centroden &num=$numero");
    ?>
</div>
<!--<div class="footer" style="background-color: black; position: absolute; bottom: 0; width: 100%; height: 40px; color: white; text-align: center;">
    &copy; 2020-2025 Gombeth Software's
</div>-->
