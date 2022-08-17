<!DOCTYPE html>
		<html>
			<head>
            <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
			      <title>Announcement Page</title>
            <link rel="stylesheet" type="text/css" href="css/announcement.css">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>   
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <?php
                    include "molecule/header.php";
                ?>
            </head>
			<body>
            <img src="images/sepnas.jpg" alt="" style="width: 100%; height: 350px; margin-top: 1.5%;">
            <div class="body">
            <div class="container_left">
            <span class="title">Announcement >> </span>
            <?php
    include "db_conn.php";

    $result = mysqli_query($db, "SELECT * FROM posts ORDER BY post_id desc");
    if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) 
    {
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

        echo "<div class=\"announcement\"> 
        <img src='admin/images/announcement/$thumbnail'>
            <p>Title: $header</p>
            <p>Description: $short_description </p>
            <p>Time Uploaded: $timeuploaded </p>
        <div class=\"deleteButton\">
        <a href=\"announcement_see.php?announcement_id=$post_id\">See More >></a>
        </div>

    </div>" ;
    }
    } else {
        echo "No Data Found";
    }
    ?>
            </div>
            <div class="container_right">
                <p>for upcoming event</p>
            </div>
            </div>
            </body>
            </html>