<?php include('partials/menu.php'); ?>



<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1><br><br>

        <?php
            
             // get id admin to ddelete
             $id=$_GET['id'];
             $sql2="SELECT * FROM `tbl_food` WHERE id=$id";
             $res2=mysqli_query($conn,$sql2);

            if($res2==true)
            {
                $count=mysqli_num_rows($res2);
                if($count==1){
                    $row2=mysqli_fetch_assoc($res2);
                    $title=$row2['title'];
                    $description=$row2['description'];
                    $current_category_id=$row2['category_id'];
                    $price=$row2['price'];
                    $current_image=$row2['image_name'];
                    $featured=$row2['featured'];
                    $active=$row2['active'];




                }

                // $_SESSION['delete']="<div class='success' style='color: #47ffa3;'>Admin Delete successfully</div>";
                // header('location:'.SITEURL.'admin/manage-admin.php');
            }
            else{
                // $_SESSION['delete']="<div class='error' style='  color: #ff4757;'>Failed to delete Admin</div>";
                // header('location:'.SITEURL.'admin/manage-admin.php');
                header('location:'.SITEURL.'admin/manage-food.php');

            }

        ?>
        <form action="" method="POST" enctype="multipart/form-data">


            <table class="tbl-full">
                <tr>
                    <td>Title :</td>
                    <td><input type="text" name="title" placeholder="<?php echo $title; ?>"></td>
                </tr>
                <tr>
                    <td>Description :</td>
                    <td><textarea name="description" id="" cols="30" rows="5" placeholder="<?php echo $description; ?>"></textarea></td>
                    
                </tr>
                <tr>
                    <td>Price :</td>
                    <td><input type="number" name="price" placeholder="<?php echo $price; ?>"></td>
                </tr>

                <tr>
                    <td>Current Image :</td>
                    <td>
                        <?php
                        if($current_image!=""){
                            ?>
                                    <img src="<?php echo SITEURL;?>images/food/<?php echo $current_image ?>" style="width:100px;height:50px;">

                            <?php
                        }
                        else{
                            echo "<div class='error' style='  color: #ff4757;'>Image not add</div>";
                        }

                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image :</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>   
 
        


        <tr>
            <td>Category:</td>
            <td><select name="category" id="">

            <?php
                // create php code to display from database

                $sql="SELECT * FROM `tbl_catagory` WHERE `active`='yes'";
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);

                if($count>0){
                    while($row=mysqli_fetch_assoc($res)){
                        $category_id=$row['id'];
                        $category_title=$row['title'];
                        ?>

                        <option <?php  if($current_category_id==$category_id){echo "selected";}  ?> value="<?php  echo $category_id; ?>"><?php  echo $category_title; ?></option>

                        <?php

                    }

                }
                else{
                    ?>
                        <option value="0">No Category Found</option>

                    <?php

                }


            ?>

            
            </select></td>
        </tr>
        





        <td>Featured: </td>
            <td>   
               <input <?php if($featured=="yes"){echo "checked";}  ?> type="radio"name="featured" value="yes">yes
               <input <?php if($featured=="no"){echo "checked";}  ?> type="radio"name="featured" value="no">no

            </td>
            
        </tr>         

        <tr>
            <td>Active:</td>
            <td>   
               <input <?php if($active=="yes"){echo "checked";}  ?> type="radio"name="active" value="yes">yes
               <input <?php if($active=="no"){echo "checked";}  ?> type="radio"name="active" value="no">no

            </td>

        </tr>
        <tr>
            <td colspan="2">
                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                

                <input type="submit" name="submit" value="Add Category" class="btn-secondary">
            </td>
        </tr>
            </table>
        </form>

    </div>
</div>




<?php
// check whether the submit button working or not

if(isset($_POST['submit'])){
    // Button clicked
    $id=$_POST['id'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $price=$_POST['price'];

    $current_image=$_POST['current_image'];
    $category=$_POST['category'];
    $featured=$_POST['featured'];
    $active=$_POST['active'];

    if(isset($_FILES['image']['name'])){
        $image_name=$_FILES['image']['name'];

        if($image_name!=""){
            $ext=end(explode('.',$image_name));

            $image_name="Food_Name_".rand(000,999).'.'.$ext;

            $source_path=$_FILES['image']['tmp_name'];
            $destination_path="../images/food/".$image_name;
            $upload=move_uploaded_file($source_path,$destination_path);

            if($upload==false){
                $_SESSION['upload']="<div class='error' style='  color: #ff4757;'>Image not add</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
                die();
            }
            if($current_image!=""){
                
            $remove_path="../images/food/".$current_image;
            $remove=unlink($remove_path);
                if($remove==false){
                
                    $_SESSION['remove']="<div class='error' style='  color: #ff4757;'>Failed to removed category image.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                    die();
                }
            }
        }
        else{
            $image_name=$current_image;
        }


    }
    else{
        $image_name=$current_image;
    }

    // `image_name`=[value-3],
    $sql3="UPDATE `tbl_food` SET `title`='$title',`description`='$description',`price`='$price',`image_name`='$image_name',`category_id`='$category',`featured`='$featured',`active`='$active' WHERE `id`='$id'";
    


    $res3=mysqli_query($conn,$sql3);

    if($res3==true)
    {
        $_SESSION['cupdate']="<div class='success' style='color: #47ffa3;'>category update successfully</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }
    else{
        $_SESSION['cupdate']="<div class='error' style='  color: #ff4757;'>Failed to update category</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    
    }    
}    



?>









<?php include('partials/footer.php'); ?>