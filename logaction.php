<?php
session_start();
include("includes/config.php");


    $name=$_POST['name'];
    $password=$_POST['password'];

$sql="SELECT * FROM `tbl_user` WHERE `name`='$name' AND `password`='$password' ";
$res=mysqli_query($conn,$sql);
$count=mysqli_num_rows($res);
$select=mysqli_fetch_assoc($res);

if($count>0)
{
    $_SESSION["user_id"]=$select['id'];
    $_SESSION['user_name']=$select['name'];
    if($select['category']=='user'){
        header('Location:User/home.php');
    }
    else if($select['category']=='admin'){
        header('Location:Admin/home.php');
    }
}
else{
    echo "<script> alert('Registration Unsuccessful')</script>";
}
?>