<?php

    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "pt mitra integrasi digital";

try {    
    //create PDO connection 
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Setting Error Mode as Exception
} catch(PDOException $e) {
    //show error
    die("Terjadi masalah: " . $e->getMessage());
}
