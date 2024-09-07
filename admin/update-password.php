<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>

        <br><br>

        <?php
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
        }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Current Password : </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>
                <tr>
                    <td>New Password : </td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password : </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

    </div>
</div>

<?php

//Check wheather the submit button is clicked on Not
if(isset($_POST['submit']))
{
    //echo "Clicked";

    //1.Get the data from Form
    $id= $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    //2.Check weather the user with current ID and Current Password Exists or not
    $sql = "SELECT * FROM admin_table WHERE id=$id AND password='$current_password'";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    if($res==true)
    {
        //Check weather data is available or not
        $count=mysqli_num_rows($res);

        if($count==1)
        {
            //User Exists and Password Can be Changed
            //echo "User Found";

            //checked wheather the new password and confirm match or not
            if($new_password==$confirm_password)
            {
                //Update the Password
                $sql2= "UPDATE admin_table SET
                password='$new_password'
                WHERE id=$id
                ";

                //Execute the Query 
                $res2 = mysqli_query($conn,$sql2);

                //check wheather the query exeuted or not
                if($res2==true)
                {
                    //Display Success Message
                    //Redirect to manage admin page with Success Message
                    $_SESSION['change-pwd']="<div class='success'>Password Changed Successfully. </div>";
                    

                    //Redirect the users
                    header('location:'.SITEURL.'admin/manage-admin.php');

                }

                else{
                    //Display success message
                    //Redirect to manage admin page with Error Message
                    $_SESSION['change-pwd']="<div class='error'>Failed to Changed Password. </div>";

                    //Redirect the users
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
            else
            {
                //Redirect to manage admin page with Error Message
                $_SESSION['pwd-not-match']="<div class='error'>Password did Not Patch. </div>";

                //Redirect the users
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }
        else{
            //User does not exist set Message and redirect
            $_SESSION['user-not-found']="<div class='error'>User Not Found. </div>";

            //Redirect the users
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }

    //3.Check weather the new Password and confirm password match or not
    

    //4.Change Password if all above is true
}
?>



<?php include('partials/footer.php'); ?>