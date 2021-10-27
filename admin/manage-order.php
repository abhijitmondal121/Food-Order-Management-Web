<?php include('partials/menu.php');?>


<div class="main-content">
    <div class="wrapper">
    <h1>Manage Order</h1>
    <?php
         if(isset($_SESSION['cupdate'])){
            echo $_SESSION['cupdate'];
            unset($_SESSION['cupdate']);
        }


        ?>

    <br><br>
    <table class="tbl-full">
        <tr>
            <th>S.N</th>
            <th>Food</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
            <th>order_date</th>
            <th>status</th>
            <th>customer_name</th>
            <th>contact</th>
            <th>Email</th>
            <th>Address</th>
            <th>Actions</th>


        </tr>
        <?php
        $sql="SELECT * FROM `tbl_order` ORDER BY id DESC ";
        $res=mysqli_query($conn,$sql)or die(mysqli_error());
        if($res==TRUE){
            $count=mysqli_num_rows($res);
            $i=1;    
            if($count>0){
                while($rows=mysqli_fetch_assoc($res)){
                    $id=$rows['id'];

                    $food=$rows['food'];
                    $price=$rows['price'];
                    $qty=$rows['qty'];
                    $total=$rows['total'];
                    $order_date=$rows['order_date'];
                    $status=$rows['status'];
                    $customer_name=$rows['customer_name'];
                    $customer_contact=$rows['customer_contact'];
                    $customer_email=$rows['customer_email'];
                    $customer_address=$rows['customer_address'];
                    ?>
                        <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $food; ?></td>
                        <td><?php echo $price; ?> /-</td>
                        <td><?php echo $qty; ?> </td>
                        <td><?php echo $total; ?> </td>
                        <td><?php echo $order_date; ?> </td>


                        <td><?php 
                        if($status=="ordered"){
                            echo "<label>$status</label>";
                        }
                        elseif($status=="On Delivery"){
                            echo "<label style='color:orange;'>$status</label>";

                        }
                        
                        elseif($status=="Delivered"){
                            echo "<label style='color:green;'>$status</label>";

                        }
                        
                        elseif($status=="cancled"){
                            echo "<label style='color:red;'>$status</label>";

                        }
                        ?> </td>
                        
                        
                        <td><?php echo $customer_name; ?> </td>
                        <td><?php echo $customer_contact; ?> </td>
                        <td><?php echo $customer_email; ?> </td>
                        <td><?php echo $customer_address; ?> </td>


                        

                        <td>   
                        <!-- <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change password</a> -->

                        <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Update order</a>
                       
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



<?php include('partials/footer.php'); ?>