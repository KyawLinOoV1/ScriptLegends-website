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

<div class="activity">
    <div class="title">
        <i class="uil uil-clock-three"></i>
        <span class="text">Recent Hero</span>
    </div>
    <div class="custom-table-container">
        <table class="table table-striped table-sm custom-table">
            <thead>
                <tr>
                    <th style="display: block;">Serial No</th>
                    <th>Hero Name</th>
                    <th>Hero Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Populate table rows with data from the skin table -->
                <?php

                $query = "SELECT * FROM hero";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    $serialNo = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td style='display: block;'>" . $serialNo . "</td>";
                        echo "<td>" . $row['hero_name'] . "</td>";
                        echo "<td>" . $row['h_type'] . "</td>";
                        echo "<td>";
                        echo "<a href='edit_hero_record.php?h_id=" . $row['h_id'] . "' class='btn btn-primary btn-sm'>Edit</a> ";
                        echo "<a href='delete_hero_record.php?h_id=" . $row['h_id'] . "' class='btn btn-danger btn-sm'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                        $serialNo++;
                    }
                } else {
                    echo "<tr><td colspan='5'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script src="./js/admin.js"></script>
</body>
</html>