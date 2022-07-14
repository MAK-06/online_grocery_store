<?php
include ("connection.php");
include("function.php");
session_start();
$query="SELECT * FROM `users`";
$result=mysqli_query($con,$query);
$total_price=0;
if(isset($_POST['delete'])){

  delete($_POST['id']);
  header("Location:cart.php");
  
  }
  if(isset($_POST['submit'])){
$bill=$_POST['bill'];
    $_SESSION['bill']=$bill;
    destroy();
    header("Location:user.php");
    
    }

?>




<!DOCTYPE htm;>
<html lang="en">
    <head>
        <link rel="stylesheet" href="admin.css">
    </head>
    <body>
    <header>
      <div class="logo">
        <img src="./Images/Logo_F.png"  class="img-res" >
    </div>
    <div class="cart">
    <a  href="./login.html">GO Back </a>
    </div>
    </header>
    <h2> Order Id &nbsp &nbsp &nbsp &nbsp &nbsp Name of Customer &nbsp &nbsp &nbsp &nbsp &nbspTotal Bill&nbsp &nbsp &nbsp &nbsp &nbspProduct Id&nbsp &nbsp &nbsp &nbsp &nbsp Date of Purchase &nbsp &nbsp &nbsp &nbsp Address</h2>
    <?php while($product_data=mysqli_fetch_assoc($result)){
      $id=$product_data['order_id'];
      $name=$product_data['user_name'];
      $date=$product_data['date'];
      $bill=$product_data['bill'];
      $str=$product_data['product_id'];
      $address=$product_data['address'];
     ?>
   <div class="container1">
       <div class="container2">
   <label class="id"><?php echo $id?></label>&nbsp &nbsp &nbsp &nbsp &nbsp
   <label class="name"><?php echo $name?></label>&nbsp &nbsp &nbsp &nbsp &nbsp
   <label class="bill"><?php echo $bill?></label>&nbsp &nbsp &nbsp &nbsp &nbsp
   <label class="product"><?php echo $str?></label>&nbsp &nbsp &nbsp &nbsp &nbsp
   <label class="date"><?php echo $date?></label>&nbsp &nbsp &nbsp &nbsp &nbsp
   <label style = "margin-left: 650px; position: absolute;" class="address"><?php echo $address?></label>&nbsp &nbsp &nbsp &nbsp &nbsp
        </div>
   
   </div>


  <?php } ?>

  
 
</body>
</html>