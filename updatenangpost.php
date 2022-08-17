<?php
include "db_conn.php";

if(isset($_POST['updatetext']) && isset($_POST['updatedid']))
{
$id = $_POST['updatedid']; // $id is now defined
$updatedpost = $_POST['updatetext'];

	$sql = "UPDATE posts SET post_text='$updatedpost' WHERE post_id='$id'";
	$result = mysqli_query($conn, $sql);  
	if($result)
	{
		header("Location: dashboard_user.php?success=Post has been updated successfully");
	}
	else 
	{
		header("Location: dashboard_user.php?error=Something's not working");
	}
}
else {
    header("Location: index.php");
    exit();
}
?> 