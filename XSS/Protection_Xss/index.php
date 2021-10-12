<?php
require_once 'configSecure.php';
$result=false;

session_start();
    if (!empty($_POST)){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $description = strip_tags($description);
        // Validation
        $sql = "INSERT INTO product(title, description) VALUES (:title, :description)";
        $query = $pdo->prepare($sql);
        $result = $query->execute(['title'=> $title,  'description' => $description]);
        // echo strip_tags($description);
    }      

    
 ?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  

        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form action="index.php" method="post">
            <section class="product-register">
                <h1>Add Product</h1>
                <a href="AllProductsSecure.php">All Registered Products</a>
                <br>
                <input type="text" class="controls" autocomplete="off"  name="title" id="title" placeholder="Enter Title">
                <br>
                <textarea class="controls" autocomplete="off" id="description" rows="3" placeholder="Enter Description" name="description"></textarea>
                <input class="botons" type="submit" name="button" value="Save">
            </section>
        </form>
    </body>
</html>