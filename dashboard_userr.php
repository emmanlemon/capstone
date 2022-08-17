<?php 
session_commit();
session_start();
					include "dm.php";
				include "loadscreen.php";
				

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) 
{
include "db_conn.php";

 // Create database connection

  $tryid = $_SESSION['id'];
  $result6 = mysqli_query($db, "SELECT * FROM users WHERE id='$tryid'");
  	while ($row1 = mysqli_fetch_array($result6)) 
  		{
            	$_SESSION['user_name'] = $row1['user_name'];
            	$_SESSION['fname'] = $row1['fname'];
            	$_SESSION['m_initial'] = $row1['m_initial'];
            	$_SESSION['lname'] = $row1['lname'];
            	$_SESSION['id'] = $row1['id'];
            	$_SESSION['position'] = $row1['position'];
            	$_SESSION['wantoshare'] = $row1['wantoshare'];
            	$_SESSION['hobbies'] = $row1['hobbies'];
            	$_SESSION['interest'] = $row1['interest'];
            	$_SESSION['favourites'] = $row1['favourites'];
            	$_SESSION['achievements'] = $row1['achievements'];
  		}
  // Initialize message variable
  $msg = "";
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_SESSION['id']);
  	$nameforsearching = mysqli_real_escape_string($db, $_SESSION['fname']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO images (image, image_text, imgforsearch) VALUES ('$image', '$image_text', '$nameforsearching')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  if (isset($_POST['uploadtogallery'])) {
  	// Get image name
  	$image1 = $_FILES['gallery']['name'];
  	// Get text
  	$image_text1 = mysqli_real_escape_string($db, $_SESSION['id']);
  	$nameforsearching1 = mysqli_real_escape_string($db, $_SESSION['fname']);

  	// image file directory
  	$target = "gallery/".basename($image1);

  	$sql = "INSERT INTO imgforgallery (image, image_text1, picforsearch) VALUES ('$image1', '$image_text1', '$nameforsearching1')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['gallery']['tmp_name'], $target)) {
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
  $id = $upid;
  $result = mysqli_query($db, "SELECT * FROM images WHERE image_text=$upid ORDER BY id desc LIMIT 1");
  $result1 = mysqli_query($db, "SELECT * FROM images WHERE image_text=$upid ORDER BY id desc LIMIT 1");
  $result2 = mysqli_query($db, "SELECT * FROM posts WHERE uploader_id=$upid ORDER BY timeuploaded desc");
  $result3 = mysqli_query($db, "SELECT * FROM images WHERE image_text=$upid ORDER BY id");
  $result4 = mysqli_query($db, "SELECT * FROM images WHERE image_text=$upid ORDER BY id desc LIMIT 1");
  $result5 = mysqli_query($db, "SELECT * FROM images WHERE image_text=$upid ORDER BY id desc LIMIT 1");
  $forgallery = mysqli_query($db, "SELECT * FROM imgforgallery WHERE image_text1='$upid'");

  $foridandname = mysqli_query($db, "SELECT * FROM users WHERE fname='$id' OR id='$id'");
	  			if (mysqli_num_rows($foridandname) === 1) 
				{
					$row = mysqli_fetch_assoc($foridandname);
		            if ($row['id'] === $tryid) 
		            {
		            	$meow = $row['id'];
		            	$woof = $row['fname'];
		            }
		            else if ($row['fname'] === $tryid)
		            {
		            	$woof = $row['fname'];
		            	$meow = $row['id'];
		            }
		        }

  			$result8 = mysqli_query($db, "SELECT * FROM posts WHERE uploader_id='$meow' OR uploader_id='$woof' ORDER BY timeuploaded desc");
  			$result9 = mysqli_query($db, "SELECT * FROM posts ORDER BY post_id desc");


 ?>
	<!DOCTYPE html>
		<html>
			<head>
                <title>Home</title>
                <meta name="viewport" content="width=device-width, initial-scale=1">
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                <?php
                    include "admincss.php";
                ?>
			</head>
			<body>
				<div id="fixedHead">
				    <button class="sound3" type="button" id="logout" onclick="document.location='logout.php'"></button>
						<div id="headgreet" class="hidethis" style="display: inline-block;">
						     <p id="headname" style="font-size: 0.9vw; justify-content: center; font-weight: bold;">Hello, <?php echo $_SESSION['fname'];?> <?php echo $_SESSION['m_initial'];?>. <?php echo $_SESSION['lname']; ?></p>

					    </div>
					    <div class="sound3" id="opensecond" style="float: right; width: 80px; height: 80px; margin-right: 20px; background-color: white; border-radius: 360px; border: solid black 1px; cursor: pointer; transition: 0.3s;">
						     	  <?php
								    while ($row = mysqli_fetch_array($result)) {
								      echo "<div id='img_div' style='width: 80px; height: 80px; background-repeat: no-repeat; background-size: 80px 80px; background-position: center; cursor:pointer; box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);'>";
								      	echo "<img src='images/".$row['image']."'  style='width: 80px; height: 80px; background-repeat: no-repeat; background-size: 80px 80px; background-position: center; cursor: pointer;'>";
								      echo "</div>";
								    }
								  ?>
					    </div>

				    <div id="headgreet" style="float: left; width: 20vw; margin-left: 20px;">
					     <p style="font-size: 18px; justify-content: center;">User ID: <?php echo $_SESSION['id']; ?></p>
				    </div>
					    <div class="sound3 searchboox" style="display: inline-block; position: relative; width: 40%; float: left; padding-left: 180px;">
					    	<form method="post" id="formforsearch" action="search.php" style="margin-top: 5px;">
					    		<input type="search" required name="search" placeholder="Type the id or firstname of the person you want to find" style="width: 100%; border-radius: 10px; height: 50px; position: relative; font-size: 15px; display: inline-block; min-width: 200px; background-color: white; color: black; font-weight: bold;">
					    		<button id="logongsearch" type="submit" class="searchlogo" style="float: right; display: inline-block; position: absolute; height: 50px; width: 50px; cursor: pointer; border-radius: 360px;"></button>
					    		
					    	</form>
					    </div>


				</div>

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
									  	  <input type="file" required name="image">
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
					<div id="esmsg" style="height: 20px; width: 100%; margin-bottom: 40px; margin-left: -350px;">
					<?php if (isset($_GET['error'])) { ?>
	         			<p class="error"><?php echo $_GET['error']; ?></p>
		         	<?php } ?>

		            <?php if (isset($_GET['success'])) { ?>
		               <p class="success" id="myBtn3" style="cursor: pointer;"><?php echo $_GET['success']; ?></p>
		            <?php } ?>
		        	</div>
		        </center>

				<style>
					#lone {
						background-image: url("photos/home.png");
						background-size: 70px 70px;
						height: 70px;
						width: 70px;
						position: relative;
						border-radius: 10px;
						border: solid grey 2px;
						margin-bottom: 50px;
						transition: 0.4s;
						cursor: pointer;
						z-index: 2;
					}
					#lone:hover, #ltwo:hover, #lthree:hover {
						transform: scale(1.3);
					}

					#ltwo {
						background-image: url("photos/gallery.png");
						background-size: 70px 70px;
						height: 70px;
						width: 70px;
						position: relative;
						border-radius: 10px;
						border: solid grey 2px;
						margin-bottom: 50px;
						transition: 0.4s;
						cursor: pointer;
					}
					#lthree {
						background-image: url("photos/contact.png");
						background-size: 70px 70px;
						height: 70px;
						width: 70px;
						position: relative;
						border-radius: 10px;
						border: solid grey 2px;
						margin-bottom: 50px;
						transition: 0.4s;
						cursor: pointer;
					}
					#lone, #ltwo, #lthree {
						box-shadow: 0 22px 26px 0 rgba(0 ,0 , 0,0.5), 0 27px 100px 0 rgba(0 ,0 , 0,0.4);
					}
					.navleft {
						position: absolute;
						border: solid black 2px;
						border-radius: 10px;
						float: left;
						width: 80px;
						height: 330px;
						background-color: #c9c9c9;
						padding: 20px 10px 20px 10px;
						opacity: 0.9;
						margin-top: -50px;
						z-index: 2;
						box-shadow: 0 22px 26px 0 rgba(0 ,0 , 0,0.6), 0 27px 60px 0 rgba(0 ,0 , 0,0.6);
					}
					#active1, #active4{
						background-color: green;
						display: inline-block;
						height: 20px;
						width: 20px;
						border-radius: 360px;
						float: right;
						margin-top: -10px;
						margin-right: -10px;
					}
					 #active2, #active3, #active5 {
						background-color: green;
						display: inline-block;
						height: 20px;
						width: 20px;
						border-radius: 360px;
						float: right;
						margin-top: -10px;
						margin-right: -10px;
						display: none;
					}
					#active4, #active5 {
						border: solid white 4px;
					}
					#displayportfolio, #editportfolio,  #announcement {
						width: 20%;
						height: 20px;
						font-size: 20px;
						color: black;
						background-color: white;
						display: inline-block;
						border-radius: 10px;
						margin: 30px 50px 10px 50px;
						cursor: pointer;
						text-align: center;
						padding: 10px 10px 10px 10px;
						transition: 0.4s;
						position: relative;
						box-shadow: 0 22px 26px 0 rgba(255 ,255 , 255,0.3), 0 27px 100px 0 rgba(255 ,255 , 255,0.3);

					}
					#displayportfolio:hover, #editportfolio:hover, #announcement:hover {
						transform: scale(1.1);
					}
					#containdportf {
						width: 90%;
						display: block;
						height: 2000px;
						background-color: #9e9e9e;
						margin-top: 20px;
						border-radius: 30px;
						border: solid black 1px;
						margin-bottom: 450px;
						box-shadow: 0 22px 26px 0 rgba(255 ,255 , 255,0.5), 0 27px 60px 0 rgba(255 ,255 , 255,0.4);
					}
					#containeportf {
						width: 90%;
						display: block;
						height: 2000px;
						background-color: #9e9e9e;
						margin-top: 20px;
						border-radius: 30px;
						border: solid black 1px;
						margin-bottom: 100px;
						display: none;
						margin-bottom: 450px;
						box-shadow: 0 22px 26px 0 rgba(255 ,255 , 255,0.5), 0 27px 60px 0 rgba(255 ,255 , 255,0.4);
					}
					#containbigpic {
						transition: 0.3s;
					}
					#containbigpic:hover {
						transform: scale(1.1);
					}
					#navforhome {
						margin-top: -50px;
						margin-bottom: 50px;
					}

					.containposts::-webkit-scrollbar-thumb, #homearea::-webkit-scrollbar-thumb, .gallery::-webkit-scrollbar-thumb {
					  background-color: white;
					  border: 1px solid black;
					  border-radius: 25px;
					  background-clip: padding-box;  
						margin-right: : 50px;
						margin-top: 50px;
					}
					#homearea::-webkit-scrollbar {
					}

					.containposts::-webkit-scrollbar, #homearea::-webkit-scrollbar, .gallery::-webkit-scrollbar {
					  width: 16px;
					}
					.tdforport {
						text-align: center;
						width: 50vw;
						padding: 50px 30px 50px 30px;
					}
					.tableforport {
						display: block;
						margin-top: 5vh;
					}

				</style>

                <style>
					
			         @media only screen and (max-width: 1500px) {

					  #headgreet {
			         	height: 50px;
			         	min-width: 10%;
			         	font-size: 5px;
			         	position: sticky;
			         	display: block;
			         	margin-top: 0px;
					  }
					  #containposts1 {
					  	display: none;
					  }
					  #dmswitch {
					  	display: none;
					  }
					  .hidethis {
					  	display: none;
					  }
					  #galleryarea {
					  	height: 750px;
					  }
                      .navleft {
                          margin-left: -3vw;
                          position: absolute;
                          top: 57%;
                          background-color: white;
                      }
					}


					@media only screen and (max-width: 360px) {
					  
					  #headname {
					  	display: none;
					  }
                      #fixedHead {
                          height: 13vh;
                      }
                        #lone {
                            background-image: url("photos/home.png");
                            background-size: 70px 70px;
                            height: 70px;
                            width: 70px;
                            position: relative;
                            border-radius: 10px;
                            border: solid grey 2px;
                            margin-bottom: 50px;
                            transition: 0.4s;
                            cursor: pointer;
                            z-index: 2;
                        }
                        #lone:hover, #ltwo:hover, #lthree:hover {
                            transform: scale(1.3);
                        }

                        #ltwo {
                            background-image: url("photos/gallery.png");
                            background-size: 70px 70px;
                            height: 70px;
                            width: 70px;
                            position: relative;
                            border-radius: 10px;
                            border: solid grey 2px;
                            margin-bottom: 50px;
                            transition: 0.4s;
                            cursor: pointer;
                        }
                        #lthree {
                            background-image: url("photos/contact.png");
                            background-size: 70px 70px;
                            height: 70px;
                            width: 70px;
                            position: relative;
                            border-radius: 10px;
                            border: solid grey 2px;
                            margin-bottom: 50px;
                            transition: 0.4s;
                            cursor: pointer;
                        }
                        #lone, #ltwo, #lthree {
                            box-shadow: 0 22px 26px 0 rgba(0 ,0 , 0,0.5), 0 27px 100px 0 rgba(0 ,0 , 0,0.4);
                            display: inline-block;
                            height: 45px;
                            width: 45px;
                            background-size: 45px 45px;
                            margin-left: 20px; 
                            margin-right: 20px;
                        }
                        .navleft {
                            position: absolute;
                            border: solid black 2px;
                            border-radius: 10px;
                            width: 95vw;
                            height: 40px;
                            background-color: #c9c9c9;
                            padding: 20px 10px 20px 10px;
                            margin-top: 37vh;
                            z-index: 2;
                            box-shadow: 0 22px 26px 0 rgba(0 ,0 , 0,0.6), 0 27px 60px 0 rgba(0 ,0 , 0,0.6);
                        }
                        #active1, #active4{
                            background-color: green;
                            display: inline-block;
                            height: 20px;
                            width: 20px;
                            border-radius: 360px;
                            float: right;
                            margin-top: -10px;
                            margin-right: -10px;
                        }
                        #active2, #active3, #active5 {
                            background-color: green;
                            display: inline-block;
                            height: 20px;
                            width: 20px;
                            border-radius: 360px;
                            float: right;
                            margin-top: -10px;
                            margin-right: -10px;
                            display: none;
                        }
                        #active4, #active5 {
                            border: solid white 4px;
                        }
                        #displayportfolio, #editportfolio, #announcement {
                            width: 20%;
                            height: 20px;
                            font-size: 20px;
                            color: black;
                            background-color: white;
                            display: inline-block;
                            border-radius: 10px;
                            margin: 30px 50px 10px 50px;
                            cursor: pointer;
                            text-align: center;
                            padding: 10px 10px 10px 10px;
                            transition: 0.4s;
                            position: relative;
                            box-shadow: 0 22px 26px 0 rgba(255 ,255 , 255,0.3), 0 27px 100px 0 rgba(255 ,255 , 255,0.3);
                            margin-top: 10px;

                        }
                        #displayportfolio:hover, #editportfolio:hover, #announcement:hover {
                            transform: scale(1.1);
                        }
                        #containdportf {
                            width: 96%;
                            display: block;
                            height: 2000px;
                            background-color: #9e9e9e;
                            margin-top: 20px;
                            border-radius: 30px;
                            border: solid black 1px;
                            margin-bottom: 450px;
                            box-shadow: 0 22px 26px 0 rgba(255 ,255 , 255,0.5), 0 27px 60px 0 rgba(255 ,255 , 255,0.4);
                        }
                        #containeportf {
                            width: 90%;
                            display: block;
                            height: 2000px;
                            background-color: #9e9e9e;
                            margin-top: 20px;
                            border-radius: 30px;
                            border: solid black 1px;
                            margin-bottom: 100px;
                            display: none;
                            margin-bottom: 450px;
                            box-shadow: 0 22px 26px 0 rgba(255 ,255 , 255,0.5), 0 27px 60px 0 rgba(255 ,255 , 255,0.4);
                        }
                        #containbigpic {
                            transition: 0.3s;
                            width: 50px;
                            height: 50px;;
                        }
                        #containbigpic:hover {
                            transform: scale(1.1);
                        }
                        #navforhome {
                            top: 40%;
                            right: 50%;
                            position: absolute;
                            display: inline-block;
                            margin-top: -80px;
                            margin-bottom: 50px;
                        }

                        .containposts::-webkit-scrollbar-thumb, #homearea::-webkit-scrollbar-thumb, .gallery::-webkit-scrollbar-thumb {
                        background-color: white;
                        border: 1px solid black;
                        border-radius: 25px;
                        background-clip: padding-box;  
                            margin-right: : 50px;
                            margin-top: 50px;
                        }
                        #homearea::-webkit-scrollbar {
                        }

                        .containposts::-webkit-scrollbar, #homearea::-webkit-scrollbar, .gallery::-webkit-scrollbar {
                        width: 16px;
                        }
                        .tdforport {
                            text-align: center;
                            width: 50vw;
                            padding: 50px 30px 50px 30px;
                        }
                        .tableforport {
                            display: block;
                            margin-top: 5vh;
                        }
                        #formforsearch {
                            display: none;
                            margin-right: 50px;
                            margin-left: -150px;
                        }
                        #galleryform {
                            font-size: 10px;
                        }
					}
				</style>

            <center>
				<div class="navleft">
					<center>
						<div class="sound2" id="lone"><div id="active1"></div></div>
						<div class="sound2" id="ltwo"><div id="active2"></div></div>
						<div class="sound2" id="lthree"><div id="active3"></div></div>
					</center>
				</div>
            </center>

			<label id="dmswitch" class="switch" style="position: absolute; margin-top: 68vh; margin-left: 0px;">
			  <input type="checkbox" onclick="myFunction()">
			  <span class="slider round"></span>
			</label>

            <div class="containspace">
				<div id="navforhome" style="margin-top: -110px;">
					<center>
						<div class="sound3" id="displayportfolio" style="z-index: 1;">Announcements<div id="active4" style="margin-top: -20px; margin-right: -20px;"></div></div>
						<div class="sound3" id="announcement" style="z-index: 1;">Articles<div id="active5" style="margin-top: -20px; margin-right: -20px;"></div></div>
						<div class="sound3" id="editportfolio" style="z-index: 1;">Posts<div id="active5" style="margin-top: -20px; margin-right: -20px;"></div></div>
					</center>
				</div>
				<center>
					<div id="homearea" class="home" style="width: 90%; height: 1050px; background-color: transparent; border-radius: 20px; opacity: 0.9; z-index: 1; margin-top: -50px; overflow: auto; ">


							<div id="containdportf" style="background-color: rgba(255,255,255,0.3);">
								
							    <div class="sound3"  id="containbigpic" style="float: left; width: 180px; height: 180px; margin: 20px 0px 0px 20px; background-color: white; border-radius: 60px; border: solid white 5px; cursor: pointer; background-color: black;">
								     	  <?php
										    while ($row = mysqli_fetch_array($result4)) {
										      echo "<div id='img_div' style='width: 180px; height: 180px; background-repeat: no-repeat; background-size: 180px 180px; background-position: center; cursor:pointer; box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19); border-radius: 60px;'>";
										      	echo "<img src='images/".$row['image']."'  style='width: 180px; height: 180px; background-repeat: no-repeat; background-size: 180px 180px; background-position: center; cursor: pointer; border-radius: 60px;'>";
										      echo "</div>";
										    }
										  ?>
							    </div>
								<div id="nameko">
								    <p id="nameresize1" style="font-size: 5vw; font-family: serif; justify-content: center; font-weight: bold; color: white; background-color: black;"><?php echo $_SESSION['fname'];?> <?php echo $_SESSION['m_initial'];?>. <?php echo $_SESSION['lname']; ?></p>
							    </div>

							    <center>
								    <table class="tableforport">
								    	<tr id="forthetronresize">
								    		<td class="tdforport">
								    			<div id="trivia" class="portc">
												    <p style="float: left; font-size: 2vw; font-family: courier; justify-content: center; font-weight: bold; color: white; background-color: black; border-radius: 10px; border: solid white 6px; height: auto; margin-top: 50px; cursor: default;"><b style="color: grey; font-size: 4vw;">Favorite Quote</b></br>-"<?php echo $_SESSION['wantoshare'];?>"</p>
											    </div>
								    		</td>
								    		<td class="tdforport">
								    			<div id="achievement" class="portc">
												    <p style="float: right; font-size: 2vw; font-family: courier; justify-content: center; font-weight: bold; color: white; background-color: black; border-radius: 10px; border: solid white 6px; height: auto;  margin-top: 50px; cursor: default;"><b style="color: grey; font-size: 4vw;">Most memorable achievement</b></br>-<?php echo $_SESSION['achievements'];?></p>
											    </div>
								    		</td>
								    	</tr>
								    </table>
								    			<center>
												    <div id="containbigtext">
												    	<p style="font-size: 3vw; font-family: courier; justify-content: center; font-weight: bold; color: black; background-color: white; border-radius: 10px; border: dotted black 6px; height: 35vh; width: 80%; margin-top: 50px; cursor: default; height: 50vh; "><b style="color: grey; font-size: 4vw;">My hobbies:</b></br><?php echo $_SESSION['hobbies'];?></p>
												    </div>
												</center>	
								</center>
							    
							</div>

							<div id="containeportf" style="background-color: rgba(255,255,255,0.3);">
						        	<form action="updateportf.php" method="post">
						        		<div  id="containbigpic" style="float: left; width: 180px; height: 180px; margin: -60px 0px 0px 20px; background-color: white; border-radius: 60px; border: solid white 5px; cursor: pointer; background-color: black; margin-top: 5px;">
								     	  <?php
										    while ($row = mysqli_fetch_array($result5)) {
										      echo "<div id='img_div' style='width: 180px; height: 180px; background-repeat: no-repeat; background-size: 180px 180px; background-position: center; cursor:pointer; box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19); border-radius: 60px;'>";
										      	echo "<img src='images/".$row['image']."'  style='width: 180px; height: 180px; background-repeat: no-repeat; background-size: 180px 180px; background-position: center; cursor: pointer; border-radius: 60px;'>";
										      echo "</div>";
										    }
										  ?>
									    </div>
										<div id="nameko2">
										    <p id="nameresize2" style="font-size: 5vw; font-family: serif; justify-content: center; font-weight: bold; color: white; background-color: black;"><?php echo $_SESSION['fname'];?> <?php echo $_SESSION['m_initial'];?>. <?php echo $_SESSION['lname']; ?></p>
									    </div>
						    	<center>
								    <table class="tableforport">
								    	<tr>
								    		<td class="tdforport">
											    <div id="wantoshare">
												    <p style="float: left; font-size: 4vw; font-family: courier; justify-content: center; font-weight: bold; color: grey; background-color: black; border-radius: 10px; border: solid white 6px; height: auto; width: 90%; margin-top: 50px; margin-left: 0px;">Favorite Quote</br><b style="font-size: 2vw;">-<input type="text" name="wantoshare" value="<?php echo $_SESSION['wantoshare'];?>" style="font-size: 2vw; font-family: courier; justify-content: center; font-weight: bold; color: black; background-color: white; border-radius: 10px; width: 90%; text-align: center; height: auto; margin-bottom: 20px;" ></b></p>
											    </div>
											</td>
											<td class="tdforport">
											    <div id="achievements">
												    <p style="float: right; font-size: 4vw; font-family: courier; justify-content: center; font-weight: bold; color: grey; background-color: black; border-radius: 10px; border: solid white 6px; height: auto; width: 90%; margin-top: 50px; margin-right: 0px;">Most memorable achievement</br><b style="font-size: 2vw;">-<input type="text" name="achievements" value="<?php echo $_SESSION['achievements'];?>" style="font-size: 2vw; font-family: courier; justify-content: center; font-weight: bold; color: black; background-color: white; border-radius: 10px; width: 90%; text-align: center; height: auto; margin-bottom: 20px;" ></b></p>
											    </div>
											</td>
										</tr>
									</table>
										<center>
										    <div id="hobbies">
										    	<p style="font-size: 4vw; font-family: courier; justify-content: center; font-weight: bold; color: black; background-color: transparent; border-radius: 10px; border: dotted white 6px; width: 80%; margin-top: 50px;">My hobbies:</br><textarea rows="10" style="width: 99%; border-radius: 10px; height: 35vh; font-size: 3vw;" type="text" name="hobbies" placeholder="<?php echo $_SESSION['hobbies'];?>" ></textarea></p>
										    </div>
										</center>
										<?php
											$_SESSION['id'] = $_SESSION['id'];
										?>
										<div style="margin-top: -5vh; z-index: 5;">
											<button type="submit" style="font-size: 3vw; margin: 10px 30px 10px 30px;">Update</button>
											<button type="reset" style="font-size: 3vw; margin: 10px 30px 10px 30px;">Reset</button>
										</div>
						        	</form>
							</div>
					</div>
				</center>
            </div>
				<center>
					<div id="galleryarea" class="gallery" style="width: 70%; height: 690px; background-color: rgba(255,255,255,0.4); border-radius: 20px; opacity: 0.9; z-index: -1; margin-top: -50px; overflow-y: auto; margin-bottom: 300px; box-shadow: 0 22px 26px 0 rgba(255 ,255 , 255,0.5), 0 27px 60px 0 rgba(255 ,255 , 255,0.4); border: solid black 1px; overflow-x: hidden;">
								<!-- This will be used to upload images for the gallery-->
									  <form id="galleryform" method="POST" action="uploadtogallery.php" enctype="multipart/form-data" style="border: solid black 5px; border-radius: 15px; margin: 20px 40px 0px 40px; padding-bottom: 20px; background-color: black;">
									  	<input type="hidden" name="size" value="1000000">
										  	<div>
										  	  <input type="file" required name="gallery" style="font-family: serif; font-size: 30px; margin-top: 50px; border-radius: 10px; color: white">
										  	</div>
										  	<div>
										  		<button class="sound3" type="submit" name="uploadtogallery" id="gallerybttn" style="font-family: serif; font-size: 30px; margin-top: 50px; border-radius: 10px; cursor: pointer;">Upload</button>
										  	</div>
									  </form>

								  <div id="gallerypics" class="gallerypics" style="width: 99%; height: 500px; padding-top: 30px; padding-bottom: 200px;">
								  		  <?php
								  		  	echo "<style>
														.deletepic {
															border-radius: 230px;
															width: 30px;
															height: 30px;
															transition: 0.3s;
															cursor: pointer;
															background-image: url('photos/trash.png');
															background-size: 30px 30px;
															background-repeat: no-repeat;
															background-positioncenter;
															float: right;
															display: inline-block;
															z-index: 4;;
															background-color: black;
														}



								  		  		</style>";
										    while ($row1 = mysqli_fetch_array($forgallery)) {
										      echo "<div class='sound3' style='display: inline-block; margin-bottom: 50px;'><div style='width: 180px; height: 180px; background-repeat: no-repeat; background-size: 180px 180px; background-position: center; cursor:pointer; box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19); border-radius: 10px; display: inline-block; margin: 10px 15px 10px 15px; '><img class='gallerypica' src='gallery/".$row1['image']."'  style='width: 180px; height: 180px; background-repeat: no-repeat; background-size: cover; object-fit: cover; background-position: center; cursor: pointer; border-radius: 10px;'><a class='deletepic' href=\"deletepic.php?gallery_id=".$row1['gallery_id']."\"></div></a></div>";
								      			
										    }
										  ?>
								  </div>
					</div>
				</center>


		        <div id="contactarea" class="contact">
                
						<center>
							<iframe src="/documentpage.php" id="containposts" class="containposts" style="margin-top: -50px; background-color:  rgba(255,255,255,0.3); box-shadow: 0 22px 26px 0 rgba(255 ,255 , 255,0.5), 0 17px 20px 0 rgba(255 ,255 , 255,0.4);">
                            
                                            <script>
                                                document.addEventListener("DOMContentLoaded", function(event) { 
                                                    var scrollpos = localStorage.getItem('scrollpos');
                                                    if (scrollpos) window.scrollTo(0, scrollpos);
                                                });

                                                window.onbeforeunload = function(e) {
                                                    localStorage.setItem('scrollpos', window.scrollY);
                                                };
                                            </script>
							</iframe>
						</center>
                </div>




                <?php include "sfx.php";?>

				
				

			
			
			<!--The code above is so that the user can't press the back button on the browswer, and the only way out
				is to press the logout button-->

					<!-- The Modal -->


				
								<script>
								// Get the modal
								var secondmodal = document.getElementById("secondmodal");
								var firstmodal = document.getElementById("firstmodal");
								var contact = document.getElementById("contactarea");
								var active3 = document.getElementById("active3");
								var lthree = document.getElementById("lthree");
								var gallery = document.getElementById("galleryarea");
								var home = document.getElementById("homearea");
								var displayport = document.getElementById("containdportf");
								var editport = document.getElementById("containeportf");
								var navhome = document.getElementById("navforhome");
								var displayportactive = document.getElementById("active4");
								var editportactive = document.getElementById("active5");
								var dcwhenp = document.getElementById("feedbackpost");

								// Get the button that opens the modal
								var opensecond = document.getElementById("opensecond");
								var openfirst = document.getElementById("openfirst");
								var openc = document.getElementById("lthree");
								var openg = document.getElementById("ltwo");
								var openh = document.getElementById("lone");
								var opendf = document.getElementById("displayportfolio");
								var openef = document.getElementById("editportfolio");

								// When the user clicks the button, open the modal 
								opensecond.onclick = function() {
									secondmodal.style.display = "block";
								}
								openfirst.onclick = function() {
									firstmodal.style.display = "block";
									secondmodal.style.display = "none";
								}
								//opens contact 
								openc.onclick = function() {
									contact.style.display = "block",
									active3.style.display = "block",
									gallery.style.display = "none",
									active2.style.display = "none",
									home.style.display = "none",
									navhome.style.display = "none",
									active1.style.display = "none";
								}
								//opens gallery
								openg.onclick = function() {
									gallery.style.display = "block",
									active2.style.display = "block",
									active3.style.display = "none",
									contact.style.display = "none",
									home.style.display = "none",
									navhome.style.display = "none",
									active1.style.display = "none";
								}
								//opens home
								openh.onclick = function() {
									gallery.style.display = "none",
									active2.style.display = "none",
									active3.style.display = "none",
									contact.style.display = "none",
									active1.style.display = "block",
									navhome.style.display = "block",
									home.style.display = "block";
								}
								openef.onclick = function() {
									editport.style.display = "block";
									displayport.style.display = "none";
									displayportactive.style.display = "none";
									editportactive.style.display = "block";
								}
								opendf.onclick = function() {
									displayport.style.display = "block";
									editport.style.display = "none";
									displayportactive.style.display = "block";
									editportactive.style.display = "none";
								}
								dcwhenp.onclick = function() {
									contact.style.display = "block";
									active3.style.display = "block";
									gallery.style.display = "none";
									active2.style.display = "none";
									home.style.display = "none";
									active1.style.dispaly = "none";
									navhome.style.display = "none";
									opendf.style.display = "none";
									openef.style.display = "none";
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
								window.onclick = function(event) {
									if(event.target == contact) {
										contact.style.display = "none";
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
}
else{
     header("Location: index.php");
     exit();
}
 ?>