<?php
include "../db_conn.php";
$id = $_GET['announcement_id'];

$result = mysqli_query($db, "SELECT * FROM posts WHERE post_id='$id'");
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_array($result)) 
{
    $post_id = $row["post_id"];
    $timeuploaded = $row["timeuploaded"];
    $thumbnail = $row["thumbnail"];
    $fullImage = $row["fimage"];
    $smallImage =  $row["simage"];
    $header = $row["header"];
    $bigheader = $row["bigheader"];
    $short_description = $row["short_description"];
    $description = $row["description"];
    $post_text = $row["post_text"];
}
} else {
    echo "No Data Found";
  }
?>
<!DOCTYPE html>
		<html>
			<head>
            <link rel="shortcut icon" type="image/x-icon" href="../favicon.png" />
            <link rel="stylesheet" type="text/css" href="css/header.css">
            <link rel="stylesheet" type="text/css" href="css/announcement.css">

			<title>Admin Announcement Page</title>    
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
                <div class="announcement_show">
                <?php echo "<img src='images/announcement/$fullImage'>"?>
                <div class="bottom-left">
                    <h2><?php echo $bigheader?></h2>
                    <h3><?php echo $header?></h3>
                </div>
                </div>
                </div>
                <div class="announcement_description">
                <span>Thumbnail Image:<br><?php echo "<img src='images/announcement/$thumbnail'>"?></span>
                <div class="div"><?php echo $bigheader?><?php echo $description?><?php echo $post_text?></span>
               </div> <?php echo "<img src='images/announcement/$smallImage'>"?>
                </div>
                <?php
                    include "molecule/footer.php";
                ?>
            </body>
</html>