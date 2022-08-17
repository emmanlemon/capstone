<?php
session_start();
include "db_conn.php";

  $db = mysqli_connect("localhost", "root", "", "dbcamacho");


	if(isset($_POST['search']))
	{
		  $tryid = $_POST['search'];
		  $result6 = mysqli_query($db, "SELECT * FROM users WHERE id='$tryid' OR fname='$tryid'");
		  if($result6) {
		  	echo "<input type='hidden' name='trylang' value='$tryid'>";;
		  	header("Location: search.php");
		  }
		  if(!$result6) {
		  	header("Location: dashboard_user.php?error=No user found");
		  }
	}
?>