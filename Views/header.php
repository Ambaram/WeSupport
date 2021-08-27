<!-- header file to be included for all the pages -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="ambaram portfolio">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="shortcut icon" type="text/x-icon" href="favicon.ico">
    <title>WeSupport</title>
</head>
<body class="container-fluid">
<header>
    <nav class="navbar" id="nav">
        <a class="navbar-brand" href="../Views/listtickets.php">
            <img src="../images/picture" class="w-50 m-2" alt="logo">
        </a>
        <div class="navbar navbar-sm-collapse text-dark" id="fixnav">
            <div class="navbar-nav d-flex flex-row" id="links">
                <a class="nav-item nav-link active p-4 text-dark" id="navbar-link" href="listtickets.php">Home <span
                            class="sr-only">(current)</span></a>
                <a class="nav-item nav-link p-4 text-dark" id="navbar-link" href="#">About</a>
                <a class="nav-item nav-link p-4 text-dark" id="navbar-link" href="listtickets.php">Tickets</a>
                <a class="nav-item nav-link p-4 text-dark" id="navbar-link" href="#">Contact</a>
                <?php if(isset($_SESSION['id'])){?>
                    <a class="nav-item nav-link p-4 text-dark" id="navbar-link" href="login.php">Logout</a>
                <?php }
                else{ ?>
                    <a class="nav-item nav-link p-4 text-dark" id="navbar-link" href="logout.php">Login</a>
               <?php } ?>
            </div>
        </div>
    </nav>
</header>
</body>
</html>