<?php
require_once 'config.php';
session_start();
        error_reporting(0);

        $mysqli = new mysqli('localhost', 'root', '', 'products_csrf');
        if($mysqli->connect_error){
            die('Connection Error');
        }

        if(!empty($_POST)){
            if(!empty($_POST['token'])){
                if(hash_equals($_SESSION['token'], $_POST['token'])){
                    unset($_SESSION['token']);
                        $title = $_POST['title'];
                        $description = $_POST['description'];
                        $sql = "INSERT INTO product(title, description) VALUES (:title, :description)";
                        $query = $pdo->prepare($sql);
                        $result = $query->execute(['title'=> $title,  'description' => $description]);
                }
                else
                {
                    unset($_SESSION['token']);
                    die("Invalid CSRF Token");
                }
            }
            else
            {
                die("CSRF Token not found");
            }
        }
 ?>
<a href="index.php">Add Product</a>