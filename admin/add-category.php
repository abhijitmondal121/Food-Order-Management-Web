<?php include('partials/menu.php'); ?>

<!-- main contents section starts -->
<div class="main-content">
<div class="wrapper">
   <h1> Add Category</h1><br>

    
   <?php
         if(isset($_SESSION['cadd'])){
            echo $_SESSION['cadd'];
            unset($_SESSION['cadd']);
        }
        if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }


        ?>
    <form action="" method="post" enctype="multipart/form-data">
   <table class="tbl-full">

        <tr>
            <td>Title</td>
            <td><input type="text" name="title" placeholder="category Title"></td>
        </tr>
        <tr>
            <td>
                Select Image:
            </td>
            <td>
                <input type="file" name="image">
            </td>
        </tr> 
        <tr>   
            <td>Featured: </td>
            <td>   
               <input type="radio"name="featured" value="yes">yes
               <input type="radio"name="featured" value="no">no

            </td>
            
        </tr>
        <tr>
            <td>Active:</td>
            <td>   
               <input type="radio"name="active" value="yes">yes
               <input type="radio"name="active" value="no">no

            </td>

        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="submit" value="Add Category" class="btn-secondary">
            </td>
        </tr>

    </table>
    </form>

<?php

if(isset($_POST['submit'])){
    $title=$_POST['title'];
    if(isset($_POST['featured'])){
    $featured=$_POST['featured'];

    }
    else{
    $featured="no";
    }

    if(isset($_POST['active'])){
        $active=$_POST['active'];
    
        }
        else{
        $active="no";
        }
    // check whether the image is selected or not 
    // print_r($_FILES['image']);
    // die();

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
                    header('location:'.SITEURL.'admin/add-category.php');
                    die();
                }
            }


        }

    $sql="INSERT INTO `tbl_catagory` (`title`, `image_name`, `featured`, `active`) VALUES ('$title', '$image_name', '$featured', '$active')";        
    $res=mysqli_query($conn,$sql);

    if($res==true)
    {
        // Querry executed
        $_SESSION['cadd']="<div class='success' style='color: #47ffa3;'>Category add successfully</div>";
        header('location:'.SITEURL.'admin/manage-category.php');

    } 
    else{
        // failed
        $_SESSION['cadd']="<div class='error' style='  color: #ff4757;'>Category not add</div>";
        header('location:'.SITEURL.'admin/add-category.php');
    }   

}







?>




</div>
</div>

<?php include('partials/footer.php'); ?>

