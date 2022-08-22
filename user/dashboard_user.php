<?php 
session_commit();
session_start();
					include "../dm.php";
				include "../loadscreen.php";
				

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) 
{
include "../db_conn.php";

//Selecting the recent post in announcement
$result = mysqli_query($db, "SELECT * FROM posts ORDER BY post_id desc limit 1");
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_array($result)) {
$post_id = $row["post_id"];
$timeuploaded = $row["timeuploaded"];
$thumbnail = $row["thumbnail"];
$fullImage = $row["fimage"];
$smallImage =  $row["simage"];
$header = $row["header"];
$bigheader = $row["bigheader"];
$short_description = $row["short_description"];
$description = $row["description"];
$post_text = $row["post_text"];
}
}

//Selecting the recent post in achievement
$sql = "SELECT * FROM achievement ORDER BY achievement_id desc limit 1";
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
}
}

//Selecting the recent post in upcoming events
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
  $dateLayout = date_format($date,"d/m/Y");
}
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
  			$result9 = mysqli_query($db, "SELECT * FROM posts ORDER BY post_id desc");


 ?>
	<!DOCTYPE html>
		<html>
			<head>
            <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
			      <title>Speaker Eugenio Perez National Agricultural School</title>
            <link rel="stylesheet" type="text/css" href="css/dashboard_user.css">
            <link rel="stylesheet" type="text/css" href="css/calendar.css">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>   
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                <?php
                    include "molecule/header.php";
                ?>
			</head>
			<body>
            <div class="container_carousel">
 <!-- CAROUSEL START -->
 <div id="myCarousel" class="carousel slide" data-interval="5000" data-ride="carousel">
    <!--Carousel indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>
    <!-- Carousel items -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="Images/sepnas.jpg" alt="First Slide">
            <div class="carousel-caption">
                <h3>SEPNAS is a home of every SEPNASIAN! Once a SEPNASIAN,  always a SEPNASIAN!</h3>
            </div>
        </div>
        <div class="item">
          <img src="Images/Academic.jpg" alt="First Slide">
          <div class="carousel-caption">
              <h3>Academic Excellence Awards for Grades 7 to 9 and Grade 11</h3>
          </div>
      </div>
        <div class="item">
            <img src="Images/brigada.jpg" alt="Second Slide">
            <div class="carousel-caption">
                <h3>DAY 1 of Brigada Eskwela :Parade</h3>
                </div>
            </div>
            <div class="item">
                <img src="Images/soiree.jpg" alt="Third Slide">
                <div class="carousel-caption">
                    <h3>Soiree 2K20</h3>
                </div>
            </div>
            <div class="item">
              <img src="Images/sosa.jpg" alt="Third Slide">
              <div class="carousel-caption">
                  <h3>SOSA 2019 - State of the School Address<</h3>
              </div>
          </div>
        </div>
        <!--Carousel nav -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
    </div>

      <!-- Announcement , Upcoming Event , Achivements-->
      <div class="container2"> 
        <div class="container2_box">
          <span class="title">Announcement</span>
          <?php echo "<img src='../admin/images/announcement/$thumbnail'>" ?>
          <?php echo "<p>Title: $header</p>" ?>
          <?php echo "<p>Description: $short_description </p>" ?>
          <a href="announcements.php">See All</a>
        </div>
        <div class="container2_box">
        <span class="title">Achievement</span>
        <?php echo "<img src='../admin/images/achievement/$thumbnailImage'>" ?>
        <?php echo "<p>Title: $headerAchievement </p>" ?>
        <?php echo "<p>Description: $shortDescriptionAchievement </p>" ?>
        <a href="achievement.php">See All</a>
          </div>
          <div class="container2_box">
          <span class="title">Upcoming Events</span>
        <?php echo "<img src='../admin/images/events/$thumbnailImageEvents'>" ?>
        <?php echo "<p>Title: $headerEvents </p>" ?>
        <?php echo "<p>Description: $shortDescriptionEvents </p>" ?>
        <?php echo "<p>Date: $dateLayout </p>" ?>
        <a href="upcoming_events.php">See All</a>    
      </div>
    </div> 

    <div class="welcome">
        <div class="welcome_content">
            <img src="https://static.wixstatic.com/media/61cf76_86daaedc1e5e4486b8312a13a0d7e793~mv2.jpg/v1/fill/w_314,h_461,al_c,lg_1,q_80,enc_auto/WelcomeA.jpg" alt="" width="100px;"
            height="300px;">
            <img src="https://static.wixstatic.com/media/61cf76_c1420274f22f4d4697e1ae1fb63b2829~mv2.jpg/v1/fill/w_401,h_461,al_c,lg_1,q_80,enc_auto/WelcomeB.jpg" alt=""  width="100px;"
            height="300px;">
            <div class="welcome_column">
              <span>Sepnas Hymm</span>
              <iframe id="video" width="560" height="315" src="https://www.youtube.com/embed/g0kt7PulcCw" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
       
    </div>

    <div class="container_vmgo" style="display: grid;
    grid-template-columns: repeat(auto-fit, minmax(500px, 1fr)); padding: 1%; margin: 2% 0;
">       
           
              <div class="single_sidebar">
                  <h2 class="title_vmgo">THE DEPED VISION</h2>
              
              <!----><span></span>
                  
                <p>
                    We dream of Filipinos
                    who passionately love their country
                    and whose values and competencies
                    enable them to realize their full potential
                    and contribute meaningfully to building the nation.
                    
                    As a learner-centered public institution,
                    the Department of Education
                    continuously improves itself
                    to better serve its stakeholders.
                </p>
                <h2 class="title_vmgo">THE DEPED MISSION</h2>
              <!----><span></span>
                  
                <p>To protect and promote the right of every Filipino to quality, equitable, culture-based, and complete basic education where:

                    Students learn in a child-friendly, gender-sensitive, safe, and motivating environment.
                    
                    Teachers facilitate learning and constantly nurture every learner.
                    
                    Administrators and staff, as stewards of the institution, ensure an enabling and supportive environment for effective learning to happen.
                    
                    Family, community, and other stakeholders are actively engaged and share responsibility for developing life-long learners.
                
                </p>
                 <h2 class="title_vmgo">OUR CORE VALUES</h2>
              <!----><span></span>
                  
                <p>
                    <li>Maka-Diyos</li>
                    <li>Maka-tao</li>
                    <li>Makakalikasan</li>
                    <li>Makabansa</li>
                </p>
              <!----><span></span>
              <h2 class="title_vmgo">QUALITY POLICY</h2>
                <p>The Sepnas
  is committed to provide
  relevant programs and responsive
  services pursuant to statutory and
  regulatory requirements for the
  satisfaction of its stakeholders  through continuous improvement
  of its quality management system.
                </p>
              </div>

            <div class="news">
            <span>News</span>
              <?php 
               $sql = "SELECT * FROM news ORDER BY news_id desc limit 3";
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
                     $contentNews = $row["content"];
                     $timeuploaded = $row["timestamp"];

                     echo "<div class=\"data_feedback\"> 
                     <img src='../admin/images/news/$thumbnailImageNews'>
                       <div>
                         <p>Title: $titleNews</p>
                         <p>Description: $shortDescriptionNews </p>
                         <p>Time Uploaded: $timeuploaded </p>
                         <a href=\"announcement_see.php?announcement_id=$news_id\">See More >></a>
                       </div>        
                 </div>";
                 }
             }
              ?>
              <!-- <span> See All >> </span> -->       
            </div>       
      <!--	  <a class="slider_btn" href="AboutUs-single.html">Read More</a>-->
            
    </div>
   
    <img src="Images/front.png" alt="" style="width:100%; height:300px;">
    <div class="container_choose">
        <!-- Why us top titile -->
            <div class="title_area">
              <p>Choose SEPNAS!</p>
              <span></span> 
            </div>
        <!-- End Why us top titile -->
        <!-- Start Why us top content  -->
        <div class="choose_sepnas">
          
                  <div class="col-lg-3 col-md-3 col-sm-3" style="width: 100%;">
            <div class="container_icon">
              <div class="whyus_icon">
                <span class="icon fa fa-group"></span>
              </div>
              <h3>Qualified Educators</h3>
              <p>Education comes at an equally good cost for our stakeholders with qualified educators giving the best knowledge to students.</p>
            </div>
          </div>
    
          <div class="col-lg-3 col-md-3 col-sm-3"style="width: 100%;">
            <div class="container_icon">
              <div class="whyus_icon">
                <span class="icon fa fa-desktop">
              </span></div>
              <h3>Technology and Innovation</h3>
              <p>Provides advanced tools and equipment which allow students to learn at their own pace.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3" style="width: 100%;">
            <div class="container_icon">
              <div class="whyus_icon">
                <span class="icon fa fa-plane">
              </span></div>
              <h3>A World of Opportunity</h3>
              <p>Broaden your horizons by joining diverse organizations and competitions inside and outside the university.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3" style="width: 100%;">
            <div class="container_icon">
              <div class="whyus_icon">
                <span class="icon fa fa-book">
              </span></div>
              <h3>Knowledge for Life</h3>
              <p>More than education, SEPNAS gives you the skills, confidence and a culture of Lifelong Learning experience to help you make your world better.</p>
            </div>
          </div>
    
        </div>
        <!-- End Why us top content  -->
      </div>
    <div class="container_form" id="contactUs" style="display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));">
          <body class="light">
            <div class="calendar" style="margin:auto;">
              <h2 class="title">Calendar</h2>
                <div class="calendar-header">
                    <span class="month-picker" id="month-picker">February</span>
                    <div class="year-picker">
                        <span class="year-change" id="prev-year">
                            <pre><</pre>
                        </span>
                        <span id="year">2021</span>
                        <span class="year-change" id="next-year">
                            <pre>></pre>
                        </span>
                    </div>
                </div>
                <div class="calendar-body">
                    <div class="calendar-week-day">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>
                    <div class="calendar-days"></div>
                </div>
                <div class="calendar-footer">
                    <div class="toggle">
                        <span>Dark Mode</span>
                        <div class="dark-mode-switch">
                            <div class="dark-mode-switch-ident"></div>
                        </div>
                    </div>
                </div>
  <a href=""> <i class="fa fa-search"></i>&nbsp;See Complete Calendar</a>
    
                <div class="month-list"></div>
            </div>
            <div class="form" style="margin: 5%; padding: 2%;">
                <fieldset class="pure-group">
                  <div class="row">
                         <div class="col-lg-12 col-md-12"> 
                           <div class="title_area">
                        <form action="db_conn.php" method="POST">
                     <h2 class="title">Contact us</h2>
                     <span></span>
                             <h5>We are eager to discuss and answer any questions you have. Enter your details and we'll get back to you shortly.</h5>
                           </div>
                         </div>
                      </div>
                     <label for="name">Name: </label>
                     <input id="name" name="name" required="" placeholder="Full Name">
                   
                         <label for="name">Subject: </label>
                     <input id="subject" name="subject" required="" placeholder="Subject">
                   </fieldset>
                   <fieldset class="pure-group">
                     <label for="message">Message: </label>
                     <textarea id="message" name="message" rows="10" required="" placeholder="Tell us what's on your mind..."></textarea>
                   </fieldset>
               
                   <fieldset class="pure-group">
                     <label for="email"><em>Your</em> Email Address:</label>
                     <input id="email" name="email" type="email" value="" required="" placeholder="example@email.com">
                     <span id="email-invalid" style="display:none">
                       Must be a valid email address</span>
                   </fieldset>
                 
                 <fieldset class="pure-group">
                     <label for="recipient">Recipient: <em>(choose the right recipient)<em></em></em></label><em><em>
                   <select id="recipient" name="recipient" required="">
                   <option value=""></option>
                  
                   <option value="admin">Administration</option>
                   <option value="registrar">Registrar</option>
                   <option value="BO">Business Office</option>
                   </select>
                   </em></em></fieldset><em><em>
               
                   <button class="button-success pure-button button-xlarge">
                     <i class="fa fa-paper-plane"></i>&nbsp;Send</button>
                 
               
                   <!--=========== END CONTACT SECTION ================-->
                    
                   </em></em></form>
        </div>
    </div>
    
    <!--Developers -->
    <span>The Developers</span>
    <div class="developer_container"> 
        <div class="developer_box">
          <img src="images/profile/emman.jpg" alt="">
          <span><i class="fa fa-user" aria-hidden="true"></i> Emmanuel Joshua A. Lemon</span>
          <p><i class="fa fa-address-card" aria-hidden="true"></i> Rizal Avenue San Carlos City Pangasinan</p>
          <p><i class="fa fa-calendar" aria-hidden="true"></i> November 12 2000</p>
          <p><i class="fa fa-desktop" aria-hidden="true"></i> Full Stack Developer</p>
          <a href="https://www.facebook.com/joshua.lemon.961/" target="_blank">Contact Me >> </a>
        </div>
        <div class="developer_box">
        <p>hi</p>
          </div>
          <div class="developer_box">
          <p>hi</p>
          </div>
    </div> 
    <!-- End -->
    
      <div class="location">
        <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="400px" id="gmap_canvas" src="https://maps.google.com/maps?q=Speaker%20Eugenio%20Perez%20National%20Agricultural%20School%20roxas%20san%20carlos%20&t=k&z=19&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
        </iframe><a href="https://123movies-to.org"></a><br><style>.mapouter{position:relative;text-align:right;height:400px;width:100%;}
        </style><a href="https://www.embedgooglemap.net"></a>
        <style>.gmap_canvas {overflow:hidden;background:none!important;height:400px;width:100%;}</style></div></div>
      </div>
      <?php
      include "molecule/footer.php";
                ?>
            <script src="js/calendar.js"></script>
            <script>
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