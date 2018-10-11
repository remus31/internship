<?php 

session_start()

?>

<!DOCTYPE html>
<head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> 
         <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
         <title>Shop manager email</title>
</head>
<body>
<h3 style="text-align: center;">Shop manager email</h3>
<div class="table-responsive">
    <table class="table table-bordered" border="2px" align="center">
            <tr>
                <th width="20%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="10%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="20%">Name</th>
                <th width="20%">Contact details</th>
                <th width="10%">Comments</th>
            </tr>
            <?php 
            
            $name = $_POST['name'];
            $details = $_POST['details'];
            $comments = $_POST['comments'];
            if(!empty($_SESSION["cart"])){
                $total = 0;
                foreach($_SESSION["cart"] as $key => $value){
            ?>
            <tr>
                <td><?php echo $value['TITLE']; ?></td>
                <td><?php echo $value['QUANTITY_CALC']; ?></td>
                <td><?php echo $value['PRICE']; ?></td>
                
            <?php
            $total = $total + ($value["QUANTITY_CALC"] * $value["PRICE"]);
                }
            ?>
                <td><?php echo $total; ?></td>
            <?php
            }
            ?>
                <td><?php echo $name; ?></td>
                <td><?php echo $details; ?></td>
                <td><?php echo $comments; ?></td>
            </tr>
    </table>
</div>
<br><br>
<p style="text-align: center;">Go to <a href="cart.php">Cart</a></p>
</body>
</html>