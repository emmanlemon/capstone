<?php
include "../db_conn.php";

$id = $_GET['achievement_id']; 
$sql = "DELETE FROM achievement WHERE achievement_id='".$id."'";
if ($conn->query($sql) === TRUE) {

    header("Location: ../achievement.php?deleted=Achievement has been deleted successfully");
  } else {
    echo "Error deleting record: " . $conn->error;
  }
?>