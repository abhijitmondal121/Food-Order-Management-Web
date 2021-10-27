<?php 

session_start();
define('SITEURL','http://localhost/food-order/');


$conn=mysqli_connect('localhost','root','','food-order')or die(mysqli_error());

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="login">
        <h1 class="text-center">Login</h1><br>

        <?php
         if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        if(isset($_SESSION['no-login-massage'])){
            echo $_SESSION['no-login-massage'];
            unset($_SESSION['no-login-massage']);
        }


        ?>

<br> <form action="" method="post">
    username:
    <input type="text"name="username" placeholder="Enter username"><br><br>
    password:
    <input type="password" name="password" placeholder="Enter password"><br><br>
    <input type="submit" name="submit" value="login" class="btn-primary">

    </form>

      <br>  <p class="text-center">Created By - <a href="">Abhijit Mondal</a></p>
    </div>
</body>
</html>


<?php

if(isset($_POST['submit'])){

    $username=$_POST['username'];
    $password=md5($_POST['password']);

    // sql to check whether the user name exits or not

    $sql="SELECT * FROM `tbl_admin` WHERE `user_name`='$username' AND `password`='$password'";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    if($count==1){
        $_SESSION['login']="<div class='success' style='color:#47ffa3;'>Login successfully</div>";
        $_SESSION['user']=$username;
        header('location:'.SITEURL.'admin/');
    }    
    else{
        $_SESSION['login']="<div class='success' style='color: #ff4757;'>Password not Match</div>";
        header('location:'.SITEURL.'admin/login.php');
    }


}


?>