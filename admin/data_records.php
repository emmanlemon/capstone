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
        <p>Data Records Page</p>
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


            <?php
            $sql = "SELECT * FROM users ORDER BY id desc";
            $result = mysqli_query($db, $sql);

            echo "<table class=\"table\">

            <tr>
            
            <th>ID</th>  
            <th>Username</th>
            <th>Password</th>
            <th>First Name</th>
            <th>Middle Initial</th>
            <th>Last Name</th>
            <th>Achivements</th>
            <th>Want To Share</th>
            <th>Hobbies</th>
            <th>Interest</th>
            <th>Favorites</th>


            
            </tr>";
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

    echo "<tbody>";
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['user_name'] . "</td>";
    echo "<td>" . $row['password'] . "</td>";
    echo "<td>" . $row['fname'] . "</td>";
    echo "<td>" . $row['m_initial'] . "</td>";
    echo "<td>" . $row['lname'] . "</td>";
    echo "<td>" . $row['achievements'] . "</td>";
    echo "<td>" . $row['wantoshare'] . "</td>";
    echo "<td>" . $row['hobbies'] . "</td>";
    echo "<td>" . $row['interest'] . "</td>";
    echo "<td>" . $row['favourites'] . "</td>";
    echo "<td> <a href=\"delete_data/delete_record.php?data_id=".$row['id']."\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a> </td>";
    echo "</tr>";
    echo "</tbody>";
    echo "</table>";

  }
} else {
  echo "No Data Found";
}
?>

    
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