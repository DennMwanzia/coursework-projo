<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete account</title>
</head>
<body>
    <h3 class="text-danger mb-4 text-center my-5">Delete account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <input type ="submit" class="form-control w-50 m-auto" name="delete" value="Delete account" >      
          </div>
          <div class="form-outline mb-4">
            <input type ="submit" class="form-control w-50 m-auto" name="dontdelete" value="Don't delete" >      
          </div>
    </form>
</body>
</html>

<?php
$username_session=$_SESSION['username'];
if(isset($_POST['delete'])){
    echo "<script>alert('This will delete your entire account data. Continue?')</script>";
    $deletequery= "delete from user where username='$username_session'";
    $result=mysqli_query($con,$deletequery);
    if($result){
        session_destroy();
        echo "<script>alert('Account deleted!')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
        

    }

}
if(isset($_POST['dontdelte'])){
    echo "<script>window.open('profile.php','_self')</script>";

}

?>