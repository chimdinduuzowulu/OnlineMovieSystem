<?php
    $host = "localhost";
    $user = "root";                     
    $pass = "";                                  
    $db = "movietheatredb";
    $port = 8081;
     $con = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
?>