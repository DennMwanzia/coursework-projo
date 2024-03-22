<?php

if(isset($_GET['editcat'])){
    $editcat=$_GET['editcat'];
    $getcat="select * from categories where categoryId =$editcat";
    $resultexe=mysqli_query($con,$getcat);
    $row = mysqli_fetch_assoc($resultexe);
    $categorytitle=$row['categorytitle'];

}

if(isset($_POST['updatecat'])){
   $cattitle= $_POST['categorytitle'];
   $updatequery="update categories set categorytitle='$cattitle' where categoryId =$editcat ";
   $exequery=mysqli_query($con,$updatequery);
   if($exequery){
    echo "<script>alert('category update successful')</script>";
    echo "<script>window.open('./index.php?viewcategories','_self')</script>";
   }
}


?>
<div class="container mt-3">

<h3 class="text-center text-success">Edit categories</h3>
<form action="" method="post" class="text-center">
    <div class="form-outline mb-4 w-50 m-auto">
        <label for="" class="form-label">Category title</label>
        <input type="text" name="categorytitle" class="form-control" required value="<?php echo $categorytitle ?>">
    </div>
    <input type="submit" value="update category" class="btn btn-info px-3 mb-3" name= "updatecat">

</form>
</div>