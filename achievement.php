<!DOCTYPE html>
	<html> 
		<head>
		<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/postLayout.css">
    <link rel="stylesheet" type="text/css" href="css/zoom_image.css">
    <link rel="stylesheet" type="text/css" href="css/js/calendar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
			<title>Speaker Eugenio Perez National Agricultural School</title>
			<?php
                include "molecule/header.php";
                include "loadscreen.php";
				        include "disablerightclick.php";
			?>
		</head>
        <body>
        <img src="images/sepnas.jpg" alt="" style="width: 100%; height: 350px; margin-top: 1.5%;">
    <div class="container_post">
    <div class="header">
  <h2>Achievements</h2>
</div>
    <div class="row">
  <div class="leftcolumn">
    <div class="card">
    <?php 
        include "db_conn.php";

         //Selecting the all post in achievement
        $sql = "SELECT * FROM achievement ORDER BY achievement_id desc";
        $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while ($row = mysqli_fetch_assoc($result)) {
              $achievement_id = $row["achievement_id"];
              $title= $row["title"];
              $thumbnailImage = $row["thumbnail_image"];
              $fullIimage = $row["full_image"];
              $headerAchievement = $row["header"];
              $shortDescriptionAchievement = $row["short_description"];
              $content = $row["content"];
              $postText = $row["post_text"];

              echo "
              <img src='admin/images/achievement/$thumbnailImage'>
              <h2>$title</h2>
              <p>$headerAchievement</p>
              <p>$shortDescriptionAchievement</p>
              <a href=\"#\">See More >></a>
              ";
          }
        }

        ?>
    </div>
  </div>


  <div class="rightcolumn">
    <div class="card">
      <h2>Upcoming Event</h2>
        <?php 
        include "db_conn.php";

        $sql = "SELECT * FROM upcoming_events ORDER BY event_id desc limit 1";
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
              $dateLayout = date_format($date,"Y/m/d");

              echo "
              <img src='admin/images/events/$thumbnailImageEvents'>
              <p>$headerEvents</p>
              <p>What: $shortDescriptionEvents</p>
              <p>When: $dateLayout</p>
              ";
          }
        }

        ?>
    </div>
            <div class="card">
            <h2>Campus Map</h2>
              <p>(Click picture to view)</p>
              <img src="images/gif/sepnas_map.png" alt="" id="myImg">
              <!-- The Modal -->
              <div id="myModal" class="modal">
                <!-- The Close Button -->
                <span class="close">&times;</span>
                <!-- Modal Content (The Image) -->
                <img class="modal-content" id="img01">
                <!-- Modal Caption (Image Text) -->
                <div id="caption"></div>
              </div>
            </div>
            <div class="card">
              <h2>Latest News</h2>
              <?php 
               $sql = "SELECT * FROM news ORDER BY news_id desc limit 2";
               $result = mysqli_query($db, $sql);
               if (mysqli_num_rows($result) > 0) {
                 // output data of each row
                 while ($row = mysqli_fetch_assoc($result)) {
                     $news_id = $row["news_id"];
                     $titleNews= $row["title"];
                     $thumbnailImageNews = $row["thumbnail_image"];
                     $fullIimage = $row["full_image"];
                     $headerNews = $row["header"];
                     $shortDescriptionNews = $row["short_description"];
                     $timeuploaded =  $row["timestamp"];
                     $contentNews = $row["content"];

                     echo "<div class=\"data_feedback\"> 
                     <img src='admin/images/news/$thumbnailImageNews'>
                       <div>
                         <p>Title: $titleNews</p>
                         <p>Description: $shortDescriptionNews </p>
                         <p>Time Uploaded: $timeuploaded </p>
                       </div>        
                 </div>";
                 }
             }
             ?>
            </div>
            <!-- <div class="card">
              <h3>Popular Post</h3>
              <div class="fakeimg">Image</div><br>
              <div class="fakeimg">Image</div><br>
              <div class="fakeimg">Image</div>
            </div>
            <div class="card">
              <h3>Follow Me</h3>
              <p>Some text..</p>
            </div> -->
          </div>
        </div>
    </div>
    <?php
                    include "molecule/footer.php";
                    ?>
    <script>
      // Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
if (event.target == modal) {
    modal.style.display = "none";
    } 
}

    </script>
        </body>
        </html>