<?php include('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Add Admin</h1>

            <br><br>

            <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            ?>

            <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                </tr>
            
                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>
            </form>
        </div>

    </div>


<?php include('partials/footer.php'); ?>

<?php 
    //Process the value from Form and save it  in database 
    //Check whether the submit button is clicked or not 

    if(isset($_POST['submit']))
    {

        $full_name= $_POST["full_name"];
        $username= $_POST["username"];
        $password= md5($_POST["password"]);

      $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'

      ";
        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());


        $res = mysqli_query($conn, $sql) or die(mysqli_error());
        
        if($res==TRUE)
        {
           $_SESSION['add']= "Admin added succesfully";
           header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            $_SESSION['add']= "Failed to add admin";
           header("location:".SITEURL.'admin/add-admin.php');
        }
    }
    

?>