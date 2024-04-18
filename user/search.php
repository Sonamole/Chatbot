<?php
 include("../includes/config.php");
 include("../includes/session.php");

if (isset($_POST['user_input'])) {
    $user_input = $_POST['user_input'];

    // Your code for searching the chat history based on user_input
    // Fetch the chat history and store it in an array

    $history = array();

    // Example: $history[] = "Message 1";
    // Example: $history[] = "Message 2";

    // Convert the array to JSON and echo it
    echo json_encode($history);
}
?>
