<?php 
session_commit();
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) 
{
include "db_conn.php";
				include "loadscreen.php";

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
  $result = mysqli_query($db, "SELECT * FROM images WHERE image_text=$upid ORDER BY id desc LIMIT 1");
  $result1 = mysqli_query($db, "SELECT * FROM images WHERE image_text=$upid ORDER BY id desc LIMIT 1");
  $result2 = mysqli_query($db, "SELECT * FROM posts WHERE uploader_id=$upid ORDER BY timeuploaded desc");


  if(isset($_POST['search']))
  	{
		  $tryid = $_POST['search'];
		  $result7 = mysqli_query($db, "SELECT * FROM users WHERE id='$tryid' OR fname='$tryid'");
		  		if(mysqli_num_rows($result7) <= 0) {
		  			header("Location: dashboard_user.php?error=No user found");
		  			exit();
		  		}
		  $result6 = mysqli_query($db, "SELECT * FROM users WHERE id='$tryid' OR fname='$tryid'");
		  	while ($row1 = mysqli_fetch_array($result6)) 
		  		{
		            	$sf = $row1['fname'];
		            	$sm = $row1['m_initial'];
		            	$sl = $row1['lname'];
		            	$sid = $row1['id'];
		            	$sw = $row1['wantoshare'];
		            	$sh = $row1['hobbies'];
		            	$si = $row1['interest'];
		            	$sfav = $row1['favourites'];
		            	$sa = $row1['achievements'];
		  		}
		  $result4 = mysqli_query($db, "SELECT * FROM images WHERE image_text='$tryid' OR imgforsearch='$tryid' ORDER BY id desc LIMIT 1");

  			$forgallery = mysqli_query($db, "SELECT * FROM imgforgallery WHERE image_text1='$tryid'");
  			$forgallery1 = mysqli_query($db, "SELECT * FROM imgforgallery WHERE image_text1='$tryid' OR picforsearch='$tryid'");


  			$foridandname = mysqli_query($db, "SELECT * FROM users WHERE fname='$tryid' OR id='$tryid'");
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

	} 
  ?>
	<!DOCTYPE html>
		<html>
			<head>
				<title>Search</title>
				<?php
					include "dm.php";
					include "cssforuser.php";
				?>
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
				</script>
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
	margin-top: 0px;
	margin-left: 10px;
	position: relative;
	opacity: 0.8;
	transition: 0.3s;
					}
					#logout {
						background-image: url("photos/logout.png");
						background-size: 36px 40px;
						background-repeat: no-repeat;
						background-position: center;
						padding: 15px 15px 15px 15px;
						height: 55px;
						transition: 0.3s;
					}
					#logout1:hover, #logout:hover {
						transform: scale(1.3);
					}

					}
					.gallerypica {
						transition: 0.4s;
					}
					.gallerypica:hover {
						transform: scale(1.2);
					}
					html {
						background-image: url('photos/bg5.jpg');
						height: 100%;	
						background-repeat: no-repeat;
						background-position: center;
						background-size: cover;
						font-family: "Lato", sans-serif;
						overflow: hidden;
					}
			         @media only screen and (max-width: 800px) {
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
					  #formforsearch, #containposts, #opensecond {
					  	display: none;
					  }
					  .hidethis {
					  	display: none;
					  }
					  #galleryarea {
					  	height: 750px;
					  }
					}
				</style>
			</head>
			<body>
				<div id="fixedHead">
				    <button type="button" id="logout" onclick="document.location='logout.php'"></button>
						<div id="headgreet">
						     <p style="font-size: 15px; justify-content: center; font-weight: bold;">Hello, <?php echo $_SESSION['fname'];?> <?php echo $_SESSION['m_initial'];?>. <?php echo $_SESSION['lname']; ?></p>

					    </div>
					    <div  id="opensecond" style="float: right; width: 80px; height: 80px; margin-right: 20px; background-color: white; border-radius: 360px; border: solid black 1px; cursor: pointer; transition: 0.3s;">
						     	  <?php
								    while ($row = mysqli_fetch_array($result)) {
								      echo "<div id='img_div' style='width: 80px; height: 80px; background-repeat: no-repeat; background-size: 80px 80px; background-position: center; cursor:pointer; box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);'>";
								      	echo "<img src='images/".$row['image']."'  style='width: 80px; height: 80px; background-repeat: no-repeat; background-size: 80px 80px; background-position: center; cursor: pointer;'>";
								      echo "</div>";
								    }
								  ?>
					    </div>
    			<button type="button" id="logout1" onclick="history.back()"></button>
				    <div id="headgreet" id="hgforresize" style="float: left; width: 200px; margin-left: 20px;">
					     <p style="font-size: 18px; justify-content: center;">User ID: <?php echo $_SESSION['id']; ?></p>
				    </div>
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

				<style>
					#l1 {
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
					#l1:hover, #l2:hover, #l3:hover {
						transform: scale(1.3);
					}

					#l2 {
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
					#l3 {
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
					#l1, #l2, #l3 {
						box-shadow: 0 22px 26px 0 rgba(0 ,0 , 0,0.5), 0 27px 100px 0 rgba(0 ,0 , 0,0.4);
					}
					.leftnavigate {
						position: absolute;
						border: solid black 2px;
						border-radius: 10px;
						float: left;
						width: 80px;
						height: 330px;
						background-color: #c9c9c9;
						padding: 20px 10px 20px 10px;
						opacity: 0.9;
						margin-top: 100px;
						z-index: 2;
						box-shadow: 0 22px 26px 0 rgba(0 ,0 , 0,0.6), 0 27px 60px 0 rgba(0 ,0 , 0,0.6);
					}
					#a1, #a5{
						background-color: green;
						display: inline-block;
						height: 20px;
						width: 20px;
						border-radius: 360px;
						float: right;
						margin-top: -10px;
						margin-right: -10px;
					}
					 #a2, #a3, #a5 {
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
					#containportfolio {
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
					#containbigpic {
						transition: 0.3s;
					}
					#containbigpic:hover {
						transform: scale(1.1);
					}

					.containposts::-webkit-scrollbar-thumb, #home::-webkit-scrollbar-thumb, .gallery::-webkit-scrollbar-thumb {
					  background-color: white;
					  border: 1px solid black;
					  border-radius: 25px;
					  background-clip: padding-box;  
						margin-right: : 50px;
						margin-top: 50px;
					}
					#home::-webkit-scrollbar {
					}

					.containposts::-webkit-scrollbar, #home::-webkit-scrollbar, .gallery::-webkit-scrollbar {
					  width: 16px;
					}
					.tdforport {
						text-align: center;
						width: 50%;
						padding: 50px 30px 50px 30px;
					}
					.tableforport {
						display: block;
						margin-top: 20vh;
					}

				</style>


				<div class="leftnavigate">
					<center>
						<div id="l1"><div id="a1"></div></div>
						<div id="l2"><div id="a2"></div></div>
						<div id="l3"><div id="a3"></div></div>
					</center>
				</div>

			<label class="switch" style="position: absolute; margin-top: 68vh; margin-left: 0px;">
			  <input type="checkbox" onclick="myFunction()">
			  <span class="slider round"></span>
			</label>

					<center>
						<div id="home" class="home" style="width: 80%; height: 1050px; background-color: transparent; border-radius: 20px; opacity: 0.9; z-index: 1; margin-top: -70px; overflow: auto;">

							<div id="containportfolio" style="background-color:  rgba(255,255,255,0.4);">
								<?php
								    echo "<center><p style='font-weight: bold; margin-top: 0px; opacity: 0.5; padding-top: 20px; margin-bottom: -40px;'>$sf's User ID :$meow</p></center>";
								?>
							    <div  id="containbigpic" style="float: left; width: 280px; height: 280px; margin: 20px 0px 0px 20px; background-color: white; border-radius: 60px; border: solid white 5px; cursor: pointer; background-color: black;">
								     	  <?php
										    while ($row = mysqli_fetch_array($result4)) {
										      echo "<div id='img_div' style='width: 280px; height: 280px; background-repeat: no-repeat; background-size: 280px 280px; background-position: center; cursor:pointer; box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19); border-radius: 60px;'>";
										      	echo "<img src='images/".$row['image']."'  style='width: 280px; height: 280px; background-repeat: no-repeat; background-size: 280px 280px; background-position: center; cursor: pointer; border-radius: 60px;'>";
										      echo "</div>";
										    }
										  ?>
							    </div>
							    <div id="nameko">
								    <p style="font-size: 5vw; font-family: serif; justify-content: center; font-weight: bold; color: white; background-color: black;"><?php echo "$sf";?> <?php echo "$sm";?>. <?php echo "$sl"; ?></p>
							    </div>
							    <center>
								    <table class="tableforport">
								    	<tr>
								    		<td class="tdforport">
								    			<div id="trivia" class="portc">
												    <p style="float: left; font-size: 4vw; font-family: courier; justify-content: center; font-weight: bold; color: grey; background-color: black; border-radius: 10px; border: solid white 6px; height: auto; width: 90%; margin-top: 50px; cursor: default;">Favorite Quote</br><b style="color: white; font-size: 2vw;">-"<?php echo "$sw";?>"</b></p>
											    </div>
								    		</td>
								    		<td class="tdforport">
								    			<div id="achievement" class="portc">
												    <p style="float: right; font-size: 4vw; font-family: courier; justify-content: center; font-weight: bold; color: grey; background-color: black; border-radius: 10px; border: solid white 6px; height: auto; width: 90%; margin-top: 50px; cursor: default;">Most memorable achievement</br><b style="color: white; font-size: 2vw;">-<?php echo "$sa";?></b></p>
											    </div>
								    		</td>
								    	</tr>
								    </table>
								    			<center>
												    <div id="containbigtext">
												    	<p style="font-size: 4vw; font-family: courier; justify-content: center; font-weight: bold; color: grey; background-color: white; border-radius: 10px; border: dotted black 6px; height: 35vh; width: 80%; margin-top: 50px; cursor: default; ">My hobbies:</br><b style="color: black; font-size: 3vw;"><?php echo "$sh";?></b></p>
												    </div>
												</center>	
								</center>
							    
							</div>
						</div>
					</center>

				<center>
					<div id="galleryarea" class="gallery" style="width: 70%; height: 650px; background-color:  rgba(255,255,255,0.4); border-radius: 20px; opacity: 1; z-index: -1; margin-top: -50px; overflow-y: auto; display: none; 
						box-shadow: 0 22px 26px 0 rgba(255 ,255 , 255,0.5), 0 27px 60px 0 rgba(255 ,255 , 255,0.4); border: solid black 1px;">
								

								  <div id="gallerypics" class="gallerypics" style="width: 99%; height: 500px; padding-top: 30px; padding-bottom: 200px;">
								  		  <?php
										    while ($row1 = mysqli_fetch_array($forgallery1)) {
										      echo "<div id='img_div' style='width: 280px; height: 280px; background-repeat: no-repeat; background-size: 280px 280px; background-position: center; cursor:pointer; box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19); border-radius: 10px; display: inline-block; margin: 10px 15px 10px 15px; '>";
										      	echo "<img class='gallerypica' src='gallery/".$row1['image']."'  style='width: 280px; height: 280px; background-repeat: no-repeat; background-size: cover; object-fit: cover; background-position: center; cursor: pointer; border-radius: 10px; transition: 0.4s'>";
										      echo "</div>";
										    }
										  ?>
								  </div>
					</div>
				</center>

				<div id="contact" class="contact" style="display: none;">
					<div class="postarea" style="float: left; margin-top: -110px;">
						<form method="POST" action="postupload.php" style="width: 50%; margin: 20px auto;">
									  	<div>
									      <textarea 
									      	id="text" 
									      	cols="40" 
									      	rows="4" 
									      	name="postext" 
									      	style="font-size: 20px; border-radius: 20px; margin-left: -80px; padding: 10px 0px 0px 10px; margin-top: 40px; text-align: center; box-shadow: 0 22px 26px 0 rgba(255 ,255 , 255,0.5), 0 27px 60px 0 rgba(255 ,255 , 255,0.4);"
									      	placeholder="Feel free to leave a feedback"></textarea>
									  	</div>
									  <center>
									  	<div>
									  		<?php echo "<input type='hidden' name='feedbackerid' value='$tryid'>"; ?>
									  		<button type="submit" id="poste" name="postitt" style="font-size: 30px; margin-top: -10px; float: right; z-index: 2; border-radius: 15px; background-image: url('photos/bg2.jpg'); color: white; border: solid white 1px; opacity: 0.9; cursor: pointer; ">POST</button>
									  	</div>
									  </center>

						<p style="color: white; margin-top: 64vh;">Contact us at: mcrojeemced@gmail.com</p>
								  </form>
					</div>

						<center>
							<div id="containposts1" class="containposts" style="margin-top: -50px; background-color:  rgba(255,255,255,0.3); float: right; margin-right: 10px; box-shadow: 0 22px 26px 0 rgba(255 ,255 , 255,0.5), 0 17px 20px 0 rgba(255 ,255 , 255,0.4);">
								<?php
									echo "<style>
											.lalagyanngposts {
												width: 4200px;
												height: 230px;
												border-radius: 10px;
												background-color: #303030;
												padding: 0px 40px 80px 40px;
												text-align: left;	
												margin-bottom: 80px;
												box-shadow: 10px 5px 10px 10px rgba(206, 206, 206, 0.8);
												cursor: default;
												opacity: 0.9;
												transition: 0.3s;
												font-size: 2vw;
											}
											.lalagyanngposts:hover {
												transform: scale(1.02);
											}
											.lalagyanngoras {
												position: absolute;
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
										 </style><table>";
								    while ($row = mysqli_fetch_array($result8)) {
								      echo "<tr style='display: block; margin-bottom: 50px;'><td class='lalagyanngoras'>".$row['timeuploaded']."</td>";
								      	echo "<td class='lalagyanngposts' style='color: white; margin-bottom: 50px;'>".$row['post_text']."</td>";
								      echo "</tr</table>";
							    	}
							    ?>
							</div>
						</center>
				</div>





						      	<!--
						      	echo "<td><a class='deleteit' href=\"deleteit.php?post_id=".$row['']."\"></a><a class='editit' href=\"editit.php?post_id=".$row['post_id']."\"></a></td>";-->
				
				
					<script type="text/javascript">
						var contact = document.getElementById("contact");
						var left3 = document.getElementById("l3");
						var active3 = document.getElementById("a3");
						var active1 = document.getElementById("a1");
						var home = document.getElementById("home");
						var gallery = document.getElementById("galleryarea");
						var left2 = document.getElementById("l2");
						var active2 = document.getElementById("a2");
						var left1 = document.getElementById("l1");

						left3.onclick = function() {
							home.style.display = "none",
							contact.style.display = "block",
							active1.style.display = "none",
							gallery.style.display = "none",
							active2.style.display = "none",
							active3.style.display = "block";
						}
						left2.onclick = function() {
							contact.style.display = "none",
							gallery.style.display = "block",
							active3.style.display = "none",
							home.style.display = "none",
							active1.style.display = "none",
							active2.style.display = "block";
						}
						left1.onclick = function() {
							contact.style.display = "none",
							gallery.style.display = "none",
							active3.style.display = "none",
							active2.style.display = "none",
							home.style.display = "block",
							active1.style.display = "block";
						}


						window.onclick = function(event) {
							if(event.target == contact) {
								contact.style.display = "none";
							}
						}
					</script>
				<!--The code below is so that the user can't press the back button on the browswer, and the only way out
				is to press the logout button ctto-->
			</body>
		</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>