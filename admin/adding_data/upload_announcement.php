<?php 
session_commit();
session_start();
	include "../db_conn.php";
  	//$image2 = $_FILES['thumbnail']['name'];
  	//$image3 = $_FILES['fimage']['name'];
  	//$image4 = $_FILES['simage']['name'];

  	$uid = mysqli_real_escape_string($db, $_SESSION['id']);
  	$headertop = mysqli_real_escape_string($db, $_POST['title']);
  	$type = mysqli_real_escape_string($db, $_POST['type']);
  	$layout = mysqli_real_escape_string($db, $_POST['layout']);
  	$headerdescription = mysqli_real_escape_string($db, $_POST['fullDescription']);
    $short_description = mysqli_real_escape_string($db, $_POST['shortDescription']);
  	$bigheader = mysqli_real_escape_string($db, $_POST['header']);
  	$longtext = mysqli_real_escape_string($db, $_POST['postText']);


	$location="../images/announcement/";
	$file1=$_FILES['thumbnail']['name'];
	$file_tmp1 = $_FILES['thumbnail']['tmp_name'];
	$file2=$_FILES['fimage']['name'];
	$file_tmp2=$_FILES['fimage']['tmp_name'];
	$file3=$_FILES['simage']['name'];
	$file_tmp3=$_FILES['simage']['tmp_name'];

	$query="INSERT INTO `posts` (timeuploaded, thumbnail, fimage, simage, header, bigheader, short_description, description, post_text, type, layout, uploader_id) 
    VALUES (CURRENT_TIMESTAMP(), '$file1', '$file2', '$file3', \"$headertop\", \"$bigheader\", \"$short_description\", \"$headerdescription\", \"$longtext\", '$type', '$layout', '$uid')";
	$fire=mysqli_query($conn,$query);
	if($fire)
	{
		move_uploaded_file($file_tmp1, $location.$file1);
		move_uploaded_file($file_tmp2, $location.$file2);
		move_uploaded_file($file_tmp3, $location.$file3);
        
		header("Location: ../announcements.php?success=Achievement Post Added Successfully");
        exit();
	} 
    else {
        header("Location: ../announcements	.php?error=Upload is not Added Successfully");
        exit();
    }



 ?>