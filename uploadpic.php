<?php 

if (isset($_POST['uploadfromadmin']) && isset($_FILES['imgInp']) && isset($_FILES['imgInp2']) && isset($_FILES['imgInp3'])) {
	include "db_conn.php";

	
	$upid = $_SESSION['id'];

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['imgInp']['name'];
	$img_size = $_FILES['imgInp']['size'];
	$tmp_name = $_FILES['imgInp']['tmp_name'];
	$error = $_FILES['imgInp']['error'];
    
	$img_name2 = $_FILES['imgInp2']['name'];
	$img_size2 = $_FILES['imgInp2']['size'];
	$tmp_name2 = $_FILES['imgInp2']['tmp_name'];
	$error = $_FILES['imgInp2']['error'];

	$img_name3 = $_FILES['imgInp3']['name'];
	$img_size3 = $_FILES['imgInp3']['size'];
	$tmp_name3 = $_FILES['imgInp3']['tmp_name'];
	$error = $_FILES['imgInp3']['error'];


	if ($error === 0) {
		if ($img_size > 1250000) {
			$em = "Sorry, your file is too large.";
		    header("Location: dashboard_user.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png", "JPG", "JPEG", "PNG"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'gallery/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
				$upid = $_SESSION['id'];
				// Insert into Database
				$sql = "INSERT INTO posts(thumbnail, uploader_id) 
				        VALUES('$new_img_name', '$upid')";
				mysqli_query($conn, $sql);
				header("Location: dashboard_user.php");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: uploadnew.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: uploadnew.php?error=$em");
	}

}else {
	header("Location: uploadnew.php");
}