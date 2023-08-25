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
    $cName = $_POST['c_name'];

    // Check if a file was uploaded successfully
    if (isset($_FILES['c_poster']) && $_FILES['c_poster']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['c_poster'];
        $uploadPath = 'img/colab/' . $file['name']; // Specify the upload directory

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
            // Insert data into the colab_skin table
            $insertQuery = "INSERT INTO colab_skin (c_name, c_poster) VALUES ('$cName', '$uploadPath')";
            if (mysqli_query($conn, $insertQuery)) {
                header("Location: upload_colab_poster.php");
                exit();
            } else {
                echo "Error inserting data: " . mysqli_error($conn);
            }
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "File upload error.";
    }
}
?>

<div class="container mt-5" style="color: var(--text-color);">
    <h2>Upload Colab Skin</h2><br>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="c_name">Colab Name:</label>
            <input type="text" class="form-control" name="c_name" required>
        </div>
        <div class="form-group">
            <label for="c_poster">Colab poster:</label>
            <input type="file" class="form-control-file" name="c_poster" accept=".jpg, .jpeg, .png" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
<script src="./js/admin.js"></script>
</body>

</html>