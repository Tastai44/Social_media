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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script defer src="function.js"></script>
    <title> News</title>
</head>
<body>
    <?php include('head.php');?>

<section section class="view">
    <div class="box-container">
        <div class="box">
            <?php foreach($query as $q){?>
                    <h1 class="post-header"><?php echo $q['title'];?></h1>
                </div>
                <div class="flex"><img src="../image/<?php echo $q['image'];?>" id="img-post"></div>
                <p><?php echo "Category: ".$q['hashtag'];?></p>
                <p class="paragraph"><?php echo $q['content'];?></p>
            <?php } ?>   
            
            <div class="flex">
                
                <a href="edit.php?id=<?php echo $q['id']?>" name="edit"><button class="e">Edit</button> </a>
                <form method="POST">
                    <input type="text" hidden value='<?php echo $q['id']?>' name="id">
                    <input type="text" hidden value='<?php echo $_SESSION['username']?>' name="name">
                    <button  name="delete" class="d">Delete</button>
                </form>
            </div>
        </div>
    </div>
<br>
        <?php foreach($queryy as $qq){
            echo "<div class='comments-box'><div class='name'>";
            ?>
            <a href="profile.php?name=<?php echo $qq['uid']?>">
            <?php
                echo "Username: ".$qq['uid']."<br><br>";
            ?>
            </a>
            <?php
                echo "Date: ".$qq['date'];
                echo "</div> <p class = 'c'>";
                echo "Messages: ".$qq['messages']."<br>";
                echo "</p>";
                
        ?>
                <div class="flexCom">
                    
                    <!-- <a href="editComment.php?id=<?php echo $qq['id']?>" name="edit_com"><button class="e">Edit</button> </a> -->
                    <form method="POST">
                        <input type="text" hidden value='<?php echo $qq['id']?>' name="id">
                        <input type='hidden' name='id_post' value='<?php echo $q['id']?>'>
                        <input type="text" hidden value='<?php echo $_SESSION['username']?>' name="name">
                        <button  name="delete_com" class="d" id="Delete-com">Delete</button>
                    </form>
                </div>
            </div>
        <?php } ?>   <br>
        
        <div class="comments">
           <form method='POST'>
                <?php echo "
                <input type='hidden' name='uid' value='".$_SESSION['username']."'>
                "; ?>
                <input type='hidden' name='date' value='<?php echo date('Y-m-d H:i:s');?>'>
                <textarea name='messages' class='Com'></textarea> <br>
                <input type='hidden' name='id_post' value='<?php echo $q['id']?>'>
                <input type='hidden' name='topic' value='<?php echo $q['title']?>'>
                <button type='submit' name='commentSubmit'>Comments</button>
            </form>

        </div>
</section>
<br><br><br><br><br>


<?php include('footer.php');?>
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
    

