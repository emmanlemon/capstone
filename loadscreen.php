<!DOCTYPE html>
<html>
	<head>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
            <script>
                $(window).load(function () {
                    $(".loader").fadeOut("slow");
                });
            </script>
	    <style>
            
                .loader {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100vw;
                height: 100vh;
                z-index: 9999;
                background: url('https://cdn.dribbble.com/users/2077073/screenshots/6005120/loadin_gif.gif');
                background-size: cover;
                background-position: center;
                }
                //https://i.pinimg.com/originals/de/49/34/de4934f679f284e09cabd0eb25c7008a.gif
                //https://cdn.dribbble.com/users/503653/screenshots/3143656/fluid-loader.gif
                //https://i.pinimg.com/originals/f6/06/cb/f606cbf26c0a18898b96ef6857953a75.gif
                //https://cdn.dribbble.com/users/2077073/screenshots/6005120/loadin_gif.gif
                //https://flevix.com/wp-content/uploads/2019/07/Dual-Ring-Preloader-1.gif
	    </style>
	</head>
	<body>
            <div class="loader"></div>
	</body>
</html>