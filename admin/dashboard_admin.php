<?php 
session_commit();
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) 
{
include "../db_conn.php";
$tryid = $_SESSION['id'];
$result6 = mysqli_query($db, "SELECT * FROM admin WHERE id='$tryid'");
    while ($row1 = mysqli_fetch_array($result6)) 
        {
              $_SESSION['username'] = $row1['username'];
              $_SESSION['name'] = $row1['name'];
              $_SESSION['position'] = $row1['position'];    
        }
?>

<!DOCTYPE html>
		<html>
			<head>
            <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
			      <title>Admin Page Sepnas</title>
            <link rel="stylesheet" type="text/css" href="css/dashboard_admin.css">
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
            <div class="information" style="display: grid; place-items:center; margin-top: 100px;">
        <h1 style="display:inline-block;">Welcome Our Admin!!</h1>
        <p></p>
    </div>
    <p>Guest Page</p>
    <iframe src="../index.php" height="500" width="100%" title="Iframe Example"></iframe>
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