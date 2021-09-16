<?php
require_once 'config.php';
        error_reporting(0);

        $mysqli = new mysqli('localhost', 'root', '', 'products');
        if($mysqli->connect_error){
            die('Connection Error');
        }

        $title = $_POST['title'];
        $description = $_POST['description'];

        $querynew = "SELECT * FROM `oldproducts` where oldproducts.title = '{$title}' and oldproducts.description = '{$description}' ;";
        $resultnew = mysqli_query($mysqli, $querynew); 
        $resultnew=mysqli_multi_query($mysqli, $querynew);
        $data = mysqli_fetch_all($resultnew);

 ?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  

        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form action="AddProduct.php" method="post">
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