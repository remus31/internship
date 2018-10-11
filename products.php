<?php  include('products.inc.php'); ?>
<?php 
    //update
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM products WHERE id=$id");

		if (mysqli_num_rows($record) > 0) {
			$n = mysqli_fetch_array($record);
			$image = $n['image'];
            $title = $n['title'];
            $description = $n['description'];
            $price = $n['price'];
            
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
</head>
<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
<?php $results = mysqli_query($db, "SELECT * FROM products"); ?>

<table>
	<thead>
		<tr>
			<th>Image</th>
			<th>Title</th>
            <th>Description</th>
            <th>Price</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['image']; ?></td>
			<td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['price']; ?></td>

			<td>
				<a href="products.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="products.inc.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	<form method="post" action="products.inc.php" >
        <input type="hidden" name="ID" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Image</label>
			<input type="file" name="IMAGE" accept="image/*" value="<?php echo $image; ?>">
		</div><br><br>
		<div class="input-group">
			<label>Title</label>
			<input type="text" name="TITLE" value="<?php echo $title; ?>">
		</div><br><br>
        <div class="input-group">
			<label>Description</label>
			<input type="text" name="DESCRIPTION" value="<?php echo $description; ?>">
		</div><br><br>
        <div class="input-group">
			<label>Price</label>
			<input type="text" name="PRICE" value="<?php echo $price; ?>">
		</div><br><br>
		<div class="input-group">
            <?php if ($update == true): ?>
            <button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>
            <?php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
            <?php endif ?>
		</div>
	</form>
</body>
</html>
