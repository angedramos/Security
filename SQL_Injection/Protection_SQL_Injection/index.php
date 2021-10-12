<?php
require_once 'config.php';
        error_reporting(0);

        $mysqli = new mysqli('localhost', 'root', '', 'products_sql');
        if($mysqli->connect_error){
            die('Connection Error');
        }


        if (!empty($_POST)){
            $title = $_POST['title'];
            $description = $_POST['description'];
            $description = strip_tags($description);
            $newTitle = mysqli_real_escape_string($mysqli, $title);
            $newDescription =  mysqli_real_escape_string($mysqli, $description);

            // Validation
            $sql = "INSERT INTO product(title, description) VALUES (:title, :description)";
            $query = $pdo->prepare($sql);
            $result = $query->execute(['title'=> $newTitle,  'description' => $newDescription]);
            $querynew = "SELECT * FROM `product` where product.title = '{$newTitle}' and product.description = '{$newDescription}' ;";
            $resultnew=mysqli_multi_query($mysqli, $querynew);
        }     

 ?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  

        <link rel="stylesheet" href="style.css">
    </head>
    <style>
    body {
      background-position: inherit;
      background-image: url('fondo3.png');
    }
    </style>
    <body>
        <form action="index.php" method="post">
        <section class="product-register">
            <h1>Add Product</h1>
            <a href="AllProducts.php">All Registered Products</a>
            <br>
            <input type="text" class="controls" autocomplete="off" required name="title" name="title" id="title" placeholder="Enter Title">
            <br>
            <textarea class="controls" required name="description" autocomplete="off" id="description" rows="3" placeholder="Enter Description"></textarea>
            <input class="botons" type="submit" value="Save">
        </form>
        </section>
    </body>
</html>