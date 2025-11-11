<?php
    function Conectarse()
    {
        //$host="mysql-5707.dinaserver.com";
        $host="mysql-8001.dinaserver.com";
        $usuario="Conacelbs";
        $clave="Mi-@cc3s0-es-p@ra-@L1R0!";
        $basedato="Conlabac";

        if(!($link=mysql_connect($host, $usuario, $clave, $basedato)))
        {
            echo "Error conectando a la base de datos.";
            exit();
        } 
        if(!(mysql_select_db($basedato)))
        {
            echo "Error al seleccionar la base de datos";
            exit();
        }
        return $link;
    }

    $link=Conectarse();
    echo "Conexión con la base de datos conseguida";
    mysql_close($link); //Cierra la conexión
?>