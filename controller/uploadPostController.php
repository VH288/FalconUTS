<?php
    if(isset($_POST['upload'])){
        session_start();
        include('../database/db.php');

        $content = $_POST['content'];
        $user = $_SESSION['user'];
        $userid = $user['id'];
        $time = date('Y-m-d H:i:s');
        $likes = 0;
        $errorarray = array();
        if(!empty($content)){
            $query = mysqli_query($con,
            "INSERT INTO post(content, post_time, likes, user_id)
                VALUES
            ('$content','$time','$likes','$userid')")
                or die(mysqli_error($con));
        
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
                            window.location = "../view/edit.php"
                        </script>';
        }
    }
?>