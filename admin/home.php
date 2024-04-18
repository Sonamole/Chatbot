<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('https://latamlist.com/wp-content/uploads/2019/11/Header_gif_assembly-1-1.gif') no-repeat center center fixed;
            /* background-image:url("interface.png")width:50px; */
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        #navbar {
            background-color: rgba(52, 152, 219, 0.7);
            color: #fff;
            padding: 20px;
            display: flex;
            justify-content: space-between;
        }

        #categories {
            display: flex;
            list-style: none;
            padding: 0;
        }

        #categories li {
            margin-right: 20px;
        }

        #add-question {
            background-color: #2ecc71;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        #admin-content {
            margin: 20px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.7);
        }
        .img {
            width: 600px; /* 10cm at 28.3 pixels/cm (common screen DPI) */
            height:400px; /* 10cm at 28.3 pixels/cm */
            margin-top:270px;
            /* margin-left:300px; */
            Padding-right:140px;
        }
    </style>
</head>
<body>
    <div id="navbar">
    <a href="profile.php"> <button id="add-question">Profile</button></a>
   <a href="data.php"><button id="add-question">Datas</button></a>
       <a href="add_chat.php"> <button id="add-question">Add Question</button></a>

       <a href=" ../user/logout.php"> <button id="add-question">LOG OUT</button></a>
       
       <!-- <h2 style="color: blue; font-family:  'Roboto', sans-serif;">Explore the world of chatbot</h2> -->
       <img src="interface.png" class="img">

   
     
    </div>
    <div id="admin-content">
        <!-- Your admin content, such as the question input form and question list, should go here -->
    </div>
</body>
</html>
