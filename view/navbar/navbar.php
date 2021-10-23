<?php
    session_start();
    if (!$_SESSION['isLogin']) {
        header("location: ../login.php");
    }else {
        include('../database/db.php');
    }
    echo '
        <!doctype html>
        <html lang="en">
            <head>
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <!-- Bootstrap CSS -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                
                <title>Dashboard</title>
                <style>
                    .container-fluid {
                        font-size: 15px;
                        font-family: Verdana;
                    }

                    .row{
                        font-size: 18px;
                    }

                    .btn-secondary {
                        background-color:  rgb(11, 11, 117);
                        border-style: none;
                        border-radius: 20px;
                        box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                        font-size: 15px;
                    }
                
                    .btn-danger {
                        background-color:  rgb(255, 68, 68);
                        border-style: none;
                        border-radius: 20px;
                        box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                        font-size: 15px;
                    }
                </style>
            </head>
            <body>
                    <div class="dashboard sticky-top">
                        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(23, 17, 75);">
                            <div class="container-fluid ms-5 me-5">
                                <a class="navbar-brand" href="home.php">
                                    <img src="https://cdn.discordapp.com/attachments/841580989113434135/899247180978728990/unknown.png" alt="FALCON" width="140" height="30">
                                </a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav ms-auto mb-0">
                                        <li class="nav-item">
                                            <a class="nav-link" href="../view/home.php">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../view/profile.php">Profile</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../controller/logoutController.php">Logout</a>
                                        </i>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="row min-vh-100" style="background-color:whitesmoke; padding:0; margin:0" id="blur">
    '
?>