<!DOCTYPE html>
<html>
<head>
    <style>
          body {
    font-family: Arial, sans-serif;
    background-color:   #30374d;
    margin: 0;
    padding: 0;
    display: flex;
}

#sidebar {
    width: 200px;
    background-color:#393c4a;
    color: #fff;
    padding: 20px;
    display: flex;
    flex-direction: column;
    height: 100vh;  
    position: fixed; 
    top: 0; 
    left: 0;  
    overflow-y: scroll; 
    overflow-y: auto;  
}

#chat-container {
    flex: 1;
    
    background-color:  #30374d;
    display: flex;
    flex-direction: column;   
}


       
    .message { 
    background-color: #27608a;
    color: #fff;
    border-radius: 10px;
    padding: 20px;
     
    padding-top:"30%";
    margin-left: 40%; 
    flex-direction: column;
    }

        .user-message {
            background-color: #2ecc71;
            color: #fff;           
            padding: 10px;
            
        }

        #input-container {
            
            background-color: #fff4;
            padding: 10px;            
            position: fixed;
            bottom: 0;
            width: 100%;
            margin-left:240px;
       
        }


        #send-button {
            background-color: #fff4;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            margin-left: 850px;
        }
        .logout-button {
            display: inline-block;
            padding: 10px ;
            background-color:#fff4;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            
            width:70px;
        }
        .Goback-button {
            display: inline-block;
            padding: 10px ;
            background-color: #fff4;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;           
            width:70px;
        }
        .message-container {
    margin-bottom: 30px;  
}

        #user_input {
            border: none;
            outline: none; 
            background-color: transparent !important;  
            
        }

        #user_input::placeholder {
            color:grey; /* Set placeholder text color to white */
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <div id="sidebar">
        <a href="home.php" class="Goback-button">Go back</a>

        <?php
include('../includes/config.php');
include('../includes/session.php');

$place = "SELECT * FROM `tbl_user` WHERE `id`='$Uid'";
$place_run = mysqli_query($conn, $place);
$row = mysqli_fetch_assoc($place_run);

echo '<h1 style="color: #266143; font-family:sans-serif;">' . $row['user_type'] . '</h1>';

if ($row['user_type'] == 'Premium') {
    echo "<h4> Hii  ".$Uname."</h4>";
    echo "<h2><u>Chat History</u></h2>";
    echo "<ul id='chat-history'>";

     
    $sql = "SELECT * FROM `tbl_history` WHERE `user_id` = '$Uid' ORDER BY id DESC  LIMIT 10";
    $res = mysqli_query($conn, $sql);

    while ($historyRow = mysqli_fetch_assoc($res)) {
        echo '<li><p style="color: white;">' . $historyRow['user_message'] . '</p></li>';
    }
    echo "</ul>";
}

if ($row['user_type'] == 'Normal') {
    echo "<h1> Hii".$Uname."</h1>";
    echo "<h4><u>Chat History</u></h4>";
    echo "<ul id='chat-history'>";

    $sql = "SELECT * FROM `tbl_history` WHERE `user_id`='$Uid'  ORDER BY id DESC LIMIT 5";  
    $res = mysqli_query($conn, $sql);
   
    while ($historyRow = mysqli_fetch_assoc($res)) {
        echo '<li><p style="color: white;">' . $historyRow['user_message'] . '</p></li>';
    }
    echo "</ul>";
}

?>
    </div>

    <div id="chat-container"></div>

    <div id="input-container">
        <form method="post" id="search-form">
            <input type="text" id="user_input" placeholder="Type your message" required>
            <input type="button" id="send-button" onclick="myFunction()" value="submit">
        </form>
    </div>

    <script>
        function myFunction() {
            const user_input = document.getElementById("user_input");
            const message = user_input.value.trim();
            const chatContainer = document.getElementById("chat-container");
            const messageContainer = document.createElement("div");
            messageContainer.classList.add("message-container");

            const sidebar = document.getElementById("sidebar");
            const sideMessage = document.createElement("li");
            sideMessage.classList.add("messages");
            sideMessage.textContent = message;
            sidebar.appendChild(sideMessage);

            if (message !== "") {
                $.ajax({
                    type: "POST",
                    url: "chatAjax.php",
                    data: { user_input: message },
                    success: function (data) {
                        const response = JSON.parse(data);

                        if (response.type === 'alert') {
                            alert(response.message);
                        } else if (response.type === 'description') {
                            const userMessage = document.createElement("div");
                            userMessage.classList.add("message");
                            userMessage.textContent = response.message.join(', '); // Join array elements
                            messageContainer.appendChild(userMessage);
                            chatContainer.appendChild(messageContainer);
                        } else {
                            console.error('Unexpected response type');
                        }
                    }
                });
            }
        }
    </script>
</body>
</html>
