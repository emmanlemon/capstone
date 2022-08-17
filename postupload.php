<?php 
session_commit();
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
include "db_conn.php";


 // Create database connection
  // Initialize message variable
  $msg = "";
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_SESSION['id']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  //if postit button is clicked from the post area
  if (isset($_POST['postit'])) {
  	// Get image name
  	// Get text

  	$postempty = $_POST['postext'];
  	if($postempty == ""){
  		header("Location: dashboard_user.php?error=There is nothing to upload");
  		exit();
  	}
  	else {
  	$postext = mysqli_real_escape_string($db, $_POST['postext']);
  	$uid = $_SESSION['id'];
  	// image file directory

  	$sql1 = "INSERT INTO posts (post_text, timeuploaded, uploader_id) VALUES ('$postext', CURRENT_TIMESTAMP(), '$uid')";
  	// execute query
  	$resultpost = mysqli_query($conn, $sql1);
    
    if($resultpost) {
      header("Location: dashboard_user.php?success=Your post has been uploaded");
     }
    }
  }

  if (isset($_POST['postitt'])) {
    // Get image name
    // Get text

    $postempty = $_POST['postext'];
    $fbid = $_POST['feedbackerid'];
    if($postempty == ""){
      header("Location: search.php?error=There is nothing to upload");
      exit();
    }
    else {
    $postext = mysqli_real_escape_string($db, $_POST['postext']);
    $uid = $_SESSION['id'];
    // image file directory

    $sql1 = "INSERT INTO posts (post_text, timeuploaded, uploader_id) VALUES ('$postext', CURRENT_TIMESTAMP(), '$fbid')";
    // execute query
    $resultpost5 = mysqli_query($conn, $sql1);

    if($resultpost5) {
      header("Location: dashboard_user.php?success=Your post has been uploaded");
     }
    }
  }


  if (isset($_POST['deletepost'])) {
    // Get image name
    // Get text

    $uid = $row['post_id'];
    // image file directory

    $sql2 = "DELETE * FROM posts WHERE post_id='$uid'";
    // execute query
    $resultdelete = mysqli_query($conn, $sql1);
    
    if($resultdelete) {
      header("Location: dashboard_user.php?success=Post has been deleted");
 }
  }


  $upid = $_SESSION['id'];
  $result = mysqli_query($db, "SELECT * FROM images WHERE image_text=$upid ORDER BY id desc LIMIT 1");
  $result1 = mysqli_query($db, "SELECT * FROM images WHERE image_text=$upid ORDER BY id desc LIMIT 1");
  $result2 = mysqli_query($db, "SELECT * FROM posts WHERE uploader_id=$upid ORDER BY timeuploaded desc");


}
else {
    header("Location: index.php");
    exit();
}
 ?>
