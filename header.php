<?php
if (!isset($_COOKIE['username'])) {
    echo "Cookie named '" . $_COOKIE['username'] . "' is not set!";
    header('Location:logIn.php');
} else {
    include('Operations.php');
    $user = $_COOKIE['username'];
    $pass = $_COOKIE['password'];
    $database = new Database('localhost','review','gestor','abc123.');
    $operation = new Operations($database);
    $name = $operation->getUserName($user,$pass);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Zone</title>
    <style>
        body{
            background-color: lightcyan;
        }
        .userLog{
            display: flex;
            margin-right: 100px;
            flex-direction: column;
            align-items: center;
            background-color: lightblue;
            padding: 0.5em;
            border-radius: 10px;
            
        }
        .userLog>label{
            background-color: lightcyan;
            padding: 0.3em;
            padding-left: 1em;
            padding-right: 1em;
            border-radius: 20px;
            font-weight: bold;
        }
        .userLog>img{
            width: 40px;
            padding: 0.3em;
            margin: 5px;
            background-color: lightcyan;  
            border-radius: 50px;
            
        }
        .userLog>a{
            margin-top: 10px;
            background-color: #333;
            border:none;
            border-radius: 40px;
            padding-left: 1em;
            padding-right: 1em;
        }
        header{
            display: flex;
            justify-content: space-between;
        }
        header>nav {            
            display: flex;
            flex-direction: column;
            background-color: #333;
            width: 300px;
            height: 100%;
            text-align: center;            
        }

        header a {
            padding: 0.5em;
            border: 1px solid lightcyan;
            text-decoration: none;
            color: white;
        }
        .title{
            text-align: center;
        }
        .newProduct{
            width: 300px;
            margin: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .newProduct input{
            margin-top: 10px;
            margin-bottom: 20px;
        }
        .newProduct label:first-child{
            font-size: larger;
            margin-bottom: 20px;
            border-bottom: 1px solid black;
            padding-bottom: 1em;            
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <a href="welcome.php">Welcome Page</a>
            <a href="productList.php">Product list</a>
            <?php
            if ($name['admin'] === 1) {
                echo '<a href="addProduct.php">Add a Product</a>';
            }else{
                echo '<a>---------------</a>';
            }
            ?>
            
        </nav>
        <div class="userLog">
        <img src="img/usuario.png" alt="userIcon">
        <label><?php echo $name['name'] ?></label>  
        <a href="logIn.php">Log out<?php
            $user = null;
            $pass = null;
        ?></a>
        </div>
        
    </header>    
</body>

</html>