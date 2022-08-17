<?php 
session_commit();
session_start();
					include "dm.php";
					include "cssforuser.php";

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) 
{
include "db_conn.php";

 // Create database connection
 
  // Initialize message variable
  $msg = "";
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_SESSION['id']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  //if postit button is clicked from the post area
  if (isset($_POST['postit'])) {
  	// Get image name
  	// Get text
  	$postext = mysqli_real_escape_string($db, $_POST['postext']);
  	$uid = $_SESSION['id'];
  	// image file directory

  	$sql1 = "INSERT INTO posts (post_text, timeuploaded, uploader_id) VALUES ('$postext', CURRENT_TIMESTAMP(), '$uid')";
  	// execute query
  	mysqli_query($db, $sql1);
  }


  $upid = $_SESSION['id'];
  $postid = $_GET['post_id'];
  $result = mysqli_query($db, "SELECT * FROM images WHERE image_text=$upid ORDER BY id desc LIMIT 1");
  $result1 = mysqli_query($db, "SELECT * FROM images WHERE image_text=$upid ORDER BY id desc LIMIT 1");
  $result2 = mysqli_query($db, "SELECT * FROM posts WHERE uploader_id=$upid ORDER BY timeuploaded desc");
  $result3 = mysqli_query($db, "SELECT * FROM posts WHERE post_id=$postid ORDER BY post_id desc");
 ?>
	<!DOCTYPE html>
		<html>
			<head>
				<title>HOME</title>
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" href="user7.css">
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
				<style>
					#content{
					   	width: 50%;
					   	margin: 20px auto;
					   	border: 1px solid #cbcbcb;
					   }
					   form{
					   	width: 50%;
					   	margin: 20px auto;
					   }
					   form div{
					   	margin-top: 5px;
					   }
					   #img_div{
											width: 200px;
											height: 200px;
											border-radius: 360px;
											background-repeat: no-repeat;
										    background-position: center;
										    background-size: 200px 200px;
										    overflow: hidden;
											background-image: url("photos/person.png");

					   }
					   #img_div:after{
					   	content: "";
					   	display: block;
					   	clear: both;
					   }
					   img{
					   	width: 200px;
											height: 200px;
											border-radius: 360px;
											background-repeat: no-repeat;
										    background-position: center;
										    background-size: 200px 200px;
										    overflow: hidden;
										    background-color: white;
					   }
			         td {
			         	height: 40px;
			         	width: 120px;
			         	border-radius: 10px;
			         }
			         table {

			         }
			         .error {
					   background: #F2DEDE;
					   color: #A94442;
					   padding: 10px;
					   text-align: center;
					   width: 20%;
					   border-radius: 5px;
					   margin: 0px auto;
					   margin-top: -40px;
					   position: absolute;
					   display: inline-block;
					   z-index: 1;
					}

					.success {
					   background: #D4EDDA;
					   color: #40754C;
					   padding: 10px;
					   text-align: center;
					   width: 20%;
					   border-radius: 5px;
					   margin: 0px auto;
					   margin-top: -40px;
					   position: absolute;
					   display: inline-block;
					   z-index: 1;
					}
					.modal-content1 {
					  position: relative;
					  background-color: #fefefe;
					  margin: auto;
					  padding: 0;
					  border: 1px solid #888;
					  width: 20%;
					  border-radius: 20px;
					  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
					  -webkit-animation-name: animatetop;
					  -webkit-animation-duration: 0.4s;
					  animation-name: animatetop;
					  animation-duration: 0.4s
					}
					#fixedHead {
						background-color: #c9c9c9;
						height: 100;
						width: 99%;
						border-radius: 10px;
						position: relative;
						padding-top: 10px;
						box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
						margin-bottom: 50px;
					}
					#opensecond {
						background-image: url("photos/admin.png");
					}
					#logout1 {
	border: solid white 3px;
	background-color: white;
	height: 80px;
	width: 80px;
	border-radius: 360px;
	background-image: url("photos/back.png");
	background-size: cover;
	background-repeat: no-repeat;
	background-position: center;
	float: left;
	font-family: verdana;
	cursor: pointer;
	margin-top: -50px;
	margin-left: 10px;
	position: relative;
	opacity: 0.8;
					}
				</style>
			</head>
			<body>
				<div id="fixedHead">
				    <button type="button" id="logout" onclick="document.location='logout.php'">Log<br>out</button>
						<div id="headgreet">
						     <p style="font-size: 15px; justify-content: center; font-weight: bold;">Hello, <?php echo $_SESSION['fname'];?> <?php echo $_SESSION['m_initial'];?>. <?php echo $_SESSION['lname']; ?></p>

					    </div>
					    <div  id="opensecond" style="float: right; width: 80px; height: 80px; margin-right: 20px; background-color: white; border-radius: 360px; border: solid black 1px; cursor: pointer;">
						     	  <?php
								    while ($row = mysqli_fetch_array($result)) {
								      echo "<div id='img_div' style='width: 80px; height: 80px; background-repeat: no-repeat; background-size: 80px 80px; background-position: center; cursor:pointer; box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);'>";
								      	echo "<img src='images/".$row['image']."'  style='width: 80px; height: 80px; background-repeat: no-repeat; background-size: 80px 80px; background-position: center; cursor: pointer;'>";
								      echo "</div>";
								    }
								  ?>
					    </div>
				    <div id="headgreet" style="float: left; width: 200px; margin-left: 20px;">
					     <p style="font-size: 18px; justify-content: center;">User ID: <?php echo $_SESSION['id']; ?></p>
				    </div>
				</div>

    			<button type="button" id="logout1" onclick="document.location='dashboard_user.php'"></button>

				<div id="firstmodal" class="firstmodal" style="display: none; position: absolute; width: 100%; z-index: 2;;">
					<center>
					  <!-- Modal content -->
					  <div class="modal-content1">
					    <div class="modal-header">
					      <span class="close" onclick="document.location='dashboard_user.php'" style="float: right; cursor: pointer; font-weight: bold; font-size: 40px;">&times;</span>
					      <h2>Edit Profile Picture</h2>
					    </div>
					    <div class="modal-body">
					    		
					    		  <form method="POST" action="dashboard_user.php" enctype="multipart/form-data">
								  	<input type="hidden" name="size" value="1000000">
									  	<div>
									  	  <input type="file" name="image">
									  	</div>
									  	<div>
									  		<button type="submit" name="upload">POST</button>
									  	</div>
								  </form>
					    </div>
					  	</div>
					</center>
				</div>
				<div id="secondmodal" class="secondmodal" style="display: none; position: absolute; width: 100%; z-index: 2;">
				<center>
				  <!-- Modal content -->
				  <div class="modal-content">
				    <div class="modal-header">
				      <span class="close_2" onclick="document.location='dashboard_user.php'" style="float: right; cursor: pointer; font-weight: bold; font-size: 40px;">&times;</span>

				      <h2 style="margin-left: 50px;">Profile Picture</h2>
				    </div>
				    <div class="modalbody2" style="padding-top: 30px; padding-bottom: 30px;">
				    	<div class="containbill">
				    		
				    		  <?php
							    if ($row = mysqli_fetch_array($result1)) {
							    	echo "<style>
												.upload {
													visibility: visible;
													background-color: #cccccc;
													  border: solid 2px black;
													  border-radius: 230px;
													  color: black;
													  width: 30px;
													  height: 30px;
													  text-align: center;
													  font-size: 16px;
													  opacity: 1;
													  transition: 0.3s;
													  cursor: pointer;
													  font-size: 30px;
													  background-image: url('photos/pen.jpg');
													  background-size: 30px 30px;
													  background-repeat: no-repeat;
													  background-position: center;
													  position: absolute;
													  float: right;
													  display: inline-block;
													  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
												}

													.upload .tooltiptext {
													  visibility: hidden;
													  width: 120px;
													  background-color: black;
													  color: #fff;
													  text-align: center;
													  border-radius: 6px;
													  padding: 5px 0;
													  font-size: 20px;
													  /* Position the tooltip */
													  position: absolute;
													  z-index: 1;
													  bottom: 100%;
													  left: 50%;
													  margin-left: -60px;
													}

													.upload:hover .tooltiptext {
													  visibility: visible;
													}
											</style>";
							      echo "<div id='img_div'><div class='upload' id='openfirst'><span class='tooltiptext'>Upload new photo</span></div>";
							      	echo "<img src='images/".$row['image']."'>";
							      echo "</div>";
							    }
							    else {
							    	echo "<style>
												.upload {
													visibility: visible;
													background-color: #cccccc;
													  border: solid 2px black;
													  border-radius: 230px;
													  color: black;
													  width: 30px;
													  height: 30px;
													  text-align: center;
													  font-size: 16px;
													  opacity: 1;
													  transition: 0.3s;
													  cursor: pointer;
													  font-size: 30px;
													  background-image: url('photos/pen.jpg');
													  background-size: 30px 30px;
													  background-repeat: no-repeat;
													  background-position: center;
													  position: absolute;
													  float: right;
													  display: inline-block;
													  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
												}

													.upload .tooltiptext {
													  visibility: hidden;
													  width: 120px;
													  background-color: black;
													  color: #fff;
													  text-align: center;
													  border-radius: 6px;
													  padding: 5px 0;
													  font-size: 20px;
													  /* Position the tooltip */
													  position: absolute;
													  z-index: 1;
													  bottom: 100%;
													  left: 50%;
													  margin-left: -60px;
													}

													.upload:hover .tooltiptext {
													  visibility: visible;
													}
											</style>";
							      echo "<div id='img_div'><div class='upload' id='openfirst'><span class='tooltiptext'>Upload new photo</span></div>";
							      	echo "<img src='images/".$row['image']."'>";
							      echo "</div>";
							    }
							  ?>

				    	</div>
				    		
				    </div>
				  </div>
				</center>
				</div>
				<center>
					<div style="height: 20px; width: 100%; margin-bottom: 40px; margin-left: -350px;">
					<?php if (isset($_GET['error'])) { ?>
	         		<p class="error"><?php echo $_GET['error']; ?></p>
		         	<?php } ?>

		            <?php if (isset($_GET['success'])) { ?>
		               <p class="success" id="myBtn3" style="cursor: pointer;"><?php echo $_GET['success']; ?></p>
		            <?php } ?>
		        	</div>
		        </center>

		        <center>
		        <div class="foreditpost" style="overflow-y: auto; overflow-x: hidden; height: 800px; width: 69%; border-radius: 20px; border: solid white 2px; padding-bottom: 250px;">
		        		<?php
							echo "<style>
									.lalagyanngoras {
										position: inline-block;
										width: auto;
										height: 20px;
										font-size: 15px;
										color: white;
										margin-left: 20px;
										background-color: #545454;
										border-radius: 10px;
										padding: 5px 5px 5px 5px;
										cursor: default;
										opacity: 0.9;
										z-index: 1;
									}
												.deleteit {
													  visibility: visible;
													  background-color: black;
													  border: solid white 3px;
													  border-radius: 230px;
													  color: black;
													  width: 30px;
													  height: 30px;
													  text-align: center;
													  font-size: 16px;
													  opacity: 1;
													  transition: 0.3s;
													  cursor: pointer;
													  font-size: 30px;
													  background-image: url('photos/trash.png');
													  background-size: 30px 30px;
													  background-repeat: no-repeat;
													  background-position: center;
													  position: inline-block;
													  float: left;
													  display: inline-block;
									}

													.deleteit .tooltiptext {
													  visibility: hidden;
													  width: 120px;
													  background-color: black;
													  color: #fff;
													  text-align: center;
													  border-radius: 6px;
													  padding: 5px 0;
													  font-size: 20px;
													  /* Position the tooltip */
													  position: absolute;
													  z-index: 1;
													  bottom: 100%;
													  left: 50%;
													  margin-left: -60px;
													}

													.deleteit:hover .tooltiptext {
													  visibility: visible;
													}
								 </style><center><table>";


				        	echo "<form method='post' action='updatenangpost.php' style='display=block;'>
				        				<center>
					        				<div>
										      <textarea 
										      	id='updatetext'
										      	cols='30'
										      	rows='10'
										      	name='updatetext'
										      	style='font-size: 20px; border-radius: 20px; margin-left: -80px; padding: 10px 0px 0px 10px; margin-top: 40px; text-align: center; font-size: 50px; height: auto; overflow-x:hidden; display: inline-block; z-index: 5;'
										      	>
										      	</textarea>
										      <input type='hidden' name='updatedid' value='$postid'></input>
										    <button type='submit' style='float: left; font-size: 50px; cursor: pointer; background-color:white; text-decoration:none; border-radius: 10px;'>Update</button>
										  	<button type='reset' style='float: right; font-size: 50px; cursor: pointer; margin-left: -80px; border-radius:10px; position: absolute;'>Reset</button>
										  	</div>

										</center>

				        	</form>"
				        	;
					    ?>
		        </div>
		    	</center>
								<script>
								// Get the modal
								var secondmodal = document.getElementById("secondmodal");
								var firstmodal = document.getElementById("firstmodal");
								var thirdmodal = document.getElementById("thirdmodal");

								// Get the button that opens the modal
								var opensecond = document.getElementById("opensecond");
								var openfirst = document.getElementById("openfirst");
								var openthird = document.getElementById("openthird");

								// When the user clicks the button, open the modal 
								opensecond.onclick = function() {
									secondmodal.style.display = "block";
								}
								openfirst.onclick = function() {
									firstmodal.style.display = "block";
									secondmodal.style.display = "none";
								}
								openthird.onclick = function() {
									thirdmodal.style.display = "block";
									thirdmodal.style.position = "absolute";
								}

								// When the user clicks anywhere outside of the modal, close it
								window.onclick = function(event) {
									if (event.target == secondmodal) {
										secondmodal.style.display = "none";
									}
								}
								window.onclick = function(event) {
									if (event.target == firstmodal) {
										firstmodal.style.display = "none";
									}
								}
								</script>


				<!--The code below is so that the user can't press the back button on the browswer, and the only way out
				is to press the logout button ctto-->
				<script>
				(function (global) {

					if(typeof (global) === "undefined")
					{
						throw new Error("window is undefined");
					}

				    var _hash = "!";
				    var noBackPlease = function () {
				        global.location.href += "#";

						// making sure we have the fruit available for juice....
						// 50 milliseconds for just once do not cost much (^__^)
				        global.setTimeout(function () {
				            global.location.href += "!";
				        }, 50);
				    };
					
					// Earlier we had setInerval here....
				    global.onhashchange = function () {
				        if (global.location.hash !== _hash) {
				            global.location.hash = _hash;
				        }
				    };

				    global.onload = function () {
				        
						noBackPlease();

						// disables backspace on page except on input fields and textarea..
						document.body.onkeydown = function (e) {
				            var elm = e.target.nodeName.toLowerCase();
				            if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
				                e.preventDefault();
				            }
				            // stopping event bubbling up the DOM tree..
				            e.stopPropagation();
				        };
						
				    };

				})(window);
				</script>
			</body>
		</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>