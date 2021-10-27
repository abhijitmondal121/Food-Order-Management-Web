<?php include('partials/menu.php');?>


<div class="main-content">
<div class="wrapper">
   <h1>Change password</h1><br><br>

    <?php
        if(isset($_GET['id'])){
            $id=$_GET['id'];
        }

    ?>

   <form action="" method="post">
            <table class="tbl-30">
            
                <tr>
                    <td> current Password :</td>
                    <td><input type="password" name="current_password" placeholder="current password"></td>
                </tr>

                <tr>
                    <td> New Password :</td>
                    <td><input type="password" name="new_password" placeholder="New password"></td>
                </tr>
                <tr>
                    <td> confirm Password :</td>
                    <td><input type="password" name="confirm_password" placeholder="confirm password"></td>
                </tr>

                <tr><td colspan-"2">
                <input type="hidden" name="id" value="<?php echo $id;  ?>">
                <input type="submit" name="submit" value="Change password" class="btn-secondary">
                </td></tr>
            </table>
        </form>


    </div>
</div>






</div>
</div>







<?php
// check whether the submit button working or not

if(isset($_POST['submit'])){
    // Button clicked
    $id=$_POST['id'];
    $current_password=md5($_POST['current_password']);
    $new_password=md5($_POST['new_password']);
    $confirm_password=md5($_POST['confirm_password']);

    $sql="SELECT * FROM `tbl_admin` WHERE `id`='$id' AND `password`='$current_password'";
    $res=mysqli_query($conn,$sql);

    

    if($res==true)
    {
        $count=mysqli_num_rows($res);
        if($count==1){
            echo "User found";
            if($new_password==$confirm_password){
                $sql2="UPDATE `tbl_admin` SET `password`='$new_password'";
                $res=mysqli_query($conn,$sql2);
                if($res==TRUE){
                    $_SESSION['password-change']="<div class='success' style='color:#47ffa3;'>Password change successfully</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
                }
                else{
                    $_SESSION['password-not-change']="<div class='success' style='color: #ff4757;'>Password not change</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
                }

            }
            else{
                $_SESSION['password-not-match']="<div class='success' style='color: #ff4757;'>Password not match</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }
        else{
            $_SESSION['user-not-found']="<div class='success' style='color: #ff4757;'>User Not Found</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        // $_SESSION['update']="<div class='success' style='color: #47ffa3;'>Admin update successfully</div>";
       
    }
    else{
        // $_SESSION['update']="<div class='error' style='  color: #ff4757;'>Failed to update Admin</div>";
        // header('location:'.SITEURL.'admin/manage-admin.php');
    
    }    
}    



?>







<?php include('partials/footer.php');?>
