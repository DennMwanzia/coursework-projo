<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php
   if(isset($_GET['dltcat'])){
    $dlt=$_GET['dltcat'];
    $deletequery="delete from categories where categoryId= $dlt";
    $result= mysqli_query($con,$deletequery);
    if($result){
        echo "<script>alert('delete successful')</script>";

        echo "<script>window.open('./index.php?viewcategories','_self')</script>";
    }
   }
   ?>
   
</body>
</html>