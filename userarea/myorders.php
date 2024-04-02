<?php
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    
        $username=$_SESSION['username'];
        $getuser="select * from user where username = '$username'";
        $result=mysqli_query($con,$getuser);
        $rowfetch=mysqli_fetch_assoc($result);
        $userid=$rowfetch['userid'];

        
        ?>
<h3 class="text-success">All orders</h3>
<table class = "table table-bordered mt-5">
    <thead class="bg-info">
    <tr>
        <th>Serial no</th>
        <th>Amount due</th>
        <th>Total product</th>
        <th>Invoice number</th>
        <th>Date</th>
        <th>Complete/incomplete</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody class="bg-secondary text-light">

     <?php 
     $getorderdetails = "select * from orders where userid ='$userid'";
     $resultexe=mysqli_query($con,$getorderdetails);
     $number =1;
     while($roworders=mysqli_fetch_assoc($resultexe)){
        $orderid=$roworders['orderid'];
        $amountdue=$roworders['amountdue'];
        $totalproducts=$roworders['totalproducts'];
        $orderdate=$roworders['orderdate'];
        $invoiceno=$roworders['invoiceNo'];
        $orderstatus=$roworders['orderstatus'];
        if($orderstatus=='pending'){
            $orderstatus='Incomplete';
        }else{
            $orderstatus='Complete';

            }
        
      
        echo "<tr>
        <td>$number</td>
        <td>$amountdue</td>
        <td>$totalproducts</td>
        <td>$invoiceno</td>
        <td>$orderdate</td>
        <td>$orderstatus</td>";
        $number++;
        }?>
       
        <?php
        if($orderstatus=="paid"){
            echo "<td>Paid</td>";
        }else{
          echo "<td><a href='confirmpay.php?orderid=$orderid'  class='text-light'>confirm</a></td>
          </tr>" ;
        }
        
     

     ?>
    
     

    </tbody>
</table>
    
</body>
</html>