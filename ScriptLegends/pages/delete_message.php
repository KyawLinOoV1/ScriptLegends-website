<?php
session_start();
include 'config.php';

if (isset($_POST['delete'])) {
    $message_id = $_POST['message_id'];
    $query = "DELETE FROM message WHERE m_id = '$message_id'";

    if (mysqli_query($conn, $query)) {
        // Redirect back to the messages page after deleting
        header("Location: message.php");
        exit();
    } else {
        echo "Error deleting message: " . mysqli_error($conn);
    }
} else {
    // If the form was not submitted properly, redirect back to the messages page
    header("Location: message.php");
    exit();
}
?>