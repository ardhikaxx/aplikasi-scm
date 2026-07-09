<?php

$host = "localhost";
$db = "rantai_pasokan";
$user = "root";
$password = "";

try{
    $conn = new PDO("mysql:host=$host;dbname=$db",$user,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Koneksi gagal : ".$e->getMessage();
}