<?php
require 'config.php';

if (isset($_GET['h_id'])) {
  $h_id = $_GET['h_id'];

  // Delete the hero record from the database
  $deleteQuery = "DELETE FROM hero WHERE h_id='$h_id'";
  mysqli_query($conn, $deleteQuery);

  // Redirect back to the edit_hero.php page after successful deletion
  header("Location: edit_hero.php");
  exit();
} else {
  echo "<div class='alert alert-danger'>Invalid request.</div>";
}
?>