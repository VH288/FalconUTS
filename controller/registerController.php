<?php
    require ('../verifemail/config.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    require '../verifemail/PHPMailer/src/Exception.php';
    require '../verifemail/PHPMailer/src/OAuth.php';
    require '../verifemail/PHPMailer/src/PHPMailer.php';
    require '../verifemail/PHPMailer/src/POP3.php';
    require '../verifemail/PHPMailer/src/SMTP.php';

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
        $code = md5($email.date('Y-m-d'));

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
                "INSERT INTO user(first_name,last_name,username,password,email,phone,verif_code)
                    VALUES
                    ('$first_name','$last_name','$username','$password','$email','$phone','$code')")
                    or die(mysqli_errno($con));



            
            
            //Create a new PHPMailer instance
            $mail = new PHPMailer();

            //Tell PHPMailer to use SMTP
            $mail->isSMTP();

            //Enable SMTP debugging
            //SMTP::DEBUG_OFF = off (for production use)
            //SMTP::DEBUG_CLIENT = client messages
            //SMTP::DEBUG_SERVER = client and server messages
            $mail->SMTPDebug = SMTP::DEBUG_OFF;

            //Set the hostname of the mail server
            $mail->Host = 'smtp.gmail.com';
            //Use `$mail->Host = gethostbyname('smtp.gmail.com');`
            //if your network does not support SMTP over IPv6,
            //though this may cause issues with TLS

            //Set the SMTP port number:
            // - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
            // - 587 for SMTP+STARTTLS
            $mail->Port = 465;

            //Set the encryption mechanism to use:
            // - SMTPS (implicit TLS on port 465) or
            // - STARTTLS (explicit TLS on port 587)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

            //Whether to use SMTP authentication
            $mail->SMTPAuth = true;

            //Username to use for SMTP authentication - use full email address for gmail
            $mail->Username = 'vincenttugas1234@gmail.com';

            //Password to use for SMTP authentication
            $mail->Password = 'tugas1234';

            //Set who the message is to be sent from
            //Note that with gmail you can only use your account address (same as `Username`)
            //or predefined aliases that you have configured within your account.
            //Do not use user-submitted addresses in here
            $mail->setFrom('no-reply@falcon.com', 'Falcon');

            //Set an alternative reply-to address
            //This is a good place to put user-submitted addresses
            //$mail->addReplyTo('replyto@example.com', 'First Last');

            //Set who the message is to be sent to
            $mail->addAddress($email, $username);

            //Set the subject line
            $mail->Subject = 'Account Verification - Falcon';

            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            $body="Hi ,".$username."<br>Please verify your email before access our website : <br> http://localhost:8081/falcon/controller/confirmEmail.php?code=".$code."";
            $mail->Body=$body;

            //Replace the plain text body with one created manually
            $mail->AltBody = 'Account Verification';

            //Attach an image file
            $mail->addAttachment('images/phpmailer_mini.png');

            //send the message, check for errors
            if (!$mail->send()) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Register sukses, silahkan login!';
                //Section 2: IMAP
                //Uncomment these to save your message in the 'Sent Mail' folder.
                #if (save_mail($mail)) {
                #    echo "Message saved!";
                #}
            }
            echo'
                    <script>
                        window.location = "../view/login.php"
                    </script>
                ';
        }
    }

?>