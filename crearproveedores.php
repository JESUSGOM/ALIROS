<?php  
    require_once("db.php");
    require_once("include/header.php");
    require_once("variables.php");
    
    session_start();
    $query4 = "SELECT idMunicipio, idProvincia, codMunicipio, DC, Municipio FROM Paises WHERE idProvincia = .$CodProvincia.";
    $query5 = "SELECT CenId, CenDen FROM Centros";
    $query6 = "SELECT idCCAA, Nombre FROM CCAA";
    $espacio1 = " ";
    $espacio2 = "  ";
    $micentro = "";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6/inputmask.min.js"></script>
</head>
<body>
    <div class="container">
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
                $micentro = $centroDen;
            ?>
        </div>  
        <div class="row">
            <div class="col">
                <div class="card card-body">
                    <form id="altaproveedor" name="altaproveedor" action="inser_proveedor.php" method="post">
                        <p><b>Centro.:  </b><?php echo $centroDen; ?></p>
                        <input type="hidden" name="centro" value="<?php echo $centroDen;?>">
                        <input type="hidden" name="numero" value="<?php echo $numero;?>">
                        <input type="hidden" name="apu" value="<?php echo $apellidoUno;?>">
                        <input type="hidden" name="apd" value="<?php echo $apellidoDos;?>">
                        <input type="hidden" name="nombre" value="<?php echo $nombre;?>">
                        <label for="CIF"><b>CIF.:          </b></label>
                            <input type="text" id="prdCif" name="prdCif" 
                        required size="11" placeholder="CIF o DNI del proveedor">
                        <label for="DENOMINACION"><b>EMPRESA.:</b></label>
                        <input type="text" id="prdDenominacion" name="prdDenominacion" required size="105" 
                        placeholder="Indique nombre de emprea o Apellidos y Nombre del empresario">
                        <br>
                        <label for="CONTACTO"><b>CONTACTO.:</b></label>
                        <input type="text" id="prdContacto" name="prdContacto" required size="90" 
                        placeholder="Indique persona de contacto de esta empresa o empresario">
                        
                        <label for="TELEFONO"><b>TELÉFONO.:</b></label>
                        <input id="prdTelefono" type="tel" name="prdTelefono" 
                        size="17"  placeholder="123456789" required>
                        <br>
                        <label for="EMAIL"><b>EMAIL.:</b></label>
                        <input type="email" id="prdEmail" name="prdEmail" required size="60"
                        placeholder="correo@dominio.com" required>
                        <label for="WEB"><b>WEB.:</b></label>
                        <input type="url" id="url" name="url" 
                        placeholder="www.ejemplo.com" required size="58">
                        <br>
                        <label for="DIRECCION"><b>DIRECCIÓN.:</b></label>
                        <input type="text" id="prdDireccion" name="prdDireccion" required size="76">
                        
                        <label for="PAIS"><b>PAÍS.:</b></label>
                        <select name="pais" >
                            <?php
                                $query5 = "SELECT PaisId, PaisIso, PaisNombre FROM Paises";
                                $resultado = mysqli_query($conn, $query5);
                                if($resultado = mysqli_query($conn, $query5)){
                                    while($fila = mysqli_fetch_row($resultado)){
                                        echo '<option value='.$fila[2].'>'.$fila[2].'</option>';
                                    }
                                }
                            ?>
                        </select>
                        <br>
                        <label for="PROVINCIA"><b>PROVINCIA.:</b></label>
                        <select name="provincia">
                            <?php
                                $query5 = "SELECT idProvincia, idCCAA, provincia FROM Provincias";
                                $resultado = mysqli_query($conn, $query5);
                                if($resultado = mysqli_query($conn, $query5)){
                                    while($fila = mysqli_fetch_row($resultado)){
                                        echo '<option value='.$fila[0].'>'.$fila[2].'</option>';
                                    }
                                }
                            ?>
                        </select>
                        
                        <label for="CIUDAD"><b>CIUDAD.:</b></label>
                        <select name="municipio">
                            <?php
                                $query4 = "SELECT idMunicipio, idProvincia, codMunicipio, DC, Municipio FROM Municipios ORDER BY Municipio ASC";
                                $resultado = mysqli_query($conn, $query4);
                                if($resultado = mysqli_query($conn, $query4)){
                                    while($fila = mysqli_fetch_row($resultado)){
                                        echo '<option value='.$fila[0].'>'.$fila[4].'</option>';
                                    }
                                }
                            ?>
                        </select>
                        
                        <label for="CODIGOPOSTAL"><b>CÓDIGO POSTAL.:</b></label>
                        <input type="text" id="prdCodigopostal" 
                        name="prdCodigo_postal" required size="4"
                         placeholder="99999">
                        <br>
                        
                        <label for="NOTAS"><b>NOTAS.:</b></label>
                        <br>
                        <textarea id="prdNotas" name="prdNotas" cols="142" rows="5" placeholder="Texto libre para anotar"></textarea>
                        <br>
                        <label for="FECHAALTA" name="prdFechaAlta"><b>FECHA DE ALTA</b></label>
                        <input type="date" id="prdFecha_alta" name="prdFecha_alta" required>
                        <label for="FECHAEXPIRACION" name="prdFechaExpiracion"><b>FECHA DE EXPIRACION</b></label>
                        <input type="date" id="prdFechaExpiracion" name="prdFechaExpiracion">
                        <br>
                        <input type="submit" value="Añadir Proveedor" class="btn btn-success btn-block">
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card card-body">
                    <input style="background-color: #489F48; font-weight:bold;" type="button" 
                    onclick="history.back()" name="Página anterior" value="Página anterior">
                </div>
            </div>
        </div>
    </div> 
    
    <!--<div class="footer" style="background-color: black; position: absolute; bottom: 0; width: 100%; height: 40px; color: white; text-align: center;">
        &copy; 2020-2025 Gombeth Software's
    </div> -->
</body>
</html>
    

