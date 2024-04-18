<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('https://www.fastcapital360.com/wp-content/uploads/2021/03/graphic_01-2.gif') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            height: 100vh;
        }

        #tabs-container {
            background-color:gray; /* Semi-transparent white background for the tabs */
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 220px;
            display: flex;
        }

        .tab {
            flex: 1;
            text-align: center;
            padding: 10px ;
            /* cursor: pointer; */
            /* transition: background-color 0.3s; */
        }

        .tab:hover {
            background-color:gray;
        }

        .tab.active {
            background-color: red;
            color: #fff;
        }

        #icon-chatbot::before {
            content: "\1F916"; /* Add your chatbot icon here */
            font-size: 24px;
        }

        #icon-member::before {
            font-family: 'Font Awesome 5 Free';
            content: "\f007"; /* Replace with your desired Font Awesome icon code */
            font-size: 24px;
        }

        @keyframes dance {
            0% {
                transform: translateY(0);
            }
            25% {
                transform: translateY(-5px);
            }
            50% {
                transform: translateY(0);
            }
            75% {
                transform: translateY(5px);
            }
            100% {
                transform: translateY(0);
            }
        }

        .active.tab:hover {
            animation: dance 0.5s infinite;
        }
        .logout-button {
            display: inline-block;
            padding: 10px ;
            background-color:grey;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            /* padding-left:60px; */
            width:70px;
        }
    </style>
</head>
<body>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <div id="tabs-container">
    <a href="logout.php" class="logout-button">Log Out</a>
    <a href="Profile.php" class="logout-button">Profile</a>
        <a href="chat.php"><div class="tab active" id="chatbot-tab">
            <span id="icon-chatbot"></span><br>
            ChatB0t
        </div></a>
         

        <?php
include('../includes/config.php');
include('../includes/session.php');

$place = "SELECT * FROM `tbl_user` WHERE `id`='$Uid'";
$place_run = mysqli_query($conn, $place);
$row = mysqli_fetch_assoc($place_run);
$status=$row['status'];
if($status==0)
 
    { 
    echo"<a href='pay.php'><div class='tab' id='member-tab'>";
    echo "<span id='icon-member'></span>
    premium  membership </div></a>";
    }
 

?>
        
    </div>
</body>
</html>
