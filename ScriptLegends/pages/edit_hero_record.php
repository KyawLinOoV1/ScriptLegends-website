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

// Get the hero ID from the query parameter
if (isset($_GET['h_id'])) {
    $heroId = $_GET['h_id'];

    // Fetch hero details based on the hero ID
    $query = "SELECT * FROM hero WHERE h_id = '$heroId'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $hero = mysqli_fetch_assoc($result);
    } else {
        // Hero not found, redirect or show an error message
        header("Location: admin_dashboard.php"); // Redirect to dashboard or appropriate page
        exit();
    }
} else {
    // Hero ID not provided, redirect or show an error message
    header("Location: admin_dashboard.php"); // Redirect to dashboard or appropriate page
    exit();
}
?>

<div class="activity">
    <div class="title">
        <i class="uil uil-edit"></i>
        <span class="text">Update Hero</span>
    </div>
    <div class="custom-form-container">
    <form action="update_hero.php" method="post">
            <input type="hidden" name="h_id" value="<?php echo $hero['h_id']; ?>">
            <div class="form-group">
                <label for="hero_name">Hero Name:</label>
                <input type="text" class="form-control" name="hero_name" id="hero_name" value="<?php echo $hero['hero_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="h_type">Hero Type:</label>
                <select class="form-control" id="heroType" name="heroType" required>
            <?php
            // Fetch the available hero types from the database
            $query = "SELECT DISTINCT h_type FROM hero"; // Assuming 'hero' is the table name
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                $heroType = $row['h_type'];
                $selected = ($heroType === $row['h_type']) ? 'selected' : ''; // Check if this option is selected
        
                echo "<option value='$heroType' $selected>$heroType</option>";
              }
            } else {
              echo "<option value='' disabled>No hero types available</option>";
            }
            ?>
          </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Hero</button>
        </form>
    </div>
</div>
<script src="./js/admin.js"></script>
</body>
</html>
