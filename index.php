<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">

        <div class="Topics">
            <div class="topic1">Signature</div>
            <div class="topic2">cursions</div>
            
        </div>
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php

    if(isset($_SESSION['order']))
    {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }

    ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Our Specials<h2>

            <?php
            //Create SQL query to display categories from databse
            $sql = "SELECT * FROM category_table WHERE active='Yes' AND featured='Yes' LIMIT 3";
            //Execute the query
            $res = mysqli_query($conn, $sql);
            //Count rows to check wheather the category is available or not
            $count = mysqli_num_rows($res);

            if($count>0)
            {
                //categories available
                while($row=mysqli_fetch_assoc($res))
                {
                    //Get the values like id, title, image_name
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];

                    ?>
                    <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                    <div class="box-3 float-container">
                        <?php

                        //check wheather Image is available or not
                        if($image_name=="")
                        {
                            //Display Message
                            echo "<div class='error'>Image not Available.</div>";
                        }
                        else
                        {
                            //Image Available
                            ?>
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">

                            <?php
                        }

                        ?>
                        

                        <h3 class="float-text text-white"><?php echo $title; ?></h3>
                    </div>
                    </a>

                    <?php
                }
            }
            else
            {
                //Categories not available
                echo "<div class='error'>Category not Added.</div>";
            }

            ?>




            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->




    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
            //display foods that are active
            $sql2 = "SELECT * FROM food_table WHERE active='Yes'LIMIT 6";

            //Execute the query
            $res2 = mysqli_query($conn, $sql2);

            //count Rows
            $count2 = mysqli_num_rows($res2);

            //Check wheather the food are available or not
            if($count>0)
            {
                //Food Available
                while($row=mysqli_fetch_assoc($res2))
                {
                    //get the values
                    $id = $row['id'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];

                    ?>

                    <div class="food-menu-box">
                         <div class="food-menu-img">

                        <?php
                        //Check weather image available or not
                        if($image_name=="")
                        {
                            //Image not Avaialable
                            echo "<div class='error'> Image not Available. </div>";
                        }
                        else
                        {
                            //Image Available
                            ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo  $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            <?php
                        }

                        ?>

                         </div>

                         <div class="food-menu-desc">
                             <h4><?php echo $title; ?></h4>
                             <p class="food-price"><?php echo $price; ?></p>
                             <p class="food-detail">
                                <?php echo $description; ?>
                             </p>
                             <br>

                             <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id ;?>" class="btn btn-primary">Order Now</a>
                         </div>
                    </div>

                    <?php
                }
            }
            else{
                //Food Not Available
                echo "<div class='error'>Food Not Available.</div>";

            }

            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>
