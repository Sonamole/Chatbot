<?php  include('../includes/config.php'); ?>
  
  <?php
    if(isset($_GET['up_id'])){
        $u_keyword="";
        $u_description="";
    
    $id=$_GET['up_id'];   
    $sql="SELECT * from `tbl_add` WHERE `id`='$id'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    if($row){
    
        $u_keyword=$row['keyword'];
        $u_description=$row['description'];
    }
                                                    
    }
       
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('https://t4.ftcdn.net/jpg/02/40/63/55/360_F_240635575_EJifwRAbKsVTDnA3QE0bCsWG5TLhUNEZ.jpg') no-repeat center center fixed;
            /* background-image:url("interface.png")width:50px; */
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #3498db;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
         
            
            border: 2px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #2980b9;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2573a7;
        }

        .logout-button {
            display: inline-block;
            padding: 10px ;
            background-color:blue;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            /* padding-left:60px; */
            width:70px;
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
<!-- <a href="../user/logout.php" class="logout-button">Log Out</a> -->
<h1 style="text-align: center;"><u>Add data</u></h1>

    <form action="addaction.php" method="post">
        <input type="hidden" name="hid" value="<?php echo isset($_GET['up_id']) ?  $_GET['up_id'] : null ?>" >
        <input  type="text" placeholder="Add keyword" name="keyword" value="<?php echo isset($u_keyword) ?  $u_keyword : "" ?>">
        <textarea placeholder="Add description" name="description" ><?php echo isset($u_description) ?  $u_description : "" ?></textarea> 
        <button type="submit" name="signin">Submit</button>
    </form>

                        
    <table style="width: 80%; border: 2px solid  #122769; border-collapse: collapse; margin-left:150px; margin-top:80px;">
            <thead>
            <tr>
                <th style="border: 1px solid   #122769; padding: 10px;">Id</th>
                <th style="border: 1px solid   #122769; padding: 10px;">Keyword</th>
                <th style="border: 1px solid   #122769; padding: 10px;">Description</th>
                
                <th style="border: 1px solid  #122769; padding: 10px;">Edit</th> 

            </tr>
          </thead>
          <tbody>
            <?php
                               
                                $place="SELECT * FROM `tbl_add`";
                                $place_run=mysqli_query($conn,$place);
                                
                                        if(mysqli_num_rows($place_run))
                                        {                                        
                                        while ($row=mysqli_fetch_assoc($place_run))
                                         {  
                                            
                                           
                                            echo"<tr>";
                                            echo"<td style='border: 1px solid   #122769; padding: 10px;'>".$row['id']."</td>";
                                            echo"<td style='border: 1px solid   #122769; padding: 10px;'>".$row['keyword']."</td>";
                                            echo"<td style='border: 1px solid   #122769; padding: 10px;'>".$row['description']."</td>";
                                            echo'<td ><a href="add_chat.php?up_id='.$row['id'].'"><button>Edit</button></a> </td>';
                                            
                                            echo"</tr>";
                                          
                                           
                                                                                                                           
                                         }
                                        }
                                          ?>
                                           </tbody>


                         
    </table>
</body>
</html>
