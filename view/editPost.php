<?php
    include './navbar/navbar.php'
?>
            <div style="display:flex; flex-direction:column; justify-content: center;align-items:center; width: 100%; height:max-content">
                <form action="../controller/editPostController.php" method="post">
                    <?php
                    if(isset($_GET['id'])){
                        include ('../database/db.php');
                        $idpost = $_GET['id'];
                        $_SESSION['idpost'] = $idpost;
                        $query = mysqli_query($con, "SELECT * FROM post WHERE id='$idpost'") or die(mysqli_error($con));
                        $posts = mysqli_fetch_assoc($query);
                        echo'
                            <div class="col" style="border:2px solid black;margin :5px">
                            <textarea class="form-control" name="content">'.$posts['content'].'</textarea>
                            </div>';
                            
                                if(!empty($_SESSION['errorarray'])){
                                    $errorarray = $_SESSION['errorarray'];
                                    if(in_array('Content is empty',$errorarray)){
                                        echo'
                                            <div class="col" style="border:2px solid black;margin :5px">
                                                Content is empty
                                            </div>
                                        ';
                                    }
                                    $_SESSION['errorarray'] = array();
                                }

                            echo '
                            <div class="col" style="border:2px solid black;margin :5px">
                                <button type="submit" name="edit">Edit</button>
                            </div>
                        ';
                        }
                    ?>
                        
                </form>
            </div>
        </div>
    </body>
</html>