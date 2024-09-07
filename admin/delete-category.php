<?php

//include constants file
include('../config/constants.php');

//Echo "Delete Page"
//Check wheather the id and image_name value is set or not
if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    //Get the value and Delete
    //echo "Get value and delete";
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    //remove the pysical image file is available
    if($image_name !="")
    {
        //Image is available. So remove it
        $path = "../images/category/".$image_name;
        //Remove the Image
        $remove = unlink($path);

        //if failed to remove image than add an eeror message and stop the process
        if($remove==true)
        {
            //set the sesssion message
            $_SESSION['remove'] = "<div class='error'>Faile to Remove Category Image.</div>";
            //redirect to message Ctegory page
            header('location:'.SITEURL.'admin/manage-category.php');
            //stop the process
            die();
        }
    }
    //Delete data from database
    //SQL Query to delete data from databse
    $sql= "DELETE FROM category_table WHERE id=$id";

    //Execute the query
    $res = mysqli_query($conn, $sql);

    //Check wheather the data is delete from database or not
    if($res==true)
    {
        //set success message and redirect 
        $_SESSION['delete'] = "<div class='success'> Category Deleted Successfully.</div>";
        //Redirect to manage Category
        header('location:'.SITEURL.'admin/manage-category.php');
    }
    else
    {
        //set fail message and redirect
        $_SESSION['delete'] = "<div class='error'> Failed to Delete Category.</div>";
        //Redirect to manage Category
        header('location:'.SITEURL.'admin/manage-category.php');
    }

}
else
{
    //redirect to manage category page
    header('location:'.SITEURL.'admin/manage-category.php');
}


?>