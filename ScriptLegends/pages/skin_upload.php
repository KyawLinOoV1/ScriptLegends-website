<?php
require 'sample_head.php';

// Check if the user is logged in
if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {
  // User is logged in, proceed with the content of the page
} else {
  // User is not logged in, redirect to the login page
  header("Location: admin_login_page.php");
  exit();
}


?>
<div class="container mt-4" style="color: var(--text-color);">
  <h2>Upload Your Skin</h2><br>
  <form action="skin_upload_process.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="skinName">Skin Name:</label>
      <input type="text" class="form-control" id="skinName" name="skinName" required>
    </div>
    <div class="form-group">
      <label for="heroID">Select Hero:</label>
      <select class="form-control" id="heroID" name="heroID" required>
        <option value="">Select Hero</option>
        <?php

        $query = "SELECT * FROM hero";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['h_id'] . "'>" . $row['hero_name'] . "</option>";
          }
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="skinName">Skin Type:</label>
      <input type="text" class="form-control" id="skinType" name="skinType" required>
    </div>

    <div class="form-group">
      <label for="skinImage">Skin Image:</label>
      <input type="file" class="form-control-file" id="skinImage" name="skinImage" required>
    </div>

    <button type="submit" class="btn btn-primary">Upload Skin</button>

  </form><br>
  <a href="add_hero.php" style="color:red;">Doesn't Have Hero?</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="./js/admin.js"></script>

</body>

</html>