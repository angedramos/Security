<?php
require_once 'config.php';
session_start();
        error_reporting(0);

        $mysqli = new mysqli('localhost', 'root', '', 'products');
        if($mysqli->connect_error){
            die('Connection Error');
        }

        if(!empty($_POST)){
            if(!empty($_POST['token'])){
                if(hash_equals($_SESSION['token'], $_POST['token'])){
                    unset($_SESSION['token']);
                    // $_SESSION['posted']=true;
                    // $_SESSION['title']=$_POST['title'];
                    // $_SESSION['description']=$_POST['description'];
                        $title = $_POST['title'];
                        $description = $_POST['description'];
                        $sql = "INSERT INTO variantproducts(title, description) VALUES (:title, :description)";
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
<a href="AddProduct.php">Add Product</a>