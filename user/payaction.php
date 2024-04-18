<?php
include('../includes/config.php');
include('../includes/session.php');

$sql="UPDATE `tbl_user` SET `user_type`='Premium', `status`='1' WHERE `id`='$Uid'";

$res=mysqli_query($conn,$sql);
if($res)
{ 
    header('location:chat.php');
}
else{
    echo "error".$sql1."<br>".mysqli_error($conn);
}

?>

