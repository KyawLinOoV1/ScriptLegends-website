<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $heroName = $_POST['heroName'];
  $heroType = $_POST['heroType'];
  // Check if the hero name already exists in the database
  $checkQuery = "SELECT * FROM hero WHERE hero_name='$heroName'";
  $result = mysqli_query($conn, $checkQuery);

  if (mysqli_num_rows($result) > 0) {
    // The hero name already exists, display an error message
    echo "<script>alert('Hero with the same name already exists.'); window.location.href = 'add_hero.php';</script>";
  } else {
    // The hero name is unique, proceed with the insertion
    // Insert new hero into the "hero" table
    $insertQuery = "INSERT INTO hero (hero_name, h_type) VALUES ('$heroName', '$heroType')";
    mysqli_query($conn, $insertQuery);

    // Redirect back to the admin_upload.php after successful insertion
    header("Location: skin_upload.php");
    exit();
  }
} else {
  echo "<div class='alert alert-danger'>Invalid request.</div>";
}
?>