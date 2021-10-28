


<?php include('partials-front/menu.php'); ?>

<?php

if(isset($_GET['category_id'])){
    $category_id=$_GET['category_id'];
    $sql="SELECT `title` FROM `tbl_catagory` WHERE id=$category_id";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    $rows=mysqli_fetch_assoc($res);
    $title=$rows['title'];
}
else{

    header("location:".SITEURL);
}
?>



    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo  $title;  ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>


            <?php
             $sql2="SELECT * FROM `tbl_food` WHERE category_id=$category_id";
             $res2=mysqli_query($conn,$sql2)or die(mysqli_error());
        
            $count=mysqli_num_rows($res2);
                
            if($count>0){
                while($rows2=mysqli_fetch_assoc($res2)){
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

                    <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id;  ?>" class="btn btn-primary">Order Now</a>
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
