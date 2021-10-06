<!-- header file to be included for all the pages -->
<?php ob_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="ambaram portfolio">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" type="text/x-icon" href="./favicon.ico">
    <title>WeSupport</title>
</head>
<body class="container-fluid p-0">
<header>
    <nav class="navbar justify-content-center" id="nav">
        <div class="navbar navbar-sm-collapse text-monospace" id="fixnav">
            <div class="navbar-nav d-flex flex-row" id="links">
                <a class="nav-item nav-link py-4 px-3 text-info" id="navbar-link" href="/Views/index.php#about">About us</a>
                <a class="nav-item nav-link py-4 px-3 text-info" id="navbar-link" href="../Views/listtickets.php">View Tickets</a>
                <a class="navbar-brand mx-4 py-0 text-center" href="./index.php">
                    <img src="../images/picture.png" class="rounded-circle w-50" alt="logo">
                </a>
                <a class="nav-item nav-link py-4 px-4 text-info" id="navbar-link" href="#contact">Contact</a>
                <?php if(isset($_SESSION['id'])){?>
                    <a class="nav-item nav-link py-4 px-3 text-info" id="navbar-link" href="./login.php">Logout</a>
                <?php }
                else{ ?>
                    <a class="nav-item nav-link py-4 px-3 text-info" id="navbar-link" href="./logout.php">Login / Signup</a>
               <?php } ?>
            </div>
        </div>
    </nav>
</header>
</body>
</html>