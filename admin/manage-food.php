<?php include('partials/menu.php');?>


<div class="main-content">
    <div class="wrapper">
    <h1>Manage Food</h1><br>
    <?php
         if(isset($_SESSION['cupdate'])){
            echo $_SESSION['cupdate'];
            unset($_SESSION['cupdate']);
        }
        if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);

        }    
        ?>
    <br><br>

           <!-- button to add admin -->
           <a href="<?php echo SITEURL;?>admin/add-food.php" class="btn-primary">Add Food</a>
    <br>
    
        
 
    
    
    <br>
    <table class="tbl-full">
        <tr>
            <th>S.N</th>
            <th>Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Feature</th>
            <th>Active</th>
            <th>Actions</th>


        </tr>
        <?php
        $sql="SELECT * FROM `tbl_food` ";
        $res=mysqli_query($conn,$sql)or die(mysqli_error());
        if($res==TRUE){
            $count=mysqli_num_rows($res);
            $i=1;    
            if($count>0){
                while($rows=mysqli_fetch_assoc($res)){
                    $id=$rows['id'];
                    $title=$rows['title'];
                    $price=$rows['price'];

                    $image_name=$rows['image_name'];
                    $featured=$rows['featured'];


                    $active=$rows['active'];
                    ?>
                        <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $price; ?> /-</td>

                        <td>
                            <?php 
                                if($image_name!=""){
                                    ?>
                                    <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name ?>" style="width:100px;height:50px;">
                                <?php    
                                }
                                else{
                                    echo "<div class='error' style='  color: #ff4757;'>Image not add</div>";
                                } 
                                
                                
                                ?>
                        </td>
                        <td><?php echo $featured; ?></td>
                        <td><?php echo $active; ?></td>

                        <td>   
                        <!-- <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change password</a> -->

                        <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
                        <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&imagename=<?php echo $image_name ?>" class="btn-danger">Delete Food</a>
                        </td>
            
                         </tr>


                <?php    

                }
            }

        }
        ?>


    </table>






    </div>
   
</div>



<?php include('partials/footer.php'); ?>