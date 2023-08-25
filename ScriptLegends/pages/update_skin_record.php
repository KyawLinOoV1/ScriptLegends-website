<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $s_id = $_POST['s_id'];
  $skinName = $_POST['skinName'];
  $skinType = $_POST['skinType'];
  // Process other skin details as needed

  // Update the skin record in the database
  $updateQuery = "UPDATE skin SET s_name='$skinName', s_type='$skinType' WHERE s_id='$s_id'";
  mysqli_query($conn, $updateQuery);

  // Redirect back to the edit_skin.php page after successful update
  header("Location: sample.php");
  exit();
} else {
  echo "<div class='alert alert-danger'>Invalid request.</div>";
}
?>