<?php include('partials/menu.php');?>


<div class="main-content">
    <div class="wrapper">
    <h1>Manage Category</h1><br>
    <?php
         if(isset($_SESSION['cadd'])){
            echo $_SESSION['cadd'];
            unset($_SESSION['cadd']);
        }
        if(isset($_SESSION['remove'])){
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }
        if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if(isset($_SESSION['cupdate'])){
            echo $_SESSION['cupdate'];
            unset($_SESSION['cupdate']);
        }
        if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        if(isset($_SESSION['remove'])){
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }
        ?>

<br><br>
        <!-- button to add admin -->
        <a href="<?php echo SITEURL;?>admin/add-category.php" class="btn-primary">Add Category</a>
    <br><br>
    <table class="tbl-full">
        <tr>
            <th>S.N</th>
            <th>Title</th>
            <th>Image</th>
            <th>Feature</th>
            <th>Active</th>
            <th>Actions</th>


        </tr>
        <?php
        $sql="SELECT * FROM `tbl_catagory` ";
        $res=mysqli_query($conn,$sql)or die(mysqli_error());
        if($res==TRUE){
            $count=mysqli_num_rows($res);
            $i=1;    
            if($count>0){
                while($rows=mysqli_fetch_assoc($res)){
                    $id=$rows['id'];
                    $title=$rows['title'];
                    $image_name=$rows['image_name'];
                    $featured=$rows['featured'];


                    $active=$rows['active'];
                    ?>
                        <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $title; ?></td>
                        <td>
                            <?php 
                                if($image_name!=""){
                                    ?>
                                    <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name ?>" style="width:100px;height:50px;">
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

                        <a href="<?php echo SITEURL; ?>admin/update_category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
                        <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&imagename=<?php echo $image_name ?>" class="btn-danger">Delete Category</a>
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