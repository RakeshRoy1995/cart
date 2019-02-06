<?php

include('header.php');

?>

<?php

include('db.php');
    
    if(isset($_POST['upload'])){
    	$name = $_POST['name'];
    	$code = $_POST['code'];
    	$price = $_POST['price'];

        $target = "product-images/".basename($_FILES['image']['name']);
        //product-images is the folder name to save picture inthat particular filder
        

        $sql = "INSERT INTO tblproduct(name, code, image, price)
         VALUES ('$name','$code','$target','$price')";
        $run = mysqli_query($conn , $sql);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image Upload successfully";
        } else {
             $msg = "Image Not Upload successfully";
        }

        echo "<script>window.open('index.php','_self')</script>";

}

   ?>
        

    <form class="form-group" action='admin-panel.php' method='post' enctype='multipart/form-data' ></br><br>
           Name  :<input type="text" name="name" class="form-control" required ><br><br>
           Code  :<input type="text" name="code" class="form-control" required ><br><br>
           Image :<input type='file' name= 'image' class="btn btn-outline-primary" required ><br><br>
           Price :<input type="text" name="price" class="form-control" required ><br><br>
            <input type="submit" name="upload" value="Image Upload" class="btn btn-outline-primary" />
    </form>

<?php

include('footer.php');
?>
