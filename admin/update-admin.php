<?php include('partials/menu.php'); ?>



<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1><br><br>

        <?php
            
             // get id admin to ddelete
             $id=$_GET['id'];
             $sql="SELECT * FROM `tbl_admin` WHERE id=$id";
             $res=mysqli_query($conn,$sql);

            if($res==true)
            {
                $count=mysqli_num_rows($res);
                if($count==1){
                    $row=mysqli_fetch_assoc($res);
                    $full_name=$row['full_name'];
                    $username=$row['user_name'];

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
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Full Name :</td>
                    <td><input type="text" name="full_name" placeholder="<?php echo $full_name; ?>"></td>
                </tr>

                <tr>
                    <td>User Name :</td>
                    <td><input type="text" name="username" placeholder="<?php echo $username; ?>"></td>
                </tr>


                <tr><td colspan-"2">
                    <input type="hidden" name="id" value="<?php echo $id;  ?>">
                    <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                </td></tr>
            </table>
        </form>

    </div>
</div>




<?php
// check whether the submit button working or not

if(isset($_POST['submit'])){
    // Button clicked
    $id=$_POST['id'];
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];

    $sql="UPDATE `tbl_admin` SET `full_name`='$full_name',`user_name`='$username' where id='$id'";

    $res=mysqli_query($conn,$sql);

    if($res==true)
    {
        $_SESSION['update']="<div class='success' style='color: #47ffa3;'>Admin update successfully</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else{
        $_SESSION['update']="<div class='error' style='  color: #ff4757;'>Failed to update Admin</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    
    }    
}    



?>









<?php include('partials/footer.php'); ?>