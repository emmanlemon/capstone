<?php 
session_commit();
session_start();
					include "dm.php";
				include "loadscreen.php";
				

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) 
{
include "db_conn.php";
    if($_SESSION['position']=== "user") {
        header("Location: dashboard_user.php");
    }

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
				    <button class="sound2" type="button" id="logout" onclick="document.location='logout.php'"></button>
						<div id="headgreet" class="hidethis" style="display: inline-block;">
						     <p id="headname" style="font-size: 0.9vw; justify-content: center; font-weight: bold;">Hello, <?php echo $_SESSION['fname'];?> <?php echo $_SESSION['m_initial'];?>. <?php echo $_SESSION['lname']; ?></p>

					    </div>
					    <div class="sound2" id="opensecond" style="float: right; width: 80px; height: 80px; margin-right: 20px; background-color: white; border-radius: 360px; border: solid black 1px; cursor: pointer; transition: 0.3s;">
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
					    <div style="display: inline-block; position: relative; width: 40%; float: left; padding-left: 180px;">
					    	<form method="post"id="formforsearch" action="search.php" style="margin-top: 5px;">
					    		<input type="search" required name="search" placeholder="Type the id or firstname of the person you want to find" style="width: 100%; border-radius: 10px; height: 50px; position: relative; font-size: 15px; display: inline-block; min-width: 200px; background-color: white; color: black; font-weight: bold;">
					    		<button id="logongsearch" type="submit" class="sound2 searchlogo" style="float: right; display: inline-block; position: absolute; height: 50px; width: 50px; cursor: pointer; border-radius: 360px;"></button>
					    		
					    	</form>
					    </div>


				</div>

				<div id="firstmodal" class="firstmodal" style="display: none; position: absolute; width: 100%; z-index: 2;;">
					<center>
					  <!-- Modal content -->
					  <div class="modal-content1">
					    <div class="modal-header">
					      <span class="close" onclick="document.location='dashboard_admin.php'" style="float: right; cursor: pointer; font-weight: bold; font-size: 40px;">&times;</span>
					      <h2>Edit Profile Picture</h2>
					    </div>
					    <div class="modal-body">
					    		
					    		  <form method="POST" action="dashboard_admin.php" enctype="multipart/form-data">
								  	<input type="hidden" name="size" value="1000000">
									  	<div>
									  	  <input required type="file" name="image">
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
				      <span class="close_2" onclick="document.location='dashboard_admin.php'" style="float: right; cursor: pointer; font-weight: bold; font-size: 40px;">&times;</span>

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
						background-size: cover;
                        background-position: center;
						height: 70px;
						width: 100%;
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
						background-size: cover;
                        background-position: center;
						height: 70px;
						width: 100%;
						position: relative;
						border-radius: 10px;
						border: solid grey 2px;
						margin-bottom: 50px;
						transition: 0.4s;
						cursor: pointer;
					}
					#lthree {
						background-image: url("photos/contact.png");
						background-size: cover;
                        background-position: center;
						height: 70px;
						width: 100%;
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
                        left: 94%;
						width: 4vw;
						height: 40vh;
						background-color: #c9c9c9;
						padding: 5px;
						opacity: 0.9;
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
                          margin-left: 0vw;
                          left: 94%;
                          width: 4vw;
						padding: 5px;
                          position: absolute;
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
                            left: 0%;
                            width: 90vw;
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
                        #navforhome {
                            top: 40%;
                            right: 50%;
                            position: absolute;
                            display: inline-block;
                            margin-top: -80px;
                            margin-bottom: 50px;
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
                    @media only screen and (max-width: 962px) {
					  
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
                            left: 0%;
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
                        #navforhome {
                            top: 40%;
                            right: 50%;
                            position: absolute;
                            display: inline-block;
                            margin-top: -80px;
                            margin-bottom: 50px;
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

            <style>
                .modal {
                    display: none; /* Hidden by default */
                    position: fixed; /* Stay in place */
                    z-index: 1; /* Sit on top */
                    padding-top: 100px; /* Location of the box */
                    left: 0;
                    top: 0;
                    width: 100%; /* Full width */
                    height: 100%; /* Full height */
                    overflow: auto; /* Enable scroll if needed */
                    background-color: rgb(0,0,0); /* Fallback color */
                    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
                    }

                    /* Modal Content */
                .modal-content {
                    background-color: #fefefe;
                    margin: auto;
                    padding: 20px;
                    height: 50%;
                    border: 1px solid #888;
                    width: 80%;
                    }

                    /* The Close Button */
                .close {
                    color: #aaaaaa;
                    float: right;
                    font-size: 28px;
                    font-weight: bold;
                    }

                .close:hover,
                .close:focus {
                    color: #000;
                    text-decoration: none;
                    cursor: pointer;
                    }
            </style>

            <center>
                <div style="background-color: rgba(255,255,255,0.3); height: 85vh; width: 95vw; border-radius: 10px; margin-top: -100px;">
                    <div>

                <style> 
                    #myBtn1, #myBtn2, #myBtn3 {
                        background-size: cover; background-repeat: no-repeat; background-position: center; margin-left: 3%; margin-right: 3%; height: 25vh; width: 14vw; display: inline-block;                              background-color: white; border-radius: 35px; padding: 40px; background-origin: content-box; transition: 0.4s; cursor: pointer;
                    }
                    #myBtn1:hover, #myBtn2:hover, #myBtn3:hover {
                        transform: scale(1.1);
                    }
                    .layout1 {
                        height: 116.9px;
                        margin-top: 10vh;
                        width: 82.5px;
                        border-radius: 10px;
                        color: transparent;
                        background-color: black;
                        display: inline-block;
                        cursor: pointer;
                        padding: 10px;
                        transition: 0.4s;
                        margin-left: 8vw;
                        margin-right: 8vw;
                        -webkit-transform: scaleX(2) scaleY(2);
                        -moz-transform: scaleX(2) scaleY(2);
                    }
                    .layout1:hover {
                        border: solid red 2px;
                        margin-top: 15vh;
                        transform: scale(6);
                    }
                        #flyt {
                        padding: 0px;
                            background-image: url("photos/layout1.png");
                        }
                        #slyt {
                            background-image: url("photos/layout2.png");
                        }
                        #tlyt {
                            background-image: url("photos/layout3.png");
                        }
                        #flyt, #slyt, #tlyt {
                            background-size: cover;
                            background-repeat: no-repeat;
                            background-origin: content-box;
                            background-position: center;
                        }
                    
					@media only screen and (max-width: 360px){
                        #myBtn1, #myBtn2, #myBtn3 {
                            height: 10vh;
                        }
                        body {
                            padding-top: 2vh;
                        }
                        .layout1 {
                            -webkit-transform: scaleX(1) scaleY(1);
                            -moz-transform: scaleX(1) scaleY(1);
                            margin-top: 1vh;
                            marign-left: 0px;
                            margin-right: 0px;
                            left: 0%;
                            right: 0%;
                            display: inline-block;
                        }
                        .layout1:hover {
                            margin-top: -2vh;
                            transform: scale(2);
                        }
                        .modal-content {
                            display: inline-block;
                            height: 40%;
                        }
                        #flyt, #slyt, #tlyt {
                            margin-left: -5vw;
                            margin-right: -5vw;
                        }
                        #slyt, #tlyt {
                            margin-left: 6vw;
                        }
                        h1 {
                            margin-top: 1vh;

                        }
                        .tip {
                            margin-top: -3vh;
                        }
                    }
                    @media only screen and (max-width: 962px) {
                        #myBtn1, #myBtn2, #myBtn3 {
                            height: 10vh;
                        }
                        body {
                            padding-top: 2vh;
                        }
                        .layout1 {
                            -webkit-transform: scaleX(1) scaleY(1);
                            -moz-transform: scaleX(1) scaleY(1);
                            margin-top: 1vh;
                            marign-left: 0px;
                            margin-right: 0px;
                            left: 0%;
                            right: 0%;
                            display: inline-block;
                        }
                        .layout1:hover {
                            margin-top: -2vh;
                            transform: scale(2);
                        }
                        .modal-content {
                            display: inline-block;
                            height: 40%;
                        }
                        #flyt, #slyt, #tlyt {
                            margin-left: -5vw;
                            margin-right: -5vw;
                        }
                        #slyt, #tlyt {
                            margin-left: 6vw;
                        }
                        h1 {
                            margin-top: 1vh;

                        }
                        .tip {
                            margin-top: -3vh;
                        }
                    }
                </style>

                    <div id="soundhaha">
                        <div id="myBtn1" class="soundhaha" style="margin-top: 100px; background-image: url('gallery/announcement.png');"></div>
                        <div id="myBtn2" class="soundhaha" style="background-image: url('gallery/article.png');"></div>
                        <div id="myBtn3" class="soundhaha" style="background-image: url('gallery/post.png');"></div>
                    </div>

                    <!-- Simple pop-up dialog box, containing a form -->
                    <div id="myModal" class="modal">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close" onclick="document.location.href='dashboard_admin.php'">&times;</span>
                            
                            <h1>Choose Announcement layout:</h1>
                            <p class="tip">tip: long press layout to zoom</p>
                            <form method="post" action="uploadnew.php">
                                <input type="hidden" value="announcement" name="type"></input>
                                <input type="submit" name="layout" value="layout1" class="layout1 sound2" id="flyt"/>
                                <input type="submit" name="layout" value="layout2" class="layout1 sound2" id="slyt"/>
                                <input type="submit" name="layout" value="layout3" class="layout1 sound2" id="tlyt"/>
                            </form>
                        </div>
                    </div>
                    <div id="myModal2" class="modal">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close" onclick="document.location.href='dashboard_admin.php'">&times;</span>
                            <h1>Choose Article layout:</h1>
                            <p class="tip">tip: long press layout to zoom</p>
                            <form method="post" action="uploadnew.php">
                                <input type="hidden" value="article" name="type"></input>
                                <input type="submit" name="layout" value="layout1" class="layout1 sound2" id="flyt"/>
                                <input type="submit" name="layout" value="layout2" class="layout1 sound2" id="slyt"/>
                                <input type="submit" name="layout" value="layout3" class="layout1 sound2" id="tlyt"/>
                            </form>
                            </form>
                        </div>
                    </div>
                    <div id="myModal3" class="modal">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close" onclick="document.location.href='dashboard_admin.php'">&times;</span>
                            <h1>Choose Post layout:</h1>
                            <p class="tip">tip: long press layout to zoom</p>
                            <form method="post" action="uploadnew.php">
                                <input type="hidden" value="post" name="type"></input>
                                <input type="submit" name="layout" value="layout1" class="layout1 sound2" id="flyt"/>
                                <input type="submit" name="layout" value="layout2" class="layout1 sound2" id="slyt"/>
                                <input type="submit" name="layout" value="layout3" class="layout1 sound2" id="tlyt"/>
                            </form>
                            </form>
                        </div>
                    </div>

                    <?php include "sfx.php";?>


                    <script>
                    // Get the modal
                    var modal = document.getElementById("myModal");
                    var modal2 = document.getElementById("myModal2");
                    var modal3 = document.getElementById("myModal3");

                    // Get the button that opens the modal
                    var btn = document.getElementById("myBtn1");
                    var btn2 = document.getElementById("myBtn2");
                    var btn3 = document.getElementById("myBtn3");

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];

                    // When the user clicks the button, open the modal 
                    btn.onclick = function() {
                    modal.style.display = "block";
                    } 
                    btn2.onclick = function() {
                    modal2.style.display = "block";
                    } 
                    btn3.onclick = function() {
                    modal3.style.display = "block";
                    }

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                    modal.style.display = "none";
                    modal2.style.display = "none";
                    modal3.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                        if (event.target == modal2) {
                            modal2.style.display = "none";
                        }
                        if (event.target == modal3) {
                            modal3.style.display = "none";
                        }
                    }
                    </script>
                </div>
            </center>

			<label id="dmswitch" class="switch" style="position: absolute; margin-top: 68vh; margin-left: 0px;">
			  <input type="checkbox" onclick="myFunction()">
			  <span class="slider round"></span>
			</label>

				

			
			
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
								var navhome = document.getElementById("navforhome");
								var displayportactive = document.getElementById("active4");
								var editportactive = document.getElementById("active5");

								// Get the button that opens the modal
								var opensecond = document.getElementById("opensecond");
								var openfirst = document.getElementById("openfirst");
								var openc = document.getElementById("lthree");
								var openg = document.getElementById("ltwo");
								var openh = document.getElementById("lone");

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