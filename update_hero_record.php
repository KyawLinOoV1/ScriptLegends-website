<?php
require 'sample_head.php';

// Check if the user is logged in
if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {
    // User is logged in, proceed with the content
} else {
    // User is not logged in, redirect to the login page
    header("Location: admin_login_page.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input data
    $heroId = $_POST['h_id'];
    $heroName = $_POST['hero_name'];
    $heroType = $_POST['h_type'];

    // Update hero details in the database
    $query = "UPDATE hero SET hero_name = '$heroName', h_type = '$heroType' WHERE h_id = '$heroId'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Update successful, redirect to a success page or appropriate location
        header("Location: admin_dashboard.php"); // Redirect to dashboard or appropriate page
        exit();
    } else {
        // Update failed, handle the error (e.g., display an error message)
        echo "Error updating hero: " . mysqli_error($conn);
    }
} else {
    // Invalid request method, redirect or show an error message
    header("Location: admin_dashboard.php"); // Redirect to dashboard or appropriate page
    exit();
}
?>
