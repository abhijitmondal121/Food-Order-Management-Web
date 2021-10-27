<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1><br><br>

        
   <?php
    if(isset($_SESSION['add'])){ //checking whether the massage is set or not
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }
   ?>



        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Full Name :</td>
                    <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                </tr>

                <tr>
                    <td>User Name :</td>
                    <td><input type="text" name="username" placeholder="Enter your Username"></td>
                </tr>

                <tr>
                    <td>Password :</td>
                    <td><input type="password" name="password" placeholder="Enter your password"></td>
                </tr>

                <tr><td colspan-"2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </td></tr>
            </table>
        </form>


    </div>
</div>





<?php include('partials/footer.php'); ?>


<?php
// process the value from form and save it in database

if(isset($_POST['submit'])){
// Button clicked
$full_name=$_POST['full_name'];
$username=$_POST['username'];
$password=md5($_POST['password']);

// sql querry to save the data in database

$sql="INSERT INTO `tbl_admin` ( `full_name`, `user_name`, `password`) VALUES ( '$full_name', '$username', '$password')";
$res=mysqli_query($conn,$sql)or die(mysqli_error());
// check whether thed data is executed or not
if($res=True){
    // echo "Data inserted";
    // create a sessiuon veriable
    $_SESSION['add']="Admin add successfully";
    // Redirect page to manage admin
    header("location:".SITEURL.'admin/manage-admin.php');
}
else{
    // echo "Data not inserted";
    $_SESSION['add']="Failed to add Admin ";
    // Redirect page to manage admin
    header("location:".SITEURL.'admin/add-admin.php');
}


}




?>