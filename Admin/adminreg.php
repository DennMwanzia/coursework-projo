<?php 
session_start();
include('../includes/database.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            overflow-x:hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <h2 class="text-center my-5 text-info" >
             Admin registration
        </h2>
        <form action="" method="post">
        <div class="form-outline mb-4 w-50 m-auto">
                <label for="username" class ="form-label">Name</label>
                <input type="text"id="username" name="name" value="" required class="form-control"  autocomplete="off">

            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="username" class ="form-label">Username</label>
                <input type="text"id="username" name="username" value="" required class="form-control" placeholder="enter your username" autocomplete="off">

            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="email" class ="form-label">Email address</label>
                <input type="email"id="email" name="emaill" value="" required class="form-control" placeholder="enter your email"autocomplete="off">

            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="pass" class ="form-label">Password</label>
                <input type="password"id="pass" name="password" value="" required class="form-control"autocomplete="off">

            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="conf" class ="form-label">Confirm Password</label>
                <input type="password"id="username" name="confirm" value="" required class="form-control"autocomplete="off">

            </div>
           
            <div class="form-outline mb-4 w-50 m-auto">
                    <input type="submit" value="Register" class="bg-info py-2 px-3 border-0 " name="adminreg">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="adminlogin.php"> Login</a></p>
                </div>

            

        </form>
        </div>




    </div>
</body>
</html>

<?php
if (isset($_POST['adminreg'])){
    $uusername =$_POST['username'];
    $email =$_POST['emaill'];
    $pass =$_POST['password'];
    $hashing =password_hash($pass,PASSWORD_DEFAULT);
    $confirm=$_POST['confirm'];
    $name=$_POST['name'];
    
    $selectquery="select * from adminreg where username ='$uusername' or email ='$email'";
    $result =mysqli_query($con,$selectquery);
    $rowcount =mysqli_num_rows($result);

    if($rowcount>0){
        echo "<script>alert('username  or email already exits')</script>";
    } 
    elseif( $pass!=  $confirm){
        echo "<script>alert('password do not match!')</script>";

    }
    else{
        $insert = "insert into adminreg (username,email,password,name) values('$uusername','$email','$hashing','$name')";

        $resultquery =mysqli_query($con,$insert);
        if($resultquery){
           echo "<script>alert('admin registered')</script>";
           echo "<script>window.open('adminlogin.php','_self')</script>";
        
        }

        
    }
}
