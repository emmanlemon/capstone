<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
    <link rel="stylesheet" href="css/gallery.css">
    <link rel="stylesheet" href="css/zoom_image.css">

    <title>Speaker Eugenio Perez National Agricultural School</title>
</head>
<body>
<?php
                    include "molecule/header.php";
                ?>
<img src="images/sepnas.jpg" alt="" style="width: 100%; height: 350px; margin-top: 1.5%;">
    <div class="container_gallery">
        <span class="title">Campus Gallery</span>
        <div class="gallery">
            <img class="myImages" src="Images/campus_gallery/sepnas1.jpg" alt="">
            <img class="myImages" src="Images/campus_gallery/sepnas2.jpg" alt="">
            <img class="myImages" src="Images/campus_gallery/sepnas3.jpg" alt="">
            <img class="myImages" src="Images/campus_gallery/sepnas4.jpg" alt="">
            <img class="myImages" src="Images/campus_gallery/sepnas5.jpg" alt="">
            <img class="myImages" src="Images/campus_gallery/sepnas6.jpg" alt="">
            <img class="myImages" src="Images/campus_gallery/sepnas7.jpg" alt="">
            <img class="myImages" src="Images/campus_gallery/sepnas8.jpg" alt="">
            <img class="myImages" src="Images/campus_gallery/sepnas9.jpg" alt="">
            <img class="myImages" src="Images/campus_gallery/sepnas10.jpg" alt="">
            <img class="myImages" src="Images/campus_gallery/sepnas11.jpg" alt="">
            <img class="myImages" src="Images/campus_gallery/sepnas12.jpg" alt="">
            <img class="myImages" src="Images/campus_gallery/sepnas13.jpg" alt="">
            <img class="myImages" src="Images/campus_gallery/sepnas14.jpg" alt="">
            <img class="myImages" src="Images/campus_gallery/sepnas15.jpg" alt="">
            <img class="myImages" src="Images/campus_gallery/sepnas16.jpg" alt="">
            <img class="myImages" src="Images/campus_gallery/sepnas17.jpg" alt="">
            <img class="myImages" src="Images/campus_gallery/sepnas18.jpg" alt="">
            <img class="myImages" src="Images/campus_gallery/sepnas19.jpg" alt="">
            <img class="myImages" src="Images/campus_gallery/sepnas20.jpg" alt="">
            <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
            </div> 
        </div>
    </div>

    <script> 
    var modal = document.getElementById('myModal');

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
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }
    }

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
    <?php include "molecule/footer.php"; ?>
</body>
</html>
