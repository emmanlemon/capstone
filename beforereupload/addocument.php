<?php
include "db_conn.php";
  // If upload button is clicked ...
    $uploader_id = $_POST['upid'];
    $postid = $_POST['postid'];
    $text = $_POST['msg'];

  	$image_text = mysqli_real_escape_string($db, $_SESSION['id']);
  	$nameforsearching = mysqli_real_escape_string($db, $_SESSION['fname']);

  	$sql = "INSERT INTO comments (timeuploaded, post_text, post_id, uploader_id) VALUES (CURRENT_TIMESTAMP(), '$text', $postid, $uploader_id)";
  	// execute query
  	$check = mysqli_query($db, $sql);
      if($check)
      {
          header("Location: document-view.php");
      }
      else {
          header("Location: loggin.php");
      }

?>