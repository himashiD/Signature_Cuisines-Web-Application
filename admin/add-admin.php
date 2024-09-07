<?php include('partials/menu.php'); ?>



<div class="main-content">
    <div class="wrapper">
        <h1>ADD ADMIN</h1>

        <br><br>

        <?php
        if(isset($_SESSION['add'])) //Checking whether the session is set of net
        {
            echo $_SESSION['add']; // Dissplay the sesstion message if set
            unset($_SESSION['add']); //Remove session Message
        }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name : </td>
                    <td ><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>

                <tr>
                    <td>Username : </td>
                    <td ><input type="text" name="username" placeholder="Enter Your Username"></td>
                </tr>

                <tr>
                    <td>Password : </td>
                    <td ><input type="password" name="password" placeholder="Enter Your Password"></td>
                </tr>

                <tr>
                    <td colspan="2"></td>
                    <td ><input type="submit" name="submit" value="Add Admin" class="btn-secondary"></td>
                </tr>
            </table>
        </form>
    </div>
</div>



<?php include('partials/footer.php'); ?>

<?php
//Prosess the value from Form and Save it in Database

//check weather the submit button is is clicked or not

if(isset($_POST['submit'])){
    // Button clicked
    //echo "Button Clicked";

    // 1.Get data from Form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);//password Encryption with MD5

    // 2.SQL Query to save the data into database

    $sql = "INSERT INTO admin_table SET
    full_name= '$full_name',
    username= '$username',
    password= '$password'
    ";

   
    // 3. Executing Query and saving data into Database
    $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));

    // 4. Check weather the(Query is Executed) date is inserted or not and display appropriate message

    if($res==TRUE){
        // Data Inserted
        //echo "Data Inserted";
        //Create a Session variable to display message
        $_SESSION['add'] = "Admin Added Successfully";

        //Redirect Page to manage admin
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    else{
        // Failed to Inserted Data
        //echo "Failed to Inser Data";
        //Create a Session variable to display message
        $_SESSION['add'] = "Failed to Add Admin";

        //Redirect Page to add admin
        header("location:".SITEURL.'admin/add-admin.php');
    }

}


?>