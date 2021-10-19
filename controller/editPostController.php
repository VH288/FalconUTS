<?php
    if(isset($_POST['edit'])){
        include('../database/db.php');
        session_start();
        $idpost = $_SESSION['idpost'];
        $content = $_POST['content'];
        $errorarray = array();

        if(!empty($content)){
            $query = mysqli_query($con,
            "UPDATE post
            SET content = '$content' 
            WHERE 
            id='$idpost'") or die(mysqli_error($con));
        
                    echo 
                        '<script>
                            window.location = "../view/home.php"
                        </script>';
        }
        else{
            array_push($errorarray,"Content is empty");
            $_SESSION['errorarray'] = $errorarray;
            echo 
                        '<script>
                            window.location = "../view/editPost.php?id='.$idpost.'"
                        </script>';
        }

        
    }
?>