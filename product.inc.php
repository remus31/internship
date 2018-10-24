<?php
require 'xss.php';
$database_name = "training";
$con = mysqli_connect("localhost" ,"root", "", $database_name);

if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['price']) && !empty($_POST['image']) &&
 isset($_POST['title']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['image'])) {

    $title = e_xss($_POST['title']);
    $description = e_xss($_POST['description']);
    $price = e_xss($_POST['price']);
    $image = e_xss($_POST['image']);

        $query = "INSERT INTO products (title, description, price, image) VALUES ('$title', '$description', '$price', '$image')";
        $result = mysqli_query($con, $query);

        header("Location: product.php");

}else{
    echo 'Error!';
}


?>