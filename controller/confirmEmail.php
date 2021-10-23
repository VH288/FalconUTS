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
                    echo '<script>alert("Account verified successfully");window.location = "../view/login.php"</script>';
                }
                else{
                    echo '<script>alert("Fail verification (ERROR : '.$query.')");window.location = "../view/login.php"</script>';
                }
            }else{
                echo '<script>alert("This Account has Verified Before");window.location = "../view/login.php"</script>';
            }
        }else{
            echo '<script>alert("CODE Not Found or Not Valid");window.location = "../view/login.php"</script>';
        }
    }else{
        echo '<script>alert("code unavailable");window.location = "../view/login.php"</script>';
    }
?>