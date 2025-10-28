<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
</head>
<body>
<div class="container-flex">
    <div class="row" style="align-items: center;">
        <div class="col">
            <?php include('lisgralmovis.php'); ?>
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
<script>
$(document).ready(function() {
    $('#miTabla').DataTable({
        "paging": true,
        "pageLength": 5,
        "ordering": true,
        "info": true,
        "searching": true,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Nada encontrado - lo siento",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });
});
</script>
</body>
</html>
