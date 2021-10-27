<?php include('partials/menu.php');?>

<!-- main contents section starts -->
<div class="main-content">
<div class="wrapper">
   <h1>Manage admin</h1><br><br>

   <?php
    if(isset($_SESSION['add'])){
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }
    if(isset($_SESSION['delete'])){
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }

    if(isset($_SESSION['update'])){
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }
    if(isset($_SESSION['user-not-found'])){
        echo $_SESSION['user-not-found'];
        unset($_SESSION['user-not-found']);
    }
    if(isset($_SESSION['password-not-match'])){
        echo $_SESSION['password-not-match'];
        unset($_SESSION['password-not-match']);
    }
    if(isset($_SESSION['password-not-change'])){
        echo $_SESSION['password-not-change'];
        unset($_SESSION['password-not-change']);
    }
    if(isset($_SESSION['password-change'])){
        echo $_SESSION['password-change'];
        unset($_SESSION['password-change']);
    }



   ?>
   <br><br><br>

    <!-- button to add admin -->
    <a href="add-admin.php" class="btn-primary">Add Admin</a>

    <br><br>
    <table class="tbl-full">
        <tr>
            <th>S.N</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Actions</th>


        </tr>

        <?php
        $sql="SELECT * FROM `tbl_admin` ";
        $res=mysqli_query($conn,$sql)or die(mysqli_error());
        if($res==TRUE){
            $count=mysqli_num_rows($res);
            $i=1;    
            if($count>0){
                while($rows=mysqli_fetch_assoc($res)){
                    $id=$rows['id'];
                    $fullname=$rows['full_name'];
                    $username=$rows['user_name'];
                    ?>
                        <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $fullname; ?></td>
                        <td><?php echo $username; ?></td>
                        <td>   
                        <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change password</a>

                        <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                        <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
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

<?php include('partials/footer.php');?>
