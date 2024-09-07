<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>

        <?php
        // 1. Get the ID of Selected Admin
        $id=$_GET['id'];

        // 2. Create SQL Query to get the Deatails
        $sql="SELECT * FROM admin_table WHERE id=$id";

        //Execute the query
        $res=mysqli_query($conn, $sql);

        //Check wheather the query is executed or not
        if($res==true)
        {
            //Check wheather the data is available or not
            $count = mysqli_num_rows($res);

            //Check wheather we have admin data or not
            if($count==1)
            {
                //Get the Details
                //echo "Admin Available";
                $row=mysqli_fetch_assoc($res);

                $full_name= $row['full_name'];
                $username= $row['username'];
            }
            else
            {
                //Redirect to Manage Admin Page
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }

        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name : </td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name;?>">
                    </td>
                </tr>
                <tr>
                    <td>Username : </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username;?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<?php

//Check wheather the submit button is checked or not
if(isset($_POST['submit']))
{
    //echo "Button Clicked";
    //Get all the values from Form to update
    $id = $_POST['id'];
    $full_name= $_POST['full_name'];
    $username = $_POST['username'];

    //Create a sql Query to update Admin
    $sql = "UPDATE admin_table SET
    full_name = '$full_name',
    username = '$username'
    WHERE id='$id'
    ";

    //Execute the Query 
    $res = mysqli_query($conn, $sql);

    //Check wheather the query executed successfully or not
    if($res==true)
    {
 
               //Query Executed and Admin Update
               $_SESSION['update'] = "<div class='success'>Admin Update Successfully.</div>";
               //Readirect to Manage Admin Page
               header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //Failed to Update admin
               
               $_SESSION['update'] = "<div class='error'>Failed to Delete Admin.</div>";
               //Readirect to Manage Admin Page
               header('location:'.SITEURL.'admin/manage-admin.php');
    }
}

?>

<?php include('partials/footer.php'); ?>