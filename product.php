<!DOCTYPE html>
<html>
<head>
    <title>Product</title>
</head>
<body>
    <div class="product">
        <form method="POST" action="product.inc.php">
         <input type="text" name="title" placeholder="Title"/>
         <br><br>
         <input type="text" name="description" placeholder="Description"/>
         <br><br>
         <input type="text" name="price" placeholder="Price"/>
         <br><br>
         <input type="file" name="image" accept="image/*" placeholder="Image"/>
         <br><br>
         <input type="submit" value="Save"/>
         <p><a href="products.php">Products</a></p>
        </form>
    </div>  
</body>
</html>