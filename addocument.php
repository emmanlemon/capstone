<?php

include "db_conn.php";


	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uploader_id = validate($_POST['upid']);
	$postid = validate($_POST['postid']);
	$text = validate($_POST['msg']);
  // If upload button is clicked ...




  	$sql = "INSERT INTO comments (timeuploaded, post_text, post_id, uploader_id) VALUES (CURRENT_TIMESTAMP(), \"$text\", $postid, $uploader_id)";

  	// execute query

  	$check = mysqli_query($db, $sql);

      if($check)

      {
          header("Location: document-view.php?post_id=$postid");
          exit();
      }

      else {

          header("Location: loggin.php");

      }



?>