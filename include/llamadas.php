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
            print"<p><b>$centroDen $espacio Usuario-></b>$estaidentificacion $espacio $apellidoUno $espacio $apellidoDos $coma $nombre</p>";
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
                <div class="form-group mx-sm-3">
                    <input type="date" name="fecha" class="form-control">
                </div>
                <div class="form-group mx-sm-3">
                    <input type="time" name="hora" class="form-control" stpep="1">
                </div>
                <div class="form-group mx-sm-3">
                    <input type="text" name="emisor" class="form-control"
                    placeholder="Quien llama" autofocus>
                </div>
                <div class="form-group mx-sm-3">
                    <input type="text" name="receptor" class="form-control"
                    placeholder="A quién llama">
                </div>
                <div class="form-group mx-sm-3">
                    <input type="textarea" name="mensaje" class="form-control"
                    placeholder="Mensaje">
                </div>
                <div class="form-group mx-sm-3">
                    <select name="emilio" id="emilis" class="form-control" size="1">
                        <option value="sincorreo">Elige persona</option>
                        <?php
                            $qu = "SELECT *, CONCAT(RptNombre, ' ', RptApellidoUno, ' ', RptApellidoDos) As Datos FROM Retposto WHERE RptCentro = '" . $numero. "' GROUP BY Datos ORDER BY RptNombre ASC";    
                            $resultado = mysqli_query($conn, $qu);
                            while($mostrar = mysqli_fetch_array($resultado)) {
                                echo '<option value='.$mostrar[5].'>'.$mostrar[6].'</option>';
                            }
                        ?>        
                    </select> 
                </div>
                <div class="form-group mx-sm-3">
                    <input type="submit" class="btn btn-success btn-block" name="llamada" value="Salida">
                </div>
            </form>
        </div>
        
    </div> 
    <?php
        header("location: principal.php?apu=$apellidoUno & apd=$apellidoDos & nom=$nombre & cen=$centroden &num=$numero");
    ?>
</div>