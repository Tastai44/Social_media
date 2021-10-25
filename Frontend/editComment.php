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
<title>Edit comment</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<?php include('head.php')?>


<section section class="view">
    <div class="box-container">
        <div class="flex">
            <?php foreach($queryy as $qq){ ?>
                <form method="POST">
                <input type="text" hidden value='<?php echo $qq['id']?>' name="id">
                <!-- <input type='hidden' name='id_post' value='<?php echo $q['id']?>'> -->
                <textarea name='messages' class='Com'></textarea> <br>
                        <button class="u" name="update-com">Update</button>
                        <button class="C" name="cancle-com">Cancle</button>
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
    


