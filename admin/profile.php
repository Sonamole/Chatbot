<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url(' https://t4.ftcdn.net/jpg/02/40/63/55/360_F_240635575_EJifwRAbKsVTDnA3QE0bCsWG5TLhUNEZ.jpg'); /* Replace 'background.jpg' with the path to your background image */
            background-size: cover;
            font-family: Arial, sans-serif;
            /* color: white; */
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
        }

        .user-details {
            text-align: center;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.9);
          
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
        }

        input {
            padding: 8px;
            margin-bottom: 16px;
        }

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .Goback-button {
            display: inline-block;
            padding: 10px ;
            background-color:Black;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            /* padding-left:60px; */
            width:70px;
        }
    </style>
</head>
<body>
<a href="home.php" class="Goback-button">Go back</a>
 
<div class="container">
    <div class="user-details">
          

    <h2 style="color: white;"><u>Admin Details</u></h2>
                                  <?php
                               include('../includes/config.php'); 
                            //    include('../includes/session.php'); 
                                $place="SELECT * FROM `tbl_user` WHERE `category`='admin'";
                                $place_run=mysqli_query($conn,$place);
                                
                                        if(mysqli_num_rows($place_run))
                                        {                                        
                                        while ($row=mysqli_fetch_assoc($place_run))
                                         {  
                                            echo "<p style='color: white;'>Name: " . $row['name'] . "</p>";
                                            echo "<p style='color:  white;'>Email: " . $row['email'] . "</p>";
                                            echo "<p style='color:  white;'>Password: " . $row['password'] . "</p>";
                                            
                                          echo'<p><a href="profile.php?up_id='.$row['id'].'"><button>Edit</button></a> </p>';
                                         }}
                                         ?>
        
    </div>


    <?php

include('../includes/config.php'); 
include('../includes/session.php'); 
if(isset($_GET['up_id'])){
$u_name="";
$u_email="";
$_password="";

    $id=$_GET['up_id']; 
    $sql="SELECT * from `tbl_user` WHERE  `category`='admin' AND  `id`='$id'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    if($row){
    
        $u_name=$row['name'];
        $u_email=$row['email'];
        $u_password=$row['password'];
    }
}

?>
    <div class="form-container">
        <h2>Admin Details</h2>
        <form action="edit.php" method="POST">
            <label for="name">Name:</label>
            <input type="hidden"  value="<?php echo isset($_GET['up_id']) ?  $_GET['up_id'] : null ?>" >
            <input type="text" id="name" name="name" placeholder="Enter your name" value="<?php echo isset($u_name) ?  $u_name: "" ?>">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email"value="<?php echo isset($u_email) ?  $u_email: "" ?>">

            <label for="email">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" value="<?php echo isset($u_password) ?  $u_password : "" ?>">

            <!-- Add more form fields as needed -->

            <button type="submit" name="submit">Update Details</button>
        </form>
    </div>
</div>

</body>
</html>
