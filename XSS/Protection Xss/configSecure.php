<?php
//PDO requires 3 parameters ("Database Type with DB name,"User","Password")
$dbHost = 'localhost';
$dbName = 'products';
$dbUser = 'root';
$dbPass = '';
try{
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName","$dbUser","$dbPass");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
    echo $e->getMessage();
}
