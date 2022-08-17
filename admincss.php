
				<style>
        html {
			background-image: url("gallery/bgimg.jpg");
	        height: 100%;	
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
            font-family: "Lato", sans-serif;
            overflow: hidden;
        }
        body {
            height: 100%;
            overflow-y: hidden;
        }
        #fixedHead {
            background-color: #c9c9c9;
            height: 100px;
            width: 99%;
            border-radius: 10px;
            position: relative;
            padding-top: 10px;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
            margin-bottom: 50px;
            opacity: 0.8;
        }
        #headgreet {
            background-color: white;
            border-color: black 10px;
            height: 50px;
            width: 10%;
            border-radius: 45px;
            text-align: center;
            box-shadow: 0 7px 11px 0 rgba(0,0,0,0.24), 0 12px 40px 0 rgba(0,0,0,0.19);
            float: right;
            padding-bottom: 10px;
            margin-right: 10px;
            cursor: default;
        }
        #logout {
            height: 50px;
            width: 50px;
            border-radius: 360px;
            text-align: center;
            box-shadow: 0 7px 11px 0 rgba(0,0,0,0.24), 0 12px 40px 0 rgba(0,0,0,0.19);
            float: right;
            font-family: verdana;
            margin-right: 10px;
            margin-top: 5px;
            cursor: pointer;
            transition: 0.4s;
        }
        .button:active {
            background-color: #83e6cd;
            box-shadow: 0 15px #666;
            transform: translateY(4px);
        }
        td {
            height: 450px;
            width: 450px;
            border-radius: 20px;
        }
        table {
        }
        .dashboard {
            height: 350px;
            width: 350px;
            border-radius: 20px;
            background-color: white;
            margin-left: 80px;
            margin-right: 80px;
            margin-top: 30px;
            transition: 0.3s;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        }
        .dashboard:hover {
            box-shadow: 0 22px 26px 0 rgba(0,0,0,0.24), 0 27px 60px 0 rgba(0,0,0,0.19);
            opacity: 0.9;
            transform: scale(1.1);
            transition: 0.3s;
            background-color: #d4d4d4;
            cursor: pointer;
        }
        .bttmname {
            font-size: 30px;
            color: white;
            text-align: center;
            position: relative;
            margin: 0px 0px;
            padding-top: 20px;
            display: relative;
            cursor: pointer;
            transition: 0.3s;
        }
        .bttmname:hover {
            transform: scale(1.1);
            transition: 0.3s;
        }

        #myBtn {
            background-image: url("photos/wallet.png");
            background-size: cover;
            transition-duration: 0.3s;
        }


/* The Modal (background) */
					.firstmodal,.secondmodal, {
					  display: none; /* Hidden by default */
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
					  margin-top: 100px;
					}

					/* Modal Content */
					.modal-content {
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
					  margin-top: 100px;
					}

					/* Add Animation */
					@-webkit-keyframes animatetop {
					  from {top:-300px; opacity:0} 
					  to {top:0; opacity:1}
					}

					@keyframes animatetop {
					  from {top:-300px; opacity:0}
					  to {top:0; opacity:1}
					}

					/* The Close Button */
					.close,.close2,.close3 {
					  color: white;
					  float: right;
					  font-size: 28px;
					  font-weight: bold;
					}

					.close:hover,.close2:hover,.close3:hover,
					.close:focus,.close2:focus,.close3:focus {
					  color: #000;
					  text-decoration: none;
					  cursor: pointer;
					}

					.modal-header {
					  padding: 2px 16px;
					  background-color: #374247;
					  color: white;
					  border-top-right-radius: 20px;
					  border-top-left-radius: 20px;
					  margin-top: -10px;
					}

					.modal-body {
						padding: 2px 16px;
						height: 150px;
						border-bottom-left-radius: 20px;
						border-bottom-right-radius: 20px;

					}
					.modal-body2 {
						padding: 2px 16px;
						height: 150px;
						border-bottom-left-radius: 20px;
						border-bottom-right-radius: 20px;
					}
					.modal-body3 {
						padding: 2px 16px;
						height: 150px;
						border-bottom-left-radius: 20px;
						border-bottom-right-radius: 20px;
					}
					input[type="button"]
			         {
			         color: black;
			         width: 130px;
			         height: 50px;
			         border-radius: 10px;
			         font-size: 20px;
			         }
			  
			         input[type="text"]
			         {
			         width:100%;
			         border-radius: 10px;
			         }
			         .containposts {
			         	height: 710px;
			         	border: solid white 1px;
			         	padding: 10px 50px 10px 10px;
			         	position: relative;
			         	z-index: 1;
			         	border-radius: 20px;
			         	width: 80%;
						overflow: auto;
						display: inline-block;
						background-color: #c9c9c9;
			         }
			         @media only screen and (max-width: 1500px) {
					  #headgreet {
			         	height: 50px;
			         	min-width: 10%;
			         	font-size: 5px;
			         	position: sticky;
			         	display: block;
			         	margin-top: 0px;
					  }
					  #hgforresize {
					  	min-width: 20px;
					  	padding: 10px 0px 10px 0px;
					  	display: inline-block;
					  }
					  #containposts1 {
					  	display: none;
					  }
					  #formforsearch, #containposts, #headgreet {
					  	display: none;
					  }
					  #galleryarea {
					  	height: 750px;
					  }
					}


					.containposts::-webkit-scrollbar-thumb, #homearea::-webkit-scrollbar-thumb, .gallery::-webkit-scrollbar-thumb {
					  background-color: white;
					  border: 1px solid black;
					  border-radius: 25px;
					  background-clip: padding-box;  
						margin-right: : 50px;
						margin-top: 50px;
					}
					#homearea::-webkit-scrollbar {
					}

					.containposts::-webkit-scrollbar, #homearea::-webkit-scrollbar, .gallery::-webkit-scrollbar {
					  width: 16px;
					}

					#poste:hover , #opensecond:hover, .deleteit:hover, .editit:hover {
					  box-shadow: 0 22px 26px 0 rgba(0,0,0,0.24), 0 27px 60px 0 rgba(0,0,0,0.19);
					  opacity: 0.9;
					  transform: scale(1.1);
					  transition: 0.3s;
					}
					#content{
					   	width: 50%;
					   	margin: 20px auto;
					   	border: 1px solid #cbcbcb;
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
					  animation-duration: 0.4s;
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
					.searchlogo {
						background-image: url("photos/search.png");
						background-size: cover;
					}
					#contactarea, #galleryarea {
						display: none;
					}
					#logongsearch {
						transition: 0.3s;
						margin-left: 10px;
					}
					#logongsearch:hover {
						transform: scale(1.2);
					}
					#logout:hover, #gallerybttn:hover, .gallerypica:hover {
						transform: scale(1.1);
					}
					#logout, #gallerybttn, .gallerypica{
						transition: 0.4s;
					}
					.gallerypica:hover {
						transform: scale(1.2);
					}
					html {
						height: 100%;	
						background-repeat: no-repeat;
						background-position: center;
						background-size: cover;
						font-family: "Lato", sans-serif;
						overflow: hidden;
					}
					#logout {
						background-image: url("photos/logout.png");
						background-size: 36px 40px;
						background-repeat: no-repeat;
						background-position: center;
						padding: 15px 15px 15px 15px;
						height: 55px;
					}
				</style>