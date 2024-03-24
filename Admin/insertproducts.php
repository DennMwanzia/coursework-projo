<?php
include('../includes/database.php');
                
if(isset($_POST['insertproduct'])){
    $producttitle=$_POST['producttitle'];
    $Description=$_POST['Description'];
    $productkeyword=$_POST['Keyword'];
    $productcategory=$_POST['productcategory'];
    $productprice=$_POST['Productprice'];
    $productstatus ='true';

    $productimage1=$_FILES['productimage1']['name'];
    $productimage2=$_FILES['productimage2']['name'];
    $productimage3=$_FILES['productimage3']['name'];

    $tempimage1=$_FILES['productimage1']['tmp_name'];
    $tempimage2=$_FILES['productimage2']['tmp_name'];
    $tempimage3=$_FILES['productimage3']['tmp_name'];

    if($producttitle=='' or $Description=='' or $productkeyword=='' or $productprice=='' or  $productimage1=='' or  $productimage2=='' or  $productimage3==''){
        echo "<script> alert('Please fill all the available fields');</script>";
    }else{
        move_uploaded_file($tempimage1, "./productImages/$productimage1");
        move_uploaded_file($tempimage2, "./productImages/$productimage2");
        move_uploaded_file($tempimage3, "./productImages/$productimage3");

        $insertproducts ="insert into products (producttitle,productdescription,productkeyword,categoryId,productimage1,productimage2,productimage3,productprice,date,status) VALUES ('$producttitle',' $Description','$productkeyword','$productcategory','$productimage1','$productimage2','$productimage3','$productprice',NOW(),'$productstatus')";

        $resultquery= mysqli_query($con,$insertproducts);
        if($resultquery){
            echo "<script>alert('Product inserted successfully');</script>";
        }
    else{
        echo  mysqli_error($con) ;
    }
        
            
    }

   
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
    <div class="container">
        <h3 class="text-center mt-2">Insert products</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class ="form-outline mb-4 w-50 m-auto">
                <label for="producttitle" class="form-label">Product title</label>
                <input type="text" id="producttitle" name="producttitle" class="form-control" placeholder="Enter product title" class="form-control" autocomplete="off" required>
            </div>
            <div class ="form-outline mb-4 w-50 m-auto">
                <label for="Description" class="form-label">Description</label>
                <input type="text" id="Description" name="Description" class="form-control" placeholder="Enter product description" class="form-control" autocomplete="off" required>
            </div>
            <div class ="form-outline mb-4 w-50 m-auto">
                <label for="Keyword" class="form-label">Product Keywords</label>
                <input type="text" id="Keyword" name="Keyword" class="form-control" placeholder="Enter product keywords" class="form-control" autocomplete="off" required>
            </div>

            <div class ="form-outline mb-4 w-50 m-auto">
                <select name="productcategory" id="" class="form-select">
                    
                   
                   <?php
                    $select = "select  * from categories";
                    $result_query=mysqli_query($con,$select);
                    while($row=mysqli_fetch_assoc($result_query)){
                    $categorytitle=$row['categorytitle'];
                    $categoryid=$row['categoryId'];
                    echo "<option value='$categoryid'>$categorytitle</option>";
                    }
                    ?>
            
                </select>
            </div>

            <div class ="form-outline mb-4 w-50 m-auto">
                <label for="product image 1" class="form-label">product image 1</label>
                <input type="file" id="product image 1" name="productimage1" class="form-control"  required>
            </div>

            <div class ="form-outline mb-4 w-50 m-auto">
                <label for="product image 2" class="form-label">product image 2</label>
                <input type="file" id="product image 2" name="productimage2" class="form-control"  required>
            </div>
            
            <div class ="form-outline mb-4 w-50 m-auto">
                <label for="product image 3" class="form-label">product image 2</label>
                <input type="file" id="product image 3" name="productimage3" class="form-control"  required>
            </div>
             <div class ="form-outline mb-4 w-50 m-auto">
                <label for="Product price" class="form-label">Product Price</label>
                <input type="text" id="Product price" name="Productprice" class="form-control" placeholder="Enter product Price" class="form-control" autocomplete="off" required>
            </div>

            <div class ="form-outline mb-4 w-50 m-auto">
                <input type="submit" id="Product price" name="insertproduct" class="btn btn-info mb-3 px-3" value="Insert Products">
            </div>
            

        </form>
    </div>
    
</body>
</html>