<?php
require_once 'configSecure.php';
    $queryResult = $pdo->query("SELECT * FROM product");  
    // while($row = $queryResult->fetch(PDO::FETCH_ASSOC)){
    //     var_dump($row);
    // }
    // echo strip_tags($pdo,'<script>');
    // htmlspecialchars($queryResult, ENT_QUOTES, 'UTF-8');
?>
<html>
<head>
    <title>List Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta charset="UTF-8">
</head>
<style>
    body {
      background-image: url('fondo.jpg');
    }
    </style>
<body>

    <div class="container">

        <br>
        <table class="table">
            <tr>
                <th>Title</th>
                <th>Description</th>
            </tr>
            <?php
           while($row = $queryResult->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row['title'] . '</td>';
            echo '<td>' . $row['description'] . '</td>';
            echo '</tr>';
             }
             ?>
        </table>
        <a href="index.php">Add Product</a>    
    </div>
</body>
</html>