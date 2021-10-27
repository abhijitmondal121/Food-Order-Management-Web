<?php include('partials-front/menu.php'); ?>


    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>


            <?php
             $sql="SELECT * FROM `tbl_catagory` WHERE `active`='yes'";

             $res=mysqli_query($conn,$sql)or die(mysqli_error());
        
            $count=mysqli_num_rows($res);
            $i=1;    
            if($count>0){
                while($rows=mysqli_fetch_assoc($res)){
                $id=$rows['id'];
                $title=$rows['title'];
                $image_name=$rows['image_name'];
                    
                ?>


            
            
<a href="<?php echo SITEURL;?>category-foods.php?category_id=<?php echo $id;?>">
            <div class="box-3 float-container">
                <?php
                    if($image_name==""){
                        echo "<div class='error' style='  color: #ff4757;'>Image not Avalaible</div>";          
                    }
                    else{
                        ?>
                        <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name ?>" class="img-responsive img-curve">

                         

                         <?php
                    }

                ?>

                <h3 class="float-text text-white"><?php echo $title; ?></h3>
            </div>
            </a>





            <?php   
                } 
            }
            else{

                echo "<div class='error' style='  color: #ff4757;'>Category not add</div>";
                // header('location:'.SITEURL.'admin/add-food.php');
                // die();
            }
        




            ?>




                       

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <?php include('partials-front/footer.php'); ?>
