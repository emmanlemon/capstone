<?php
include "../db_conn.php";

$sql = "SELECT * FROM achievement ORDER BY achievement_id desc";
$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $achievement_id = $row["achievement_id"];
        $title= $row["title"];
        $thumbnailImage = $row["thumbnail_image"];
        $fullIimage = $row["full_image"];
        $header = $row["header"];
        $short_description = $row["short_description"];
        $content = $row["content"];
        $postText = $row["post_text"];
        $timeuploaded = $row["timestamp"];
    

       
        echo "<div class=\"data_feedback\"> 
        <img src='images/achievement/$thumbnailImage'>
          <div>
            <p>Title: $header</p>
            <p>Description: $short_description </p>
            <p>Time Uploaded: $timeuploaded </p>
          </div>
        <div class=\"deleteButton\">
        </div>

    </div>" ;
      }
} else {
  echo "No Data Found";
}
?>