<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_GET['dltorders'])){
        $dltorderid=$_GET['dltorders'];
        $dltquery = "delete from orders where orderid=$dltorderid";
        $exe=mysqli_query($con,$dltquery);
        if($exe){
            echo "<script>alert('Order deleted')</script>";
            echo "<script>window.open('index.php?allorders','_self')</script>";
        }
    }
    ?>
</body>
</html>