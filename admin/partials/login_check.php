<?php include('../config/constants.php'); ?>

<?php

if(!isset($_SESSION['user'])){

    $_SESSION['no-login-massage']="<div class='success' style='color: #ff4757;'>Please login to admin panel.</div>";
    header('location:'.SITEURL.'admin/login.php');

}



?>