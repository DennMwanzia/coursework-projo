<?php include('../includes/database.php');?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
</head>
<body>
    <h3 class ="text-center text-success">All  products</h3>
    <table class="table table-bordered mt-5">
        <tr class="bg-info">
            <th>Product id</th>
            <th>Product title</th>
            <th>Product Image</th>
            <th>Product price</th>
            <th>Total sold </th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
        <tbody class="bg-secondary text-light">
            <?php 
            $getproducts="select * from products";
            $resultexe=mysqli_query($con,$getproducts);
            $number=0;
            while($rowfetch =mysqli_fetch_assoc($resultexe)){
                $productid = $rowfetch['productid'];
                $producttitle = $rowfetch['producttitle'];
                $productimg = $rowfetch['productimage1'];
                $productprice = $rowfetch['productprice'];
                $productstatus = $rowfetch['status'];
                $number++;
                ?>

                <tr class='text-center'>
                <td><?php echo $number; ?></td>
                <td><?php echo  $producttitle; ?></td>
                <td><img src='./productimages/<?php echo $productimg; ?>' class='productimg'/></td>
                <td><?php echo $productprice;?></td>
                <td><?php echo $productstatus;?></td>
                <td><?php 
                $getcount ="select * from orderspending where productid=$productid";
                $result=mysqli_query($con,$getcount);
                $rowcount=mysqli_num_rows($result);
                echo "$rowcount";
                ?></td>
                <td><a href='index.php?edit=<?php echo $productid ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?deleteproduct=<?php echo $productid ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php
            }
            ?>
            

        </tbody>

    </table>

</body>
</html>