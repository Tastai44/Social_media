<?php
    date_default_timezone_set("Asia/Bangkok");
    include('../backend/database.php');
    include('../backend/function.php');
    // session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Home</title>
</head>
<body>
    
    <nav>
        <div class="nav-left">
            <div class="header">Social media</div> 
            <ul>
                <li><img src="../image/outline_groups_white_24dp.png"> Grouphs</li>
                <li><img src="../image/outline_drive_file_rename_outline_white_24dp.png"> Create</li>
                <li><img src="../image/outline_local_offer_white_24dp.png"> Tag</li>
            </ul>
        </div>
        <div class="nav-right">
            <div class="search-box">
                <img src="../image/outline_search_white_24dp.png">
                <input type="text" placeholder="Search">
            </div>
            <div class="nav-user-icon online">
                <img src="../image/outline_account_circle_white_24dp.png">
                <img src="../image/outline_logout_white_24dp.png">

            </div>
        </div>
    </nav>

    <div class="container">
        <div class="left-sidebar">
            <div class="img-links">
                <img src="../image/83bb34dadd8cff42a1195b20c254534d.jpeg" class="picture">
                <a href="#"><img src="../image/outline_home_white_24dp.png"> Home</a>
                <a href="#"><img src="../image/outline_article_white_24dp.png"> Home</a>


            </div>
        </div>
        <div class="main-sidebar">
            <div class="head-img">
                <img src="../image/male-touching-virtual-42690787.jpeg">
            </div>
            <div class="position">
                Page<?php getComments($conn); ?>
            </div>

            <div class="detail1">
                <p>Announce</p>
            </div>
            <div class="detail2">
                <p>Hope you guy will enjoy all of your journey on our website.</p> 
            </div>

            <div class="room1">
                Room
            </div>
            <div class="room2">
                room
            </div>

            <div class="highlight1">
                Highlight
            </div>
            <div class="highlight2">
                <div class="news1">
                <img src="../image/83bb34dadd8cff42a1195b20c254534d.jpeg" class="picture">
                </div>
                <div class="news1">
                <img src="../image/83bb34dadd8cff42a1195b20c254534d.jpeg" class="picture">
                </div>
                <div class="news1">
                <img src="../image/83bb34dadd8cff42a1195b20c254534d.jpeg" class="picture">
                </div>
            </div>
                <div class="recent1">
                    <p>Recent News</p>
                </div>
                <div class="recent2">
                    <section class="products" id="products">

                        <div class="box-container">
                            <div class="box">
                                1
                            </div>
                            <div class="box">
                                1
                            </div>
                            <div class="box">
                                1
                            </div>
                            <div class="box">
                            1
                            </div>
                            <div class="box">
                                1
                            </div>
                            <div class="box">
                                1
                            </div>

                        </div>

                    </section>
                </div>

        </div>
        
        <!-- <div class="right-sidebar"></div> -->
    </div>
    
</body>
</html>

