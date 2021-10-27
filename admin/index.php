<?php include('partials/menu.php'); ?>

<!-- main contents section starts -->
<div class="main-content">
<div class="wrapper">
   <h1> DASHBOARD</h1><br>

   <?php
         if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }


        ?>
    <br>
    <div class="col-4 text-center">
        <?php
     
        $sql="SELECT * FROM `tbl_catagory` ";
        $res=mysqli_query($conn,$sql)or die(mysqli_error());
            $count=mysqli_num_rows($res);
        ?>
        <h1><?php echo $count; ?></h1>
        <br>
        categories
    </div>   
    <div class="col-4 text-center">
    <?php
     
     $sql1="SELECT * FROM `tbl_food` ";
     $res1=mysqli_query($conn,$sql1)or die(mysqli_error());
         $count1=mysqli_num_rows($res1);
     ?>
        <h1><?php echo $count1; ?></h1>
        <br>
        Foods
    </div>  
    <div class="col-4 text-center">
    <?php
     
     $sql2="SELECT * FROM `tbl_order` ";
     $res2=mysqli_query($conn,$sql2)or die(mysqli_error());
         $count2=mysqli_num_rows($res2);
     ?>


        <h1><?php echo $count2;  ?></h1>
        <br>
        Total Orders
    </div>  
    <div class="col-4 text-center">
    <?php
     
     $sql4="SELECT SUM(total) AS Total FROM `tbl_order` WHERE status='delivered' ";
     $res4=mysqli_query($conn,$sql4)or die(mysqli_error());
     $count4=mysqli_fetch_assoc($res4);
     $total=$count4['Total'];   
     ?>
        <h1><?php echo $total;  ?></h1>
        <br>
        Revenew Generated
    </div>
    <div class="clearfix"></div>

</div>
</div>

<?php include('partials/footer.php'); ?>

