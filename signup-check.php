<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['lname'])
	&& isset($_POST['fname'])&& isset($_POST['m_initial'])
    && isset($_POST['password']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$fname = validate($_POST['fname']);
	$m_initial = validate($_POST['m_initial']);
	$lname = validate($_POST['lname']);

	$user_data = 'uname='. $uname. '&fname='. $fname. 'm_initial='. $m_initial. 'lname='. $lname;


	if (empty($uname)) {
		header("Location: signup.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=Password is required");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required");
	    exit();
	}

	else if(empty($fname)){
        header("Location: signup.php?error=First Name is required");
	    exit();
	}
	else if(empty($lname)){
        header("Location: signup.php?error=Last Name is required");
	    exit();
	}
	else if(empty($m_initial)){
        header("Location: signup.php?error=Middle Initial is required");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM users WHERE user_name='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken try another");
	        exit();
		}else {
           $sql2 = "INSERT INTO users(user_name, password, fname, lname, m_initial) VALUES('$uname', '$pass', '$fname', '$lname', '$m_initial')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: loggin.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}