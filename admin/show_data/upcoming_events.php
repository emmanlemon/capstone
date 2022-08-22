<?php
include "../db_conn.php";

$sql = "SELECT * FROM upcoming_events ORDER BY event_id desc";
$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while ($row = mysqli_fetch_assoc($result)) {
      $event_id = $row["event_id"];
      $titleEvents = $row["title"];
      $thumbnailImageEvents = $row["thumbnail_image"];
      $fullIImageEvents = $row["full_image"];
      $headerEvents = $row["header"];
      $shortDescriptionEvents = $row["short_description"];
      $contentEvents = $row["content"];
      $dateEvent = $row["date"];
      $date = date_create($dateEvent);
      $dateLayout = date_format($date,"d/m/Y");

       
        echo "<div class=\"data_feedback\"> 
        <img src='images/events/$thumbnailImageEvents'>
          <div>
            <p>Title: $titleEvents</p>
            <p>Description: $shortDescriptionEvents </p>
            <p>Time Uploaded: $dateLayout </p>
            <a href=\"events_see.php?events_id=$event_id\">See More >></a>
          </div>
        <div class=\"deleteButton\">
        <a href=\"delete_data/delete_upcoming_events.php?events_id=$event_id\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>
        </div>

    </div>" ;
      }
} else {
  echo "No Data Found";
}
?>