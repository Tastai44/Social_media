
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="Frontend/js/login-validation.js"></script>
</head>
<body>
    <?php include('head.php');?>

    <section section class="login">
        <h1 class="heading"> <span><?php echo "Login" ?></span></h1>
        <div class="img_container"> <img src="Frontend/page/images/1.jpeg"> </div>
            <h2>Login</h2>
            <div class="fields">
                <form action="#">
                    <div class="form-group">
                        <div class="form-input">
                            <input type="text" placeholder="Username" class="username-box">
                            <p id="p1"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-input">
                            <input type="password" placeholder="Password" class="password-box">
                            <p id="p2"></p>
                        </div>
                    </div>
                    <p id="p3" align="center"></p> <br>
                    <div class="login-btn">
                        <button type="button" id="submit">Login</button>
                    </div>
                </form>
                <div class="login-footer">
                    <a href="Frontend/page/Register.php"> Create Account </a>
                </div>
                <div class="login-width">
                    <div class="social-link">
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-google"></i>
                        <i class="fa fa-twitter"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
<br><br><br>



    <?php include('footer.php');?>

    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"
        ></script>
</body>
</html>