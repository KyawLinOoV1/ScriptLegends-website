<?php
require 'config.php';

if (isset($_GET['s_id'])) {
    $s_id = $_GET['s_id'];

        // Delete the skin record from the skin table
        $deleteSkinQuery = "DELETE FROM skin WHERE s_id='$s_id'";
        mysqli_query($conn, $deleteSkinQuery);

    // Delete the corresponding row from the download_detail table
    $deleteDownloadDetailQuery = "DELETE FROM download_detail WHERE s_id='$s_id'";
    mysqli_query($conn, $deleteDownloadDetailQuery);

    // Redirect back to the dashboard_home.php page after successful deletion
    header("Location: dashboard_home.php");
    exit();
} else {
    echo "<div class='alert alert-danger'>Invalid request.</div>";
}
?>
