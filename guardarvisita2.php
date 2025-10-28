<?php
    session_name("Aliros");
    session_start();
    require_once("db.php");
    //require_once("include/header2.php");
    //require_once("emergente2.php");
    require_once("variables.php");
    echo var_dump($_SESSION);
    $conn = mysqli_connect('mysql-8001.dinaserver.com', 'Conacelbs','Pass@LIr0S','Conlabac');
    mysqli_set_charset($conn, "utf8");
    echo var_dump($_SESSION);
    
?>