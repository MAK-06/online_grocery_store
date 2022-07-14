<?php
include ("connection.php");
include("function.php");
session_start();
$query="SELECT count(product_id) as count1 ,product_id FROM `cart` GROUP by product_id";
$result=mysqli_query($con,$query);
$total_price=0;
if(isset($_POST['delete'])){

  delete($_POST['id']);
  header("Location:cart.php");
  
  }
  if(isset($_POST['submit'])){
$bill=$_POST['bill'];
    $_SESSION['bill']=$bill;
  
    header("Location:user.php");
    
    }

?>




<!DOCTYPE htm;>
<html lang="en">
    <head>
        <link rel="stylesheet" href="./cart_1.css">
    </head>
    <body>
    <header>
      <div class="logo">
        <img src="./Images/Logo_F.png"  class="img-res" >
    </div>
    <div class="cart_1">
    <a  href="http://localhost/Grocery/Grocery/product.php"><button class=" btn_back" type="button">Back</button></a>
    </div>
    </header>
    <?php while($product_data=mysqli_fetch_assoc($result)){
      $id=$product_data['product_id'];
      $query1="select * from product where product_id='$id'";
      $result1=mysqli_query($con,$query1);
      $product_data1=mysqli_fetch_assoc($result1);
      $price_total=$product_data['count1']*$product_data1['price'];
     
      ?>
    
    <div class="container">
    <form method="POST">
    <img src="<?php echo $product_data1['product_img']; ?>" class="img">
      <label style="margin-left: 0px;"class="name"><?php echo $product_data1['product_name'];?></label>
      <lable class="price"><?php echo $product_data1['price'];?> Rs</lable>
      <input type="text" value="<?php echo $product_data1['product_id']; ?>" name='id'>
      <lable for="quantity" class="quantity">Quantity-<?php echo $product_data['count1']?></lable>
      <lable for="price_product" class="pproduct"><?php echo $price_total?>Rs</lable>
      <input type="submit" class="delete" name="delete" value="Delete from Cart">
     <?php  $total_price=$total_price+$price_total ?>
     </form>
    </div>
   
 
  <?php } 
  
    ?>

    <form method="POST">
    <div class="totalbill">
    <input style=" display:none;" name="bill" value="<?php echo $total_price;?>">
   <?php if($total_price==0){?>
    <b>YOUR CART IS EMPTY</b> <?php } else {?>
  
    <b>Total Bill is -<?php echo $total_price;?>Rs</b>
    <input  style=" margin-left: 800px; position: absolute; margin-top: 25px; width: 200px; height: 30px;
    border-radius: 1rem;"  type="submit" name="submit" style="margin-left :750px" id="buy" value="Place Order">
  <?php } ?>
    </div>
    </form>
</body>
</html>