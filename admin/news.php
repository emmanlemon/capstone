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
?>

<!DOCTYPE html>
		<html>
			<head>
            <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
			      <title>Admin News Page</title>
            <link rel="stylesheet" type="text/css" href="css/dashboard_admin.css">
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
            </body>
            </html>
            <?php 
}
else{
     header("Location: index.php");
     exit();
}
 ?>