<?php

session_start();

include('header.php');

?>

<div class="card bg-dark text-white">
  <img class="card-img" src="login.jpg" alt="Card image">
  <div class="card-img-overlay">
   <h1 class="display-4">Login Here</h1>
	<div class="container pt-5 px-4">
		<div class="row pt-5 px-4">
			<div class="col-md-4 pt-5 px-4 mx-4">
				<form action="login.php" method="post">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Name</label>
				    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
				    <small id="emailHelp" class="form-text text-muted">Enter your name</small>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" class="form-control"
				    name="password" id="exampleInputPassword1" placeholder="Password">
				  </div>
				  <button type="submit" name="login" class="btn btn-primary">Login</button>
				</form>
			</div>	
		</div>
	</div>
  </div>
</div>

<?php

include('db.php');

if(isset($_POST['login'])){
	$name = $_POST['name'];
	$password = $_POST['password']; 

	$qry = "SELECT * FROM login WHERE
	name='$name' AND password = '$password'";
    $run = mysqli_query($conn, $qry);
    
	$num = mysqli_num_rows($run);
	if($num>0){
    	echo "<script>window.open('admin-panel.php','_self')</script>";
    }
    else{
    	echo "<script>alert('Wrong Somewhere')</script>";
    }
    
}

?>


<?php

include('footer.php');

?>