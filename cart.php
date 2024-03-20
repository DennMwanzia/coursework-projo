<?php
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
        <li class="nav-item">
          <a class="nav-link" href="./userarea/signup.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="displayeverything.php">Products</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link " href="cart.php" ><i class="fa-solid fa-cart-shopping"><sup><?php getcartno();?></sup></i></a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link" href="#">Contact
          </a>
        </li>
      </ul>
 
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

  <div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table-bordered text-center">
          
      <?php      
            global $con;
            $ip =getIpAddress();
            $totalprice=0;
            $cartquery="select * from cart where ipaddr='$ip'";
            $result=mysqli_query($con,$cartquery);
            $resultcount=mysqli_num_rows($result);
            if($resultcount>0){
              echo "
              <thead>
              <th>Product title</th>
              <th>product image</th>
              <th>Quantity</th>
              <th>Total price</th>
              <th>Remove</th>
              <th colspan ='2'>Operations</th>
          </thead>
          <tbody>";
            while($row=mysqli_fetch_array($result)){
            $productid=$row['productid'];
            $selectproducts = "select * from products where productid='$productid'";
            $resultproducts=mysqli_query($con,$selectproducts);
            while($rowproductprice=mysqli_fetch_array($resultproducts)){
            $price=array($rowproductprice['productprice']);
            $tableprice=$rowproductprice['productprice'];
            $pricetable =$rowproductprice['productprice'];
            $producttitle =$rowproductprice['producttitle'];
            $productimg1 =$rowproductprice['productimage1'];

            $calc=array_sum($price);
            $totalprice+=$calc;
      
        ?>

            <tr>
                <td><?php echo $producttitle  ?></td>
                <td><img src="./admin/productImages/<?php echo $productimg1  ?>"></td>
                <td><input type = "text" name="qty" id="" class="form-input w-50"></td>
                <?php 
          
                 $ip =getIpAddress();
                 if(isset ($_POST['updatecart'])){
                    $quantities=$_POST['qty'];
                    $sendtodb ="update cart set quantity=$quantities where ipaddr='$ip'";
                    $quick=mysqli_query($con,$sendtodb);
                    $totalprice=$totalprice*$quantities;
                 }
                ?>
                <td><?php echo $tableprice ?></td>
                <td><input type="checkbox" name="removeitem[]" value="<?php echo $productid ?>"></td>
                <td>
                <input type="submit" class=" bg-info px-2 mx-2 border-0 py-2 " value="Update" name="updatecart">
                <input type="submit" class=" bg-info px-2 mx-2 border-0 py-2 " value="Remove" name="removecart">
              </td> 
             </td>
            </tr>
            <?php }}}
            else{
              echo "<h2 class='text-center text-danger'>The cart is empty</h2>";

            }?>
            </tbody>
        </table>
    </div>
  </div>

  <div class="d-flex m-3">
    <?php
     global $con;
     $ip =getIpAddress();
     $cartquery="select * from cart where ipaddr='$ip'";
     $result=mysqli_query($con,$cartquery);
     $resultcount=mysqli_num_rows($result);
     if($resultcount>0){
      echo "
      <h4 class='px-3 '>Subtotal: <strong class='text-info'> $totalprice  </strong></h4>
      <input type='submit' class='bg-info px-2 mx-2 border-0 py-2 ' value='Continue Shopping' name='continueshoping'>
      <button class='px-2 mx-2'><a href='./userarea/checkout.php' class='bg-info border-0 py-2  text-decoration-none'>Checkout</button></a>
      ";
     }else{
      echo "<input type='submit' class='bg-info px-2 mx-2 border-0 py-2 ' value='Continue Shopping' name='continueshoping'>";
     }
     if(isset($_POST['continueshoping'])){
      echo "<script>window.open('index.php','_self');</script>";
     }
    

    ?>
  
  </div>
  </form>

  <?php
  function removecartitem(){
    global $con;
    if(isset($_POST['removecart'])){
      foreach($_POST['removeitem'] as $removeid){
        echo $removeid;
        $delete="delete from cart where productid =$removeid";
        $rundlt=Mysqli_query($con,$delete);
        if($rundlt){
          echo "<script>window.open('cart.php','_self');</script>";
        }
      }
    }
  }
  echo $remove =removecartitem();


?>


  
 

   <div class ="bg-info text-center p-3">
    <p>&copy;2024 Flash solutions.</p>
   </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>