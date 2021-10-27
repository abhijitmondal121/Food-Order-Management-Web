<?php include('partials/menu.php'); ?>

<!-- main contents section starts -->
<div class="main-content">
<div class="wrapper">
   <h1> Add Food</h1><br>

    
   <?php
        //  if(isset($_SESSION['cadd'])){
        //     echo $_SESSION['cadd'];
        //     unset($_SESSION['cadd']);
        // }
        // if(isset($_SESSION['upload'])){
        //     echo $_SESSION['upload'];
        //     unset($_SESSION['upload']);
        // }


        ?>
    <form action="" method="post" enctype="multipart/form-data">
   <table class="tbl-full">

        <tr>
            <td>Title</td>
            <td><input type="text" name="title" placeholder="Title of the food"></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name="description" id="" cols="30" rows="5" placeholder="Description of the food"></textarea></td>
        </tr>
        <tr>
            <td>Price:</td>
            <td><input type="number" name="price" ></td>
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
            <td>Category:</td>
            <td><select name="category" id="">

            <?php
                // create php code to display from database

                $sql="SELECT * FROM `tbl_catagory` WHERE `active`='yes'";
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);

                if($count>0){
                    while($row=mysqli_fetch_assoc($res)){
                        $id=$row['id'];
                        $title=$row['title'];
                        ?>

                        <option value="<?php  echo $id; ?>"><?php  echo $title; ?></option>

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
    $description=$_POST['description'];
    $price=$_POST['price'];
    $category=$_POST['category'];

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

                $image_name="Food_Name_".rand(000,999).'.'.$ext;

                $source_path=$_FILES['image']['tmp_name'];
                $destination_path="../images/food/".$image_name;
                $upload=move_uploaded_file($source_path,$destination_path);

                if($upload==false){
                    $_SESSION['upload']="<div class='error' style='  color: #ff4757;'>Image not add</div>";
                    header('location:'.SITEURL.'admin/add-food.php');
                    die();
                }
            }


        }

    $sql="INSERT INTO `tbl_food` (`title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES ( '$title', '$description', '$price', '$image_name', '$category', '$featured', '$active')";
    
    // INSERT INTO `tbl_catagory` (`title`, `image_name`, `featured`, `active`) VALUES ('$title', '$image_name', '$featured', '$active')";        
    $res=mysqli_query($conn,$sql);

    if($res==true)
    {
        // Querry executed
        $_SESSION['cadd']="<div class='success' style='color: #47ffa3;'>Food add successfully</div>";
        header('location:'.SITEURL.'admin/manage-food.php');

    } 
    else{
        // failed
        $_SESSION['cadd']="<div class='error' style='  color: #ff4757;'>Food not add</div>";
        header('location:'.SITEURL.'admin/add-food.php');
    }   

}







?>




</div>
</div>

<?php include('partials/footer.php'); ?>

