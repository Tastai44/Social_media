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
    <title>Create</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script defer src="function.js"></script>
</head>
<body>
    <?php include('head.php')?>

    </section>

    <section section class="ex">
        <h1 class="heading"> <span><?php echo "Welcome ".$_SESSION['username'] ; ?></span></h1>
        <div class="box-container">
            <div class="box">
                <form method="POST">
                    <input type="text" placeholder="Write the topic." class="head" name="title"> 
                    <textarea name="content" placeholder="Write details." class="body" cols="30" rows="10"></textarea>
                    <input type="text" placeholder="Category" class="head" name="Hashtag">
                    <input type="file" name="fileToUpload" id="fileToUpload" class="head">
                    <input type='hidden' name='name' value='<?php echo $_SESSION['username']?>'>
                    <button  name="new_post" class="bu">Add Post</button>
                </form> 
            </div>
        </div>
    </section>
    <div class="flex"><button  id="topic" onclick="window.location.href='createTopic.php';">Create Topic</button> </div>
<br><br><br>
<?php include('footer.php')?>
</body>
</html>
        

    

