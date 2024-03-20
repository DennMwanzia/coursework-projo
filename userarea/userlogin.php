<?php 
@session_start();
include('../includes/database.php');
include('../commonfun/commonfunkies.php')

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{

        overflow-x:hidden;
    }
        </style>
</head>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center fw-bold ">Login</h2>
    <div class="row d-flex align-items-center justify-content-center mt-5">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for ="username" class="form-label">Username</label>
                    <input type="text" id="user" class="form-control" placeholder="enter you name" autocomplete="off" required name ="username"/>
                </div>
                
                
                <div class="form-outline mb-4">
                    <label for ="userpassword" class="form-label">Password</label>
                    <input type="password" id="userpassword" class="form-control" placeholder="enter your password" autocomplete="off" required name ="password"/>
                </div>
               
            
                <div class="mt-4 pt-2">
                    <input type="submit" value="Login" class="bg-info py-2 px-3 border-0 " name="userlog">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Dont have an account ? <a href="sign.php" class="text-danger">Register</a></p>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['userlog'])){
    $storeusername =$_POST['username'];
    $storepass = $_POST['password'];
  
    $selectquery = "select * from user where username ='$storeusername'";
    $result=mysqli_query($con,$selectquery);
    $rowcount =mysqli_num_rows($result);
    $rowdata =mysqli_fetch_assoc ($result);

    $ip = getIpAddress();

    $selectcart = "select * from cart where ipaddr ='$ip'";
    $selectcartexe = mysqli_query($con,$selectcart);
    $rowcountcart=mysqli_num_rows($selectcartexe);
    

    if($rowcount>0){
        $_SESSION['username']=$storeusername;
        if(password_verify($storepass,$rowdata['password'])){
            $_SESSION['username']=$storeusername;
            if($rowcount==1 and $rowcountcart==0){
               
                echo "<script>alert('success!')</script>";
            echo "<script>window.open('../index.php','_self')</script>";

            }else{
                $_SESSION['username']=$storeusername;
                echo "<script>alert('success!')</script>";
            echo "<script>window.open('payment.php','_self')</script>";
            }

            
        }
        else{
            echo "<script>alert('invalid credentials')</script>"; 
        }

    }else{
        echo "<script>alert('invalid credentials')</script>";

    }

}
?>