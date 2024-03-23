<?php 
session_start();
include('../includes/database.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
             Admin login
        </h2>
        <form action="" method="post">
        <div class="form-outline mb-4 w-50 m-auto">
                <label for="username" class ="form-label">Username</label>
                <input type="text"id="username" name="username" value="" required class="form-control" placeholder="enter your username" autocomplete="off">

            </div>
            
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="pass" class ="form-label">Password</label>
                <input type="password"id="passw" name="password" value="" required class="form-control" autocomplete="off">

            </div>
    
            <div class="form-outline mb-4 w-50 m-auto">
                    <input type="submit" value="Login" class="bg-info py-2 px-3 border-0 " name="adminlogin">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="adminreg.php"> Register</a></p>
                </div>

            

        </form>
        </div>




    </div>
</body>
</html>
<?php
if(isset($_POST['adminlogin'])){
    $storeusername =$_POST['username'];
    $storepass = $_POST['password'];
  
    $selectquery = "select * from adminreg where username ='$storeusername'";
    $result=mysqli_query($con,$selectquery);
    $rowcount =mysqli_num_rows($result);
    $rowdata =mysqli_fetch_assoc ($result);
    

    if($rowcount > 0){
        if(password_verify($storepass, $rowdata['password'])){
            $_SESSION['username'] = $storeusername;
            echo "<script>alert('Success!')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            echo "<script>alert('Invalid password')</script>";
        }
    } else {
        echo "<script>alert('Invalid username')</script>";
    }
}


?>