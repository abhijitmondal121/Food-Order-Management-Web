<?php include('partials/menu.php'); ?>



<div class="main-content">
    <div class="wrapper">
        <h1>Update order</h1><br><br>

        <?php
            
             // get id admin to ddelete
             $id=$_GET['id'];
             $sql2="SELECT * FROM `tbl_order` WHERE id=$id";
             $res2=mysqli_query($conn,$sql2);

            if($res2==true)
            {
                $count=mysqli_num_rows($res2);
                if($count==1){
                    $rows=mysqli_fetch_assoc($res2);
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
                }
            }
            else{
                header('location:'.SITEURL.'admin/manage-food.php');
            }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-full">
                <tr>
                    <td>Food :</td>
                    <td><input type="text" name="food" placeholder="<?php echo $food; ?>"></td>
                </tr>
                <tr>
                    <td>Price :</td>
                    <td><input type="text" name="price" placeholder="<?php echo $price; ?>"></td>
                </tr>
                <tr>
                    <td>Qty :</td>
                    <td><input type="text" name="qty" placeholder="<?php echo $qty; ?>"></td>
                </tr>
                <tr>
                    <td>Total :</td>
                    <td><input type="text" name="total" placeholder="<?php echo $total; ?>"></td>
                </tr>
                <tr>
                    <td>order_date :</td>
                    <td><input type="text" name="order_date" placeholder="<?php echo $order_date; ?>"></td>
                </tr>

                <tr>
                    <td>Status :</td>
                    <td><input type="text" name="status" placeholder="<?php echo $status; ?>"></td>
                </tr>
                <tr>
                    <td>Customer Name :</td>
                    <td><input type="text" name="customer_name" placeholder="<?php echo $customer_name; ?>"></td>
                </tr>
                <tr>
                    <td>Customer contact :</td>
                    <td><input type="text" name="customer_contact" placeholder="<?php echo $customer_contact; ?>"></td>
                </tr>                
                <tr>
                    <td>Customer email :</td>
                    <td><input type="text" name="customer_email" placeholder="<?php echo $customer_email; ?>"></td>
                </tr>
                <tr>
                    <td>Customer Address :</td>
                    <td><input type="text" name="customer_address" placeholder="<?php echo $customer_address; ?>"></td>
                </tr>
                  
 
        

     
            
            </select></td>
        </tr>
        





        <tr>
            <td colspan="2">
                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                

                <input type="submit" name="submit" value="Add Category" class="btn-secondary">
            </td>
        </tr>
            </table>
        </form>

    </div>
</div>




<?php
// check whether the submit button working or not

if(isset($_POST['submit'])){
    // Button clicked
    $food=$_POST['food'];
    $price=$_POST['price'];
    $qty=$_POST['qty'];
    $total=$_POST['total'];
    $order_date=date("y-m-d h:i:sa");
    $status=$_POST['status'];
    $customer_name=$_POST['customer_name'];
    $customer_contact=$_POST['customer_contact'];
    $customer_email=$_POST['customer_email'];
    $customer_address=$_POST['customer_address'];



    


    // `image_name`=[value-3],
    $sql3="UPDATE `tbl_order` SET `food`='$food',`price`='$price',`qty`='$qty',`total`='$total',`order_date`='$order_date',`status`='$status',`customer_name`='$customer_name',`customer_contact`='$customer_contact',`customer_email`='$customer_email',`customer_address`='$customer_address' WHERE id=$id";
    
    
    


    $res3=mysqli_query($conn,$sql3);

    if($res3==true)
    {
        $_SESSION['cupdate']="<div class='success' style='color: #47ffa3;'>category update order</div>";
        header('location:'.SITEURL.'admin/manage-order.php');
    }
    else{
        $_SESSION['cupdate']="<div class='error' style='  color: #ff4757;'>Failed to update order</div>";
        header('location:'.SITEURL.'admin/manage-order.php');
    
    }    
}    



?>









<?php include('partials/footer.php'); ?>