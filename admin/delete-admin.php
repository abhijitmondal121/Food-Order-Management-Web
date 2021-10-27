<?php
 include('../config/constants.php'); 
// get id admin to ddelete
$id=$_GET['id'];

// create sql

$sql="DELETE FROM `tbl_admin` WHERE id=$id";

$res=mysqli_query($conn,$sql);

if($res==true)
{
    $_SESSION['delete']="<div class='success' style='color: #47ffa3;'>Admin Delete successfully</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else{
    $_SESSION['delete']="<div class='error' style='  color: #ff4757;'>Failed to delete Admin</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');

}
?>
