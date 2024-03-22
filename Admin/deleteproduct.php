<?php
if(isset($_GET['deleteproduct'])){
    $deleteid=$_GET['deleteproduct'];

    $deletequery="delete  from products where productid=$deleteid";
    $runquery=mysqli_query($con,$deletequery);
    if($runquery){
        echo "<script>alert('Product deleted')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
    else{
        echo  mysqli_error($con) ;
    }
}
?>