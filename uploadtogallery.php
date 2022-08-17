<?php 
session_commit();
session_start();

if (isset($_SESSION['id'])) 
{
include "db_conn.php";

 // Create database connection
 
  $tryid = $_SESSION['id'];
  $result6 = mysqli_query($db, "SELECT * FROM users WHERE id='$tryid'");
  	while ($row1 = mysqli_fetch_array($result6)) 
  		{
            	$_SESSION['user_name'] = $row1['user_name'];
            	$_SESSION['fname'] = $row1['fname'];
            	$_SESSION['m_initial'] = $row1['m_initial'];
            	$_SESSION['lname'] = $row1['lname'];
            	$_SESSION['id'] = $row1['id'];
            	$_SESSION['position'] = $row1['position'];
            	$_SESSION['wantoshare'] = $row1['wantoshare'];
            	$_SESSION['hobbies'] = $row1['hobbies'];
            	$_SESSION['interest'] = $row1['interest'];
            	$_SESSION['favourites'] = $row1['favourites'];
            	$_SESSION['achievements'] = $row1['achievements'];
  		}
  // Initialize message variable
  $msg = "";
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_SESSION['id']);
  	$nameforsearching = mysqli_real_escape_string($db, $_SESSION['fname']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO images (image, image_text, imgforsearch) VALUES ('$image', '$image_text', '$nameforsearching')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  if (isset($_POST['uploadtogallery'])) {
  	// Get image name
  	$image1 = $_FILES['gallery']['name'];
  	// Get text
  	$image_text1 = mysqli_real_escape_string($db, $_SESSION['id']);
  	$nameforsearching1 = mysqli_real_escape_string($db, $_SESSION['fname']);

  	// image file directory
  	$target = "gallery/".basename($image1);

  	$sql = "INSERT INTO imgforgallery (image, image_text1, picforsearch) VALUES ('$image1', '$image_text1', '$nameforsearching1')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['gallery']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
    if($sql) {
      header("Location: dashboard_user.php?success=Image uploaded succesfully");
    }
  }
  //if postit button is clicked from the post area
  if (isset($_POST['postit'])) {
  	// Get image name
  	// Get text
  	$postext = mysqli_real_escape_string($db, $_POST['postext']);
  	$uid = $_SESSION['id'];
  	// image file directory

  	$sql1 = "INSERT INTO posts (post_text, timeuploaded, uploader_id) VALUES ('$postext', CURRENT_TIMESTAMP(), '$uid')";
  	// execute query
  	mysqli_query($db, $sql1);
  }
  
  if (isset($_POST['uploadfromadmin'])) {
include "db_conn.php";

  	//$image2 = $_FILES['thumbnail']['name'];
  	//$image3 = $_FILES['fimage']['name'];
  	//$image4 = $_FILES['simage']['name'];

  	$uid = mysqli_real_escape_string($db, $_SESSION['id']);
  	$headertop = mysqli_real_escape_string($db, $_POST['post_header']);
  	$type = mysqli_real_escape_string($db, $_POST['type']);
  	$layout = mysqli_real_escape_string($db, $_POST['layout']);
  	$headerdescription = mysqli_real_escape_string($db, $_POST['post_description']);
  	$bigheader = mysqli_real_escape_string($db, $_POST['contentheader']);
  	$longtext = mysqli_real_escape_string($db, $_POST['text1']);


	$location="gallery/";
	$file1=$_FILES['thumbnail']['name'];
	$file_tmp1=$_FILES['thumbnail']['tmp_name'];
	$file2=$_FILES['fimage']['name'];
	$file_tmp2=$_FILES['fimage']['tmp_name'];
	$file3=$_FILES['simage']['name'];
	$file_tmp3=$_FILES['simage']['tmp_name'];
	$query="INSERT INTO `posts` (timeuploaded, thumbnail, fimage, simage, header, bigheader, description, post_text, type, layout, uploader_id) VALUES (CURRENT_TIMESTAMP(), '$file1', '$file2', '$file3', \"$headertop\", \"$bigheader\", \"$headerdescription\", \"$longtext\", '$type', '$layout', '$uid')";
	$fire=mysqli_query($conn,$query);
	if($fire)
	{
		move_uploaded_file($file_tmp1, $location.$file1);
		move_uploaded_file($file_tmp2, $location.$file2);
		move_uploaded_file($file_tmp3, $location.$file3);
		move_uploaded_file($file_tmp4, $location.$file4);
        
        header("Location: dashboard_user.php");
        exit();
	} 
    else {
        header("Location: dashboard_admin.php");
        exit();
    }

  	// image file directory
  }




  $upid = $_SESSION['id'];
  $id = $upid;
  $result = mysqli_query($db, "SELECT * FROM images WHERE image_text=$upid ORDER BY id desc LIMIT 1");
  $result1 = mysqli_query($db, "SELECT * FROM images WHERE image_text=$upid ORDER BY id desc LIMIT 1");
  $result2 = mysqli_query($db, "SELECT * FROM posts WHERE uploader_id=$upid ORDER BY timeuploaded desc");
  $result3 = mysqli_query($db, "SELECT * FROM images WHERE image_text=$upid ORDER BY id");
  $result4 = mysqli_query($db, "SELECT * FROM images WHERE image_text=$upid ORDER BY id desc LIMIT 1");
  $result5 = mysqli_query($db, "SELECT * FROM images WHERE image_text=$upid ORDER BY id desc LIMIT 1");
  $forgallery = mysqli_query($db, "SELECT * FROM imgforgallery WHERE image_text1='$upid'");

}
else {
    header("Location: index.php");
    exit();
}
 ?>