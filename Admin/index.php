<?php
 include('../includes/database.php');
 include('../commonfun/commonfunkies.php');
 
 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminstrator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>.productimg{
        width:100px;
        object-fit:contain;
    }</style>
</head>
<body>
<div class="container-fluid p-0">
    <nav class="navbar nav-expand-lg navbar-light bg-info">
        <div class="container-fluid">
        <nav class="navbar nav-expand-lg navbar-light bg-info">
            <ul class ="navbar-nav">
                <li class="nav-item">
                    <a href="" class="nav-link">welcome </a>
                </li>

            </ul>
        </nav>

        </div>
    </nav> 

    <div class="bg-light">
        <h3 class="text-center p-2">Manage details</h3>
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <a href="#"><img src="" alt="" class="adminimg"></a>
                <p class="text-light text-center m-3">Admin name</p>
                <div class="button text-center">
                <button><a href="insertproducts.php" class="bg-info border-0 p-2 my-2"> Insert  product</a></button>
                <button><a href="index.php?viewproducts" class="nav-lin text-light bg-info my-1">View products</a></button>
                <button><a href="index.php?insert_category" class="nav-lin text-light bg-info my-1">Insert Categories</a></button>
                <button><a href="index.php?viewcategories" class="nav-lin text-light bg-info my-1">View categories</a></button>
                <button><a href="index.php?listorders" class="nav-lin text-light bg-info my-1">All orders</a></button>
                <button><a href="index.php?allpays" class="nav-lin text-light bg-info my-1">All payments</a></button>
                <button><a href="index.php?listuser" class="nav-lin text-light bg-info my-1">List users</a></button>
                <button><a href="" class="nav-lin text-light bg-info my-1">Log out</a></button>
            </div>
                 
            </div>
           

       </div>

        
    </div>
    <div class ="container my-3">
        <?php
        if(isset($_GET['insert_category'])){
            include('insert categories.php');
        }
        if(isset($_GET['insert_brands'])){
            include('insert brands.php');
        }
        if(isset($_GET['viewproducts'])){
            include('viewproducts.php');
        }
        if(isset($_GET['edit'])){
            include('editproduct.php');
        }
        if(isset($_GET['deleteproduct'])){
            include('deleteproduct.php');
        }
        if(isset($_GET['viewcategories'])){
            include('viewcategories.php');
        }
        if(isset($_GET['editcat'])){
            include('editcategory.php');
        }
        if(isset($_GET['dltcat'])){
            include('deletecategory.php');
        }
        if(isset($_GET['listorders'])){
            include('allorders.php');
        }
        if(isset($_GET['dltorders'])){
            include('deleteorders.php');
        }
        if(isset($_GET['allpays'])){
            include('allpayments.php');
        }
        if(isset($_GET['listuser'])){
            include('listusers.php');
        }





        ?>
</div>


</div>
    




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>