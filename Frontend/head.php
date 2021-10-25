<nav>

        <div class="nav-left">
            <div class="header">Social media</div> 
            <ul>
                <a href="Home.php"><li><img src="../image/outline_home_white_24dp.png"> Home</li></a>
                <li><img src="../image/outline_groups_white_24dp.png"> Grouphs</li>
                <a href="create.php"><li><img src="../image/outline_drive_file_rename_outline_white_24dp.png"> Create</li></a> 
                <!-- <li><img src="../image/outline_local_offer_white_24dp.png"> Tag</li> -->
            </ul>
        </div>
        <div class="nav-right">
            <div class="search-box">
                <img src="../image/outline_search_white_24dp.png" id="search_go">
                <input type="text" placeholder="Keywords Search"  class="search"> 
            </div>
            <div class="nav-user-icon online">
            <ul>
            <a href="profile.php?name=<?php echo $_SESSION['username']?>"> <li><img src="../image/outline_account_circle_white_24dp.png"> <?php echo $_SESSION['username'] ; ?> </li> </a>
                <li><a href='Home.php?logout=1 '> <img src="../image/outline_logout_white_24dp.png"> </a>   </li>
            </ul>
            </div>
        </div>
    </nav>
    <section class="home" id="home">

    </section>