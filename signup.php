<?php
session_start();

?>



<?php
  include('dbc.php');
  if (isset($_POST['reg'])) {
    $username = $_POST['name'];
    $password = $_POST['pass'];
    $city     = $_POST['city'];
    $email    = $_POST['email'];

    $qry = "INSERT INTO login (username, password, city, email) 
    VALUES ('$username','$password','$city','$email')";
    $run = mysqli_query($con , $qry);

    if ($run==true) {
      echo "<script>alert('Inserted Successfully')</script>";
    }
    else{
      echo "<script>alert('not')</script>";
    }
  }

?>

<!DOCTYPE html>
<html>
<head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial;
    font-size: 17px;
}

#myVideo {
    position: fixed;
    right: 0;
    bottom: 0;
    min-width: 100%; 
    min-height: 100%;
}

.content {
    position: fixed;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    color: #f1f1f1;
    width: 100%;
    padding: 20px;
}

#myBtn {
    width: 200px;
    font-size: 18px;
    padding: 10px;
    border: none;
    background: #000;
    color: #fff;
    cursor: pointer;
}

#myBtn:hover {
    background: #ddd;
    color: black;
}
</style>

</head>
<body>

<video autoplay muted loop id="myVideo">
  <source src="video.mp4" type="video/mp4">
  <source src="video.ogg" type="video/ogg">  
</video>

<div class="card bg-dark text-white">
  <div class="card-img-overlay">
    <h5 class="card-title mt-3 pt-3">Registration Here</h5>


<div class="container mx-4 my-4">
<div class="content">
 <form class="needs-validation" action="reg.php" method="post" novalidate>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">Name</label>
      <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="Name" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Email</label>
      <input type="email" name="email" class="form-control" id="validationCustom02" placeholder="Email" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>
 <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">City</label>
      <input type="text" name="city" class="form-control" id="validationCustom03" placeholder="City" required>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>

     <div class="col-md-4 mb-3">
      <label for="validationCustomUsername">Password</label>
      <div class="input-group">
        <div class="input-group-prepend">
        </div>
        <input type="password" name="pass" class="form-control" id="validationCustomUsername" placeholder="Password" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">
          Please choose a Password.
        </div>
      </div>
    </div>
  </div>
  <button class="btn btn-outline-primary text-center" name="reg" type="submit">Sign Up Now</button>
</form>

</div>
</div>


  </div>
</div>


<?php

include('footer.php');

?>
