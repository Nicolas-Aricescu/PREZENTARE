<?php 

    include('../config/constants.php');

    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];
        if($image_name != "")
        {
            $path = "../images/food/".$image_name;
            $remove = unlink($path);
            if($remove==false)
            {
                $_SESSION['upload'] = "<div class='error'>Failed to remove image</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
                die();
            }
            
        }

        $sql = "DELETE FROM tbl_food WHERE id=$id";
        $res = mysqli_query($conn, $sql);
        if ($res == true)
        {
            $_SESSION['delete']= "<div class='success'>Food deleted success</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            $_SESSION['delete']= "<div class='error'>Food delete failed </div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
    }
    else
    {
       $_SESSION['unauthorize'] = "<div class='error'>Unauthorized acces</div>";
       header('location:'.SITEURL.'admin/manage-food.php');
    }

?>