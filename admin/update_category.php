<?php include('partials/menu.php'); ?>



<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1><br><br>

        <?php
            
             // get id admin to ddelete
             $id=$_GET['id'];
             $sql="SELECT * FROM `tbl_catagory` WHERE id=$id";
             $res=mysqli_query($conn,$sql);

            if($res==true)
            {
                $count=mysqli_num_rows($res);
                if($count==1){
                    $row=mysqli_fetch_assoc($res);
                    $title=$row['title'];
                    $current_image=$row['image_name'];
                    $featured=$row['featured'];
                    $active=$row['active'];




                }

                // $_SESSION['delete']="<div class='success' style='color: #47ffa3;'>Admin Delete successfully</div>";
                // header('location:'.SITEURL.'admin/manage-admin.php');
            }
            else{
                // $_SESSION['delete']="<div class='error' style='  color: #ff4757;'>Failed to delete Admin</div>";
                // header('location:'.SITEURL.'admin/manage-admin.php');
                header('location:'.SITEURL.'admin/manage-admin.php');

            }

        ?>
        <form action="" method="post" enctype="multipart/form-data">


            <table class="tbl-30">
                <tr>
                    <td>Title :</td>
                    <td><input type="text" name="title" placeholder="<?php echo $title; ?>"></td>
                </tr>

                <tr>
                    <td>Current Image :</td>
                    <td>
                        <?php
                        if($current_image!=""){
                            ?>
                                    <img src="<?php echo SITEURL;?>images/category/<?php echo $current_image ?>" style="width:100px;height:50px;">

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
    $current_image=$_POST['current_image'];
    $featured=$_POST['featured'];
    $active=$_POST['active'];

    if(isset($_FILES['image']['name'])){
        $image_name=$_FILES['image']['name'];

        if($image_name!=""){
            $ext=end(explode('.',$image_name));

            $image_name="Food_category_".rand(000,999).'.'.$ext;

            $source_path=$_FILES['image']['tmp_name'];
            $destination_path="../images/category/".$image_name;
            $upload=move_uploaded_file($source_path,$destination_path);

            if($upload==false){
                $_SESSION['upload']="<div class='error' style='  color: #ff4757;'>Image not add</div>";
                header('location:'.SITEURL.'admin/manage-category.php');
                die();
            }
            if($current_image!=""){
                
            $remove_path="../images/category/".$current_image;
            $remove=unlink($remove_path);
                if($remove==false){
                
                    $_SESSION['remove']="<div class='error' style='  color: #ff4757;'>Failed to removed category image.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
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
    $sql2="UPDATE `tbl_catagory` SET `title`='$title',`image_name`='$image_name',`featured`='$featured',`active`='$active' WHERE  id='$id'";

    $res2=mysqli_query($conn,$sql2);

    if($res2==true)
    {
        $_SESSION['cupdate']="<div class='success' style='color: #47ffa3;'>category update successfully</div>";
        header('location:'.SITEURL.'admin/manage-category.php');
    }
    else{
        $_SESSION['update']="<div class='error' style='  color: #ff4757;'>Failed to update category</div>";
        header('location:'.SITEURL.'admin/manage-category.php');
    
    }    
}    



?>









<?php include('partials/footer.php'); ?>