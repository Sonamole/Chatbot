<?php
include("../includes/config.php");
if (isset($_POST['signin'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $category='user';

    $sql="insert into `tbl_user`(`name`,`email`,`password`,`category`) values('$name','$email','$password','$category')";
    $result=mysqli_query($conn,$sql);
  
    if($result)
    {
        header('location:../index.html');
    }
    else
    {
        
    echo "error".$sql."<br>".mysqli_error($conn);
    }
}
?>