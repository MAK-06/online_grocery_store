<?php
session_start();
include("connection.php");
include("function.php");
$i = 0;
if($_SERVER['REQUEST_METHOD']==="POST"){
    $a=array();
    
    $query="select * from cart";
    $result=mysqli_query($con,$query);
    $num=mysqli_num_rows($result);
    while($product_data=mysqli_fetch_assoc($result)){
 $a[$i]=$product_data['product_id'];
 $i=$i+1;
 }
 
  $value=  implode(",", $a);
 $username=$_POST['Username'];

 $bill=$_SESSION['bill'];
    $query="insert into users(user_name,product_id,bill) values('$username','$value','$bill')";
    $result=mysqli_query($con,$query);
    if($result){
        echo '<script type="text/JavaScript">  
        alert("Your Order is Placed is completed"); 
        </script>';
        $_SESSION['rollno']=$rollno;
         header("Location:product.php");
       die();

    }
    else
    {
        echo 'not updated';
    }
    
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="user1.css">
        <script src="signup.js">

        </script>
      <title>
        
      </title>
    </head>
    <body>
    <div class="header" style="margin-top: -20px;">
            <h2 style="margin-left:50px;">Complete yout Order</h2>
        <div class="main">
           
              <form method="POST">
                <div class="container">
                   
                    <lable for="Username"><b>Username</b></lable><br>
                    <input type="text" placeholder="Enter Username" name="Username" required><br>
                    <lable for="Email"><b>Email</b></lable><br>
                    <input type="email" placeholder="Enter Email" name="Email" required><br>
                    <lable for="Contact Number"><b>Contact Number</b></lable><br>
                    <input type="number" placeholder="Enter Contact Number" name="ContactNumber" ><br>
                    <lable for="Address"><b>Address</b></lable><br>
                    <input type="text" placeholder="Enter Address" name="address" required><br>
                   <input type="submit" id="Submit" value="Place Your Order" class="Submit" name="submit">
                    
                </div>
                </form>   
             
        </div>
        <div class="footer">

<div class="footer-logo">Thanks for your support</div>
</div>
    </body>
</html>