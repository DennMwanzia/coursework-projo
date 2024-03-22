<h3 class="text-center text-success">All categories</h3>
<table class="table table-bordered mt-5 ">
    <thead class="bg-info text-center" >
        <th>SINo</th>
        <th>Category Title</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $selectcart="select * from categories";
        $result=mysqli_query($con,$selectcart);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $categoryid=$row['categoryId'];
            $categorytitle=$row['categorytitle'];
            $number++;

        


        ?>
        <tr class="text-center">
            <td><?php echo $number ?></td>
            <td><?php echo $categorytitle ?></td>
            <td><a href='index.php?editcat=<?php echo $categoryid ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='i' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php 
        }
        ?>
    </tbody>
</table>