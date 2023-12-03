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
            width: 100%;
            margin: 0;
        }
        header{
            margin-top: 20px;
            margin-bottom: 50px;
            display: flex;
            background: rgb(51,51,51);
            background: linear-gradient(90deg, rgba(51,51,51,1) 63%, rgba(224,255,255,1) 86%, rgba(224,255,255,1) 100%);    
        }
        .userLog{
            width: 100px;
            display: flex;
            position: absolute;
            right: 0;
            margin-right: 100px;
            flex-direction: column;
            align-items: center;
            background-color: lightblue;
            padding: 0.5em;
            border-radius: 10px;            
        }
        .userLog a{
            padding: 0.3em;
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
        header>nav {        
            margin: auto;    
            display: flex;
            flex-direction: row;
            background-color: #333;
            width: 300px;
            height: 100%;
            text-align: center;            
        }

        header a {
            padding: 20px;
            border: 1px solid lightcyan;
            text-decoration: none;
            color: white;
        }
        header a:hover{
            background-color: darkgreen;
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
        .newProduct select{
            margin-bottom: 30px;
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
        .listTable{
            margin: auto;
            text-align: center;
            border: #333 solid 1px;
            border-collapse: collapse;
            background-color: lightgray;
        }
        .listTable tr td{
            border: #333 solid 1px;
            padding: 1em;
        }
        .listTable tr th{
            border: #333 solid 1px;
            padding: 1em;
        }
        .listTable td>a{
            text-decoration: none;
            color: black;
            padding: 2em;
        }
        .formUpdate{
            display: flex;
            flex-direction: column;
            margin: auto;
            width: 300px;
            text-align: center;
            
        }
        .formUpdate input{
            padding: 1em;
            text-align: center;
            margin: 0;     
            border: none;
            outline: none;
            background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
    }
        .formUpdate label{
            padding: 1em;
            padding-left: 2em;            
            padding-right: 2em;
            background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
            
        }
        .formUpdate label:nth-child(even){
            color: white;
            padding-left: 2em;
            padding-right: 2em;
            background: black;
            
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