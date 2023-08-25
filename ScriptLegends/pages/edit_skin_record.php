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

<div class="title">
        <i class="uil uil-edit"></i>
        <span class="text">Update Skin</span>
    </div>
  <?php


  if (isset($_GET['s_id'])) {
    $s_id = $_GET['s_id'];

    // Fetch the specific skin record from the database
    $query = "SELECT * FROM skin WHERE s_id='$s_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      ?>
      <form action="update_skin_record.php" method="post">
        <input type="hidden" name="s_id" value="<?php echo $row['s_id']; ?>">
        <div class="form-group">
          <label for="heroID">Hero ID:</label>
          <input type="text" class="form-control" id="heroID" name="heroID" value="<?php echo $row['h_id']; ?>" readonly>
        </div>
        <div class="form-group">
          <label for="skinName">Skin Name:</label>
          <input type="text" class="form-control" id="skinName" name="skinName" value="<?php echo $row['s_name']; ?>"
            required>
        </div>
        <div class="form-group">
          <label for="skinType">Skin Type:</label>
          <select class="form-control" id="skinType" name="skinType" required>
            <?php
            // Fetch the available skin types from the database
            $query = "SELECT DISTINCT s_type FROM skin"; // Assuming 'skin' is the table name
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                $skinType = $row['s_type'];
                $selected = ($skinType === $row['s_type']) ? 'selected' : ''; // Check if this option is selected
        
                echo "<option value='$skinType' $selected>$skinType</option>";
              }
            } else {
              echo "<option value='' disabled>No skin types available</option>";
            }
            ?>
          </select>
        </div>

        <!-- Add more input fields for other skin details as needed -->

        <button type="submit" class="btn btn-primary">Update Skin</button>
      </form>
      <?php
    } else {
      echo "<div class='alert alert-danger'>Skin record not found.</div>";
    }
  } else {
    echo "<div class='alert alert-danger'>Invalid request.</div>";
  }
  ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="./js/admin.js"></script>

</body>

</html>