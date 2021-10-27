<?php

// start session
session_start();
define('SITEURL','http://localhost/food-order/');


$conn=mysqli_connect('localhost','root','','food-order')or die(mysqli_error());

// $conn=mysqli_connect('localhost','root','')or die(mysqli_error());
// $db_select=mysqli_select_db($conn,'food-order')or die(mysqli_error());

?>