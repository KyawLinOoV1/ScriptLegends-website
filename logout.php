<?php
require 'config.php';
session_start(); // Start the session if not started already

// Check if the user is logged in
if (isset($_SESSION["uid"])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to the login page after logout
    header("Location: admin_login_page.php");
    exit();
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: admin_login_page.php");
    exit();
}
?>
