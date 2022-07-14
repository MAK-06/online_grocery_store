<?php
include ("connection.php");
include("function.php");
session_start();
$vegetable="vegetable";
$query="select * from product where category='$vegetable'";
$query1="select * from cart";
$result1=mysqli_query($con,$query1);
$num=mysqli_num_rows($result1);
$result=mysqli_query($con,$query);
if(isset($_POST['add'])){

add($_POST['id']);
header("Location:product.php");

}
if(isset($_POST['search1'])){
  $search2=$_POST['search2'];
  $query="SELECT *  FROM `product` WHERE `product_name` LIKE '%$search2%' or `category`='$vegetable'";
$result=mysqli_query($con,$query);
}

?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="./CSS/product1.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
    <header>
      <div class="logo">
        <img src="./Images/Logo_F.png"  class="img-res" >
    </div>
    <div class="cart">
    <a style="color: black;" href="http://localhost/Grocery/Grocery/cart.php"><i class="fa fa-shopping-cart" style="font-size:48px;color:red"></i>(<?php echo $num ?>)</a>
    
    
    </div>
    <div class="cart1">
    <a  href="index.html">GO Back </a>
    </div>
    <div class="search">
    <form class="example" method="POST" style="margin:auto;max-width:300px">
  <input type="text" placeholder="Search for products.." name="search2">
  <button type="submit" name="search1"><i class="fa fa-search"></i></button>
  <div>
</form>
    </header>
    <?php while($product_data=mysqli_fetch_assoc($result)){?>
    <form method="POST">
    <div class="container">
    
    <img src="<?php echo $product_data['product_img']; ?>" class="img"><br><br>
      <label style="margin-left: 0px;"class="name"><?php echo $product_data['product_name'];?></label><br>
      <lable class="price"><?php echo $product_data['price'];?> Rs</lable><br><br>
      <input type="text" value="<?php echo $product_data['product_id']; ?>" name='id'>
      <input type="submit" class="add" name="add" value="Add to cart">
    </div>
   
  </form>
  <?php } ?>
</body>
</html>