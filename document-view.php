<?php 
session_commit();
session_start();
				include "loadscreen.php";
				

include "db_conn.php";

if(isset($_GET['post_id'])) {
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

    $docid = $_GET['post_id']; // $id is now defined

    // or assuming your column is indeed an int
    // $id = (int)$_GET['id'];

  $fordocument = mysqli_query($db,"SELECT * FROM posts WHERE post_id='".$docid."'");

  			$result8 = mysqli_query($db, "SELECT * FROM posts WHERE uploader_id='$meow' OR uploader_id='$woof' ORDER BY timeuploaded desc");


 ?>
	<!DOCTYPE html>
		<html>
			<head>
                <title>Home</title>
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">
                <meta name="viewport" content="width=device-width, initial-scale=1">
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <style>
            /* width */
            ::-webkit-scrollbar {
            width: 10px;
            }
            * {
                text-overflow: ellipsis;
            }

            /* Track */
            ::-webkit-scrollbar-track {
            background: #f1f1f1; 
            border-radius: 10px;
            }
            
            /* Handle */
            ::-webkit-scrollbar-thumb {
            background: #888; 
            border-radius: 10px;
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
            background: #555; 
            }
            </style>

                <style>
                    body {
                        overflow: hidden;
                        overflow-y: visible;
                        background-image: none;
                    }
                    html {
                        background-color: transparent;
                    }
                    #logout {
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
                        margin-top: 10px;
                        margin-left: 10px;
                        position: fixed;
                        transition: 0.4s;
                        opacity: 0.8;
                    }
                    #logout:hover {
                        background-color: white;
                        transform: scale(1.1);
                        transition: transform 0.3s;
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
                            width: 793.70px;
                            height: 1122.52px;
                            color: black;
                            border-radius: 15px;
                            background-color: rgba(255,255,255,0.9);
                            display: inline-block;
                            cursor: pointer;
                            padding: 40px;
                            transition: 0.4s;
                            transform: scale(1.2);
                            margin-top: 5%;
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
					}
                </style>
			</head>
			<body>
                
    			<button type="button" id="logout" onclick="document.location.href='documentpage.php'"></button>
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

            <?php 
                        while($row = mysqli_fetch_array($fordocument)) {
            ?>
                <!--This is the a4 like container where we the contents of the article will be placed-->
                <center>
                    <div class="layout1">
                        <div class="layoutcontent" style="font-size: 6vw; height: 13%; font-weight: bolder; font-family: serif;"><?php echo "". $row['bigheader'] ."" ?></div>
                        
                        <div style="background-color: pink; width: 96%; height: 20%; border-radius: 5px; object-fit: cover; border: solid black 2px; background-size: cover;">
                        <?php echo " <img id='blah2' src='gallery/".$row['fimage']."' alt='No image uploaded' style='background-color: pink;width: 100%; height: 100%; border-radius: 5px; object-fit: cover;'>
                            </img>";
                        ?>
                        </div>
                        <div style="background-color: pink; float: left; margin-left: 2%; margin-top: 5%; width: 24%; height: 60%; border-radius: 5px; object-fit: cover; border: solid black 2px;">
                        <?php echo " <img id='blah2' src='gallery/".$row['simage']."' alt='No image uploaded' style='background-color: pink;width: 100%; height: 100%; border-radius: 5px; object-fit: cover;'>
                            </img>";
                        ?>
                        </div>
                        <div style="background-color: pink; float: right; margin-right: 2%; margin-top: 5%; width: 64%; height: 60%; border-radius: 5px; object-fit: cover; border: solid black 2px;">                          <?php echo "". $row['post_text'] ."" ?>
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
                    </div>
                </center>

                
                
                <style>

                /* Button used to open the chat form - fixed at the bottom of the page */
                .open-button {
                background-color: #555;
                color: white;
                border-radius: 20px;
                padding: 16px 20px;
                border: none;
                cursor: pointer;
                opacity: 1;
                position: fixed;
                bottom: 90%;
                right: 28px;
                width: 10vw;
                }

                /* The popup chat - hidden by default */
                .chat-popup {
                display: block;
                position: fixed;
                bottom: 35%;
                border-radius: 10px;
                right: 15px;
                height: 60vh;
                padding: 10px;
                background-color: white;
                color: black;
                border: 5px solid grey;
                z-index: 9;
                }

                /* Add styles to the form container */
                .form-container {
                width: 40vw;
                padding: 10px;
                color: black;
                height: 70vh;
                }

                /* Full-width textarea */
                .form-container textarea {
                width: 100%;
                padding: 15px;
                margin: 5px 0 22px 0;
                border: none;
                background: #f1f1f1;
                resize: none;
                min-height: 10%;
                }

                /* When the textarea gets focus, do something */
                .form-container textarea:focus {
                background-color: #ddd;
                outline: none;
                }

                /* Set a style for the submit/send button */
                .form-container .btn {
                background-color: #04AA6D;
                color: white;
                padding: 16px 20px;
                border: none;
                cursor: pointer;
                width: 100%;
                margin-bottom:10px;
                }
                .form-container .btn {
                    width: 40%;
                    display: inline-block;
                    border-radius: 5px;
                }

                /* Add a red background color to the cancel button */
                .form-container .cancel {
                background-color: red;
                }

                /* Add some hover effects to buttons */
                .form-container .btn:hover, .open-button:hover {
                opacity: 1;
                }
                ::placeholder {
                    color: white;
                }
                .modal {
                    display: block; /* Hidden by default */
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
                </style>



<script src="~/Scripts/jquery-3.5.1.min.js"></script>
<script>
        $(window).scroll(function () {
            sessionStorage.scrollTop = $(this).scrollTop();
        });
        $(document).ready(function () {
            if (sessionStorage.scrollTop != "undefined") {
                $(window).scrollTop(sessionStorage.scrollTop);
            }
        });
</script>

                <button class="open-button" onclick="openForm()">Comment</button>


                <div id="modalbg" class="modal">
                
                </div>
                    <div class="chat-popup" id="myForm">
                        <form method="post" action="addocument.php" class="form-container">
                            <?php
                                $postid = $row['post_id'];
                                $upid = $_SESSION['id'];

                                include "iframecomments.php";
                            ?>
                            <h1 style="text-align: center;">Comments for Post No: <?php echo $postid?></h1>
                            <input type='hidden' name='postid' value="<?php echo $postid?>"></input>
                            <input type='hidden' name='upid' value="<?php echo $upid?>"></input>
                            
                            
                            
                            <script> 
                                $(document).ready(function(){
                                    setInterval(function(){
                                        $("#here").load(window.location.href + " #here" );
                                    }, 1000);
                                });
                            </script>
                            <div id="here" style="width: 98%; padding: 1%; height: 30vh; background-color: #dedede; border-radius: 10px; overflow: auto; overflow-x: hidden; flex-direction: column-reverse; display: flex;">
                                <?php
                                    include "db_conn.php";

                                    $showcomments = "SELECT * FROM comments WHERE post_id=$postid ORDER BY comment_id desc";
                                    $result11 = mysqli_query($conn, $showcomments);

                                    while($seecomments = mysqli_fetch_array($result11)) 
                                    {
                                        $tata = $_SESSION[id];
                                        $name1 = $seecomments['uploader_id'];
                                        $sql2 = "SELECT * FROM users WHERE id=$name1";

                                        $result2 = mysqli_query($conn, $sql2);
                                            if (mysqli_num_rows($result2) === 1) 
                                            {
                                                $row3 = mysqli_fetch_assoc($result2);
                                                $fname1 = $row3['fname'];
                                                $mitial = $row3['m_initial'];
                                                $lname1 = $row3['lname'];
                                                $position1 = $row3['position'];
                                            }

                                            //this is so that when the current user uploads a message, the design would be different from comments from the other users
                                        if($tata==$seecomments['uploader_id'])
                                        {
                                        echo "<div style='margin-bottom: 6%;clearfix: true; height: 8vh; width: 100%; border-radius: 10px;'><div class='dsply' style='float: right;height: 9vh; width: 70%; border-radius: 10px; padding: 5px; padding-bottom: 1px; background-color: #0095ff; '>
                                                <p class='dsply' style='height: 3vh; width: 100%; color: black ; background-color: transparent; padding: 1px; border-radius: 3px; margin-top: -0.5vh; font-weight: bolder;'>".$fname1." ".$mitial.". ".$lname1."</p><p class='dsply' style='overflow: hidden; text-overflow: ellipsis; height: 5vh; width: 100%; background-color: white; color: black; padding: 1px; border-radius: 3px; margin-top: -2.5vh; font-size: 1.1vw'>".$seecomments['post_text']."</p>";
                                        echo "</div></div>";
                                        }
                                        else if($tata!=$seecomments['uploader_id']) {
                                        echo "<div style='margin-bottom: 6%;clearfix: true; height: 8vh; width: 100%; border-radius: 10px;'><div class='dsply' style='float: left; height: 9vh; width: 70%; border-radius: 10px; padding: 5px; padding-bottom: 1px; background-color: white; '>
                                                <p class='dsply' style='height: 3vh; width: 100%; color: black ; background-color: transparent; padding: 1px; border-radius: 3px; margin-top: -0.5vh; font-weight: bolder;'>".$fname1." ".$mitial.". ".$lname1."</p><p class='dsply' style='overflow: hidden; text-overflow: ellipsis; height: 5vh; width: 100%; background-color: grey; color: white; padding: 1px; border-radius: 3px; margin-top: -2.5vh; font-size: 1.1vw'>".$seecomments['post_text']."</p>";
                                        echo "</div></div>";
                                        }
                                    }
                                ?>
                            </div>

                            <center>
                                <textarea maxlength="100" style="width: 90%; height: 30%; margin-top: 3%; border-radius: 5px; background-color: #bdbdbd; color: white;" placeholder="Type message.." name="msg" required></textarea>

                                <button type="submit" class="btn" name="addcomment">Send</button>
                                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                            </center>
                        </form>
                    </div>

                
                <script>
                function openForm() {
                document.getElementById("myForm").style.display = "block";
                document.getElementById("modalbg").style.display = "block";
                }

                function closeForm() {
                document.getElementById("myForm").style.display = "none";
                document.getElementById("modalbg").style.display = "none";
                }
                </script>
            
            <!--If the layout type is layout2 then this will be displayed-->
            <?php 
                    }  if($_POST["layout"]==="layout2") 
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
} else {
    header("Location: dashboard_user.php");
}
?>
