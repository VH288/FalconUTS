<?php
    $username="";
    $error="";
    require ('../verifemail/config.php');
    if(isset($_POST['login'])){
        include('../database/db.php');

        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = mysqli_query($con,"SELECT * FROM user WHERE username = '$username'") or die(mysqli_error($con));

        if(mysqli_num_rows($query) == 0){
            $error="Username not Found !";
        }else{
            $user = mysqli_fetch_assoc($query);
            if(!password_verify($password, $user['password'])){
                $error="Wrong Password !";
            }else if($user['is_verified']==0){
                $error="Please verify your account first !";
            }else{
                
                    session_start();
                    $_SESSION['isLogin'] = true;
                    $_SESSION['user'] = $user;
                    echo'
                        <script>
                            window.location = "../view/home.php"
                        </script>
                    '; 
                
            }
        }
        
    }
?>