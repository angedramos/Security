<?php
require_once 'config.php';
session_start();
        error_reporting(0);

        $mysqli = new mysqli('localhost', 'root', '', 'products_csrf');
        if($mysqli->connect_error){
            die('Connection Error');
        }
        $title = $_POST['title'];
                        $description = $_POST['description'];
                        $sql = "INSERT INTO product(title, description) VALUES (:title, :description)";
                        $query = $pdo->prepare($sql);
                        $result = $query->execute(['title'=> $title,  'description' => $description]);
 ?>
<a href="index.php">Add Product</a>