<?php
include "db_conn.php";

$id = $_GET['gallery_id']; // $id is now defined

// or assuming your column is indeed an int
// $id = (int)$_GET['id'];

mysqli_query($conn,"DELETE FROM imgforgallery WHERE gallery_id='".$id."'");
mysqli_close($conn);
header("Location: dashboard_user.php?success=Picture has been deleted successfully");
?> 