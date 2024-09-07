<?php

//Include constants.php file here
include('../config/constants.php');
// 1. get the ID of Admin to be deleted
$id = $_GET['id'];

// 2. Create SQL Query to delete admin
$sql = "DELETE FROM admin_table WHERE id=$id";

//Execute the Query
$res = mysqli_query($conn,$sql);

//Check weather the query executed successfully or not
if($res==true)
{
    //Query Executed seccessfully and Admin Deleted
    //echo "Admin Deleted";
    //Create Session variable to Display Message
    $_SESSION['delete']= "<div class='success'>Admin Delete Successfully.</div>";

    //Redireact to manage Admin Page
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else{
    // Failed to Delete Admin
    //echo "Failed to Delete Admin";
    $_SESSION['delete']= "<div class='error'>Failed to Delete Admin. Try Again Later.</div>";

    header('location:'.SITEURL.'admin/manage-admin.php');
}

// 3. Redirect to manage Admin Page with message (success/error)

?>