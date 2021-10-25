<?php
    date_default_timezone_set("Asia/Bangkok");
    include('../backend/database.php');
    // include('../backend/function.php');
    session_start();


  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../Login.php');
  }
  
  if (isset($_GET['logout'])) {
      session_destroy();
      unset($_SESSION['username']);
      header('location: ../Login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script defer src="function.js"></script>
   
</head>
<body>
    <?php include('head.php')?>


    <section section class="Announce">
        <h1 class="heading"> <span>Announce</span></h1>
        <div class="box-container">
            <div class="box">
            <img src="../image/outline_feedback_black_48dp.png" width = "30px"> Welcome to News world
            </div>
        </div>
    </section>

    <section section class="Room">
        <h1 class="heading"> <span>Category</span></h1>
        <div class="box-container">
            <?php foreach($queryyy as $q){?>
                <div class="box" id="box-Category">  <a href="search.php?hashtag=<?php echo $q['topic'];?>">
                    <div class = "inside">
                        <img src="../image/<?php echo $q['image'];?>"> <br>
                    </div>
                    <p><?php echo $q['topic'];?></p> </a>
                </div>
            <?php } ?> 
        </div>
    </section>

    <section section class="Highlight">
        <h1 class="heading"> <span>Top 4 news websites</span></h1>
        <div class="box-container">
            <div class="box" id="box-new"> <a href="https://news.yahoo.com" target = 'black'>
                <img src="../image/11111.jpeg" class="new-img">
                <p> Yahoo! News</p></a>
            </div>
            <div class="box" id="box-new"> <a href="https://news.google.com" target = 'black'>
                <img src="../image/google-lecce-min.jpeg" class="new-img">
                <p> Google News</p></a>
            </div>
            <div class="box" id="box-new"> <a href="https://www.huffpost.com" target = 'black'>
                <img src="../image/huffpost_logo.png" class="new-img">
                <p> HuffingtonPost </p></a>
                
            </div>
            <div class="box" id="box-new"> <a href="https://edition.cnn.com" target = 'black'>
                <img src="../image/FAGD65sXEAEMrOx.jpeg" class="new-img">
                <p> CNN </p></a>
            </div>
        </div>
    </section>

    <section class="News" id="products">
    <h1 class="heading"> <span>News</span></h1>
        <div class="box-container">
            
            <?php foreach($query as $q){ ?>
                <div class="box">
                    <h2 ><?php echo $q['title'];?></h2><br>
                    <h4><?php echo substr($q['content'], 0, 150);?>... <br> </h4>
                    <a href="view.php?id=<?php echo $q['id']?>" >Read More <span class="text-danger">&rarr;</span></a>        
                </div>
            <?php }?>
            
            
    </section>



   <?php include('footer.php');?>

   
</body>
</html>