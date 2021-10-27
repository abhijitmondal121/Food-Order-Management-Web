<?php include('partials-front/menu.php'); 

$search=$_POST['search'];

?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on Your Search <a href="#" class="text-white"> " <?php echo $search;  ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

        <?php

      
        $sql="SELECT * FROM `tbl_food` WHERE `title` LIKE '%$search%' OR `description` LIKE '%$search%' ";
        $res=mysqli_query($conn,$sql)or die(mysqli_error());
   
       $count=mysqli_num_rows($res);
           
       if($count>0){
        while($rows2=mysqli_fetch_assoc($res)){
            $id=$rows2['id'];
            $title=$rows2['title'];
            $price=$rows2['price'];
            $description=$rows2['description'];
            $image_name=$rows2['image_name'];
            ?>

            <div class="food-menu-box">
            <div class="food-menu-img">


            <?php
                if($image_name==""){
                    echo "<div class='error' style='  color: #ff4757;'>Image not Avalaible</div>";          
                }
                else{
                    ?>
                     <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>"  class="img-responsive img-curve">

                    

                     <?php
                }

            ?>


               
            
            
            
            
            </div>

            <div class="food-menu-desc">
                <h4><?php  echo $title;  ?></h4>
                <p class="food-price"><?php echo $price; ?>/-</p>
                <p class="food-detail">
                    <?php echo $description;   ?>
                </p>
                <br>

                <a href="order.html" class="btn btn-primary">Order Now</a>
            </div>
             </div>




         <?php       
            }
        }
        else{

            echo "<div class='error' style='  color: #ff4757;'>food not add</div>";
        }
                
            ?>





            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->
    <?php include('partials-front/footer.php'); ?>
