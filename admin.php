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
        <link rel="stylesheet" href="cart.css">
    </head>
    <body>
    <header>
      <div class="logo">
        <img src="./Images/Logo_F.png"  class="img-res" >
    </div>
    <div class="cart">
    <a  href="http://localhost/Grocery/Grocery/product.php">GO Back </a>
    </div>
    </header>
    
    <?php while($product_data=mysqli_fetch_assoc($result)){
      $id=$product_data['order_id'];
      $name=$product_data['user_name'];
      $date=$product_data['date'];
      $bill=$product_data['bill'];
      $str=$product_data['product_id'];
      $arr=explode(",",$str);
     ?>
   <div class="container1">
       
   <label style="margin-left: 0px;"class="name"><?php echo $id?></label>
   <label style="margin-left: 0px;"class="name"><?php echo $name?></label>
   <label style="margin-left: 0px;"class="name"><?php echo $date?></label>
   <label style="margin-left: 0px;"class="name"><?php echo $bill?></label>
    </div>
    <?php $arr_length = count($arr);
         for($i=0;$i<$arr_length;$i++){
             $pid=$arr[$i];
           
             $query1="select * from product where product_id='$pid'";
             $result1=mysqli_query($con,$query1);
             $product_data1=mysqli_fetch_assoc($result1);?>
     <div class="container">
    
    <img src="<?php echo $product_data1['product_img']; ?>" class="img">
      <label style="margin-left: 0px;"class="name"><?php echo $product_data1['product_name'];?></label>
      <lable class="price"><?php echo $product_data1['price'];?> Rs</lable>
    
    </div>
   <? } ?>
 <br><br>
  <?php } ?>

  
  <?php } ?>
</body>
</html>