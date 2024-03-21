<?php

//include('./includes/database.php');

function getproducts(){
  global $con;
  if(!isset($_GET['category'])){
    $select_query="select * from products order by rand() limit 0,9";
        $result_query= mysqli_query($con,$select_query);
        
        while($row=mysqli_fetch_assoc($result_query)){
          $productid=$row['productid'];
          $producttitle=$row['producttitle'];
          $productdescription=$row['productdescription'];
          $productkeyword=$row['productkeyword'];
          $productcategoryid=$row['categoryId'];
          $productimage1=$row['productimage1'];
          $productimage2=$row['productimage2'];
          $productimage3=$row['productimage3'];
          $productprice=$row['productprice'];
          echo "<div class='col-md-4'>
          <div class='card'>
          <img src='./admin/productImages/$productimage1' class='card-img-top' alt='$producttitle'>
          <div class='card-body'>
            <h5 class='card-title'> $producttitle</h5>
            <p class='card-text'>$productdescription</p>
            <p class='card-text'>Price:$productprice</p>
            <a href='index.php?addtocart=$productid' class='btn btn-info'>Add to cart</a>
            <a href='productdetails.php?productid=$productid' class='btn btn-secondary'>View more</a>
          </div>
        </div>
      </div>";
        }
}
}

function getuniquecategories(){
  global $con;
  if(isset($_GET['category'])){
    $categoryid=$_GET['category'];
    $select_query="select * from products where categoryid=$cateogryid";
        $result_query= mysqli_query($con,$select_query);

        $count =mysqli_num_rows($result_query); 
        if($count<0){
          echo "<h3 class ='text-center text-danger'>No stock for this category</h3>";
        }
        
        while($row=mysqli_fetch_assoc($result_query)){
          $productid=$row['productid'];
          $producttitle=$row['producttitle'];
          $productdescription=$row['productdescription'];
          $productkeyword=$row['productkeyword'];
          $productcategoryid=$row['categoryId'];
          $productimage1=$row['productimage1'];
          $productimage2=$row['productimage2'];
          $productimage3=$row['productimage3'];
          $productprice=$row['productprice'];
          echo "<div class='col-md-4'>
          <div class='card'>
          <img src='./admin/productImages/$productimage1' class='card-img-top' alt='$producttitle'>
          <div class='card-body'>
            <h5 class='card-title'> $producttitle</h5>
            <p class='card-text'>$productdescription</p>
            <p class='card-text'>Price:$productprice</p>
            <a href='index.php?addtocart=$productid' class='btn btn-info'>Add to cart</a>
            <a href='productdetails.php?productid=$productid' class='btn btn-secondary'>View more</a>
          </div>
        </div>
      </div>";
        }
}

}

function displayevery(){
  global $con;
  if(!isset($_GET['category'])){
    $select_query="select * from products order by rand()";
        $result_query= mysqli_query($con,$select_query);
        
        while($row=mysqli_fetch_assoc($result_query)){
          $productid=$row['productid'];
          $producttitle=$row['producttitle'];
          $productdescription=$row['productdescription'];
          $productkeyword=$row['productkeyword'];
          $productcategoryid=$row['categoryId'];
          $productimage1=$row['productimage1'];
          $productimage2=$row['productimage2'];
          $productimage3=$row['productimage3'];
          $productprice=$row['productprice'];
          echo "<div class='col-md-4'>
          <div class='card'>
          <img src='./admin/productImages/$productimage1' class='card-img-top' alt='$producttitle'>
          <div class='card-body'>
            <h5 class='card-title'> $producttitle</h5>
            <p class='card-text'>$productdescription</p>
            <p class='card-text'>Price:$productprice</p>
            <a href='index.php?addtocart=$productid' class='btn btn-info'>Add to cart</a>
            <a href='productdetails.php?productid=$productid' class='btn btn-secondary'>View more</a>
          </div>
        </div>
      </div>";
        }
}
}
function getcategories(){
  global $con;
  $selectcategories="Select * from categories";
          $result_cat = mysqli_query($con, $selectcategories);

         while($row_data=mysqli_fetch_assoc($result_cat)){
          $cat_title=$row_data['categoryId'];
          $categoryid=$row_data['categorytitle'];
          echo "<li class ='nav-item'>
          <a href='#' class ='nav-link text-light'>$categoryid</a>
      </li>";
         }
} 

function search(){
  global $con;
 if(isset($_GET['searchdataproduct'])){
  $dataenter=$_GET['searchdata'];
    $search="select * from products  where productkeyword like'%$dataenter%' ";
        $result_query= mysqli_query($con,$search);
        
        while($row=mysqli_fetch_assoc($result_query)){
          $productid=$row['productid'];
          $producttitle=$row['producttitle'];
          $productdescription=$row['productdescription'];
          $productkeyword=$row['productkeyword'];
          $productcategoryid=$row['categoryId'];
          $productimage1=$row['productimage1'];
          $productimage2=$row['productimage2'];
          $productimage3=$row['productimage3'];
          $productprice=$row['productprice'];
          echo "<div class='col-md-4'>
          <div class='card'>
          <img src='./admin/productImages/$productimage1' class='card-img-top' alt='$producttitle'>
          <div class='card-body'>
            <h5 class='card-title'> $producttitle</h5>
            <p class='card-text'>$productdescription</p>
            <p class='card-text'>Price:$productprice</p>
            <a href='index.php?addtocart=$productid' class='btn btn-info'>Add to cart</a>
            <a href='productdetails.php?productid=$productid' class='btn btn-secondary'>View more</a>
          </div>
        </div>
      </div>";
        }
}
}    function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
 
function cart(){
  if(isset($_GET['addtocart'])){
    global $con;
    $ip =getIpAddress();
    $getproductid=$_GET['addtocart'];
    $select ="select * from cart where ipaddr ='$ip' and productid='$getproductid'";
    $result_query= mysqli_query($con,$select);

    $count = mysqli_num_rows($result_query);
    if($count > 0){
      echo "<script>alert('Product is already in cart');</script>";
      echo "<script>window.open('index.php');</script>";
    }
    else{
      $insert ="insert into cart (productid,ipaddr,quantity) values('$getproductid','$ip',0)";
      $result_query  = mysqli_query($con,$insert);
      echo "<script>alert('Product added to cart');</script>";
      echo "<script>window.open('index.php');</script>";
    }

  }

}

function getcartno(){
  if(isset($_GET['addtocart'])){
    global $con;
    $ip =getIpAddress();
    $select ="select * from cart where ipaddr ='$ip'";
    $result_query= mysqli_query($con,$select);

    $count = mysqli_num_rows($result_query);}
 
    else{
      global $con;
    $ip =getIpAddress();
    $select ="select * from cart where ipaddr ='$ip'";
    $result_query= mysqli_query($con,$select);

    $count = mysqli_num_rows($result_query);
  }
  echo $count;

  }

  function totalcal(){
    global $con;
    $ip =getIpAddress();
    $totalprice=0;
    $cartquery="select * from cart where ipaddr='$ip'";
    $result=mysqli_query($con,$cartquery);
    while($row=mysqli_fetch_array($result)){
      $productid=$row['productid'];
      $selectproducts = "select * from products where productid='$productid'";
      $resultproducts=mysqli_query($con,$selectproducts);
      while($rowproductprice=mysqli_fetch_array($resultproducts)){
        $price=array($rowproductprice['productprice']);
        $calc=array_sum($price);
        $totalprice+=$calc;

      }
    }
  echo $totalprice;

  }
 
  function getorderdetails(){
    global $con;
    $username=$_SESSION['username'];
    $getdetails="select * from user where username='$username'";
    $resultq=mysqli_query($con,$getdetails);
    while($rowquer=mysqli_fetch_array($resultq)){
      $userid=$rowquer['userid'];
      if(!isset($_GET['editaccount'])){
        if(!isset($_GET['myorders'])){
          if(!isset($_GET['deleteaccount'])){
            $getorders="select * from orders where userid='$userid' and orderstatus ='pending'";
            $exequery=mysqli_query($con,$getorders);
            $rowcount=mysqli_num_rows($exequery);
            if($rowcount>0){
              echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class= 'text-danger'>$rowcount</span> pending orders</h3>
              <p class='text-center' ><a href='profile.php?myorders' class ='text-dark'>Order details</a></p>";
            }else{
              echo "<h3 class='text-center text-success mt-5 mb-2'>You have zero pending orders</h3>
              <p class='text-center' ><a href='../index.php' class ='text-dark'>Shop more</a></p>";

            }
            

          }

      }
    }
  }
}
  




?>