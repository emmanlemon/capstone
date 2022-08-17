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
                .body{
                    background-color: white;
                }
                .loader {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: url('images/gif/3dgifmaker68139.gif');
                background-repeat: no-repeat;
                background-position: center;
                }
	    </style>
	</head>
	<body>
        <div class="body">
        <div class="loader"></div>
        </div>
	</body>
</html>