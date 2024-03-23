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
                <label for="username" class ="form-label">Username</label>
                <input type="text"id="username" name="username" value="enter username" required class="form-control">

            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="email" class ="form-label">Email address</label>
                <input type="text"id="email" name="emaill" value="enter your email" required class="form-control">

            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="pass" class ="form-label">Password</label>
                <input type="password"id="passw" name="password" value="" required class="form-control">

            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="conf" class ="form-label">Confirm Password</label>
                <input type="password"id="username" name="confirm" value="" required class="form-control">

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