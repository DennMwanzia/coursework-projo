<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h3 class="text-center text-success">All orders</h3>
   <table class="table table-bordered mt-5">
    <thead class="bg-info">
        <?php
        $getorders="select * from orders";
        $result=mysqli_query($con,$getorders);
        $rowcount=mysqli_num_rows($result);
       

    if($rowcount==0)
    {
        echo "<h2 class=' text-danger text-center mt-5'>No orders</h2>";
    }else{
        echo "<tr>
        <th>SIno</th>
        <th>Due amount</th>
        <th>Invoice number</th>
        <th>Total products</th>
        <th>Order date</th>
        <th>Status</th>
        <th>Delete</th>
    </tr> 
    </thead>
    <tbody class='bg-secondary'>";
        $number=0;
    while($rowdata=mysqli_fetch_assoc($result)){
        $orderid=$rowdata['orderid'];
        $userid=$rowdata['userid'];
        $amtdue=$rowdata['amountdue'];
        $inv=$rowdata['invoiceNo'];
        $tp=$rowdata['totalproducts'];
        $od=$rowdata['orderdate'];
        $os=$rowdata['orderstatus'];
        $number++;
        echo"<tr>
        <td>$number</td>
        <td>$userid</td>
        <td$amtdue</td>
        <td>$inv</td>
        <td>$tp</td>
        <td>$od</td>
        <td>$os</td>
        <td><a href='index.php?dltorders= $orderid' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
    </tr>";

    }
   
    }
                
        ?>
        
    
        
    </tbody>
   </table>


</body>

</html>