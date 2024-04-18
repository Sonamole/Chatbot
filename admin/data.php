<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data</title>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            border: 2px solid #3498db;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #3498db;
        }
        th {
            background-color: #3498db;
            color: #fff;
        }
        td {
            position: relative;
        }
        .actions {
            position: absolute;
            right: 0;
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
<!-- <i class="fa-solid fa-arrow-left"><a href="home.php"></a></i> -->
<a href="home.php" class="Goback-button">Go back</a>
<a href="../user/logout.php" class="logout-button">Log Out</a>

    <h2>Data Table</h2>
    <table>
        <tr>
            <th>Keyword</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php
        include("../includes/config.php");

        if(isset($_POST['delete']) && isset($_POST['id'])){
            $id_to_delete = $_POST['id'];
            $sql = "DELETE FROM tbl_add WHERE id = $id_to_delete";
            mysqli_query($conn, $sql);
        }

        // Retrieve data from the database
        $sql = "SELECT * FROM tbl_add";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['keyword'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td class='actions'>
                    <form method='post'>
                        <input type='hidden' name='id' value='".$row['id']."' />
                        <button type='submit' name='delete'>Delete</button>
                    </form>
                </td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>
