<?php
include('../includes/database.php');
if(isset($_POST['insert_cat'])){
  $cat_title=$_POST['Cat-Title'];

  $select_query="select *from categories where categorytitle='$cat_title'";
  
  $result_select=mysqli_query($con,$select_query);

  $number=mysqli_num_rows($result_select);

  if($number>0){
    echo '<script>alert("This category is  in the database");</script>';

  }else{

  $number=mysqli_num_rows($result_select);
  $sql="INSERT INTO categories(categorytitle) VALUES('$cat_title')";

  $result=mysqli_query($con,$sql);
  if($result){
    echo '<script>alert("Category inserted successfully");</script>';
    
  }
}
}

?>

<h2 class="text-center">Insert categories</h2>
<form action="" method="post" class ="mb-2">
<div class="input-group flex-nowrap w-90 mb-2">
  <span class="input-group-text" id="addon-wrapping"></span>
  <input type="text" class="form-control" name ="Cat-Title" placeholder="Insert categories" aria-label="Username" aria-describedby="addon-wrapping">
</div>

<div class="input-group w-10 mb-2 m-auto">
 <input type="submit" class ="bg-info border-0 p-2 my-2" name="insert_cat" value="insert categories" aria-label ="username"aria-describedby="basic -addon1" >
 
    </form>
