<?php 
if(isset($_GET['editaccount'])){
    $username=$_SESSION['username'];
    $selectquery="select * from user where username ='$username'";
    $resultexe=mysqli_query($con,$selectquery);
$rowfetch=mysqli_fetch_assoc($resultexe);
$userid = $rowfetch['userid'];
$username = $rowfetch['username'];
$email = $rowfetch['email'];
$useraddress = $rowfetch['address'];
$phone = $rowfetch['phone'];

}


if (isset($_POST['userupdate'])){
    $updateid =$userid;
    $username = $_POST['username'];
    $email = $_POST['useremail'];
    $useraddress =$_POST['useraddress'];
    $phone =$_POST['userphone'];

    $updatadata ="update user set username='$username',email='$email',address='$useraddress',phone='$phone' where userid='$updateid' ";
    $resultupdate=mysqli_query($con,$updatadata);

    if($resultupdate){
        echo "<script>alert('data updated successfully')</script>";
        echo "<script>window.open('logout.php','_self')</script>";

    }


}


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* .text-left{
            text-align:left;
            align:left;
        } */
    </style>
</head>
<body>
    <h3 class="text-center text-success mb-4">Edit account</h3>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4">
            <label for="">Username</label>
            <input type="text"class="form-control w-50 m-auto " name="username" value=<?php echo $username?>>
        </div>
        <div class="form-outline mb-4">
            <label for="email" class="text-left">Email</label>
            <input type="email"class="form-control w-50 m-auto " name="useremail" value=<?php echo $email?>>
        </div>
        <div class="form-outline mb-4">
            <label for="">Address</label>
            <input type="text"class="form-control w-50 m-auto " name="useraddress" value=<?php echo $useraddress?>>
        </div>
        <div class="form-outline mb-4">
            <label for="">Phone</label>
            <input type="text"class="form-control w-50 m-auto " name="userphone" value=<?php echo $phone?>>
        </div>
     
    

        <input type="submit" value="update" class="bg-info py-2 px-3 border-0"name="userupdate">
        
    </form>
</body>
</html>