<?php
    session_name("Aliros");
    session_start();
    require_once("db.php");
    //require_once("include/header2.php");
    //require_once("emergente2.php");
    require_once("variables.php");
    echo var_dump($_SESSION);
    $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Mi-@cc3s0-es-p@ra-@L1R0!','Conlabac');
    mysqli_set_charset($conn, "utf8");
    echo var_dump($_SESSION);
    
?>