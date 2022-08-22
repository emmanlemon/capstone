<link rel="stylesheet" href="css/header.css">

<nav style="display: flex;">
            <input id="nav-toggle" type="checkbox">
            <div class="logo"><img src="images/sepnas_logo.png" alt="" style="width:100px; height:100px;"><p style="padding: 5px; text-shadow: 1px 1px 1px black;">Speaker Eugenio Perez National Agricultural School</p></div>
           
            <ul class="links">
                <li><a href="dashboard_admin.php">Home</a></li>
                <li><a href="data_records.php">Data Records</a></li>
                <li><a href="announcements.php">Announcements</a></li>
                <li>
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                        Reports
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="background-color:green; z-index: 10;">
                        <a class="dropdown-item" href="achievement.php">Achievements</a>
                        <a class="dropdown-item" href="news.php">News</a>
                        <a class="dropdown-item" href="upcoming_events.php">Upcoming Events</a>
                        </div>
                    </div>
                </li>
                <li>
                <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                    About Us
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="background-color:green; z-index: 10;">
                    <a class="dropdown-item" href="history.php">History</a>
                    <a class="dropdown-item" href="#">Sepnas Vission Mission</a>
                    <a class="dropdown-item" href="#">Privacy Policy</a>
                    <a class="dropdown-item" href="gallery.php">Campus Gallery</a>
                </div>
                </div></li>
                <li><a href="feedback.php">Feedback</a></li>
            <a href="../logout.php"><span class="" id="login" style="font-size:20px;">Logout</span></a>
            </ul>
            <label for="nav-toggle" class="icon-burger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </label>
        </nav>