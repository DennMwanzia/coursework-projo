<?php 
include('../includes/database.php');
include('../commonfun/commonfunkies.php');

if(isset($_GET['userid'])){
    $userid = $_GET['userid'];
}
    $ip =getIpAddress();
    $totalprice=0;
    $cartqueryprices = "select * from cart where ipaddr= '$ip'";
    $resultexe =mysqli_query($con,$cartqueryprices);
    $invoicenumber =mt_rand();
    $status ='pending';
    $countproducts=mysqli_num_rows($resultexe);

    while($rowprice=mysqli_fetch_array($resultexe)){
        $productid=$rowprice['productid'];
        $selectproduct ="select * from products where productid='$productid'";
        $runprice=mysqli_query($con,$selectproduct);
        while($rowproductprice=mysqli_fetch_array($runprice)){
            $productprice=array($rowproductprice['productprice']);
            $productvalues=array_sum($productprice);
            $totalprice+=$productvalues;

        }
    }

    $getcart ="select * from cart "; 
    $runcart=mysqli_query($con,$getcart);
    $getcartquantity=mysqli_fetch_array($runcart);
    $quantity=$getcartquantity['quantity'];
    if($quantity==0){
        $quantity=1;
        $subtotal=$totalprice;

    }
    else{
        $quantity=$quantity;
        $subtotal =$totalprice * $quantity;
    }

    $insertorders ="insert into orders(userid,amountdue,invoiceNo,totalproducts,orderdate,orderstatus)values($userid,$subtotal,$invoicenumber,$countproducts,NOW(),'$status')";
    $resultquery=mysqli_query($con,$insertorders);
    if($resultquery){
        echo "<script>alert('orders are submitted successfully')</script>";
        echo "<script>window.open('profile.php','_self')</script>";

    }
    $insertorderspending ="insert into orderspending(userid,invoiceNo,productid,quantity,orderstatus)values($userid,$invoicenumber,$productid,$quantity,'$status')";

    $resultorderspending=mysqli_query($con,$insertorderspending);

    $emptycart="delete from cart where ipaddr='$ip'";
    $exe=mysqli_query($con,$emptycart);





?>

