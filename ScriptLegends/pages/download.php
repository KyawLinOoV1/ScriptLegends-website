<?php
require 'config.php';
require 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Download Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/download.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="../js/bootstrap.min.js">
</head>

<body>

    <?php
    // Make sure the 's_id' parameter is present in the URL
    if (isset($_GET['s_id']) && !empty($_GET['s_id'])) {
        // Get the skin ID from the URL parameter and ensure it's an integer
        $s_id = (int) $_GET['s_id'];

        // Use prepared statements to prevent SQL injection
        $query = "SELECT skin.s_id, skin.s_name, skin.s_type, skin.s_img, hero.hero_name, download_detail.sound, download_detail.intro_animation,download_detail.d_patch, download_detail.recall, download_detail.skin_logo, download_detail.backup_file, download_detail.download_link, download_detail.youtube_link 
            FROM skin
            INNER JOIN hero ON skin.h_id = hero.h_id
            LEFT JOIN download_detail ON skin.s_id = download_detail.s_id
            WHERE skin.s_id = ?";

        // Prepare the statement
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt === false) {
            // Display an error message if there's an issue with the prepared statement
            echo "Error: Unable to prepare the SQL statement. " . mysqli_error($conn);
            exit;
        }

        // Bind the parameter
        mysqli_stmt_bind_param($stmt, "i", $s_id);

        // Execute the query
        $result = mysqli_stmt_execute($stmt);

        if ($result === false) {
            // Display an error message if there's an issue with executing the prepared statement
            echo "Error: Unable to execute the SQL statement. " . mysqli_error($conn);
            exit;
        }

        // Get the result
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            // Fetch the required skin details from the database
            $row = mysqli_fetch_assoc($result);
            $s_name = $row['s_name'];
            $s_type = $row['s_type'];
            $s_img = $row['s_img'];
            $hero_name = $row['hero_name'];
            $sound = $row['sound'];
            $intro_animation = $row['intro_animation'];
            $patch = $row['d_patch'];
            $recall = $row['recall'];
            $skin_logo = $row['skin_logo'];
            $backup_file = $row['backup_file'];
            $download_link = $row['download_link'];
            $youtube_link = $row['youtube_link'];
        } else {
            // Display an error message to the user
            echo "Skin not found.";
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } else {
        // Display an error message to the user
        echo "Invalid URL.";
    }
    ?>



    <div class="container-fluid">
        <!-- Display the skin details using the PHP variables -->
        <div class="profile">
            <img class="large-img" src="img/ass/Black Technology LinkedIn Banner.png" alt="">
            <img class="samll-img" src="<?php echo $s_img; ?>" alt="<?php echo $s_name; ?>">
        </div>


        <div class="title pt-4">
            <h3>
                <?php echo $s_name; ?>
            </h3>
            <p style="font-size: 10pt;"> <span style="color: rgba(201, 235, 49, 0.692);">
                    <?php echo $hero_name ?> &nbsp; | &nbsp;
                    <?php echo $patch . "&nbsp; Patch" ?> &nbsp; |
                </span> &nbsp; <span style="color: rgb(11, 195, 11)">
                    <?php echo $s_type ?>
                </span> </p>
            <!-- Display the skin images using the PHP variables -->

            <a href="<?php echo $download_link; ?>">
                <div class="btn">Download</div>
            </a>

            <!-- Display the skin information using the PHP variables -->
            <div class="info">
                <div class="ques">
                    <ul>
                        <li>Sound</li>
                        <li>Animation</li>
                        <li>Recall</li>
                        <li>Skin Logo</li>
                        <li>Backup file</li>
                    </ul>
                </div>
                <div class="dash">
                    <ul>
                        <li>:</li>
                        <li>:</li>
                        <li>:</li>
                        <li>:</li>
                        <li>:</li>
                    </ul>
                </div>
                <div class="ans">
                    <ul>
                        <li>
                            <?php echo $sound; ?>
                        </li>
                        <li>
                            <?php echo $intro_animation; ?>
                        </li>
                        <li>
                            <?php echo $recall; ?>
                        </li>
                        <li>
                            <?php echo $skin_logo; ?>
                        </li>
                        <li>
                            <?php echo $backup_file; ?>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="instruction" style="margin-bottom: 30px;">
                <H2 class="mb-4" style="color: #6c7e15;">How To Download.</H2>

                <p class="pl-4 mb-4" style="text-align: justify;">Step-1 : You can download easily by clicking one of the two red download buttons you like.</p>
                <p class="pl-4 mb-4" style="text-align: justify;">Step-2 : Once you get to the link, you can choose which skin you want to download (Eg.If you want to add in your owned normal skin to this skin then choose Normal to Epic.)</p>

            </div><hr style="background-color; red;">

            <div class="instruction" style="margin-bottom: 30px;">
                <H2 class="mb-4" style="color: #6c7e15;">How To Inject Skins</H2>

                <p class="pl-4 mb-4"><span>Step-1 : &nbsp;</span>Go to your download location.</p>
                <p class="pl-4 mb-4"><span>Step-2 : &nbsp;</span>Copy/Move Download file.</p>
                <p class="pl-4 mb-4"><span>Step-3 : &nbsp;</span>Then go to <span
                        style="color: green;">Android</span>&nbsp;>&nbsp;<span style="color: green;">data.</span></p>
                <p class="pl-4 mb-4"><span>Step-4 : &nbsp;</span>Paste download file location.</span></p>
                <p class="pl-4 mb-4"><span>Step-5 : &nbsp;</span>Enjoy!</span></p>

            </div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home">Links</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu1">Gameplay</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#menu2">Screenshot</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="home" class="container mt-0 tab-pane active"><br>
                    <p>Download Links</p>
                    <div class="link">
                        <div class="link-name">
                            <ul>
                                <li>Download File With <span style="color:red;"> Mediafire </span>Link</li>
                            </ul>
                        </div>
                        <div class="download-link">
                            <ul>
                                <li><a href="<?php echo $download_link; ?>">Download</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div id="menu1" class="container mt-0 tab-pane fade"><br>
                    <div class="video">
                        <p
                            style="background-color: rgb(41, 40, 40); color: white; padding: 10px; border-radius: 5px; text-align: start;">
                            Script Skin for <?php echo $hero_name; ?> <?php echo $s_type; ?></p><br>
                        <iframe width="600" height="345" src="<?php echo $youtube_link; ?>">
                        </iframe><br>
                        <hr color="white">
                        <p
                            style="background-color: rgb(41, 40, 40); color: white; padding: 10px; border-radius: 5px; text-align: start;">
                            Tutorial how to download.</p><br>
                        <iframe width="600" height="345" src="<?php echo $youtube_link; ?>">
                        </iframe><br>
                        <hr color="white">

                    </div>
                </div>

                <div id="menu2" class="container mt-0 tab-pane fade"><br>
                    <p style="background-color: rgb(41, 40, 40); color: white; padding: 10px; border-radius: 5px;">
                        Screenshots for
                        <?php echo $hero_name; ?>
                        <?php echo $s_type; ?>
                    </p><br>
                    <div class="ss">
                        <img src="#" alt="">
                        <img src="#" alt="">
                        <img src="#" alt="">
                        <img src="#" alt="">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php
    require_once 'footer.php';
    ?>