

            <!--This is for the audio whenever an element is hovered-->
            <audio id="mySoundClip">
                <source src="audio/sfxwhenhover.mp3"></source>
                Your browser isn't invited for super fun audio time.
            </audio>
            <audio id="mySoundClip2">
                <source src="audio/droplet.mp3"></source>
                Your browser isn't invited for super fun audio time.
            </audio>
            <audio id="mySoundClip3">
                <source src="audio/mixkit-fairy-arcade-sparkle-866.wav"></source>
                Your browser isn't invited for super fun audio time.
            </audio>
            <audio id="mySoundClip4">
                <source src="audio/fourth.mp3"></source>
                Your browser isn't invited for super fun audio time.
            </audio>

            <script>
                var audio = $("#mySoundClip")[0];
                    $(".soundhaha").mouseenter(function(){
                    audio.play();
                    audio.volume = 0.1;
                    });
                var audio2 = $("#mySoundClip2")[0];
                    $(".sound2").mouseenter(function(){
                    audio2.play();
                    audio2.volume = 0.2;
                    });
                var audio3 = $("#mySoundClip3")[0];
                    $(".sound3").mouseenter(function(){
                    audio3.play();
                    audio3.volume = 0.2;
                    });
                var audio4 = $("#mySoundClip4")[0];
                    $(".sound4").mouseenter(function(){
                    audio4.play();
                    audio4.volume = 0.5;
                    });
            </script>