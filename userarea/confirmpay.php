<?php
session_start();
 include('../includes/database.php');?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flash solutions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<?php
if(isset($_GET['orderid'])){
    $orderid =$_GET['orderid'];
    $selectdata ="select * from orders where orderid=$orderid";
    $exe=mysqli_query($con,$selectdata);
    $rowfetch=mysqli_fetch_assoc($exe);

    $invoicenumber=$rowfetch['invoiceNo'];
    $amountdue=$rowfetch['amountdue'];
}
//making posting payment to db
if(isset($_POST ['confirmpayment'])){
    $invoiceno=$_POST['invoicenumber'];
    $amt=$_POST['amount'];
    $paymentmode=$_POST['payment'];

    $insert="insert into paymentdetails (orderid,invoiceNo,amount,paymentmode)values ($orderid,$invoiceno, $amt, '$paymentmode')";
    $result=mysqli_query($con,$insert);
    if($result){
        echo "<h3 class='text-light text-center'>Successfully completed your payment</h3>";
        echo "<script>window.open('profile.php?myorders','_self')</script>";
    }
    $updateorders ="update orders set orderstatus ='Complete' where orderid=$orderid";
    $resultorders=mysqli_query($con,$updateorders);


}

 
 ?>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 </head>
 <body class ="bg-info">
   
    <div class="container my-5">
    <h1 class ="text-center text-light">Confirm payment</h1>
    <br>
    <br>
        <form action="stkpush.php" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoicenumber" value="<?php echo $invoicenumber?>">             
            </div>
         
    
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment" id="" class="form-select w-50 m-auto">
                    <option value="">cash</option>
                    <option value="">Mpesa</option>
                    
                </select>   
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
            <label for="amount" class="form-label">Amount (Ksh):</label>
            <input type="number" id="amount" name="amount" min="1" value="<?php echo $amountdue ?>" readonly class="form-control w-50 m-auto">
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
            <label for="phone" class="form-label">Phone Number:</label>
             <input type="text" id="phone" name="phone" class="form-control w-50 m-auto" required >
            </div>
               
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="bg-secondary py-2 px-3 border-0" value= "confirm" name="confirmpayment">             
            </div>
            
  
  
</form>

</form>

    </div>
    
 </body>
 </html>