<?php
include "../db_conn.php";

$id = $_GET['events_id']; 
$sql = "DELETE FROM upcoming_events WHERE event_id='".$id."'";
if ($conn->query($sql) === TRUE) {

    header("Location: ../upcoming_events.php?deleted=Event has been deleted successfully");
  } else {
    echo "Error deleting record: " . $conn->error;
  }
?>