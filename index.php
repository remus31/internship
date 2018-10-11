<?php 
require "common.php"; 
//Use the "X-UA-Compatible" meta tag on web pages where you suspect that Internet Explorer 8 will attempt to render the page in an incorrect view.
/* 
A <meta> viewport element gives the browser instructions on how to control the page's dimensions and scaling.

The width=device-width part sets the width of the page to follow the screen-width of the device (which will vary depending on the device).

The initial-scale=1.0 part sets the initial zoom level when the page is first loaded by the browser.
*/
?>

<!DOCTYPE html>
<html>
    <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> 
         <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
         <title>Shopping cart</title>
         <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"> 
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script> 
         <style>
         <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
         *{
             font-family: 'Titillium Web', sans-serif;
         }
        
         .products{
             border: 1px solid black;
             margin: -1px 3px 3px -1px;
             padding: 5px;
             text-align: center;
             background-color: blue;
             position: relative;
         }
         
         table, th, tr {
             text-align: center;

         }
         .title2{
             text-align: center;
             color: black;
             padding: 2%;
         }
         h2{
             text-align: center;
             padding: 2%;
         }
         .img-responsive{
             height: 80px;
         }
         .text-white{
             font-size: 10px;
         }
         </style>
        
    </head>
    <body>
    <div class="container-fluid" style="width: 65%">
        <h2>Shopping Cart</h2>
        <div class="row">
           <?php 
              $query = "SELECT * FROM products";
              $result = mysqli_query($con, $query);
              if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_array($result)){
                      // The mysqli_num_rows() function returns the number of rows in a result set.  
                      // The mysqli_fetch_array() function fetches a result row as an associative array, a numeric array, or both.
           ?>

           <div class="col-sm-2">
              <form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
                  <div class="products">
                       <img src="<?php echo $row["image"]; ?>" class="img-responsive">
                       <h5 class="text-info"><?php echo $row["title"]; ?></h5>
                       <h6 class="text-white"><?php echo $row["description"]; ?></h6> 
                       <h5 class="text-warning"><?php echo $row["price"]; ?><span>$</span></h5>
                       <input type="text" name="QUANTITY" class="form-control" value="1" style="text-align: center;">
                       <input type="hidden" name="PRODUCT_TITLE" value="<?php echo $row["title"] ?>">
                       <input type="hidden" name="PRODUCT_PRICE" value="<?php echo $row["price"] ?>">
                       <input type="submit" name="ADD" style="margin-top: 5px;" class="btn btn-success" value="Add to cart">
                  </div>
              </form>
           </div>
           <?php
                  }
            }
           ?> 
        </div>
    </div>
        <a href="cart.php">Go to cart</a>
        <br>
        <a href="login.php">Sign out</a>
    </body>
</html>
