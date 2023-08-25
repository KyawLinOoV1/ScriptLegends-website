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
<?php
// Fetch messages from the database
$query = "SELECT * FROM message ORDER BY m_id DESC";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <link rel="stylesheet" href="./css/message.css">
</head>

<body>
    <div class="container mt-4" style="color: var(--text-color);">
        <h2>All Messages</h2><br>

        <div class="msg-div">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="message">
                    <div class="img"><img src="./img/alucard_chat.jpg" alt=""></div>
                    <div class="sender">
                        <div class="sender-name">
                            <?php echo $row['user_name']; ?>
                        </div>
                        <div class="date-mail"> <span style="color: yellow; font-weight: bold;">
                                <?php echo $row['email']; ?>
                            </span> at <span style="font-weight: bold;">
                                <?php echo $row['date']; ?>
                            </span></div>
                        <div class="sender-message">
                            <?php echo $row['msg']; ?>
                        </div>
                        <form action="delete_message.php" method="post">
                            <input type="hidden" name="message_id" value="<?php echo $row['m_id']; ?>">
                            <button type="submit" class="delete-button" name="delete"
                                onclick="return confirmDelete();">Delete</button>
                        </form>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this item?");
            }
        </script>


    </div>
    <script src="./js/admin.js"></script>

</body>

</html>