<?php
    include '../controller/registerController.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrit
        y="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="registerPage.css">
        <title>Register Page</title>

        <style>
            .form-control::placeholder { 
                color: rgb(11, 11, 117);
                opacity: 50%;
                font-size: small;
            }               

            .btn-primary {
                background-color:  rgb(11, 11, 117);
                border-style: none;
            }

            .login-link {
                color: rgb(11, 11, 117);
                font-size: x-small;
            }

            a {
                color: rgb(11, 11, 117);
                text-decoration: none;
                font-weight: bold;
            }

            .validation{
                color: red;
                font-size: 12px;
                font-weight: bold;
                padding-top: 5px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="register-page" style="background-color: rgb(11, 11, 117);">
            <div class="container min-vh-100 d-flex align-items-center justify-content-center">
                <div class="card text-dark bg-light ma-5 shadow" style="min-width: 30%;">
                    <div class="card-header fw-bold text-center">REGISTER
                        <a href="/Falcon">
                        <button type="button" class="btn-close position-absolute top-25 end-0 me-3" aria-label="Close"></button>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="register.php" method="post">
                            <div class="mb-2 mt-4">
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Firstname" required
                                    <?php
                                        if(!empty($first_name)){
                                            echo'value="'.$first_name.'"';
                                        }
                                    ?>>
                                <div class="validation">
                                    <?php
                                        if(in_array("First name is empty",$error_array)){
                                            echo'<p>First name is empty</p>';
                                        }else if(in_array("First name must not less than 2 and more than 25 characters",$error_array)){
                                            echo'<p>First name must not less than 2 and more than 25 characters</p>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="mb-2">
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Lastname" required
                                <?php
                                    if(!empty($last_name)){
                                        echo'value="'.$last_name.'"';
                                    }
                                ?>>
                                <div class="validation">
                                    <?php
                                        if(in_array("Last name is empty",$error_array)){
                                            echo'<p>Last name is empty</p>';
                                        }else if(in_array("Last name must not less than 2 and more than 25 characters",$error_array)){
                                            echo'<p>Last name must not less than 2 and more than 25 characters</p>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class=" mb-2">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required
                                    <?php
                                        if(!empty($username)){
                                            echo'value="'.$username.'"';
                                        }
                                    ?>>
                                <div class="validation">
                                    <?php
                                        if(in_array("Username must not less than 8 and more than 25 characters",$error_array)){
                                            echo'<p>Username must not less than 8 and more than 25 characters</p>';
                                        }else if(in_array("Username already in use",$error_array)){
                                            echo'<p>Username already in use</p>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="mb-2">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required
                                    <?php
                                        if(!empty($checkpassword)){
                                            echo'value="'.$checkpassword.'"';
                                        }
                                    ?>>
                                <div class="validation">
                                    <?php
                                        if(in_array("Password must not less than 8 and more than 25 characters",$error_array)){
                                            echo'<p>Password must not less than 8 and more than 25 characters</p>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="mb-2">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" required
                                    <?php
                                        if(!empty($email)){
                                            echo'value="'.$email.'"';
                                        }
                                    ?>>
                                <div class="validation">
                                    <?php
                                        if(in_array("Email is invalid format",$error_array)){
                                            echo'<p>Email is invalid format</p>';
                                        }else if(in_array("Email already in use",$error_array)){
                                            echo'<p>Email already in use</p>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required
                                    <?php
                                        if(!empty($phone)){
                                            echo'value="'.$phone.'"';
                                        }
                                    ?>>
                                <div class="validation">
                                    <?php
                                        if(in_array("Phone number must not less than 11 and more than 13 characters",$error_array)){
                                            echo'<p>Phone number must not less than 11 and more than 13 characters</p>';
                                        }else if(in_array("Phone number must only contain number",$error_array)){
                                            echo'<p>Phone number must only contain number</p>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col d-grid mb-5">
                                <button type="submit" class="btn btn-primary" name="register">Daftar</button>
                            </div>
                            <div class="login-link col d-grid mt-2 text-center">
                                <p>Already Have an Account?
                                    <a href="./login.php">Login</a> 
                                </p>
                            </div>                     
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
        MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>