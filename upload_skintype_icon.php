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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $iName = $_POST['i_name'];

    // Check if a file was uploaded successfully
    if (isset($_FILES['i_icon']) && $_FILES['i_icon']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['i_icon'];
        $uploadPath = 'img/icon/' . $file['name']; // Specify the upload directory

        // Check if an icon with the same name already exists
        $existingQuery = "SELECT i_id FROM icon WHERE i_name = '$iName'";
        $existingResult = mysqli_query($conn, $existingQuery);

        if (mysqli_num_rows($existingResult) === 0) {
            // Move the uploaded file to the specified directory
            if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                // Insert data into the icon table
                $insertQuery = "INSERT INTO icon (i_name, i_icon) VALUES ('$iName', '$uploadPath')";
                if (mysqli_query($conn, $insertQuery)) {
                    header("Location: skin_upload.php");
                    exit();
                } else {
                    echo "Error inserting icon: " . mysqli_error($conn);
                }
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "An icon with the same name already exists.";
        }
    } else {
        echo "File upload error.";
    }
}
?>

<div class="container mt-5" style="color: var(--text-color);">
    <h2>Upload Icon</h2><br>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="i_name">Icon Name:</label>
            <input type="text" class="form-control" name="i_name" required>
        </div>
        <div class="form-group">
            <label for="i_icon">Icon Image:</label>
            <input type="file" class="form-control-file" name="i_icon" accept=".jpg, .jpeg, .png" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
<script src="./js/admin.js"></script>

</body>

</html>