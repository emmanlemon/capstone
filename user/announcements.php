
<?php
session_commit();
session_start();
?>
<!DOCTYPE html>
		<html>
			<head>
            <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
			      <title>Speaker Eugenio Perez National Agricultural School</title>
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
          
                <div class="container">

                </div>
            <?php
      include "molecule/footer.php";
                ?>
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
            </body>
            </html>