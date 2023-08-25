<?php
require_once 'config.php';

if (isset($_POST['submit'])) {
    // Retrieve user inputs from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Format the date in 12-hour format
    $formatted_date = date("F j, Y g:i A");

    // Prepare and execute the query to insert the message into the database
    $query = "INSERT INTO message (user_name, email, msg, date) VALUES ('$name', '$email', '$message', '$formatted_date')";

    if (mysqli_query($conn, $query)) {
        // Redirect back to the contact form after sending
        header("Location: contact_us.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // If the form was not submitted properly, redirect back to the contact form
    header("Location: contact_us.php");
    exit();
}
?>