<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h3 class="text-center text-success">All payments</h3>
   <table class="table table-bordered mt-5">
    <thead class="bg-info">
        <?php
        $getpay="select * from paymentdetails";
        $result=mysqli_query($con,$getpay);
        $rowcount=mysqli_num_rows($result);
       

    if($rowcount==0)
    {
        echo "<h2 class=' text-danger text-center mt-5'>No payments so far.</h2>";
    }else{
        echo "<tr>
        <th>SIno</th>
        <th>Amount</th>
        <th>Invoice number</th>
        <th>Delete</th>
    </tr> 
    </thead>
    <tbody class='bg-secondary'>";
        $number=0;
    while($rowdata=mysqli_fetch_assoc($result)){
        $orderid=$rowdata['orderid'];
        $paymentid=$rowdata['paymentid'];
        $amt=$rowdata['amount'];
        $inv=$rowdata['invoiceNo'];
        $date=$rowdata['date'];
       
        $number++;
        echo"<tr>
        <td>$number</td>
        <td>$inv</td>
        <td$amt</td>
        <td>$date</td>
        <td><a href='index.php?dltorders= $orderid' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
    </tr>";

    }
   
    }
                
        ?>
        
    
        
    </tbody>
   </table>


</body>

</html>