<?php
    if(isset($_GET['id'])){
        include ('../database/db.php');
        $id = $_GET['id'];
        $queryDelete = mysqli_query($con, "DELETE FROM post WHERE id='$id'") or die(mysqli_error($con));
        
            echo
                '<script>
                    window.location = "../view/home.php"
                </script>';
        
    }
?>