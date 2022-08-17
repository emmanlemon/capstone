// create references to the modal...
var modal = document.getElementById('myModal');
var modalImage = document.getElementById('modalImage');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");
// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
  modalImage.style.display = "none";
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
