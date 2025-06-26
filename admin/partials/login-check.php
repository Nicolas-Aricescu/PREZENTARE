<?php 

    //Acess control
    if(!isset($_SESSION['user'])) 
    {
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access admin</div>";
        header('location:'.SITEURL.'admin/login.php');
    }
?>