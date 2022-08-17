<?php
include "../db_conn.php";

$id = $_GET['feedback_id']; // $id is now defined
// or assuming your column is indeed an int
// $id = (int)$_GET['id'];

$sql = "DELETE FROM contact_us WHERE id='".$id."'";
if ($conn->query($sql) === TRUE) {

    header("Location: ../feedback.php?success=Feedback has been deleted successfully");
  } else {
    echo "Error deleting record: " . $conn->error;
  }
?> 