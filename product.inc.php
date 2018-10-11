<?php
$database_name = "training";
$con = mysqli_connect("localhost" ,"root", "", $database_name);

if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['price']) && !empty($_POST['image']) &&
 isset($_POST['title']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['image'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];

        $query = "INSERT INTO products (title, description, price, image) VALUES ('$title', '$description', '$price', '$image')";
        $result = mysqli_query($con, $query);

        header("Location: product.php");

}else{
    echo 'Error!';
}


?>