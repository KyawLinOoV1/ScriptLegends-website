<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $skinID = $_POST['skinID'];
  $heroID = $_POST['heroID'];
  $patch = $_POST['patch'];
  $sound = $_POST['sound'];
  $animation = $_POST['animation'];
  $recall = $_POST['recall'];
  $skinLogo = $_POST['skinLogo'];
  $backupFile = $_POST['backupFile'];
  $dlink = $_POST['dlink'];
  $ylink = $_POST['ylink'];

  // Process the upload and insert it into the "download_detail" table
  $insertDownloadDetailQuery = "INSERT INTO download_detail (h_id, s_id, d_patch, sound, intro_animation, recall, skin_logo, backup_file, download_link, youtube_link) 
                               VALUES ( '$heroID', '$skinID', '$patch', '$sound', '$animation', '$recall', '$skinLogo', '$backupFile', '$dlink', '$ylink')";
  mysqli_query($conn, $insertDownloadDetailQuery);

  // Redirect to a success page or back to the previous page
  header("Location: skin_upload.php");
  exit();
}
?>