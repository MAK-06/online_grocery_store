<?php

    function add($id){
    include("connection.php");
    $query="insert into cart values('$id')";
    mysqli_query($con,$query);
    }
    function delete($id){
        include("connection.php");
        $query="Delete from cart where product_id='$id'";
        mysqli_query($con,$query);
    }
    function destroy(){
        include("connection.php");
        $query="Truncate table cart";
        mysqli_query($con,$query);
        session_destroy();


    }
?>