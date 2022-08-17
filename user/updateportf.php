<?php 
session_start(); 
include "../db_conn.php";


	$trivia = $_POST['wantoshare'];
	$achievements = $_POST['achievements'];
	$hobbies = $_POST['hobbies'];
	$id = $_SESSION['id'];

	$sql = "UPDATE users SET hobbies='$hobbies', wantoshare='$trivia', achievements='$achievements' WHERE id='$id'";
	$result = mysqli_query($conn, $sql);

            	$_SESSION['wantoshare'] = $trivia;
            	$_SESSION['hobbies'] = $hobbies;
            	$_SESSION['achievements'] = $achievements;

	if($result){
		header("Location: dashboard_user.php?success=Portfolio updated successfully");
	}
else
	{
		header("Location: dashboard_user.php?error=Something is wrong, lmao");
		exit();
	}