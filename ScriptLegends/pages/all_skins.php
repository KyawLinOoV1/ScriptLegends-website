<?php
require 'config.php';
require 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/all_skins.css">
    <title>All Skins | ScriptLegends</title>
</head>

<body>

    <?php
    function printAllSkins($conn, $type)
    {
        $query = "SELECT * FROM skin INNER JOIN hero ON skin.h_id = hero.h_id WHERE s_type='$type' ORDER BY s_id DESC";
        $res = mysqli_query($conn, $query);
        $count = mysqli_num_rows($res);

        if ($count > 0) {
            ?>
            <div class="skin_container">
                <div class="cap">
                    <h2 style="margin-bottom: 10px; color: white;">All
                        <?php echo $type; ?> Skins
                    </h2>
                </div>

                <?php
                $n = 1;
                while ($row = mysqli_fetch_assoc($res)) {
                    ?>

                    <div class="skin-card mt-2">
                        <a href="download.php">
                            <figure class="card-banner">
                                <img class="banner_img" src="<?php echo $row["s_img"]; ?>" alt="<?php echo $row["s_name"]; ?>">
                                <div class="res">
                                    <?php

                                    // Fetch icons from the "icon" table
                                    $icons = mysqli_query($conn, "SELECT * FROM icon");

                                    // Initialize an empty array to store the skin logos
                                    $skinLogos = array();

                                    // Loop through the icons and populate the $skinLogos array
                                    while ($icon = mysqli_fetch_assoc($icons)) {
                                        // Use the "i_name" as the key and "i_icon" as the value in the $skinLogos array
                                        $skinLogos[$icon["i_name"]] = $icon["i_icon"];
                                    }
                                    ?>
                                    <?php
                                    if (isset($skinLogos[$row["s_type"]])) { ?>
                                        <img class="i_img" style="width:80px; height:40px;" s
                                            src="<?php echo $skinLogos[$row["s_type"]]; ?>" alt="<?php echo $row["s_type"]; ?> Logo">
                                    <?php } ?>
                                </div>
                            </figure>
                        </a>

                        <div class="title-wrapper">
                            <a href="download.php">
                                <p class="card-title">
                                    <?php echo $row["s_name"]; ?>
                                </p>
                                <p class="card-lowtitle">
                                    <?php echo $row["hero_name"]; ?>
                                </p>
                            </a>
                        </div>
                    </div>

                    <?php
                    $n++;
                }
                ?>
            </div>
            <hr>
            <?php
        }
    }

    if (isset($_GET['type'])) {
        $selectedCategory = $_GET['type'];
        printAllSkins($conn, $selectedCategory);
    }
    ?>

</body>

</html>