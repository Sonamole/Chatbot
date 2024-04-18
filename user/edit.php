<?php
include("../includes/config.php");
include("../includes/session.php");
if(isset($_POST['submit'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    

     $updtq="UPDATE `tbl_user` set name='$name',email ='$email', password ='$password' WHERE  `category`='user' AND `id`='$Uid' ";
 
        $results=mysqli_query($conn,$updtq);
        if($results)
        {
       
?>
<script>alert("updated successfully");</script>

<?php
          header('location:profile.php');

          }
    }
