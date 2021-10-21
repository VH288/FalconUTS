<?php
    include './navbar/navbar.php'
?>
            <div class="ms-auto me-auto" style="display:flex; flex-direction:column; justify-content: center;align-items:center; width: 50%; height:max-content">
                <div class="row card shadow-sm p-3 mb-5 mt-5" style="width:80%; border-radius: 20px;">
                    <form action="../controller/editPostController.php" method="post">
                        <?php
                        if(isset($_GET['id'])){
                            include ('../database/db.php');
                            $idpost = $_GET['id'];
                            $_SESSION['idpost'] = $idpost;
                            $query = mysqli_query($con, "SELECT * FROM post WHERE id='$idpost'") or die(mysqli_error($con));
                            $posts = mysqli_fetch_assoc($query);
                            echo'
                                <div class="col" style="border-radius: 50px; margin :15px;">
                                    <textarea class="form-control" name="content" style="padding-bottom:80px; overflow:hidden" required>'.$posts['content'].'</textarea>
                                </div>';

                                echo '
                                <div class="d-grid gap-2" style="margin-top :20px; padding-left: 15px; padding-right: 15px;">
                                    <button type="submit" class="btn btn-primary" name="edit" style="border-radius: 15px;">Save Changes</button>
                                </div>
                            ';
                            }
                        ?>
                            
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>