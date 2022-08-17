<?php
include "../db_conn.php";

$sql = "SELECT * FROM posts ORDER BY post_id desc";
$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $post_id = $row["post_id"];
        $timeuploaded = $row["timeuploaded"];
        $thumbnail = $row["thumbnail"];
        $fimage = $row["fimage"];
        $simage =  $row["simage"];
        $header = $row["header"];
        $short_description = $row["short_description"];
        $description = $row["description"];
        $post_text = $row["post_text"];
    

       
        echo "<div class=\"data_feedback\"> 
        <img src='images/announcement/$thumbnail'>
          <div>
            <p>Title: $header</p>
            <p>Description: $short_description </p>
            <p>Time Uploaded: $timeuploaded </p>
            <a href=\"announcement_see.php?announcement_id=$post_id\">See More >></a>
          </div>
        <div class=\"deleteButton\">
        <a href=\"delete_data/delete_announcement.php?announcement_id=$post_id\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>
        </div>

    </div>" ;
      }
} else {
  echo "No Data Found";
}
?>