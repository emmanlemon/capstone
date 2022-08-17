<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="refresh" content="10">
            <style>
            /* width */
            ::-webkit-scrollbar {
            width: 10px;
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
            
    </head>
    <body>
								<?php
                                    include "db_conn.php";
                                    $result9 = mysqli_query($db, "SELECT * FROM posts ORDER BY post_id desc");
									echo "<style>
											.lalagyanngposts {
												width: 120vw;
												height: 40vh;
												border-radius: 10px;
												background-color: #303030;
												padding: 0px 40px 40px 40px;
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
														.deleteit {
															  visibility: visible;
															  background-color: black;
															  border: solid white 3px;
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
															  background-image: url('photos/trash.png');
															  background-size: 30px 30px;
															  background-repeat: no-repeat;
															  background-position: center;
															  position: absolute;
															  float: left;
															  display: inline-block;
											}

															.deleteit .tooltiptext {
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

															.deleteit:hover .tooltiptext {
															  visibility: visible;
															}
															.editit {
															  visibility: visible;
															  background-color: white;
															  border: solid black 3px;
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
															  float: left;
															  margin-top: -50px;
															  display: inline-block;
											}

															.editit .tooltiptext {
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

															.editit:hover .tooltiptext {
															  visibility: visible;
															}
										 </style><table id='thisone' style='margin-right: 4vw;'>";
								    while ($row = mysqli_fetch_array($result9)) {
                                        echo "
                                            <script>
                                                document.addEventListener('DOMContentLoaded', function(event) { 
                                                    var scrollpos = localStorage.getItem('scrollpos');
                                                    if (scrollpos) window.scrollTo(0, scrollpos);
                                                });

                                                window.onbeforeunload = function(e) {
                                                    localStorage.setItem('scrollpos', window.scrollY);
                                                };
                                            </script>";
								      echo "<tr style='display: block; margin-bottom: 50px;'><td class='lalagyanngoras'>Post ID: ".$row['post_id']. " &nbsp;&nbsp;Date: " .$row['timeuploaded']."" ."</td>";
								      	echo "<td onclick=\"document.location='document-view.php?post_id=".$row['post_id']."'\" class='sound3 lalagyanngposts' style='color: white; margin-bottom: 50px; padding: 5%; padding-left: 3%;'>
                                                <div style='float: left;'>
                                                    <img src='gallery/".$row['thumbnail']."'  style='background-color: white; width: 250px; height: 250px; background-repeat: no-repeat; background-size: cover; background-position: center; cursor: pointer; border-radius: 5px;'></div>
                                                <div style='float: left; padding-left: 2%;'>
                                                    <p style='font-size: 5vw; font-family: serif; margin-top: -2vh; color: yellow;'>"
                                                    .$row['header'].
                                                "   </p>
                                                    <p style='font-size: 20px; font-family: sans serif; margin-top: -5vh;'>"
                                                    .$row['description'].
                                                "   </p>
                                                </div>
                                            </td>";
                                         
								      	echo "<td><a class='deleteit' href=\"deleteit.php?post_id=".$row['post_id']."\"></a><a class='editit' href=\"editit.php?post_id=".$row['post_id']."\"></a></td>";
								      echo "</tr</table>";
							    	}
							    ?>
    
    </body>
</html>