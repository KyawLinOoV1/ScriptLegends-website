<?php
require 'config.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $skinName = $_POST['skinName'];
  $heroID = $_POST['heroID'];
  $skinType = $_POST['skinType'];

  // Process the uploaded skin image and save it to a directory
  $targetDir = "img/"; // Replace with the path to your skin images directory
  $skinImage = $_FILES['skinImage']['name'];
  $targetFilePath = $targetDir . date("Y.m.d") . "-" . date("h.i.sa") . "-" . $skinImage;
  move_uploaded_file($_FILES['skinImage']['tmp_name'], $targetFilePath);

  // Process the skin upload and insert it into the "skin" table
  $insertSkinQuery = "INSERT INTO skin (h_id, s_name, s_type, s_img) 
                      VALUES ('$heroID', '$skinName', '$skinType', '$targetFilePath')";
  mysqli_query($conn, $insertSkinQuery);

  // After successful upload, get the inserted skin ID
  $skinID = mysqli_insert_id($conn);

  // Redirect to the upload_download_detail.php page with the skin ID and hero ID as URL parameters
  header("Location: upload_download_detail.php?skinID=" . $skinID . "&heroID=" . $heroID);
  exit();
}
?>