<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv=”Content-Type” content=”text/html;″ />
    <meta http-equiv="Content-Type" name="viewport" content="width=device-width, 
    initial-scale=1.0;/>
    <title>Aliros</title>
    <!-- BOOTSTRAP -->
    <!-- Latest compiled and minified CSS --> 
    <link rel="stylesheet" 
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
    crossorigin="anonymous"> 
    <link href="include/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Optional theme --> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> 
    <link rel="icon" href="img/descargalogo.ico">
    <!-- Latest compiled and minified JavaScript --> 
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap/5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">-->
    <link rel=" " href="include/bootstrap.min.css">
    <!-- FONT AWESOEM -->
    <link rel="stylesheet" 
    href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" 
    crossorigin="anonymous">
    <script src="include/moment-with-locales.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="include/jquery.dataTables.min.js"></script>
<scirpt src="include/jquery-3.3.1.min.js"></scirpt>
<script>
    $(document).ready(function(){
        $('#tablageneral').DataTables({
            "order": [[1,"asc"]],
            "language": {
                "lengMenu": "Ver _MENU_ registros por página.",
                "info": "Mostrando página _PAGES_ de _PAGES_",
                    "infoEmpty": "No hay datos disponibles",
                    "infoFiltered": "(filtrada de _MAX_ líneas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "No se encontraron visitas",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
            }
        });
    });
</script>
</head>
<body>
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
    <div class="container">
        <a href="index.php" class="navbar-brand"><img src="img/logoitc-30.ico" class="rounded float-left" alt="ITC"></a>
        <a href="" class="navbar-brand rounded float-none" style="font-size: 6px;">Creado y desarrollado por J.G. de la empresa Laborsord, S.L. para el Instituto tecnológico de Canarias.</a>
        <a href="" class="navbar-brand"><img src="../img/logo-laborsord--transparente.png" class="rounded float-right" alt="Laborsord"></a>
    </div>
</nav>