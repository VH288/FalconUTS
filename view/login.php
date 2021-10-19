<?php
    include '../controller/loginController.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrit
        y="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Login Page</title>

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

            .register-link {
                color: rgb(11, 11, 117);
                font-size: x-small;
            }

            a {
                color: rgb(11, 11, 117);
                text-decoration: none;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="login-page" style="background-color: rgb(11, 11, 117);">
            <div class="container min-vh-100 d-flex align-items-center justify-content-center">
                <div class="card bg-light ma-5 shadow" style="min-width: 30%;">
                    <div class="card-header fw-bold text-center">LOGIN
                        <a href="/Falcon">
                            <button type="button" class="btn-close position-absolute top-25 end-0 me-3" aria-label="Close"></button>
                        </a>
                    </div>
                    <div class="card-body">
                        <p class="validation text-center text-danger fw-bold" style="font-size: 15px;">
                            <?php echo $error; ?>
                        </p>
                        <form action="./login.php" method="post">
                            <div class="mb-1 mt-3">
                                <input class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Username" required>
                            </div>
                            <div class="mb-4 mt-2">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="col d-grid mb-5">
                                <button type="submit" class="btn btn-primary" name="login">Login</button>
                            </div>
                            <div class="register-link col d-grid mt-2 text-center">
                                <p>Dont Have any Account?
                                    <a href="./register.php">Register</a> 
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