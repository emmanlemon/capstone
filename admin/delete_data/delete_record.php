<?php
include "../db_conn.php";

$id = $_GET['data_id']; 
$sql = "DELETE FROM users WHERE id='".$id."'";
if ($conn->query($sql) === TRUE) {

    header("Location: ../data_records.php?success=Data has been deleted successfully");
  } else {
    echo "Error deleting record: " . $conn->error;
  }
?>