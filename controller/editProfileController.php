<?php
    $user=$_SESSION['user'];
    $id=$user['id'];

    $first_name=$user['first_name'];
    $last_name=$user['last_name'];
    $phone=$user['phone'];
    $checkpassword="";

    $error_array=array();

    if(isset($_POST['edit'])){
        include ('../database/db.php');
        
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $phone=$_POST['phone'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $checkpassword=$_POST['password'];

        //cek firstname
        if(!empty($first_name)){
            if(strlen($first_name) <= 25 && strlen($first_name) >= 2){
                if(preg_match('/[^A-Za-z]/',$first_name)){
                    array_push($error_array,"First name must only contain letter");    
                }
            }else{
                array_push($error_array,"First name must not less than 2 and more than 25 characters");
            }
        }else{
            array_push($error_array,"First name is empty");
        }

        //cek lastname
        if(!empty($last_name)){
            if(strlen($last_name) <= 25 && strlen($last_name) >= 2){
                if(preg_match('/[^A-Za-z]/',$last_name)){
                    array_push($error_array,"Last name must only contain words");    
                }
            }else{
                array_push($error_array,"Last name must not less than 2 and more than 25 characters");
            }
        }else{
            array_push($error_array,"Last name is empty");
        }

        //cek password
        if(!empty($checkpassword)){
            if(strlen($checkpassword)>25 || strlen($checkpassword)<8){
                array_push($error_array,"Password must not less than 8 and more than 25 characters");
            }
        }else{
            array_push($error_array,"Password is empty");
        }

        //cek phonenumber
        if(!empty($phone)){
            if(strlen($phone)<=13 && strlen($phone)>= 11){
                if(preg_match('/[^0-9]/',$phone)){
                    array_push($error_array,"Phone number must only contain number");
                }
            }else{
                array_push($error_array,"Phone number must not less than 11 and more than 13 characters");
            }
        }else{
            array_push($error_array,"Phone number is empty");
        }

        if(empty($error_array)){
        
            $query="UPDATE user SET first_name='$first_name', last_name='$last_name', phone='$phone', password='$password' WHERE id='$id'";
            $hasil=mysqli_query($con,$query)or die(mysqli_error($con));
            if($hasil){
                $nyariquery = "SELECT * FROM user WHERE id ='$id'";
                $pencarian = mysqli_query($con,$nyariquery)or die(mysqli_error($con));
                $_SESSION['user'] = mysqli_fetch_assoc($pencarian);
                echo
                '<script>
                    window.location = "../view/profile.php"
                </script>';
            }
        }
    }
?>