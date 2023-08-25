<?php
require 'config.php';
$res = mysqli_query($conn, "SELECT * FROM skin limit 6");
?>
<?php
include 'navbar.php';
?>
<!--  -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Swiper CSS -->
  <link rel="stylesheet" href="css/swiper-bundle.min.css" />
  <!-- CSS for card swiper -->
  <link rel="stylesheet" href="./css/style.css" />
  <!-- Index CSS -->
  <link rel="stylesheet" href="./css/index.css">

  <title>Home</title>
</head>

<body>
  <!-- for nav bar -->
  <div class="container swiper">
    <div class="slide-container">
      <div class="card-wrapper swiper-wrapper">
        <?php
        // Fetch icons from the icon table
        $query = "SELECT c_id, c_name, c_poster FROM colab_skin";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            $c_id = $row['c_id'];
            $c_name = $row['c_name'];
            $c_poster = $row['c_poster'];

            echo '<div class="card swiper-slide">';
            echo '<div class="image-box">';
            echo '<a href="colab.php?type=' . urlencode($c_name) . '">';
            echo '<img src="' . $c_poster . '" alt="' . $c_name . '" />';
            echo '</a>';
            echo '</div>';
            echo '</div>';
          }
        } else {
          echo '<p>No logo available.</p>';
        }
        ?>
      </div>

    </div>
    <div class="swiper-button-next swiper-navBtn"></div>
    <div class="swiper-button-prev swiper-navBtn"></div>
    <div class="swiper-pagination"></div>
  </div>

  <div class="skin_container">
    <div class="cap">
      <h2 style="margin-bottom: 10px; color: white;">
        Recent Skin
      </h2>
      <a href="see_all_recent.php" class="seeall">See All</a>
    </div>

    <?php

    $result = mysqli_query($conn, "SELECT * FROM skin INNER JOIN hero ON skin.h_id = hero.h_id ORDER BY s_id DESC LIMIT 6");
    $count = mysqli_num_rows($result);
    $n = 1;
    while ($row = mysqli_fetch_assoc($result)) {
      ?>

      <div class="skin-card mt-2">
        <a href="download.php?s_id=<?php echo $row['s_id']; ?>">
          <figure class="card-banner">
            <img class="banner_img" src="<?php echo $row["s_img"]; ?>" alt="<?php echo $row["s_name"]; ?>">
            <div class="res" style="position : absolute; top : 5px; left : 80px; right : 5px;">
              <?php
              $icons = mysqli_query($conn, "SELECT * FROM icon");
              $skinLogos = array();
              while ($icon = mysqli_fetch_assoc($icons)) {
                $skinLogos[$icon["i_name"]] = $icon["i_icon"];
              }
              $skinType = $row["s_type"];
              if (isset($skinLogos[$skinType])) { ?>
                <img class="i_img" src="<?php echo $skinLogos[$skinType]; ?>" alt="<?php echo $skinType; ?> Logo">
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
      $n++;
    }
    ?>
  </div>
  <hr>

  <?php
  function printSkinCategory($conn, $type)
  {
    $res = mysqli_query($conn, "SELECT * FROM skin INNER JOIN hero ON skin.h_id = hero.h_id WHERE s_type='$type' ORDER BY s_id DESC LIMIT 6");
    $count = mysqli_num_rows($res);

    if ($count > 0) {
      ?>
      <div class="skin_container">
        <div class="cap">
          <h2 style="margin-bottom: 10px; color: white;">
            <?php echo $type; ?>
          </h2>
          <a href="all_skins.php?type=<?php echo $type; ?>" class="seeall">See All</a>
        </div>

        <?php
        $n = 1;
        while ($row = mysqli_fetch_assoc($res)) {
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
                  $skinType = $row["s_type"];
                  if (isset($skinLogos[$skinType])) { ?>
                    <img class="i_img" src="<?php echo $skinLogos[$skinType]; ?>" alt="<?php echo $skinType; ?> Logo">
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
          $n++;
        }
        ?>
      </div>
      <hr>
      <?php
    }
  }

  // Fetch distinct skin types from the database
  $typesQuery = "SELECT DISTINCT s_type FROM skin ORDER BY s_type ASC";
  $typesResult = mysqli_query($conn, $typesQuery);

  if ($typesResult && mysqli_num_rows($typesResult) > 0) {
    while ($typeRow = mysqli_fetch_assoc($typesResult)) {
      $type = $typeRow["s_type"];
      printSkinCategory($conn, $type);
    }
  } else {
    echo "No skin categories found.";
  }
  ?>


  <script src="js/swiper-bundle.min.js"></script>
  <script src="js/script.js"></script>

  <?php
  require_once 'footer.php';
  ?>