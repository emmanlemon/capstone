<?php 
session_commit();
session_start();
					include "../dm.php";
				

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    include "../db_conn.php";

    // Create database connection

    $tryid = $_SESSION['id'];
    $result6 = mysqli_query($db, "SELECT * FROM users WHERE id='$tryid'");
    while ($row1 = mysqli_fetch_array($result6)) {
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
    ?>
<!DOCTYPE html>
		<html>
			<head>
            <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
			      <title>Speaker Eugenio Perez National Agricultural School</title>
                  <link rel="stylesheet" href="css/profile.css">
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
            <div class="container_profile">
<div class="profile-wrapper">
    <div class="profile-section-user">
        <div class="profile-cover-img"><img src="https://wallpaperaccess.com/full/1111946.jpg" alt=""></div>
        <div class="profile-info-brief p-3"><img class="img-fluid user-profile-avatar" src="images/profile/emman.jpg" alt="">
            <div class="text-center">
                <h5 class="text-uppercase mb-4">Emmanuel Joshua A. Lemon</h5>
                <p class="text-muted fz-base">I'm Emmanuel Joshua A. Lemon a web developer and software engineer. I studied computer science and software engineering.</p>
            </div>
        </div>
        <!-- /.profile-info-brief -->
        <hr class="m-0">
        <div class="hidden-sm-down">
            <hr class="m-0">
            <div class="profile-info-contact p-4">
                <h6 class="mb-3">Contact Information</h6>
                <table class="table">
                    <tbody>
                        <tr>
                            <td><strong>URL:</strong></td>
                            <td>
                                <p class="text-muted mb-0">www.walangtulugan.jpeg</p>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>EMAIL:</strong></td>
                            <td>
                                <p class="text-muted mb-0">Emmanuel@gmail.com</p>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>PHONE:</strong></td>
                            <td>
                                <p class="text-muted mb-0">0902025050 Bilay mo</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.profile-info-contact -->
            <hr class="m-0">
            <div class="profile-info-general p-4">
                <h6 class="mb-3">General Information</h6>
                <table class="table">
                    <tbody>
                        <tr>
                            <td><strong>JOB:</strong></td>
                            <td>
                                <p class="text-muted mb-0">Web Developer</p>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>POSITION:</strong></td>
                            <td>
                                <p class="text-muted mb-0">Team Manager</p>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>STUDIED:</strong></td>
                            <td>
                                <p class="text-muted mb-0">Computer Science</p>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>LAST SEEN:</strong></td>
                            <td>
                                <p class="text-muted mb-0">Yesterday 8:00 AM</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.profile-info-general -->
            <hr class="m-0">
        </div>
        <!-- /.hidden-sm-down -->
    </div>
    <!-- /.profile-section-user -->
    <div class="profile-section-main">
         <!--Search Box -->
         <form method="post" action="feedback.php">
            <div class="input-group" style="display: flex; justify-content:center; align-items:center;">
                <div class="input-group-append">
                    <button id="button-addon1" type="submit" name="search" class="btn btn-link text-primary"><i class="fa fa-search"></i> Search Profile</button>
                </div>
                <input type="search" name="search" placeholder="What're you searching for?" aria-describedby="button-addon1" class="form-control border-0 bg-light">
                </div>
            </form>
            <!--End -->

        <!-- Nav tabs -->
        <ul class="nav nav-tabs profile-tabs" role="tablist">  
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#profile-overview" role="tab">Timeline</a></li>
        </ul>
        <!-- /.nav-tabs -->
        <!-- Tab panes -->
        <div class="tab-content profile-tabs-content">
            <div class="tab-pane active" id="profile-overview" role="tabpanel">
                <div class="post-editor">
                    <textarea name="post-field" id="post-field" class="post-field" placeholder="Write Something Cool!"></textarea>
                    <div class="d-flex">
                        <button class="btn btn-success px-4 py-1">Post</button>
                    </div>
                </div>
                <!-- /.post-editor -->
                <div class="stream-posts">
                    <div class="stream-post">
                        <div class="sp-author">
                            <a href="#" class="sp-author-avatar"><img src="images/profile/emman.jpg" alt=""></a>
                            <h6 class="sp-author-name"><a href="#">John Doe</a></h6></div>
                        <div class="sp-content">
                            <div class="sp-info">posted 1h ago</div>
                            <p class="sp-paragraph mb-0">HA HARURUT hahahaahha</p>
                        </div>
                        <!-- /.sp-content -->
                    </div>
                    <!-- /.stream-post -->
                    <div class="stream-post">
                        <div class="sp-author">
                            <a href="#" class="sp-author-avatar"><img src="images/profile/emman.jpg" alt=""></a>
                            <h6 class="sp-author-name"><a href="#">Palmira Guthridge</a></h6></div>
                        <div class="sp-content">
                            <div class="sp-info">posted 1M hr ago</div>
                            <p class="sp-paragraph mb-0">Wala akong nakikitang Hello World Dito ahahahahah</p>
                        </div>
                        <!-- /.sp-content -->
                    </div>
                    <div class="stream-post">
                        <div class="sp-author">
                            <a href="#" class="sp-author-avatar"><img src="images/profile/emman.jpg" alt=""></a>
                            <h6 class="sp-author-name"><a href="#">Palmira Guthridge</a></h6></div>
                        <div class="sp-content">
                            <div class="sp-info">posted 1M hr ago</div>
                            <p class="sp-paragraph mb-0">San ka Dadalhin ng Hello world mo ahahahahah</p>
                        </div>
                        <!-- /.sp-content -->
                    </div>
                    <!-- /.stream-post -->
                </div>
                <!-- /.stream-posts -->
            </div>
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- /.profile-section-main -->
</div>
</div>
            </body>
        </html>

    <?php 
}
else{
     header("Location: index.php");
     exit();
}
 ?>