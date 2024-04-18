<?php
include("../includes/config.php");

if(isset($_POST['signin'])) {
    $keyword = $_POST['keyword'];
    $description = $_POST['description'];
    echo $_POST['hid'];

    if($_POST['hid']!=null) {
        $hid=$_POST['hid'];

     $updtq="update `tbl_add` set keyword='$keyword',description ='$description' WHERE  `id`='$hid'";
 
        $results=mysqli_query($conn,$updtq);
        if($results)
        {
       
?>
<script>alert("updated successfully");</script>

<?php
        header('location:add_chat.php');

        }
        
    }
    else{

 // Use prepared statements to prevent SQL injection
 $sql = "INSERT INTO `tbl_add` (`keyword`, `description`) VALUES (?, ?)";
 $stmt = mysqli_prepare($conn, $sql);
 
 if ($stmt) {
     // Bind parameters and execute the statement
     mysqli_stmt_bind_param($stmt, "ss", $keyword, $description);
     $result = mysqli_stmt_execute($stmt);

     if ($result) {
        //   echo "<script> alert('Registered successfully')</script>";
         header('location:add_chat.php');
     } else {
         echo "Error: " . mysqli_error($conn);
     }
     
     // Close the statement
     mysqli_stmt_close($stmt);
 } else {
     echo "Error: Unable to prepare the statement.";
 }
    }

   

   
}


?>
