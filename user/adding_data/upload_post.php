<?php 
session_commit();
session_start();
	include "../db_conn.php";
  	//$image2 = $_FILES['thumbnail']['name'];
  	//$image3 = $_FILES['fimage']['name'];
  	//$image4 = $_FILES['simage']['name'];

  	$user_id = mysqli_real_escape_string($db, $_SESSION['id']);
  	$header = mysqli_real_escape_string($db, $_POST['header']);
  	$content = mysqli_real_escape_string($db, $_POST['content']);

	$location="../Images/image_post/";
	$file1=$_FILES['post_image']['name'];
	$file_tmp1 = $_FILES['post_image']['tmp_name'];


	$query="INSERT INTO `post_image` (header, content, optional_image, timestamp, user_id) 
    VALUES ('$header','$content', '$file1' , CURRENT_TIMESTAMP() ,'$user_id ')";
	$fire=mysqli_query($conn,$query);
	if($fire)
	{
		move_uploaded_file($file_tmp1, $location.$file1);
        
		echo "hello";
	} 
    else {
     echo "mali";
    }



 ?>