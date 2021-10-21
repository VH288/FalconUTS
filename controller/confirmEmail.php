<?php
    require('../verifemail/config.php');
    if(isset($_GET['code'])){
        $code = $_GET['code'];
        $sql = "SELECT * FROM user WHERE verif_code='$code'";
        $query = mysqli_query($con,$sql);
        if(mysqli_num_rows($query)>0){
            $user = mysqli_fetch_assoc($query);
            if($user['is_verified'] == 0){
                $id = $user['id'];
                $sql = "UPDATE user SET is_verified = 1 where id = '$id'";
                $query = mysqli_query($con,$sql);
                // Semua echo sini nih akan di tampilkan di layar web pas pencet link verifikasi di email
                if($query){
                    echo "Account verified successfully";
                }
                else{
                    echo "Fail verification (ERROR : ".$query.")";
                }
            }else{
                echo "This Account has Verified Before";
            }
        }else{
            echo "CODE Not Found or Not Valid";
        }
    }else{
        echo "code unavailable";
    }
?>