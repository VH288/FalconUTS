<?php
    include './navbar/navbar.php';
    include '../controller/likePostController.php';
?>

                        <div class="upload-side mt-5 mb-5" style="display:flex; flex-direction:column; justify-content:left; align-items:center; width: 50%;">
                            <?php
                                $user = $_SESSION['user'];
                                $id = $user['id'];
                                $query = mysqli_query($con, "SELECT * FROM post WHERE user_id != '$id' ORDER BY id DESC") or die(mysqli_error($con));
                                
                                if(mysqli_num_rows($query) == 0){
                                    echo'<p>Tidak ada post</p>';
                                }
                                else{
                                    while($posts = mysqli_fetch_assoc($query)){
                                        $userpostid = $posts['user_id'];
                                        $query2=mysqli_query($con,"SELECT * FROM user WHERE id='$userpostid'") or die(mysqli_error($con));
                                        $userpost = mysqli_fetch_assoc($query2);
                                        echo'
                                            <div class="row card shadow-sm p-3 mb-3" style="width:80%; border-radius:20px;">
                                                <div class="col">
                                                    <p class="text-capitalize" style="font-size:25px; margin-bottom:-3px; font-weight: bold; color: rgb(23, 17, 75);">'.$userpost['username'].'</p>
                                                    <p style="font-size:14px; margin-bottom: 10px; color: rgb(161, 161, 161);">'.$posts['post_time'].'</p>  
                                                </div> 
                                                <div style="word-wrap: break-word;">
                                                    '.$posts['content'].'
                                                </div>
                                                <br>
                                                <hr>
                                                <div style=" margin: 1px;">
                                                    <form action="home.php?id='.$posts['id'].'" method="post">
                                                        <div class="col" style="float: left;">
                                                            <button name="likebtn" class="btn btn-link p-0 m-0">
                                                                <i class="fa fa-heart" style="color: red;" ><p style="color: black; float: right; margin-left: 7px;">'.$posts['likes'].'</p></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        ';
                                    }
                                }
                            ?>
                        </div>
                        <div style="display:flex; flex-direction:column; align-items:center; width: 50%; border-left:2px solid rgb(207, 207, 207);">
                            <div class="row card shadow-sm p-3 mb-5 mt-5" style="width:80%; border-radius: 20px;">
                                <form action="../controller/uploadPostController.php" method="post">
                                    <div class="col" style="border-radius: 50px; margin :5px;">
                                        <textarea class="form-control" name="content" placeholder="Apa yang sedang kamu pikirkan?" required></textarea>
                                    </div>
                                    <div class="col d-flex flex-row-reverse" style="margin-top :20px;">
                                        <button type="submit" class="btn btn-primary" name="upload" style="border-radius: 25px;">Upload</button>
                                    </div>
                                </form>
                            </div>
                            <?php
                                $user = $_SESSION['user'];
                                $id = $user['id'];
                                $query = mysqli_query($con, "SELECT * FROM post WHERE user_id = '$id' ORDER BY id DESC") or die(mysqli_error($con));
                                $username = $user['username'];
                                if(mysqli_num_rows($query) == 0){
                                    echo'<p>Tidak ada post</p>';
                                }
                                else{
                                    while($posts = mysqli_fetch_assoc($query)){
                                        
                                        echo'
                                            <div class="row card shadow-sm p-3 mb-3" style="width:80%; border-radius: 20px;">
                                                <div class="col">
                                                    <a href="./editPost.php?id='.$posts['id'].'">
                                                        <i class="fa fa-edit" style="float: right;"></i>
                                                    </a>
                                                    
                                                    <p class="text-capitalize" style="font-size:25px; margin-bottom:-3px; font-weight: bold; color: rgb(23, 17, 75);">'.$username.'</p>
                                                    <p style="font-size:14px; margin-bottom: 10px; color: rgb(161, 161, 161);">'.$posts['post_time'].'</p>  
                                                </div>
                                                <div style="word-wrap: break-word;">
                                                    <p id="content'.$posts['id'].'">'.$posts['content'].'</p>
                                                </div>
                                                <br>
                                                <hr>
                                                <div class="col" style=" margin: 1px">
                                                    <form action="home.php?id='.$posts['id'].'" method="post">
                                                        <div class="col" style="float: left;">
                                                            <button name="likebtn" class="btn btn-link p-0 m-0">
                                                                <i class="fa fa-heart" style="color: red;"><p style="color: black; float: right; margin-left: 7px;">'.$posts['likes'].'</p></i>
                                                            </button>
                                                        </div>
                                                        <a href="../controller/deletePostController.php?id='.$posts['id'].'">
                                                            <i class="fa fa-trash" style="color: red; float: right; padding-top:5px"></i>
                                                        </a>
                                                    </form>
                                                </div>
                                            </div>
                                        ';
                                    }
                                }
                            ?>
                        </div>  
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
            </body>
        </html>
