<?php
$host="localhost";
$user="root";
$password="";
$dbname="fooditems";
$con=mysqli_connect($host,$user,$password,$dbname);
if(!$con){
    echo'connection failed';
}


?>