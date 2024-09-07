<?php include('partials/menu.php'); ?>

             
        <!--Main Content section start-->
        <div class="main-content">
            <div class="wrapper">
                <h1>MANAGE ADMIN</h1>
                <br> <br> 

                <?php
                   if(isset($_SESSION['add'])){
                    echo $_SESSION['add']; //Displaying Session message
                    unset($_SESSION['add']); //Removing Session Message
                   }

                   if(isset($_SESSION['delete']))
                   {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                   }

                   if(isset($_SESSION['update']))
                   {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                   }

                   if(isset($_SESSION['user-not-found'])){
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                   }

                   if(isset($_SESSION['pwd-not-match'])){
                    echo $_SESSION['pwd-not-match'];
                    unset($_SESSION['pwd-not-match']);
                   }

                   if(isset($_SESSION['change-pwd'])){
                    echo $_SESSION['change-pwd'];
                    unset($_SESSION['change-pwd']);
                   }
                ?>
                <br><br>
                <!-- Button to add admin-->
                 <a href="add-admin.php" class="btn-primary">Add Admin</a>
                 <br> <br> <br>

                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    //Query to Get All Admin
                    $sql = "SELECT * FROM admin_table";
                    //Execution the Query
                    $res = mysqli_query($conn, $sql);

                    //Check weather the query is executed of not
                    if($res==TRUE){
                        // Count rows to check weather we have date in database or not
                        $count = mysqli_num_rows($res); //Function to get all the rows in database

                        $sn=1; //create a variable and assign the value

                        //Check the num of rows
                        if($count>0){
                            //We Have date in database
                            while($rows=mysqli_fetch_assoc($res))
                            {
                               //using while loop to get all the data from database.
                               //And while loop wile run as long as we have data in database

                               //Get individual data 
                               $id=$rows['id'];
                               $full_name=$rows['full_name'];
                               $username=$rows['username'];

                               //Display the values in our Table
                               ?>

                                <tr>
                                    <td><?php echo $sn++;?>.</td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary ">Chanage Password</a>
                                        <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                    </td>
                                </tr>
                                <?php
                               
                            }
                        }
                        else{
                            //we do not have data in database
                        }
                    }
                    ?>

                </table>
                
            </div>
        </div>
        <!--Main Content section end-->

<?php include('partials/footer.php'); ?>