<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="./css/admin.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title>
</head>

<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="img/ass/alucard_logo.jpg" alt="">
            </div>

            <span class="logo_name">ScriptLegends</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="dashboard_home.php">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Dahsboard</span>
                    </a></li>
                <li><a href="skin_upload.php">
                        <i class="uil uil-cloud-upload"></i>
                        <span class="link-name">Add New Skins</span>
                    </a></li>
                <li><a href="add_hero.php">
                        <i class="uil uil-angle-right"></i>
                        <span class="link-name">Add New Heros</span>
                    </a></li>
                <li><a href="upload_colab_poster.php">
                        <i class="uil uil-bolt"></i>
                        <span class="link-name">Add Colab Skin</span>
                    </a></li>
                <li><a href="upload_skintype_icon.php">
                        <i class="uil uil-chart"></i>
                        <span class="link-name">Add Icon</span>
                    </a></li>
                <li><a href="message.php">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Message</span>
                    </a></li>

            </ul>

            <ul class="logout-mode">
                <li><a href="logout.php">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                        <span class="link-name">Dark Mode</span>
                    </a>

                    <div class="mode-toggle">
                        <span class="switch"></span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>

            <img src="img/ass/alucard_logo.jpg" alt="">
        </div>

        <div class="dash-content">