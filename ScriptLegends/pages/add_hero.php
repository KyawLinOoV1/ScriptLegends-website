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
  <h2>Upload New Heros</h2><br>

  <!-- Form to add a new hero to the hero table -->
  <form action="add_hero_process.php" method="post">
    <div class="form-group">
      <label for="heroName">Hero Name:</label>
      <input type="text" class="form-control" id="heroName" name="heroName" required>
    </div>
    <div class="form-group">
      <label for="heroType">Hero Type:</label>
      <input type="text" class="form-control" id="heroType" name="heroType" required>
    </div>
    <!-- Add more input fields as needed for other hero details -->

    <button type="submit" class="btn btn-primary">Add Hero</button>
  </form>

  <!-- Existing code for skin upload form -->
  <!-- ... -->

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="./js/admin.js"></script>

</body>

</html>