<?php

$servidor="localhost";
$BD="Website";
$usuario="root";
$password="";

try{
    $conexion= new PDO("mysql: host=$servidor; dbname=$BD", $usuario, $password);

    ECHO "conexion existosa...";
    
}catch(Exception $error){
    echo $error -> getMessage();
}



?>