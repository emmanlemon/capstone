<?php 
session_commit();
session_start();
					include "dm.php";
				include "loadscreen.php";
				

if (isset($_POST['type']) && isset($_POST['layout'])) 
{
    $type = $_POST['type'];
    $layout = $_POST['layout'];
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
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">
                <meta name="viewport" content="width=device-width, initial-scale=1">
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                <?php
                    include "admincss.php";
                ?>

                <style>
                    body {
                        overflow: hidden;
                        overflow-y: visible;
                    }
                    html {
                        background-color: black;
                    }
                    
                        .layout1 {
                            width: 793.70px;
                            height: 1122.52px;
                            color: black;
                            border-radius: 15px;
                            background-color: rgba(255,255,255,0.9);
                            display: inline-block;
                            cursor: pointer;
                            padding: 40px;
                            transition: 0.4s;
                            transform: scale(1.4);
                            margin-top: 30%;
                            margin-bottom: 50vh;
                            z-index: 2;
                        }
                        .newcntrl {
                            z-index: 3;
                            margin-top: -5vh;
                            position: absolute;
                            width: 94vw; 
                            height: 17vh; 
                            background-color: white; 
                            border-radius: 20px;
                            padding: 20px;
                        }
                        .containthumbnail {
                            background-color: cyan;
                            width: 30vw;
                            display: inline-block;
                            float: left;
                            height: 60%;
                            border-radius: 25px;
                            padding: 30px;
                        }
                        #blah {
                            border-radius: 5px;
                            background-color: white;
                            border: solid black 2px;
                            height: 100px;
                            background-position: center;
                            background-repeat: no-repeat;
                            width: 100px;
                            margin: 10px;
                            transform: scale(1.3);
                        }
                        .layoutcontent {
                            font-family: "Trirong", serif;
                        }

                    @media only screen and (max-width: 1500px) {
                        .layout1 {
                            transform: scale(0.3);
                            margin-top: -350px;
                            margin-bottom: 30px;
                            margin-left: -230px;
                            overflow-y: hidden;
                        }
                        
                        .newcntrl {
                            height: 10vh; 
                        }
					}
                </style>
			</head>
			<body>
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
			<label id="dmswitch" class="switch" style="position: absolute; top: 82vh; margin-left: 0px;">
			  <input type="checkbox" onclick="myFunction()">
			  <span class="slider round"></span>
			</label>

            <?php 
                if($_POST["layout"]==="layout1") 
                    {
            ?>
            <form runat="server" method="post" action="uploadtogallery.php" enctype="multipart/form-data" >
                <center>
                    <div class="newcntrl">
                        <div class="containthumbnail">
							<input type="hidden" name="size" value="1000000">
							<input type="hidden" name="type" value="<?php echo $type?>">
							<input type="hidden" name="layout" value="<?php echo $layout?>">
                            <div style="float: left;">
                                <input accept="image/*" type='file' id="imgInp" required name="thumbnail"/>
                                <h1 style="position: relative;">1. Select a thumbnail</h1>
                            </div>
                        </div>

                        <div style="position: absolute; left: 40%; right: 40%; background-color: black; color: white; width: 20vw; height: 60%; padding: 15px; border-radius: 20px; font-weight: bolder; font-size: 20px;">
                            <?php echo "<p style='color: red;'>Note: </p>Content-Type: $type  </br>Layout-Type: $layout"; ?>
                        </div>
                        
                        <div class="containthumbnail" style="float: right; background-color: burlywood; dislay: inline-block; padding: 15px; height: 80%">
                            <div style="float: left; background-color: transparent; height: 100%; ">
                                <img id="blah" src="#" alt="No thumbnail" />
                            </div>
                            <div style="float: right; background-color: transparent; height: 100%; width: 70%;">
                                <input type="text" name="post_header" required placeholder="Header goes here" style="font-size: 30px; width: 93%; font-weight: bold;" />
                                <input type="text" name="post_description" required placeholder="Short description goes here" style="font-size: 15px; width: 93%; height: 60%;" />
                            </div>
                        </div>
                        <script>
                            imgInp.onchange = evt => {
                                const [file] = imgInp.files
                                if (file) {
                                    blah.src = URL.createObjectURL(file)
                                }
                                }
                        </script>
									<!--<div>
										<input type="file" name="gallery" style="font-family: serif; font-size: 30px; margin-top: 50px; border-radius: 10px; color: white">
									</div>
									<div>
										<button type="submit" name="uploadtogallery" id="gallerybttn" style="font-family: serif; font-size: 30px; margin-top: 50px; border-radius: 10px;                                                        cursor: pointer;">Upload</button>
									</div>-->
                    </div>
                </center>

                <!--This is the a4 like container where we the contents of the article will be placed-->
                <center>
                    <div class="layout1">
                        <h1 style="position: absolute; margin-top: -10vh; margin-left: -3vh; color: white;">3. Fill out the page</h1>
                        <input type="text" required class="layoutcontent" placeholder="Big title goes here" name="contentheader" style="font-size: 4vw; height: 13%;">

                        <div style="background-color: pink; margin-top: 5%; width: 96%; height: 20%; border-radius: 5px; object-fit: cover; border: solid black 2px;">
                            <img id="blah2" src="#" alt="No image yet" style="background-color: pink;width: 100%; height: 20vh; border-radius: 5px; object-fit: cover;">
                                <input type="hidden" name="size2" value="1000000">
                                    <input accept="image/*" type='file' required id="imgInp2" name="fimage"/>
                            </img>
                        </div>
                        <div style="background-color: pink; float: left; margin-left: 2%; margin-top: 5%; width: 24%; height: 60%; border-radius: 5px; object-fit: cover; border: solid black 2px;">
                            <img id="blah3" src="#" alt="No image yet" style="background-color: pink; width: 100%; height: 100%; border-radius: 5px; object-fit: cover;">
                                <input type="hidden" name="size3" value="1000000">
                                    <input accept="image/*" type='file' required id="imgInp3" name="simage"/>
                            </img>
                        </div>
                        <div style="background-color: pink; float: right; margin-right: 2%; margin-top: 5%; width: 64%; height: 60%; border-radius: 5px; object-fit: cover; border: solid black 2px;">
                            <textarea required name="text1" cols="40" rows="5" style="width: 95%; height: 95%; border-radius: 5px; object-fit: cover; text-indent: 10%; white-space: pre-wrap;"></textarea>
                        </div>

                        
                        <script>
                            imgInp2.onchange = evt => {
                                const [file] = imgInp2.files
                                if (file) {
                                    blah2.src = URL.createObjectURL(file)
                                }
                                }
                            imgInp3.onchange = evt => {
                                const [file] = imgInp3.files
                                if (file) {
                                    blah3.src = URL.createObjectURL(file)
                                }
                                }
                        </script>
                    <input type="submit" name="uploadfromadmin">
                    </div>
                </center>
            </form>
            
            <!--If the layout type is layout2 then this will be displayed-->
            <?php 
                }   if($_POST["layout"]==="layout2") 
                {
            ?>
            <form runat="server" method="post" action="uploadform.php">
                <center>
                    <div class="newcntrl">
                        <div class="containthumbnail">
							<input type="hidden" name="size" value="1000000">
                            <div style="float: left;">
                                <input accept="image/*" type='file' id="imgInp" name="gallery"/>
                                <h1 style="position: relative;">1. Select a thumbnail</h1>
                            </div>
                        </div>

                        <div style="position: absolute; left: 40%; right: 40%; background-color: black; color: white; width: 20vw; height: 60%; padding: 15px; border-radius: 20px; font-weight: bolder; font-size: 20px;">
                            <?php echo "<p style='color: red;'>Note: </p>Content-Type: $type  </br>Layout-Type: $layout"; ?>
                        </div>
                        
                        <div class="containthumbnail" style="float: right; background-color: burlywood; dislay: inline-block; padding: 15px; height: 80%">
                            <div style="float: left; background-color: transparent; height: 100%; ">
                                <img id="blah" src="#" alt="No thumbnail" />
                            </div>
                            <div style="float: right; background-color: transparent; height: 100%; width: 70%;">
                                <input type="text" name="post_header" placeholder="Header goes here" style="font-size: 30px; width: 93%; font-weight: bold;" />
                                <input type="text" name="post_description" placeholder="Short description goes here" style="font-size: 15px; width: 93%; height: 60%;" />
                            </div>
                        </div>
                        <script>
                            imgInp.onchange = evt => {
                                const [file] = imgInp.files
                                if (file) {
                                    blah.src = URL.createObjectURL(file)
                                }
                                }
                        </script>
									<!--<div>
										<input type="file" name="gallery" style="font-family: serif; font-size: 30px; margin-top: 50px; border-radius: 10px; color: white">
									</div>
									<div>
										<button type="submit" name="uploadtogallery" id="gallerybttn" style="font-family: serif; font-size: 30px; margin-top: 50px; border-radius: 10px;                                                        cursor: pointer;">Upload</button>
									</div>-->
                    </div>
                </center>

                <center>
                    <div class="layout1" style="background-color: cyan;">
                    </div>
                </center>
            </form>
            
            <?php 
                }   if($_POST["layout"]==="layout3") 
                {
            ?>
            <form runat="server" method="post" action="uploadform.php">
                <center>
                    <div class="newcntrl">
                        <div class="containthumbnail">
							<input type="hidden" name="size" value="1000000">
                            <div style="float: left;">
                                <input accept="image/*" type='file' id="imgInp" name="gallery"/>
                                <h1 style="position: relative;">1. Select a thumbnail</h1>
                            </div>
                        </div>

                        <div style="position: absolute; left: 40%; right: 40%; background-color: black; color: white; width: 20vw; height: 60%; padding: 15px; border-radius: 20px; font-weight: bolder; font-size: 20px;">
                            <?php echo "<p style='color: red;'>Note: </p>Content-Type: $type  </br>Layout-Type: $layout"; ?>
                        </div>
                        
                        <div class="containthumbnail" style="float: right; background-color: burlywood; dislay: inline-block; padding: 15px; height: 80%">
                            <div style="float: left; background-color: transparent; height: 100%; ">
                                <img id="blah" src="#" alt="No thumbnail" />
                            </div>
                            <div style="float: right; background-color: transparent; height: 100%; width: 70%;">
                                <input type="text" name="post_header" placeholder="Header goes here" style="font-size: 30px; width: 93%; font-weight: bold;" />
                                <input type="text" name="post_description" placeholder="Short description goes here" style="font-size: 15px; width: 93%; height: 60%;" />
                            </div>
                        </div>
                        <script>
                            imgInp.onchange = evt => {
                                const [file] = imgInp.files
                                if (file) {
                                    blah.src = URL.createObjectURL(file)
                                }
                                }
                        </script>
									<!--<div>
										<input type="file" name="gallery" style="font-family: serif; font-size: 30px; margin-top: 50px; border-radius: 10px; color: white">
									</div>
									<div>
										<button type="submit" name="uploadtogallery" id="gallerybttn" style="font-family: serif; font-size: 30px; margin-top: 50px; border-radius: 10px;                                                        cursor: pointer;">Upload</button>
									</div>-->
                    </div>
                </center>

                <center>
                    <div class="layout1" style="background-color: pink;">
                    </div>
                </center>
            </form>
            
            <?php 
                }
            ?>
				

			
			</body>
		</html>


<?php 
}
else{
     header("Location: dashboard_admin.php");
     exit();
}
 ?>