<?php 
session_commit();
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) 
{
include "../db_conn.php";
$tryid = $_SESSION['id'];
$result6 = mysqli_query($db, "SELECT * FROM admin WHERE id='$tryid'");
    while ($row1 = mysqli_fetch_array($result6)) 
        {
              $_SESSION['username'] = $row1['username'];
              $_SESSION['name'] = $row1['name'];
              $_SESSION['position'] = $row1['position'];    
        }

        if(isset($_POST['search']))
  	{
    $data = $_POST['search'];
    $result = mysqli_query($db, "SELECT * FROM users WHERE id='$data' OR fname='$data'");
            if(mysqli_num_rows($result) <= 0) {
                header("Location: ../feedback.php?error=No user found");
                exit();
            }
    $result_concern = mysqli_query($db, "SELECT * FROM users WHERE id='$data' OR fname='$data'");
        while ($row1 = mysqli_fetch_array($result_concern)) 
            {
                  $sf = $row1['fname'];
                  $sm = $row1['m_initial'];
                  $sl = $row1['lname'];
                  $sid = $row1['id'];
                  $sw = $row1['wantoshare'];
                  $sh = $row1['hobbies'];
                  $si = $row1['interest'];
                  $sfav = $row1['favourites'];
                  $sa = $row1['achievements'];
            }
        }
?>

<!DOCTYPE html>
		<html>
			<head>
            <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
			      <title>Admin Feedback Page</title>
            <link rel="stylesheet" type="text/css" href="css/announcement.css">
            <link rel="stylesheet" type="text/css" href="css/feedback.css">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>   
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <?php
                    include "molecule/header.php";
                ?>
			</head>
			<body>
            <div class="header" style="display: grid; place-items:center;">
        <h1 style="display:inline-block; text-transform:capitalize;">Welcome Our <?php echo $_SESSION['username'] ?></h1>
        <p>Feedback Page</p>
    </div>
    <div class="container_announcement">
          <!--Search Box -->
          <form method="post" action="feedback.php">
          <div class="input-group" style="display: flex; justify-content:center; align-items:center;">
            <div class="input-group-append">
                <button id="button-addon1" type="submit" name="search" class="btn btn-link text-primary"><i class="fa fa-search"></i>Search Concern</button>
              </div>
              <input type="search" name="search" laceholder="What're you searching for?" aria-describedby="button-addon1" class="form-control border-0 bg-light">
            </div>
    </form>
            <!--End -->

            <!--Success Delete Feedback -->
            <?php if (isset($_GET['success'])) { ?>
        <div class="alert alert-success"><?php echo $_GET['success'];  echo '<script>alert("Data has been successfully deleted;")</script>'?></div>
          	<?php } ?>


            <div class="concern">
            <?php
            $sql = "SELECT * FROM contact_us ORDER BY id desc";
            $result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $id = $row["id"];
    $name = $row["name"];
    $subject = $row["subject"];
    $message = $row["message"];
    $email =  $row["email"];
    $recipient = $row["recipient"];
    $timestamp = $row["timestamp"];
    
    echo "<div class=\"data_feedback\"> 
        $id.
        <div class=\"\">
    <p>Name: $name</p>
    <p>Subject: $subject</p>
    <p>Message: $message</p>
    <p>Email: $email</p>
    <p>Recipient: $recipient</p>
    <p>Date Post: $timestamp</p>
        </div>
        <div class=\"deleteButton\">
        <a href=\"delete_data/delete_feedback.php?feedback_id=$id\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>
        </div>

    </div>" ;
  }
} else {
  echo "No Data Found";
}
?>

            </div>
    
    </div>

    <?php include "molecule/footer.php"; ?>
            </body>
            </html>
            <?php 
}
else{
     header("Location: index.php");
     exit();
}
 ?>