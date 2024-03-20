<?php

 include('../includes/database.php');
 include('../commonfun/commonfunkies.php');
 
 ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <!-- code to acess the user id -->
  <?php
  $ip =getIpAddress();
  $getuser ="select * from user where ipaddr ='$ip'";
  $result = mysqli_query($con,$getuser);
  $runquery = mysqli_fetch_array($result);
  $userid =$runquery['userid'];

  ?>
  <div class="container">
    <h2 class="text-center text-info">Payment</h2>
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-md-12">
        <a href="order.php?userid=<?php echo $userid ?>"><h2 class="text-center"> Pay</h2></a>
      </div>
    </div>

  </div>
</body>
</html>