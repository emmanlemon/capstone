<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/x-icon" sizes="114x114" href="favicon1.png">
	<title>Home</title>
	<style>
        html {
				  background-image: url("gallery/bgimg.jpg");
            }
				.dark-mode {
				  background-image: url("photos/bg3.jpg");height: 100%;  
				  background-repeat: no-repeat;
				  background-position: center;
				  background-size: cover;
				  overflow: hidden;
				}
				/* The switch - the box around the slider */
				.switch {
				  position: relative;
				  display: inline-block;
				  width: 80px;
				  height: 54px;
				  margin-left: 20px;
				  margin-top: 10px;
				  border-radius: 34px;
				  box-shadow: 0 2px 26px 0 rgba(255 ,255 , 255,0.6), 0 27px 240px 0 rgba(255 ,255 , 255,0.6);
				}

				/* Hide default HTML checkbox */
				.switch input {
				  opacity: 0;
				  width: 0;
				  height: 0;
				}

				/* The slider */
				.slider {
				  position: absolute;
				  cursor: pointer;
				  top: 0;
				  left: 0;
				  right: 0;
				  bottom: 0;
				  background-color: #2196F3;
				  -webkit-transition: .4s;
				  transition: .4s;
				}

				.slider:before {
				  position: absolute;
				  content: "";
				  height: 46px;
				  width: 46px;
				  left: 4px;
				  bottom: 4px;
				  background-color: white;
				  -webkit-transition: .4s;
				  transition: .4s;
				}

				input:checked + .slider {
				  background-color: black;
				}

				input:focus + .slider {
				  box-shadow: 0 0 1px black;
				}

				input:checked + .slider:before {
				  -webkit-transform: translateX(26px);
				  -ms-transform: translateX(26px);
				  transform: translateX(26px);
				}

				/* Rounded sliders */
				.slider.round {
				  border-radius: 34px;
				}

				.slider.round:before {
				  border-radius: 50%;
				}
	</style>

			<script>
				function myFunction() {
				   var element = document.body;
				   element.classList.toggle("dark-mode");
				}
			</script>
</head>
<body>

</body>
</html>