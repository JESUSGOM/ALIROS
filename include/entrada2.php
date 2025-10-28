<?php  
    include("db.php");
    include("include/header.php"); 
    require_once("variables.php");
    session_start();
    require 'include/user_sesion.php';
?>
    
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <form action="consulta2.php" method="POST">
                    <div class="form-gruup">
                        <input type="text" name="usuario" class="form-control"
                        placeholder="Usuario" 
                        pattern="[0-9]{8}[A-Za-z]{1}" minlength="9" maxlength="9" 
                        autofocus>  
                        <input type="password" name="clave" class="form-control"
                        placeholder="Contraseña" minlength="4" maxlength="9"> 
                    </div>
                    <input type="submit" class="btn btn-success btn-block"
                    name="entrada" value="Acceder">
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("include/footer.pho"); ?>