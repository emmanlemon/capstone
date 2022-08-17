<?php
include "db_conn.php";

$id = $_GET['post_id']; // $id is now defined

// or assuming your column is indeed an int
// $id = (int)$_GET['id'];

mysqli_query($conn,"DELETE FROM posts WHERE post_id='".$id."'");
mysqli_query($conn,"DELETE * FROM comments WHERE post_id=$id");
mysqli_close($conn);
header("Location: documentpage.php?success=Post has been deleted successfully");
?> 