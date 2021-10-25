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

    

    <section class="News" id="products">
    <h1 class="heading"> <span>News</span></h1>
        <div class="box-container">

            <?php foreach($query_h as $qq){?>

                <div class="box">
                    <h2 ><?php echo $qq['title'];?></h2><br>
                    <h4><?php echo substr($qq['content'], 0, 150);?>... <br> </h4>
                    <a href="view.php?id=<?php echo $qq['id']?>" >Read More <span class="text-danger">&rarr;</span></a>        
                </div>
            <?php }?>      
    </section>
    <?php foreach($query_t as $qqq){ ?>
                <form method="POST" class="flex">
                    <input type="text" hidden value='<?php echo $qqq['topic']?>' name="topic">
                    <input type="text" hidden value='<?php echo $_SESSION['username']?>' name="name">
                    <button  name="delete_topic" class="t">Delete</button>
                </form>
            <?php }?>

            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

   <?php include('footer.php');?>
   
</body>
</html>