<?php
require 'config.php';
require 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/index.css">
  <title>Document</title>
</head>

<body>

  <div class="skin_container" style="margin-top: 80px;">

    <?php
    // Get the selected category from the query parameter
    if (isset($_GET['type'])) {
      $selectedCategory = $_GET['type'];
    } else {
      // Default category if no category is selected (you can change this to any category you want to show by default)
      $selectedCategory = "default";
    }

    // Fetch the category name from the "skin" table
    $categoryQuery = mysqli_query($conn, "SELECT s_type FROM skin WHERE s_type = '$selectedCategory'");
    $categoryRow = mysqli_fetch_assoc($categoryQuery);
    ?>
    <?php
    // <!-- Display the category title -->
    if ($categoryRow) {
      echo '<h2 class="category-title" style="color:white; margin-bottom:15px;">' . $categoryRow["s_type"] . '</h2>';
    } else {
      // Handle the case when the category data is not available
      echo '<h2 class="category-title" style="color:white;">Sorry, There is no skins </h2>'; // Show a default title or handle it as you wish
    }
    ?>

    <?php
    // Fetch heroes and their respective skins based on the selected category
    $aspirant = mysqli_query($conn, "SELECT * FROM skin INNER JOIN hero ON skin.h_id = hero.h_id WHERE skin.s_type = '$selectedCategory'");
    while ($row = mysqli_fetch_assoc($aspirant)) {
      ?>

      <div class="skin-card mt-2">

        <a href="download.php?s_id=<?php echo $row['s_id']; ?>">
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
                <img class="i_img" src="<?php echo $skinLogos[$row["s_type"]]; ?>" alt="<?php echo $row["s_type"]; ?> Logo">
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
            <p class="card-lowtitle">
              <?php echo $row["hero_name"]; ?>
            </p>
          </a>
        </div>
      </div>

      <?php
    }
    ?>

  </div>
</body>

<?php
include_once 'footer.php';
?>

</html>