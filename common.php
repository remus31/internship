<?php 
session_start();
$database_name = "training";
$con = mysqli_connect("localhost" ,"root", "", $database_name);

if(isset($_POST["ADD"])){
    if(isset($_SESSION["cart"])){
        $item_array_id = array_column($_SESSION["cart"], "ID");
        if (!in_array($_GET["id"], $item_array_id)){
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'ID' => $_GET["id"],
                'TITLE' => $_POST["PRODUCT_TITLE"],
                'PRICE' => $_POST["PRODUCT_PRICE"],
                'QUANTITY_CALC' => $_POST["QUANTITY"],
            );
            $_SESSION["cart"][$count] = $item_array;
            echo '<script> window.location="cart.php" </script>';
        }else{
            echo '<script>alert("Product is already added to cart") </script>';
            echo '<script>window.location="cart.php"</script>';
        }
    }else{
        $item_array = array(
            'ID' => $_GET["id"],
            'TITLE' => $_POST["PRODUCT_TITLE"],
            'PRICE' => $_POST["PRODUCT_PRICE"],
            'QUANTITY_CALC' => $_POST["QUANTITY"],
        );
    $_SESSION['cart'][0] = $item_array;
    }
}
if(isset($_GET["action"])){
    if($_GET["action"] == "delete"){
        foreach ($_SESSION["cart"] as $keys => $value){
            if($value["ID"] == $_GET["id"]){
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("Product has been removed!")</script>';
                echo '<script>ewindow.location="cart.php"</script>';
            }
        }
    }
}
?>