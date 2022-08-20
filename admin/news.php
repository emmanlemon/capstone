<?php 
session_commit();
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) 
{
include "../db_conn.php";
$tryid = $_SESSION['id'];
$result6 = mysqli_query($db, "SELECT * FROM admin WHERE id='$tryid'");
    while ($row1 = mysqli_fetch_array($result6)) 
        {
              $_SESSION['username'] = $row1['username'];
              $_SESSION['name'] = $row1['name'];
              $_SESSION['position'] = $row1['position'];    
        }
?>

<!DOCTYPE html>
		<html>
			<head>
            <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
			      <title>Admin News Page</title>
            <link rel="stylesheet" type="text/css" href="css/announcement.css">
            <link rel="stylesheet" type="text/css" href="css/zoom_image.css">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>   
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <?php
                    include "molecule/header.php";
                ?>
			</head>
			<body>
            <div class="header" style="display: grid; place-items:center;">
        <h1 style="display:inline-block; text-transform:capitalize;">Welcome Our <?php echo $_SESSION['username'] ?></h1>
        <p>News Page</p>
    </div>
    <div class="announcement_title">
        <span>News</span>
        <span class="right"><button id="myBtn">Add News</button></span>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
    <span class="close" id=>&times;</span>
    <div class="create_announcement">
            <div class="title"><h3>Creating News</h3></div>
                <form runat="server" action="adding_data/upload_news.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" name="title" required aria-describedby="emailHelp" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                    <label for="header">Header:</label>
                        <input type="text" class="form-control" name="header" required placeholder="Enter Description">
                    </div>
                    <div class="form-group">
                    <label for="shortDescription">Short Description:</label>
                        <input type="text" class="form-control" name="shortDescription" required placeholder="Enter Short Description">
                    </div>
                    <div class="form-group">
                        <label for="content">Content Type</label>
                        <input type="text" class="form-control" name="content" required placeholder="Enter Description">
                    </div>

                    <!-- Adding Image -->
                    <div class="form-group">
                    <label class="form-label" for="thumbnail">Thumbnail Image:</label>
                        <input accept="image/*" type='file' name="thumbnail" id="thumbnail_id" required name="thumbnail"/>
                        <img class="myImages" id="img1" src="#" alt="No Image yet" style="width: 100%; height: 20vh; border-radius: 5px; object-fit: cover;">    
                    <div id="modalImage" class="modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img01">
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="form-label" for="fimage">Full Image:</label>
                        <input accept="image/*" type='file' name="fimage" id="fimage_id" required name="fimage"/>
                        <img class="myImages" id="img2" src="#" alt="No Image yet" style="width: 100%; height: 20vh; border-radius: 5px; object-fit: cover;">    
                    <div id="modalImage" class="modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img01">
                    </div>
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                </form>
    </div>
    </div>

    </div>

    <div class="container_announcement">
          <!--Search Box -->
          <div class="input-group" style="display: flex; justify-content:center; align-items:center;">
            <div class="input-group-append">
                <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i>Search Announcement</button>
              </div>
              <input type="search" placeholder="What're you searching for?" aria-describedby="button-addon1" class="form-control border-0 bg-light">
            </div>
            
               <!--Success Added News -->
               <?php if (isset($_GET['success'])) { ?>
        <div class="alert alert-success"><?php echo $_GET['success'];  echo '<script>alert("News has been successfully Added;")</script>'?></div>
          	<?php } ?>

             <!--Success Delete News -->
             <?php if (isset($_GET['deleted'])) { ?>
        <div class="alert alert-success"><?php echo $_GET['deleted'];  echo '<script>alert("News has been successfully deleted;")</script>'?></div>
          	<?php } ?>
            
            <!--End -->

            <?php include "show_data/news_show.php"; ?>
    </div>
    <?php include "molecule/footer.php"; ?>

    <script> 
    thumbnail_id.onchange = (event) => {
    const [file] = thumbnail_id.files
    if (file) {
        img1.src = URL.createObjectURL(file)
    }
    }
    fimage_id.onchange = (event) => {
    const [file] = fimage_id.files
    if (file) {
        img2.src = URL.createObjectURL(file)
    }
    }
    
      // create references to the modal...
var modal = document.getElementById('myModal');
var modalImage = document.getElementById('modalImage');
var close = document.getElementsByClassName('close');
// Get the button that opens the modal
var btn = document.getElementById("myBtn");
// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
close.onclick = function() {
  modal.style.display = "none";
}

// to all images -- note I'm using a class!
var images = document.getElementsByClassName('myImages');
// the image in the modal
var modalImg = document.getElementById("img01");
// and the caption in the modal
var captionText = document.getElementById("caption");

// Go through all of the images with our custom class
for (var i = 0; i < images.length; i++) {
  var img = images[i];
  // and attach our click listener for this image.
  img.onclick = function(evt) {
    modalImage.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  }
}

window.onclick = function(event) {
if (event.target == modalImage) {
    modalImage.style.display = "none";
    } 
    else if (event.target == modal) {
    modal.style.display = "none";
    } 
}






</script>
            </body>
            </html>
            <?php 
}
else{
     header("Location: index.php");
     exit();
}
 ?>