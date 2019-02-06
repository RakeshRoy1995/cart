<?php
session_start();
require_once("db.php");
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$sql = "SELECT * FROM tblproduct WHERE
			 code='" . $_GET["code"] . "'";
			$run = mysqli_query($conn , $sql);
			while($productByCode=mysqli_fetch_assoc($run)) {
			
			$itemArray = array($productByCode["code"]=>
				array('name'=>$productByCode["name"], 'code'=>
				$productByCode["code"], 'quantity'=>
				$_POST["quantity"], 'price'=>$productByCode["price"]));
		}

			if(!empty($_SESSION["cart_item"])) {

					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<?php

include('header.php');

?>

<div class="container">

	 	<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top">
	<div class="container-fluid">
		 <a class="navbar-brand" href="#">Roy Store</a>

    <ul class="nav navbar-nav navbar-right">
		<div class="dropdown show">
		  

		  </div>
		</div>

  		<li>
  		
		  <a
		   class="btn btn-secondary mx-4 text-success" 
		   href="login.php">
		    Log in
		  </a>
        <li>
  		<li><a href="signup.php" class="mx-3 btn btn-primary">SignUp</a></li>
  	</ul>
	</div>
  </nav>


<div id="shopping-cart">
<div class="btn btn-danger">Shopping Cart </div>
 <a class="btn btn-info" id="btnEmpty"
 href="index.php?action=empty">Empty Cart
</a>
</div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	

<table class="table table-dark bg-success">
  
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Code</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>

<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td>
					<b><?php echo $item["name"]; ?></b></td>
				<td>
					<?php echo $item["code"]; ?></td>
				<td>
					<?php echo $item["quantity"]; ?></td>
				<td>
					<?php echo "$".$item["price"]; ?></td>
				<td>
					<a href="index.php?action=remove&code=<?php 
					echo $item["code"]; ?>" class="btnRemoveAction">
					Remove Item</a></td>
				</tr>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="5" align=right><strong>Total:</strong>
 <?php echo "$".$item_total; ?></td>
</tr>
</table>		
  <?php
}
?>
</div>

<div id="product-grid">

	<div class="alert alert-primary" role="alert">
  Products
</div>
	<?php
			$sql = "SELECT * FROM tblproduct ORDER BY id ASC";
			$run = mysqli_query($conn , $sql);
			while($product_array=mysqli_fetch_assoc($run)) {
			

	// $product_array = $db_handle->
	// runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
	if (!empty($product_array)) { 
		

	?>
		<div class="container">
		  <div class="row">
		    <div class="col-sm">
				<div class="product-item" style="width:100%">
					<form method="post" action="index.php?action=add&code=
					<?php echo $product_array["code"]; ?>">
					<div class="product-image">
					<img style="width:70px; height:70px;" src="<?php echo $product_array["image"]; ?>"></div>
					<div><strong><?php echo $product_array["name"]; ?></strong></div>
					<div class="product-price"><?php echo "$".$product_array["price"]; ?></div>
					<div>
					<input type="text" name="quantity" value="1" size="2" />
					<input type="submit" value="Add to cart" class="btnAddAction" /></div>
					</form>
				</div>
		    </div>
		  
		  </div>
		</div>

		
	<?php
			}
	}
	?>
</div>

</div>

<?php

include('footer.php');

?>