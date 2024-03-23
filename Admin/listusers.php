<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h3 class="text-center text-success">All Users</h3>
   <table class="table table-bordered mt-5">
    <thead class="bg-info">
        <?php
        $getpay="select * from user";
        $result=mysqli_query($con,$getpay);
        $rowcount=mysqli_num_rows($result);
       

    if($rowcount==0)
    {
        echo "<h2 class=' text-danger text-center mt-5'>No users yet.</h2>";
    }else{
        echo "<tr>
        <th>User id/th>
        <th>Username</th>
        <th>Email</th>
        <th>Address</th>
        <thPhone number</th>

    </tr> 
    </thead>
    <tbody class='bg-secondary'>";
        $number=0;
    while($rowdata=mysqli_fetch_assoc($result)){
        $userid=$rowdata['userid'];
        $username=$rowdata['username'];
        $useremail=$rowdata['email'];
        $address=$rowdata['address'];
        $phone=$rowdata['phone'];
       
        $number++;
        echo"<tr>
        <td>$number</td>
        <td>$username</td>
        <td$useremail</td>
        <td>$address</td>
        <td>$phone</td>
        <td><a href='index.php?dltorders= $userid' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
    </tr>";

    }
   
    }
                
        ?>
        
    
        
    </tbody>
   </table>


</body>

</html>