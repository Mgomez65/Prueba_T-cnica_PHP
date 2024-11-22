<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $DBnombre ="PruebaTegnica";

    $conexion = new mysqli($servername, $username, $password,$DBnombre);
 
    if ($conexion->connect_error) {
        die("Conexion Fallida " . $conexion->connect_error);
    }
    

?>