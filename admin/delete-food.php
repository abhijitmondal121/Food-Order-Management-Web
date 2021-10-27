<?php
 include('../config/constants.php'); 
// get id admin to ddelete
// $id=$_GET['id'];
if(isset($_GET['id'])AND isset($_GET['imagename'])){
    $id=$_GET['id'];
    $image_name=$_GET['imagename'];
    if($image_name!=""){
        $path="../images/food/".$image_name;
        $remove=unlink($path);
        if($remove==false){
        
            $_SESSION['remove']="<div class='error' style='  color: #ff4757;'>Failed to removed category image.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
            die();
        }
    }


    // create sql

    $sql="DELETE FROM `tbl_food` WHERE id=$id";

    $res=mysqli_query($conn,$sql);

    if($res==true)
    {
        $_SESSION['delete']="<div class='success' style='color: #47ffa3;'>category Delete successfully</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }
    else{
        $_SESSION['delete']="<div class='error' style='  color: #ff4757;'>Failed to delete category</div>";
        header('location:'.SITEURL.'admin/manage-food.php');

    }
}
else{
    header('location:'.SITEURL.'admin/manage-food.php');

}

?>
