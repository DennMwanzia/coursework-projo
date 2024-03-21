<?php
session_start();
 include('./includes/database.php');
 include('./commonfun/commonfunkies.php');
 
 ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flash solutions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <?php
        if(!isset($_SESSION['username'])){
          echo "
          <li class='nav-item'>
          <a class='nav-link' href='./userarea/profile.php'>My account</a>
        </li>";
        }
        echo "
          <li class='nav-item'>
          <a class='nav-link' href='./userarea/signup.php'>Register</a>
        </li>";
         ?>
       
        <li class="nav-item">
          <a class="nav-link" href="displayeverything.php">Products</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link " href="cart.php"><i class="fa-solid fa-cart-shopping"><sup><?php getcartno();?></sup></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Price <?php totalcal(); ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact
          </a>
        </li>
      </ul>
      <form class="d-flex" action="searchproduct.php" method ="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="searchdata">
        <input type="submit" value="search" class="btn btn-outline-light" name="searchdataproduct">
      </form>
    </div>
  </div>
</nav>
<?php
cart();
?>

 <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="nav navbar-nav me-auto">
  
    <?php
    if(!isset($_SESSION['username'])){
      echo "<li class='nav-item'>
      <a class='nav-link' href='#'> Welcome User
      </a> </li>";
      
    }else{
      echo "<li class='nav-item'>
      <a class='nav-link' href='#'> Welcome  ".$_SESSION['username']."</a> </li>"; 

    }

    if(!isset($_SESSION['username'])){
      echo "<li class='nav-item'>
      <a class='nav-link' href='./userarea/userlogin.php'> Log in
      </a>";
    }else{
      echo "<li class='nav-item'>
      <a class='nav-link' href='./userarea/logout.php'> Log out
      </a>";

    } ?>
    
  </ul>
  </nav>
  <div class="bg-light">
    <p class="text-center">Nurturing Nature through Digital Waste Care</p>
  </div>

  <div class="row">

    <div class="col-md-2">
      <div class ="col-md bg-info p-0">
        <ul class ="navbar-nav me-auto text-center">
        <li class=" nav-item bg-secondary">
        <a href="#" class ="nav-link text-light"><h3>Categories</h3></a>
      </li>
          <?php
          getcategories();
          getuniquecategories();

          ?> 
      </ul>
      </div>
    </div>
    <!-- end of first row for categories -->

    <div class="col-md-10">
      <!-- insert products -->
      <div class="row">

        <?php

      getproducts();
      $ip = getIPAddress();  
      echo 'User Real IP Address - '.$ip; 
        ?>
      <!-- row ending div -->
    </div>
    <!-- col ending div -->
  </div>
  


  
 

   <div class ="bg-info text-center p-3">
    <p>&copy;2024 Flash solutions.</p>
   </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>