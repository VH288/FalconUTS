<?php
    $first_name = "";
    $last_name = "";
    $username = "";
    $email = "";
    $phone = "";
    $checkpassword="";
    $error_array = array();
    if(isset($_POST['register'])){
        include('../database/db.php');
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $checkpassword=$_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        
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

        //cek username
        if(!empty($username)){
            if(strlen($username)<=25 && strlen($username)>= 8){
                $e_check = mysqli_query($con,"SELECT username FROM user WHERE username='$username'");
                $num_rows = mysqli_num_rows($e_check);
                
                if($num_rows != 0){
                    array_push($error_array,"Username already in use");
                }else{
                    if(preg_match('/[^A-Za-z]/',$last_name)){
                        array_push($error_array,"Username must only contain letter and number");
                    }
                    
                }
            }else{
                array_push($error_array,"Username must not less than 8 and more than 25 characters");
            }
        }else{
            array_push($error_array,"Username is empty");
        }

        //cek password
        if(!empty($checkpassword)){
            if(strlen($checkpassword)>25 || strlen($checkpassword)<8){
                array_push($error_array,"Password must not less than 8 and more than 25 characters");
            }
        }else{
            array_push($error_array,"Password is empty");
        }

        //cek email
        if(!empty($email)){
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                $e_check = mysqli_query($con,"SELECT email FROM user WHERE email='$email'");
                $num_rows = mysqli_num_rows($e_check);
                if($num_rows != 0){
                    array_push($error_array,"Email already in use");
                }
            }else{
                array_push($error_array,"Email is invalid format");
            }
        }else{
            array_push($error_array,"Email is empty");
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
        
            $query = mysqli_query($con,
                "INSERT INTO user(first_name,last_name,username,password,email,phone)
                    VALUES
                    ('$first_name','$last_name','$username','$password','$email','$phone')")
                    or die(mysqli_errno($con));
            if($query){
                echo'
                    <script>
                        window.location = "../view/login.php"
                    </script>
                ';
                
            }
    
        }
    }

?>