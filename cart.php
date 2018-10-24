<?php require "common.php";
      require "xss.php";
?>
<!DOCTYPE html>
<html>
    <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> 
         <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
         <title>Cart adding</title>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script> 
    </head>
    <body>
    
        <div class="row">
            <h3 style="text-align: center;">Shopping Cart Detalis</h3>
            <div class="table-responsive">
                <table class="table table-bordered" border="2px">
                <tr>
                    <th width="30%">Product Name</th>
                    <th width="10%">Quantity</th>
                    <th width="10%">Price Details</th>
                    <th width="30%">Total Price</th>
                    <th width="10%">Remove Item</th>
                </tr>
                <?php 
                   if(!empty($_SESSION["cart"])){
                       $total = 0;
                       foreach($_SESSION["cart"] as $key => $value){
                ?>
                <tr>
                    <td><?php echo $value["TITLE"]; ?></td>
                    <td><?php echo $value["QUANTITY_CALC"]; ?></td>
                    <td>$ <?php echo $value["PRICE"]; ?></td>
                    <td>$ <?php echo number_format($value["QUANTITY_CALC"] * $value["PRICE"]); ?></td>
                    <td><a href="cart.php?action=delete&id=<?php echo $value["ID"]; ?>"><span class="text-danger">Remove Item</span></a></td>
                </tr>
                <?php 
                   $total = $total + ($value["QUANTITY_CALC"] * $value["PRICE"]);
                    }
                ?>
                <tr>
                   <td colspan="3" text-align="right">Total</td>
                   <th text-align="right">$ <?php echo number_format($total); ?></th>
                </tr>
                <?php 
                    }
                ?>
                </table>
            </div>
        </div> 
    <br>
    
    <?php
     
    $name = "";
    $details = "";
    $comments = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST['name'])){
           echo "<script> alert('Name is required!'); </script>";
        } else {
           $name = test_input($_POST['name']);
        }

        if(empty($_POST['details'])){
           echo "<script> alert('Contact details is required!'); </script>";
        } else {
           $details = test_input($_POST['details']);
        }

        if(isset($_POST['comments'])){
            $comments = test_input($_POST['comments']);
        }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    }
    
    ?>

    <div style="padding: 5px;">
    <form method="POST" action="config.php?action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="line-height: 1.9;">
    <?php 
         if(!empty($_SESSION["cart"])){
            $total = 0;
            foreach($_SESSION["cart"] as $key => $value){
    ?>
        Product added: <input type="text" name="title" value="<?php echo $value['TITLE']; ?>"/>
        <br>
        Quantity added: <input type="text" name="cant" value="<?php echo $value['QUANTITY_CALC']; ?>"/>
        <br>
        Price: <input type="text" name="price" value="<?php echo $value['PRICE']; ?>" />
        <br>
        
        <br>
    <?php
        $total = $total + ($value["QUANTITY_CALC"] * $value["PRICE"]);
           }   
    ?>
        Total price: <input type="text" name="total" value="<?php echo number_format($total); ?>"/>
        <?php
        }
        ?>
        <br><br>
        <input type="text" name="name" value="<?php echo e_xss($name); ?>" placeholder="Name..."/>
        <br>
        <textarea rows="4" cols="50" name="details" value="<?php echo e_xss($details); ?>">Contact details...</textarea>
        <br>
        <textarea rows="4" cols="50" name="comments" value="<?php echo e_xss($comments); ?>">Comments...</textarea>
        <br>
        <input type="submit" name="submit" value="Checkout" class="btn-login"/>
    </form>
    </div>  
    <a href="index.php">Go to index</a>
    </body>
</html>
