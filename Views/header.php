<?php session_start()?>
<html lang="en">
<head>
    <meta charset="UTF-8 without BOM">
    <meta name="description" content="ambaram portfolio">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" type="text/x-icon" href="../Views/favicon.ico">
    <title>WeSupport</title>
</head>
<header>
    <nav class="navbar justify-content-center m-0" id="nav">
        <div class="navbar navbar-sm-collapse text-monospace" id="fixnav">
            <div class="navbar-nav d-flex flex-row" id="links">
                <a class="nav-item nav-link py-4 px-3 text-info" id="navbar-link" href="./index.php#about">About us</a>
                <a class="nav-item nav-link py-4 px-3 text-info" id="navbar-link" href="./listtickets.php">View Tickets</a>
                <a class="navbar-brand mx-4 py-0 text-center" href="./index.php">
                    <img src="../images/picture.png" class="rounded-circle w-50" alt="logo">
                </a>
                <a class="nav-item nav-link py-4 px-4 text-info" id="navbar-link" href="./index.php#contact">Contact</a>
                <?php
if (isset($_SESSION['id'])) {?>
                    <a class="nav-item nav-link py-4 px-3 text-info" id="navbar-link" href="../Views/login.php">Logout</a>
                <?php } else {?>
                    <a class="nav-item nav-link py-4 px-3 text-info" id="navbar-link" href="../Views/logout.php">Login / Signup</a>
               <?php }?>
            </div>
        </div>
    </nav>
</header>