<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'training');

	// initialize variables
	$image = "";
    $title = "";
    $description = "";
    $price = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$image = $_POST['IMAGE'];
        $title = $_POST['TITLE'];
        $description = $_POST['DESCRIPTION'];
        $price = $_POST['PRICE'];

        mysqli_query($db, "INSERT INTO products (title, description, price, image) VALUES ('$title', '$description', '$price', '$image')"); 
		$_SESSION['message'] = "Address saved"; 

       header('location: products.php');
    }
    
    if (isset($_POST['update'])) {
        $id = $_POST['ID'];
        $image = $_POST['IMAGE'];
        $title = $_POST['TITLE'];
        $description = $_POST['DESCRIPTION'];
        $price = $_POST['PRICE'];
        
    
        mysqli_query($db, "UPDATE products SET title='$title', description='$description', price='$price', image='$image' WHERE id=$id");
        $_SESSION['message'] = "Address updated!"; 
        header('location: products.php');
    }

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM products WHERE id=$id");
        $_SESSION['message'] = "Address deleted!"; 
        header('location: products.php');
    }