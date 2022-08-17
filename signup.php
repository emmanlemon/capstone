<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
<link rel="stylesheet" type="text/css" href="css/signup.css">
<title>Speaker Eugenio Perez National Agricultural School</title>
      <?php
        include "dm.php";
      ?>
</head>
<body>
          <section class="section-login">
  <div class="container">
    <div class="form-container">
      <form class="form" method="post" action="signup-check.php">
     <span class="title">Sign Up</span>
      <div class="form-control">
      <label>First Name</label>
      <?php if (isset($_GET['fname'])) { ?>
          <input type="text" class="input username" name="fname" placeholder="Enter Your First Name"
          value="<?php echo $_GET['fname']; ?>">
          <?php }else{ ?>
       <input type="text" class="input username" name="fname" placeholder="Enter Your First Name">
                <?php }?>
        </div>
        <div class="form-control">
        <label>Middle Name</label>
        <?php if (isset($_GET['m_initial'])) { ?>
          <input type="text" class="input username" name="m_initial" placeholder="Enter Your Middle Name"
          value="<?php echo $_GET['m_initial']; ?>">
          <?php }else{ ?>
       <input type="text" class="input username" name="m_initial" placeholder="Enter Your Middle Name">
                <?php }?>
        </div>
        <div class="form-control">
        <label>Last Name</label>
        <?php if (isset($_GET['lname'])) { ?>
          <input type="text" class="input username" name="lname" placeholder="Enter Your Last Name"
          value="<?php echo $_GET['lname']; ?>">
          <?php }else{ ?>
       <input type="text" class="input username" name="lname" placeholder="Enter Your Last Name">
                <?php }?>
        </div>
        <div class="form-control">
        <label>Username</label>
        <?php if (isset($_GET['uname'])) { ?>
          <input type="text" class="input username" name="uname" placeholder="Enter Your Username"
          value="<?php echo $_GET['uname']; ?>">
          <?php }else{ ?>
       <input type="text" class="input username" name="uname" placeholder="Enter Your Username">
                <?php }?>
     </div>
        <div class="form-control">
          <label>Password</label>
          <input type="password" class="input password" name="password" placeholder="Enter Your Password">
        </div>
        <div class="form-control">
          <label>Confirm Password</label>
          <input type="password" class="input password" name="re_password" placeholder="Confirm Password">
        </div>
        <button class="btn btn-login">Sign Up</button>
        <?php if (isset($_GET['error'])) { ?>
           		<p class="error"><?php echo $_GET['error']; ?></p>
           	<?php } ?>

                <?php if (isset($_GET['success'])) { ?>
                     <p class="success"><?php echo $_GET['success']; ?></p>
                <?php } ?>
      </form>

      <div class="sign-up">
        <h2 class="text">Already have an account?</h2>
        <a href="login.php" class="btn btn-sign-up">Login</a>
     </form>
    </div>
  </div>
</section>
<div class="footer-copyright text-left py-3">© COPYRIGHT 2022. ALL RIGHTS RESERVED.
</div>
</body>
</html>