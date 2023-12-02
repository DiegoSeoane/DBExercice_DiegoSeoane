<?php
include('Operations.php');
try {
    
$database = new Database('localhost','review','gestor','abc123.');
$oper = new Operations($database);
if (isset($_POST['submit'])) {
    $username = $_POST['login'];    
    $password = $_POST['password'];
    if ($oper->getUserName($username, $password)!=null) {
        setcookie('username',$username);
        setcookie('password',$password);
        header('location: welcome.php');        
    }else{        
        echo '<p style="color:red">User or password incorrect</p>';
    }
   
}
} catch (PDOException $ex) {
    echo $ex->getMessage();
}catch (Exception $ex) {
    echo $ex->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{            
            display: flex;
            flex-direction: column;
            width: 300px;
            justify-content: center;
            margin: auto;
            margin-top: 2em;
        }
        button{
            margin-top: 1em;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <label for="login">User</label>
        <input type="text" name="login" id="idLogin" value="<?php if (isset($username)) {
            echo $username;
        }else{
            echo '';
        } ?>">
        <label for="password">Password</label>
        <input type="password" name="password" id="idpassword">
        <button type="submit" name="submit">Log In</button>
    </form>
</body>
</html>
