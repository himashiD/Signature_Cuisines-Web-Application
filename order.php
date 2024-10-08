<?php include('partials-front/menu.php'); ?>

<?php

//check wheather food id is set or not
if(isset($_GET['food_id']))
{
    //get the food is and  define of the selected food
    $food_id = $_GET['food_id'];

    //get the details of the selected food
    $sql = "SELECT * FROM food_table WHERE id=$food_id";

    //Execute the query
    $res = mysqli_query($conn, $sql);

    //count the rows
    $count = mysqli_num_rows($res);

    //check wheather the data is available or not
    if($count==1)
    {
        //We have data
        //get the data from database
        $row = mysqli_fetch_assoc($res);

        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
    }
    else{
        //Food not available
        //redirect to homa page
        header('location:'.SITEURL);
    }

}
else{
    //Redirect to homepage
    header('location:'.SITEURL);
}


?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-order">
        <div class="container">
            
            <h2 class="text-center text-red">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php

                        //check wheather the image is available or not
                        if($image_name=="")
                        {
                            //Image not Available
                            echo "<div class='error'>Image not Avaialable. </div>";
                        }
                        else{
                            //image available
                            ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            <?php
                        }

                        ?>
                        
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">

                        <p class="food-price">$<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">


                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php

            //check wheather sumbit button id clicked or not
            if(isset($_POST['submit']))
            {
                //get all the details from the form
                $food = $_POST['food'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];

                $total = $price * $qty; //total= price x qty

                $order_date = date("Y-m-d h:i:sa"); //order date

                $status = "Ordered"; //ordered, on delevery,delivers, cancel

                $customer_name = $_POST['full-name'];
                $customer_contact = $_POST['contact'];
                $customer_email = $_POST['email'];
                $customer_address = $_POST['address'];

                //save the order in database
                //curent sql to save the data

                $sql2= "INSERT INTO order_table SET
                food = '$food',
                price = $price,
                qty = $qty,
                total = $total,
                order_date = '$order_date',
                status = '$status',
                customer_name = '$customer_name',
                customer_contact = '$customer_contact',
                customer_email = '$customer_email',
                customer_address = '$customer_address'

                ";

                //Execute the query
                $res2 = mysqli_query($conn,$sql2);

                //check wheather query executred successfully or not
                if($res2==true)
                {
                    //Query executed and order sved
                    $_SESSION['order'] = "<div class='success text-center'>Food Order Successfully.</div>";
                    header('location:'.SITEURL);
                }
                else
                {
                    $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
                    header('location:'.SITEURL);
                }


            }

            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>