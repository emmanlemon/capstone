<?php

include 'db_conn.php';

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

 $name = $_POST['name'];
 $subject = $_POST['subject'];
 $message = $_POST['message'];
 $email = $_POST['email'];
 $recipient = $_POST['recipient'];
// If upload button is clicked ...

$sql = "INSERT INTO contact_us (name,subject,message,email,recipient,timestamp) 
VALUES ('$name','$subject','$message','$email','$recipient',CURRENT_TIMESTAMP())";

  	// execute query
  	$check = mysqli_query($db, $sql);

      if($check)

      {
        header("Location: index.php?success=Sent Successfully");
        exit();
      }
      else {
          echo "false";

      }
