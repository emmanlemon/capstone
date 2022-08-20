<?php 
session_commit();
session_start();
	include "../db_conn.php";
  	//$image2 = $_FILES['thumbnail']['name'];
  	//$image3 = $_FILES['fimage']['name'];
  	//$image4 = $_FILES['simage']['name'];

  	$uploader_id = mysqli_real_escape_string($db, $_SESSION['id']);
  	$title = mysqli_real_escape_string($db, $_POST['title']);
  	$header = mysqli_real_escape_string($db, $_POST['header']);
    $short_description = mysqli_real_escape_string($db, $_POST['shortDescription']);
  	$content = mysqli_real_escape_string($db, $_POST['content']);
	$post_text = mysqli_real_escape_string($db, $_POST['postText']);


	$location="../images/news/";
	$file1=$_FILES['thumbnail']['name'];
	$file_tmp1 = $_FILES['thumbnail']['tmp_name'];
	$file2=$_FILES['fimage']['name'];
	$file_tmp2=$_FILES['fimage']['tmp_name'];


	$query="INSERT INTO `news` (title, thumbnail_image, full_image, header, short_description, content, timestamp , uploader_id) 
    VALUES ('$title', '$file1','$file2', \"$header\", \"$short_description\", \"$content\", CURRENT_TIMESTAMP() ,'$uploader_id ')";
	$fire=mysqli_query($conn,$query);
	if($fire)
	{
		move_uploaded_file($file_tmp1, $location.$file1);
		move_uploaded_file($file_tmp2, $location.$file2);
        
        header("Location: ../news.php?error=News Post Added Successfully");
        exit();
	} 
    else {
        header("Location: ../news.php?error=News Post is not Added Successfully");
        exit();
    }



 ?>