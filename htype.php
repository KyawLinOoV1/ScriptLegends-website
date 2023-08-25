<?php
require 'config.php';
require 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="./css/htype.css">
    <title>Heros Page | ScriptLegends</title>

</head>

<body>
    <?php
    // Assuming you have already connected to the database
    // Get the selected category from the query parameter
    if (isset($_GET['type'])) {
        $selectedCategory = $_GET['type'];
    } else {
        // Default category if no category is selected
        $selectedCategory = 'Fighter';
    }

    // Fetch heroes and their respective skins based on the selected category
    $query = "SELECT hero.hero_name, skin.s_id, skin.s_img, skin.s_name, skin.s_type
              FROM hero
              LEFT JOIN skin ON hero.h_id = skin.h_id
              WHERE hero.h_type = '$selectedCategory' OR skin.s_type = '$selectedCategory'
              ORDER BY hero.hero_name, skin.s_name";

    $result = mysqli_query($conn, $query);

    $previousHeroName = null;
    $heroContainerOpened = false; // To track if a hero's container is opened
    
    while ($row = mysqli_fetch_assoc($result)) {
        $currentHeroName = $row["hero_name"];

        // Check if the hero name changes
        if ($currentHeroName !== $previousHeroName) {
            // Close the previous hero's container if open
            if ($heroContainerOpened) {
                echo '</div></div>';
            }

            // Open a new hero's container
            echo '<div class="htitle">';
            echo '<h1 class="title">' . $currentHeroName . '</h1>';
            echo '</div>';

            echo '<div class="skins-list">';
            echo '<button class="pre-btn"><img src="img/ass/pre.png" alt=""></button>';
            echo '<button class="nxt-btn"><img src="img/ass/nxt.png" alt=""></button>';
            echo '<div class="card-container">';

            $heroContainerOpened = true; // Mark the hero's container as opened
            $previousHeroName = $currentHeroName;
        }
        ?>

        <div class="skin-card mt-2">
            <a
                href="download.php?s_id=<?php echo urlencode($row["s_id"]); ?>&hero_name=<?php echo urlencode($row["hero_name"]); ?>">
                <figure class="card-banner">
                    <img src="<?php echo $row["s_img"]; ?>" alt="<?php echo $row["s_name"]; ?>">
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
                            <img class="i_img" src="<?php echo $skinLogos[$row["s_type"]]; ?>"
                                alt="<?php echo $row["s_type"]; ?> Logo">
                        <?php } ?>
                    </div>
                </figure>
            </a>

            <div class="title-wrapper">
                <a
                    href="download.php?s_id=<?php echo urlencode($row["s_id"]); ?>&hero_name=<?php echo urlencode($row["hero_name"]); ?>">
                    <p class="card-title">
                        <?php echo $row["s_name"]; ?>
                    </p>
                </a>
            </div>
        </div>
        <?php
    }

    // Close the last hero's container if open
    if ($heroContainerOpened) {
        echo '</div></div>';
    }
    ?>




    <script>
        let cardContainers = [...document.querySelectorAll('.card-container')];
        let preBtns = [...document.querySelectorAll('.pre-btn')];
        let nxtBtns = [...document.querySelectorAll('.nxt-btn')];

        cardContainers.forEach((item, i) => {
            let containerDimensions = item.getBoundingClientRect();
            let containerWidth = containerDimensions.width;

            nxtBtns[i].addEventListener('click', () => {
                item.scrollLeft += containerWidth - 200;
            })

            preBtns[i].addEventListener('click', () => {
                item.scrollLeft -= containerWidth + 200;
            })
        })
    </script>
</body>

<?php
require 'footer.php';
?>

</html>
