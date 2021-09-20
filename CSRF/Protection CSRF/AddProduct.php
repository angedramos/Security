<?php
session_start();
 if(empty($_SESSION['token'])){
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
        <link rel="stylesheet" href="style.css">
        <title>Products</title>
    </head>
    
    <body>
        <form action="Add.php" method="post">
        <section class="product-register">
            <h1>Add Product</h1>
            <a href="AllProducts.php">All Registered Products</a>
            <br>
            <input type="text" class="controls" autocomplete="off" required name="title" name="title" id="title" placeholder="Enter Title">
            <br>
            <textarea class="controls" required name="description" autocomplete="off" id="description" rows="3" placeholder="Enter Description"></textarea>
            <input class="botons" type="submit" value="Save">
            <input type="hidden" name="token" value="<?php echo $token ; ?>">
        </form>
        </section>
    </body>
</html>