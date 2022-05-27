<?php
include "config.php";
?>
<html>
    <header>
        <title>
            Drinks Zetu POS System
        </title>
        <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="drinks.css">
        <script src="Bootstrap/js/bootstrap.js"></script>
        </title>
    </header>
    <body>
        <div class="container-fluid">
    <div class="row">
    <div class="col-lg-2 col-md-2"></div>
    <div class="col-lg-8 col-md-8">
        <br>
        <div class="panel panel-md panel-primary">
             <div class="panel-heading">
                 <h3>Register Photo</h3>
</div>
<div class="panel-body">
<form action="uploader.php" method="POST" class="form-group" enctype="multipart/form-data">
<label>Name:</label>
<input type="text" name="name" class="form-control" required placeholder="Enter name of product">
<label>Manufacturer</label>
<input type="text" name="manufacturer" class="form-control" placeholder="Enter Manufacturers name">
<label>Photo</label>
<input type="file" name="uploadfile" class="form-control" placeholder="Choose file">
<label>Price</label>
<input type="number" name="price" class="form-control">
<label >Stock</label>
<input type="number" name="stock" placeholder="Enter stock recieved" class="form-control">
<br>
<center>
<input type="submit" name="submit" class="btn btn-primary btn-lg ">
</center>
</form>
</div>
             </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-2">
    <?php
    $msg = "";    
    // If upload button is clicked ...
    if (isset($_POST['submit'])) {    
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
            $folder = "Images/".$filename;
            $name=$_POST['name'];
            $manu=$_POST['manufacturer'];
            $price=$_POST['price'];
            $stock=$_POST['stock'];

                
            // Get all the submitted data from the form
            $sql = "INSERT INTO Product (Photo,Name,Manufacturer,Price,Stock) VALUES ('$filename','$name','$manu','$price','$stock')";
    
            // Execute query
            mysqli_query($db, $sql);
            
            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $folder)) {
                $msg = "Image uploaded successfully";
            }else{
                $msg = "Failed to upload image";
        }
        echo $msg;
    }
    $result = mysqli_query($db, "SELECT * FROM Product");
    ?>

    </div>
    </div>
        </div>
    </body>
</html>