<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: loggin.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: loggin.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
		$pass = md5($pass);
		
		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) 
		{
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) 
            {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['fname'] = $row['fname'];
            	$_SESSION['m_initial'] = $row['m_initial'];
            	$_SESSION['lname'] = $row['lname'];
            	$_SESSION['id'] = $row['id'];
            	$_SESSION['position'] = $row['position'];
            	$_SESSION['wantoshare'] = $row['wantoshare'];
            	$_SESSION['hobbies'] = $row['hobbies'];
            	$_SESSION['interest'] = $row['interest'];
            	$_SESSION['favourites'] = $row['favourites'];
            	$_SESSION['achievements'] = $row['achievements'];

            	$sql2 = "SELECT * FROM customer WHERE id='$id'";

				    		$result = mysqli_query($conn, $sql);

				    		if (mysqli_num_rows($result) === 1) 
							{
								$row = mysqli_fetch_assoc($result);
								if ($row['id'] === $id) 
					            {
					            	
					            }
							}
            	if ($row['position'] === "admin")
            	{
            		header("Location: dashboard_admin.php?");
            	}
            	else 
            	{
            		header("Location: user/dashboard_user.php");
            	}
		        exit();
            }
            else
            {
				header("Location: loggin.php?error=Incorect Username or Password");
		        exit();
			}
		}
		else
		{
			header("Location: loggin.php?error=Incorect Username or Password");
	        exit();
		}
	}
	
}else{
	header("Location: loggin.php");
	exit();
}