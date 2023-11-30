<?php
if(!isset($_COOKIE['username'])) {
    echo "Cookie named '" . $_COOKIE['username'] . "' is not set!";
  }else{
    $user = $_COOKIE['username'];
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Zone</title>
    <style>
        nav{
            display: flex;
            flex-direction: column;            
            background-color: #333;
            width: 300px;
            text-align: center;
        }
        a{
            padding: 0.5em;
            border: 1px solid white;
            text-decoration: none;
            color:white;
        }
    </style>
</head>
<body>
    <nav>
        <a href="Welcome.php">Welcome Page</a>
        <a href="productList.php">Product list</a>
        <a href="addProduct.php">Add a Product</a>
    </nav>
    <h3><?php $_COOKIE['username']?></h3>
</body>
</html>