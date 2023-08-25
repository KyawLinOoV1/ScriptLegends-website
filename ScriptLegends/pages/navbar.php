<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">


  <!-- Css for navbar -->
  <link rel="stylesheet" href="./css/nav.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <nav>
    <div class="navbar">
      <i class='bx bx-menu'></i>
      <div class="logo"><a href="index.php">ScriptLegends</a></div>
      <div class="nav-links">
        <div class="sidebar-logo">
          <span class="logo-name">ScriptLegends</span>
          <i class='bx bx-x'></i>
        </div>
        <ul class="links">
          <li><a href="index.php">HOME</a></li>
          <li>
            <a href="#">HEROS</a>
            <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
            <ul class="htmlCss-sub-menu sub-menu">
              <li><a href="htype.php?type=Fighter">FIGHTER</a></li>
              <li><a href="htype.php?type=Marksman">MARKSMAN</a></li>
              <li><a href="htype.php?type=Assassin">ASSASSIN</a></li>
              <li><a href="htype.php?type=Mage">MAGE</a></li>
              <li><a href="htype.php?type=Tank">TANK</a></li>
              <li><a href="htype.php?type=Support">SUPPORT</a></li>
            </ul>
          </li>
          <li>
            <a href="#">OTHERS</a>
            <i class='bx bxs-chevron-down js-arrow arrow '></i>
            <ul class="js-sub-menu sub-menu">
              <li><a href="htype.php?type=Map">MAP</a></li>
              <li><a href="htype.php?type=Anime">ANIME SKINS</a></li>
              <li><a href="htype.php?type=Intro">INTRO</a></li>
              <li><a href="htype.php?type=Recall">RECALL</a></li>
            </ul>
          </li>
          <li><a href="about_us.php">ABOUT US</a></li>
          <li><a href="contact_us.php">CONTACT US</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <script src="./js/nav.js"></script>
</body>

</html>