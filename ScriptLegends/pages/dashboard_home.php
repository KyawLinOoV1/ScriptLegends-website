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
// Query to count total skins
$countQuery = "SELECT COUNT(*) AS totalSkins FROM skin";
$countResult = mysqli_query($conn, $countQuery);

// Fetch the count result
if ($countResult) {
    $totalCountRow = mysqli_fetch_assoc($countResult);
    $totalSkins = $totalCountRow['totalSkins'];
} else {
    $totalSkins = 0;
}


// Query to count total comments
$countQuery = "SELECT COUNT(*) AS totalComments FROM message";
$countResult = mysqli_query($conn, $countQuery);

// Fetch the count result
if ($countResult) {
    $totalCountRow = mysqli_fetch_assoc($countResult);
    $totalComments = $totalCountRow['totalComments'];
} else {
    $totalComments = 0;
}

// Query to count total unique hero names
$countQuery = "SELECT COUNT(DISTINCT hero_name) AS totalUniqueHeros FROM hero";
$countResult = mysqli_query($conn, $countQuery);

// Fetch the count result
if ($countResult) {
    $totalCountRow = mysqli_fetch_assoc($countResult);
    $totalUniqueHeros = $totalCountRow['totalUniqueHeros'];
} else {
    $totalUniqueHeros = 0;
}

?>

<div class="overview">
    <div class="title">
        <i class="uil uil-tachometer-fast-alt"></i>
        <span class="text">Dashboard</span>
    </div>

    <div class="boxes">
        <div class="box box1">
            <i class="uil uil-thumbs-up"></i>
            <span class="text">Total Skins</span>
            <span class="number">
                <?php echo $totalSkins; ?>
            </span>
        </div>
        <div class="box box2">
            <i class="uil uil-comments"></i>
            <span class="text">Comments</span>
            <span class="number">
                <?php echo $totalComments; ?>
            </span>
        </div>
        <div class="box box3">
            <i class="uil uil-share"></i>
            <span class="text"><a href="edit_hero.php" style="text-decoration: none;">Total Hero</a></span>
            <span class="number">
                <?php echo $totalUniqueHeros; ?>
            </span>
        </div>
    </div>
</div>

<div class="activity">
    <div class="title">
        <i class="uil uil-clock-three"></i>
        <span class="text">Recent Activity</span>
    </div>
    <div class="custom-table-container">
        <table class="table table-striped table-sm custom-table">
            <thead>
                <tr>
                    <th>Serial No</th>
                    <th>Hero Name</th>
                    <th>Skin Name</th>
                    <th>Skin Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Populate table rows with data from the skin table -->
                <?php

                $query = "SELECT skin.s_id, hero.hero_name, skin.s_name, skin.s_type FROM skin INNER JOIN hero ON skin.h_id = hero.h_id";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    $serialNo = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $serialNo . "</td>";
                        echo "<td>" . $row['hero_name'] . "</td>";
                        echo "<td>" . $row['s_name'] . "</td>";
                        echo "<td>" . $row['s_type'] . "</td>";
                        echo "<td>";
                        echo "<a href='edit_skin_record.php?s_id=" . $row['s_id'] . "' class='btn btn-primary btn-sm'>Edit</a> ";
                        echo "<a href='delete_skin_record.php?s_id=" . $row['s_id'] . "' class='btn btn-danger btn-sm'>Delete</a>";
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
</div>
</section>

<script src="./js/admin.js"></script>
</body>

</html>