<?php

if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){
    
    $username = strtolower($_POST['username']);
    $password = $_POST['password'];

    $user = "test";
    $pass = "test";

    if($username == $user && $password == $pass){
        header("Location: index.php");
    }else{
        echo "<script>alert('Incorrect username or password!')</script>";
        echo '<a href="login.php">Back to login</a>';
        
    }


}else{
    echo '<script>alert("Username and password are required!")</script>';
    echo '<a href="login.php">Back to login</a>';
    
}

?>