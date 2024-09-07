<?php 
//Including constant file
include('../config/constants.php');

//ech delete food
if(isset($_GET['id']) && isset($_GET['image_name'])) //Either use && or AND
{
    //process to delete
    echo "Process to Delete";

    //1.get id and image name

    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    //2.Remove the image if available
    //Check wheather the image is available or not and delete only if available

    if($image_name != "")
    {
        //IT has image and need to remove from folder
        //get the image path
        $path = "../images/food/".$image_name;

        //Remove image file from folder
        $remove = unlink($path);

        //check weather the image i remove or not
        if($remove==true)
        {
            //Failed to remove image
            $_SESSION['upload']= "<div class='error'>Failed to Remove Image File.</div>";
            //redirect to manage food
            header('location:'.SITEURL.'admin/manage-food.php');
            //stop the process of deleting food
            die();
        }


    }

    //3.Delete food from databse
    $sql = "DELETE FROM food_table WHERE id=$id";

    //execute the query
    $res = mysqli_query($conn, $sql);

    //Check wheather the query execute or not and set  the session message respectively
     //4.Redirect to manage food with session message
    if($res==true)
    {
        //Food Delete
        $_SESSION['delete']= "<div class='success'>Food Delete Successfully.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }
    else
    {
        //Failed to delete food
        $_SESSION['delete']= "<div class='error'>Failed to Delete Food.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }

   
}
else{
    //redirect to messagr food page
    $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
    header('location:'.SITEURL.'admin/manage-food.php');
}
?>