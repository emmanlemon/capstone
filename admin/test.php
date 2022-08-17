<form method="post" action="adding_data/upload_announcement.php" enctype="multipart/form-data" >
                <center>
                <input type="submit" name="uploadfromadmin">
                    <div class="newcntrl">
                        <div class="containthumbnail">
							<input type="hidden" name="size" value="1000000">
                            <div style="float: left;">
                                <input accept="image/*" type='file' id="imgInp" required name="thumbnail"/>
                                <h1 style="position: relative;">1. Select a thumbnail</h1>
                            </div>
                        </div>

                        <div style="position: absolute; left: 40%; right: 40%; background-color: black; color: white; width: 20vw; height: 60%; padding: 15px; border-radius: 20px; font-weight: bolder; font-size: 20px;">
                            <?php echo "<p style='color: red;'>Note: </p>Content-Type: $type  </br>Layout-Type: $layout"; ?>
                        </div>
                        
                        <div class="containthumbnail" style="float: right; background-color: burlywood; dislay: inline-block; padding: 15px; height: 80%">
                            <div style="float: left; background-color: transparent; height: 100%; ">
                                <img id="blah" src="#" alt="No thumbnail" />
                            </div>
                            <div style="float: right; background-color: transparent; height: 100%; width: 70%;">
                                <input type="text" name="post_header" required placeholder="Header goes here" style="font-size: 30px; width: 93%; font-weight: bold;" />
                                <input type="text" name="post_description" required placeholder="Short description goes here" style="font-size: 15px; width: 93%; height: 60%;" />
                            </div>
                        </div>
                        <script>
                            imgInp.onchange = evt => {
                                const [file] = imgInp.files
                                if (file) {
                                    blah.src = URL.createObjectURL(file)
                                }
                                }
                        </script>
									<!--<div>
										<input type="file" name="gallery" style="font-family: serif; font-size: 30px; margin-top: 50px; border-radius: 10px; color: white">
									</div>
									<div>
										<button type="submit" name="uploadtogallery" id="gallerybttn" style="font-family: serif; font-size: 30px; margin-top: 50px; border-radius: 10px;                                                        cursor: pointer;">Upload</button>
									</div>-->
                    </div>
                </center>

                <!--This is the a4 like container where we the contents of the article will be placed-->
                <center>
                    <div class="layout1">
                        <h1 style="position: absolute; margin-top: -10vh; margin-left: -3vh; color: white;">3. Fill out the page</h1>
                        <input type="text" required class="layoutcontent" placeholder="Big title goes here" name="contentheader" style="font-size: 4vw; height: 13%;">

                        <div style="background-color: pink; margin-top: 5%; width: 96%; height: 20%; border-radius: 5px; object-fit: cover; border: solid black 2px;">
                            <img id="blah2" src="#" alt="No image yet" style="background-color: pink;width: 100%; height: 20vh; border-radius: 5px; object-fit: cover;">
                                <input type="hidden" name="size2" value="1000000">
                                    <input accept="image/*" type='file' required id="imgInp2" name="fimage"/>
                            </img>
                        </div>
                        <div style="background-color: pink; float: left; margin-left: 2%; margin-top: 5%; width: 24%; height: 60%; border-radius: 5px; object-fit: cover; border: solid black 2px;">
                            <img id="blah3" src="#" alt="No image yet" style="background-color: pink; width: 100%; height: 100%; border-radius: 5px; object-fit: cover;">
                                <input type="hidden" name="size3" value="1000000">
                                    <input accept="image/*" type='file' required id="imgInp3" name="simage"/>
                            </img>
                        </div>
                        <div style="background-color: pink; float: right; margin-right: 2%; margin-top: 5%; width: 64%; height: 60%; border-radius: 5px; object-fit: cover; border: solid black 2px;">
                            <textarea required name="text1" cols="40" rows="5" style="width: 95%; height: 95%; border-radius: 5px; object-fit: cover; text-indent: 10%; white-space: pre-wrap;"></textarea>
                        </div>

                        
                        <script>
                            imgInp2.onchange = evt => {
                                const [file] = imgInp2.files
                                if (file) {
                                    blah2.src = URL.createObjectURL(file)
                                }
                                }
                            imgInp3.onchange = evt => {
                                const [file] = imgInp3.files
                                if (file) {
                                    blah3.src = URL.createObjectURL(file)
                                }
                                }
                        </script>
                    </div>
                </center>
            </form>