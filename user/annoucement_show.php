<?php
include "../db_conn.php";

$sql = "SELECT * FROM posts ORDER BY post_id desc";
$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $post_id = $row["post_id"];
        $timeupload = $row["timeupload"];
        $thumbnail = $row["thumbnail"];
        $message = $row["message"];
        $email =  $row["email"];
        $recipient = $row["recipient"];
        $timestamp = $row["timestamp"];
    
    echo $thumbnail;   
    }
} else {
  echo "No Data Found";
}
?>