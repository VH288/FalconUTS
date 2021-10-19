<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $user = $_SESSION['user'];
        $id_user = $user['id'];
        $query = "SELECT * FROM post WHERE id='$id'";
        $run = mysqli_query($con,$query)or die(mysqli_error($con));
        $posts = mysqli_fetch_assoc($run);
        $query2 = "SELECT * FROM likes WHERE id_post='$id' && id_user='$id_user'";
        $run2 = mysqli_query($con,$query2)or die(mysqli_error($con));
        $num_rows = mysqli_num_rows($run2);
        if($num_rows == 0){
            $query3 = "UPDATE post SET likes=likes+1 WHERE id='$id'";
            $run3 = mysqli_query($con,$query3)or die(mysqli_error($con));
            $query4 = "INSERT INTO likes(id_post,id_user) VALUES('$id','$id_user')";
            $run4 = mysqli_query($con,$query4)or die(mysqli_error($con));
        }
        else{
            $query3 = "UPDATE post SET likes=likes-1 WHERE id='$id'";
            $run3 = mysqli_query($con,$query3)or die(mysqli_error($con));
            $query4 = "DELETE FROM likes WHERE id_post='$id' && id_user='$id_user'";
            $run4 = mysqli_query($con,$query4)or die(mysqli_error($con));
        }
        
        }
?>