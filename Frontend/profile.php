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
    <title>Proflie</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <script defer src="function.js"></script>
</head>
<body>
    <?php include('head.php')?>

    </section>

    <section section class="profile">
        <h1 class="heading"> <span>Welcome</span></h1>
        <div class="box-container">
            
            <div class="img_container"> <img src="page/images/12.jpeg"> </div> 
                <div class="flex"> 
                
                    <div class="content">
                        <?php foreach($query_proflie as $qpp){ ?>
                            <b>First name:</b> <?php echo $qpp['firstName'] ; ?>  <br><br>
                            <b>Last Name:</b> <?php echo $qpp['surname'] ; ?> <br><br>
                            <b>Username:</b> <?php echo $qpp['username'] ; ?><br><br>
                            <b>Email:</b> <?php echo $qpp['email'] ; ?><br><br>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="News" id="products">
    <h1 class="heading"> <span>Post</span></h1>
        <div class="box-container">
            
            <?php foreach($query_pu as $q){ ?>
                <div class="box">
                    <h2 ><?php echo $q['title'];?></h2><br>
                    <h4><?php echo substr($q['content'], 0, 150);?>... <br> </h4>
                    <a href="view.php?id=<?php echo $q['id']?>" >Read More <span class="text-danger">&rarr;</span></a>        
                </div>
            <?php }?>
                  
    </section>

    <section class="News" id="products">
    <h1 class="heading"> <span>Comentes</span></h1>
        <div class="box-container">
            
            <?php foreach($query_com as $qq){?>
                <div class="box">
                <a href="view.php?id=<?php echo $qq['id_post']?>">
                <?php
                    echo $qq['topic']. "</a><br>";
                    echo "Date: ".$qq['date'];
                    echo "<br><br>";
                    echo "</div>";
                }
            ?>
            

        </div>          
    </section>
    
<br><br><br>
<?php include('footer.php')?>
</body>
</html>

