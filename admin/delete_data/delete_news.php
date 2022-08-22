<?php
include "../db_conn.php";

$id = $_GET['news_id']; 
$sql = "DELETE FROM news WHERE news_id='".$id."'";
if ($conn->query($sql) === TRUE) {

    header("Location: ../news.php?deleted=News has been deleted successfully");
  } else {
    echo "Error deleting record: " . $conn->error;
  }
?>