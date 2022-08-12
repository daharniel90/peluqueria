<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function connect(){
  
    $servername = "localhost";
    $username = "root";
    $password = "1234567890";
    $dbname = "peluqueria";
  
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if($conn->connect_error) {
        die("Ha fallado la conexión a base de datos: " . $conn->connect_error);
        return $conn;
    }else{
        return $conn;
    }
  }




?>