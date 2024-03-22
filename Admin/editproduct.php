<?php
if(isset($_GET['edit'])){
    $editid=$_GET['edit'];
    $getproducttoedit="select * from products where productid=$editid";
    $exe=mysqli_query($con,$getproducttoedit);
    $row =mysqli_fetch_assoc($exe);
    $producttitle=$row['producttitle'];
    $productdescription=$row['productdescription'];
    $productkeyword=$row['productkeyword'];
    $categoryid=$row['categoryId'];
    $productimage1=$row['productimage1'];
    $productprice=$row['productprice'];

    $selectcategory ="select * from categories where categoryId =$categoryid";
    $resultexe=mysqli_query($con,$selectcategory);
    $rowcate =mysqli_fetch_assoc($resultexe);
    $categorytitle=$rowcate['categorytitle'];

    }
    

?><div class="container mt-5">
    <h1 class="text-center">Edit product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="producttitle" class="form-label">Product title</label>
            <input type="text" id="producttitle" name="producttitle" class="form-control" required value ="<?php echo $producttitle ?>">
        </div> 
        <div class="form-outline  w-50 m-auto mb-4">
            <label for="productdesc" class="form-label">Product description</label>
            <input type="text" id="productdesc" name="productdescription" class="form-control" required value ="<?php echo $productdescription ?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="productkeyw" class="form-label">Product Keyword</label>
            <input type="text" id="productkeyw" name="productkeyword" class="form-control" required value ="<?php echo $productkeyword ?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="productdesc" class="form-label">Product Category</label>
            <select name="productcategory" class ="form-select">
                <option value="<?php echo $categoryId ?>"><?php echo $categoryid ?></option>
                <?php$selectcategoryall ="select * from categories ";
    $resultcat=mysqli_query($con,$selectcategoryall);

    while($rowcat =mysqli_fetch_assoc($resultcat)){
    $categorytitle=$rowcat['categorytitle'];
    $categoryid=$rowcat['categoryId'];

    echo "<option value='$categoryid'>$categorytitle</option>";
    
    };
    ?>

        </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="productimg1" class="form-label">Product Image</label>
            <div class="d-flex"><input type="file"  id="productimg1" name="productimg1" class="form-control w-50 m-auto" required>
            <img scr="./productimage/value =<?php echo $productimage1 ?>" alt="" class="productimg">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="productprice" class="form-label">Product price</label>
            <input type="text" id="productprice" name="productprice" class="form-control" required value ="<?php echo $productprice ?>">
        </div> 
        <div class="text-center">
            <input type="submit" name="editproduct" value="update product" class="btn btn-info px-3 mb-3">
        </div>
            

    </form>
</div>
<?php 
 if(isset($_POST['editproduct'])){

    $producttitle=$_POST['producttitle'];
    $productdesc=$_POST['productdescription'];
    $productkey=$_POST['productkeyword'];
    $productcategory=$_POST['productcategory'];
    $productimage1=$_FILES['productimg1']['name'];
    //$tempimg =$_FILES['productimg1']['temp_name' ];
    $tempimage1=$_FILES['productimg1']['tmp_name'];
    $productprice=$_POST['productprice'];
    

if($productprice==""){
    echo "<script>alert('product price cannot be empty!')</script>";
}
else{
    move_uploaded_file($tempimage1,"./productimages/$productimage1");
    $updateproducts= "update products set categoryId='$productcategory',producttitle='$producttitle',productkeyword='$productkey',productdescription='$productdesc',productprice='$productprice',date=NOW() where productid=$editid";
    
    $resultupdate=mysqli_query($con,$updateproducts);
    if($resultupdate){
        echo "<script>alert('Product updated')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
    else{
        echo "mysqli_error($con)";
    }

}
}
     
?>
