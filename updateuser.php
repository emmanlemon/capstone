<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['nuname']) && isset($_POST['nlname'])
	&& isset($_POST['nfname'])&& isset($_POST['nminitial'])
    && isset($_POST['npassword']) && isset($_POST['nrepassword'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$nuname = validate($_POST['nuname']);
	$npass = validate($_POST['npassword']);

	$nre_pass = validate($_POST['nrepassword']);
	$nfname = validate($_POST['nfname']);
	$nm_initial = validate($_POST['nminitial']);
	$nlname = validate($_POST['nlname']);

	if(empty($nfname)&&empty($nminitial)&&empty($nlname)&&empty($nuname)&&empty($npass)&&empty($nre_pass)){
		header("Location: dashboard_admin.php?error=Please fill out all of the fields");
		exit();
	}
	else if(empty($nfname)){
        header("Location: dashboard_admin.php?error=First Name is required");
	    exit();
	}
	else if(empty($nminitial)){
        header("Location: dashboard_admin.php?error=Middle Initial is required");
	    exit();
	}
	else if(empty($nlname)){
        header("Location: dashboard_admin.php?error=Last Name is required");
	    exit();
	}
	else if (empty($nuname)) {
		header("Location: dashboard_admin.php?error=User Name is required");
	    exit();
	}else if(empty($npass)){
        header("Location: dashboard_admin.php?error=Password is required");
	    exit();
	}
	else if(empty($nre_pass)){
        header("Location: dashboard_admin.php?error=Re Password is required");
	    exit();
	}

	else if($npass !== $nre_pass){
        header("Location: dashboard_admin.php?error=The confirmation password from (Upate Users) does not match");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    
           $sql2 = "UPDATE users SET fname = 'nfname', m_initial = 'nm_initial', lname = 'nlname', uname = 'nuname', password = 'npass',";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: dashboard_admin.php?success=Your account has been updated successfully");
	         exit();
           }else {
	           	header("Location: dashboard_admin.php?error=unknown error occurred");
		        exit();
           }
		}
	}
	else{
	header("Location: index.php");
	exit();
}