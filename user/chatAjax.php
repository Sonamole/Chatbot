<?php
include('../includes/session.php');
include('../includes/config.php');
$stopwords = array("what", "is", "when", "how", "the", "and", "for", "in", "to");

$user_input = $_POST['user_input'];
$words = explode(" ", $user_input);
$keywords = array_filter($words, function ($word) use ($stopwords) {
    return !in_array(strtolower($word), $stopwords);
});
$query = "SELECT `description` FROM tbl_add WHERE";
foreach ($keywords as $keyword) {
    $query .= " keyword LIKE '%$keyword%' OR";
}
$query = rtrim($query, "OR");

$result = mysqli_query($conn, $query);
$num = mysqli_num_rows($result);

if ($num > 0) {
    $userTypeQuery = "SELECT `user_type` FROM `tbl_user` WHERE `id` = $Uid";
    $userTypeResult = mysqli_query($conn, $userTypeQuery);
    $userTypeRow = mysqli_fetch_assoc($userTypeResult);

    if ($userTypeRow['user_type'] == 'Normal') {
        $messageCountQuery = "SELECT COUNT(*) AS message_count FROM `tbl_history` WHERE `user_id` = $Uid";
        $messageCountResult = mysqli_query($conn, $messageCountQuery);
        $messageCountRow = mysqli_fetch_assoc($messageCountResult);

        if ($messageCountRow['message_count'] >= 5) {
            $response = array(
                'type' => 'alert',
                'message' => 'You have reached the maximum message limit. Please upgrade to Premium to continue services.'
            );
            echo json_encode($response);
        } else {
            $description = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $description[] = $row['description'];
            }

            $typedKeywords = implode(", ", $keywords);
            $typedKeywords = mysqli_real_escape_string($conn, $typedKeywords);

            $insertQuery = "INSERT INTO `tbl_history` (`user_message`, `user_id`) VALUES ('$user_input', '$Uid')";
            mysqli_query($conn, $insertQuery);

            $response = array(
                'type' => 'description',
                'message' => $description
            );
            echo json_encode($response);
        }
    } elseif ($userTypeRow['user_type'] == 'Premium') {
        $description = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $description[] = $row['description'];
        }

        $typedKeywords = implode(", ", $keywords);
        $typedKeywords = mysqli_real_escape_string($conn, $typedKeywords);

        $insertQuery = "INSERT INTO `tbl_history` (`user_message`, `user_id`) VALUES ('$user_input', '$Uid')";
        mysqli_query($conn, $insertQuery);

        $response = array(
            'type' => 'description',
            'message' => $description
        );
        echo json_encode($response);
    } else {
        echo json_encode(array('type' => 'debug', 'message' => 'No results found'));
        echo json_encode(array('type' => 'default', 'message' => 'I am sorry'));
    }
}
 else {
    echo json_encode(array('type' => 'default', 'message' => 'No results found'));
}
?>
