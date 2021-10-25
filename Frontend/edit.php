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
<title>Edit post</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<?php include('head.php')?>


<section section class="view">
    <div class="box-container">
        <div class="flex">
            <?php foreach($query as $q){ ?>
                <form method="POST">
                    <input type="text" hidden value='<?php echo $_SESSION['username']?>' name="name">
                    <input type="text" hidden value='<?php echo $q['id']?>' name="id">
                    <input type="text" placeholder="Blog Title" class="flexUpdate" name="title" value="<?php echo $q['title']?>">
                    <input type="text" placeholder="Blog Topic" class="flexUpdate" name="topic" value="<?php echo $q['hashtag']?>">
                    <textarea name="content" class="flexUpdate" cols="200" rows="30"><?php echo $q['content']?></textarea>
                    <div class="d-flex mt-2 justify-content-center align-items-center">
                        <button class="u" name="update">Update</button>
                        <button class="C" name="cancle">Cancle</button>
                    </div>
                </form>
            <?php } ?>  
        </div>
    </div>

    

</section>
<br><br><br><br><br>

<?php include('footer.php')?>

</body>
</html>
    


