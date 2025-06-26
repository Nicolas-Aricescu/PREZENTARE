   <?php
 include('../config/constants.php');


echo $id = $_GET['id'];


$sql = "DELETE FROM tbl_admin WHERE id=$id";
$res = mysqli_query($conn, $sql);

if($res==TRUE)
{
    $_SESSION['delete'] = "Admin deleted successfully";
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else
{
    $_SESSION['delete'] = "Failed to delete admin";
    header('location:'.SITEURL.'admin/manage-admin.php');
}

?>