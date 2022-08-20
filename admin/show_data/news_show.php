<?php
include "../db_conn.php";

$sql = "SELECT * FROM news ORDER BY news_id desc";
$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while ($row = mysqli_fetch_assoc($result)) {
      $news_id = $row["news_id"];
      $titleNews = $row["title"];
      $thumbnailImageNews = $row["thumbnail_image"];
      $fullIimage = $row["full_image"];
      $headerNews = $row["header"];
      $shortDescriptionNews = $row["short_description"];
      $timeuploaded = $row["timestamp"];
      $contentNews = $row["content"];

       
        echo "<div class=\"data_feedback\"> 
        <img src='images/news/$thumbnailImageNews'>
          <div>
            <p>Title: $titleNews </p>
            <p>Description: $shortDescriptionNews </p>
            <p>Time Uploaded: $timeuploaded </p>
            <a href=\"news_see.php?news_id=$news_id\">See More >></a>
          </div>
        <div class=\"deleteButton\">
        <a href=\"delete_data/delete_news.php?news_id=$news_id\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>
        </div>

    </div>" ;
      }
} else {
  echo "No Data Found";
}
?>