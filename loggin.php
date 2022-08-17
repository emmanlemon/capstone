<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-8">
     <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="./style.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
    <title>Sepnas Login Page</title>
          
</head>
<body>
<div class="box">
    <div class="box-form">
        <div class="left" style="background-image:url('https://sepnasblogcom.files.wordpress.com/2016/10/14696835_1777818365835004_1558469059_n.jpg?w=960&h=435&crop=1');">
            <div class="overlay">
            <h1>Welcome to Sepnas</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Curabitur et est sed felis aliquet sollicitudin</p>
            <span>
                <p>login with social media</p>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a>
            </span>
            </div>
        </div>
        
        
            <div class="right">

               <!-- Login Page for Users -->
            <form action="login.php" method="post">
           <center><img src="images/Images/sepnas_logo.png" alt=""></center>
           <h2>Login</h2>
            <div class="inputs">
                <p>Please login to your account</p>
                <label for="">Username</label>
                <input type="text" name="uname" placeholder="Enter your Username">
                <br>
                <label for="">Password</label>
                <input type="password" name="password" placeholder="Enter your Password">
                <a href="signup.php">Create an account</a>
            </div>
                
                <br>
                
            <div class="remember-me--forget-password">
        <?php if (isset($_GET['errory'])) { ?>
          		<p class="error"><?php echo $_GET['errory']; ?><a href="login_for_admin_without_create_account.php" id="err"> Admin's Login</a></p>
          	<?php } ?>
               <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
               <?php } ?>
               <?php if (isset($_GET['success'])) { ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
               <?php } ?>
            </div>
                <br>
                <button type="submit" id="sbmt">Login</button>
        </div>
        </form>
        
    </div>
    <div class="footer-copyright text-left py-3">© COPYRIGHT 2022. ALL RIGHTS RESERVED.
</div>
</body>
</html>



