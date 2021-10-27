<?php include('../config/constants.php'); 
session_destroy();

header('Location:'.SITEURL.'admin/login.php');

?>