<?php
session_start();
include "config.php";
if (isset($POST['add_to_cart'])) {
    if (isset($_SESSION['shopping_cart'])) {
        # code...
    }
}
?>
<html>
    <head>
        <title>
            Drinks Zetu POS System
        </title>
        <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="drinks.css">
        <script src="Bootstrap/js/bootstrap.js"></script>
    </head>
    <body>
        <div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <!-- Data for the products to be entered here. -->
            <br><br><br>
            <div>

<div class="row height d-flex justify-content-center align-items-center">
  <div class="col-md-6">
    <div class="form">
      <i class="fa fa-search"></i>
      <input type="text" class="form-control form-input" placeholder="Search anything...">
    </div>  
    <br>  
  </div>
  
</div>

</div>

<!-- product card sample -->
<?php
$query="SELECT * FROM Product ORDER BY Product_ID ASC";
$result=mysqli_query($db,$query);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result))
{
?>
<form action="index.php" method="POST">
<div class="card">
    <a  style="text-decoration: none">
  <img src="Images/DrinksZetu.png" alt="Drinks Zetu" height="100" width="140" >
  <h4><?php echo $row['Name']?></h4>
<?php echo $row['Manufacturer']?>   
  <p class="price">Ksh. <?php echo $row['Price']?></p>
  <p><button type="submit" name="add_to_cart" value="Add">Add</button></p>
  </a>
</div>
</form>
<?php
}
}
?>
</div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <!-- Data for the checkout system is to be input here. -->
           <div class="jumbotron" id="jumbotron">
<h3>Orders</h3>
<hr>
<!-- list of the data that is to be tallied -->
<table class="table">
<thead>
    <tr>
        <td><strong>Name</strong></td>
        <td><strong>Quantity</strong></td>
        <td><strong>Amount</strong></td>
        <td><strong></strong></td>
    </tr>
</thead>
<tbody>
    <tr>
    <td>Tusker</td>
    <td>21</td>
    <td>28</td>
    <td><button class="btn btn-danger btn-sm">Remove</button></td>
</tr>   <tr>
    <td>Tusker</td>
    <td>21</td>
    <td>28</td>
    <td><button class="btn btn-danger btn-sm">Remove</button></td>
</tr>
</tbody>
</table>
<hr>
<strong>Sub Total:</strong>
<div class="right">
<!--Data for totals -->
</div>
<br>
<br>
<strong>Tax:</strong>
<br>
<hr>
<strong>Total</strong>
<br>
<br>
<center>
<button class="btn btn-lg btn-success">
Checkout
</button>
</center>

           </div>
        </div>
    </div>
        </div>
    </body>
</html>