<?php
    echo "IP 1 = ";
    echo strval($_SERVER['REMOTE_ADDR']);
    echo nl2br("\n");
    echo "IP 2 = ";
    echo $_SERVER['HTTP_CLIENT_IP'];
    echo nl2br("\n");
    echo "IP 3 = ";
    echo $_SERVER['HTTP_X_FORWARDED_FOR'];
?>