<?php 
session_start();
include('../includes/database.php');
include('../commonfun/commonfunkies.php');

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User registration</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for ="username" class="form-label">Username</label>
                    <input type="text" id="user" class="form-control" placeholder="enter you name" autocomplete="off" required name ="username"/>
                </div>
                <div class="form-outline mb-4">
                    <label for ="useremail" class="form-label">Email</label>
                    <input type="email" id="email" class="form-control" placeholder="example@gmail.com" autocomplete="off" required name ="useremail"/>
                </div>
                <div class="form-outline mb-4">
                    <label for ="userpassword" class="form-label">Password</label>
                    <input type="password" id="userpassword" class="form-control" placeholder="enter your password" autocomplete="off" required name ="pass"/>
                </div>
                <div class="form-outline mb-4">
                    <label for ="confirm pass" class="form-label"> Confirm Password</label>
                    <input type="password" id="confpassword" class="form-control" placeholder="retype password" autocomplete="off" required name ="confpass"/>
                </div>
                <div class="form-outline mb-4">
                    <label for ="user address" class="form-label">Address</label>
                    <input type="text" id="user address" class="form-control" placeholder="enter your address" autocomplete="off" required name ="useraddr"/>
                </div>
                <div class="form-outline mb-4">
                    <label for ="contact" class="form-label">Contact</label>
                    <input type="text" id="contact" class="form-control" placeholder="enter your contact" autocomplete="off" required name ="usercont"/>
                </div>
                <div class="mt-4 pt-2">
                    <input type="submit" value="Register" class="bg-info py-2 px-3 border-0 " name="userreg">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="userlogin.php"> Login</a></p>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>
</html>
<?php
if (isset($_POST['userreg'])){
    $uusername =$_POST['username'];
    $email =$_POST['useremail'];
    $pass =$_POST['pass'];
    $hashing =password_hash($pass,PASSWORD_DEFAULT);
    $confirm=$_POST['confpass'];
    $add =$_POST['useraddr'];
    $contact =$_POST['usercont'];
    $ipaddr =getIPAddress();
    
    $selectquery="select * from user where username ='$uusername' or email ='$email'";
    $result =mysqli_query($con,$selectquery);
    $rowcount =mysqli_num_rows($result);

    if($rowcount>0){
        echo "<script>alert('username  or email already exits')</script>";
    } 
    elseif( $pass!=  $confirm){
        echo "<script>alert('password do not match!')</script>";

    }
    else{
        $insert = "insert into user (username,email,password,ipaddr,address,phone) values('$uusername','$email','$hashing','$ipaddr','$add','$contact')";

        $resultquery =mysqli_query($con,$insert);
        if($resultquery){
           echo "<script>alert('user registered')</script>";
        }

        $selectcart ="select * from cart where ipaddr='$ipaddr'";
        $resultquery =mysqli_query($con,$selectcart);
        $rowcount = mysqli_num_rows($resultquery );
        if($rowcount>0){
            $_SESSION['username']=$uusername;
            echo "<script>alert('You have items in the cart')</script>";
            echo "<script>windows.open('checkout.php','_self')</script>";

        }
        else{
            echo "<script>windows.open('index.php','_self')</script>";

        }

        
    }
}

   
     



?>