<?php
include_once '../Views/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8 without BOM">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css" />
    <title>Document</title>
</head>
<body>
      <main role="main" class="m-0 text-light" id="cover">
        <h1 class="cover-heading text-monospace">Help has Arrived.</h1>
        <p class="lead">
            WeSupport is an IT Service Management tool. We are trained to
            cater to your daily needs of having a smooth IT infra pipeline.
            With our highly available and experienced support team,
            we intend to keep you out of daily IT problems without even asking
            and solve issues, if any.
        </p>
      </main>
      <section class="container-fluid row justify-content-center" id="about">
          <p class="text-center font-italic" id="quote"><span>Always Help someone, you might be the only one that does!!</span> </p>
          <div class="col-sm-9 d-flex flex-row justify-content-center">
          <div class="col-sm-3 text-center m-3 mt-0 p-2" id="what">
              <div>
              <img src="../images/help.png" alt="about" class="rounded-circle w-100">
              </div>
              <h2 class="text-center mt-3 p-2 h3 text-monospace">What we Do?</h2>
              <p>We provide help to our customers who are having any sort of issues with their IT services.</p>
              <a class="btn border border-success text-monospace text-success" href="#cover">About Us</a>
          </div>
          <div class="col-sm-3 text-center m-3 p-2" id="how">
              <img src="../images/staff.png" alt="staff" class=" rounded-circle w-75">
              <h2 class="mt-3 p-2  h3 text-monospace">How we do?</h2>
              <p>We have a team of trained support staff to assist you with your problems.</p>
              <a class="btn border border-info text-monospace text-info" href="#contact">Our Team</a>
          </div>
          <div class="col-sm-3 text-center m-3 p-3" id="connect">
              <img src="../images/ticket.jpeg" alt="ticket" class="rounded-circle w-75">
              <h2 class="mt-3 p-2 text-monospace h3">New Ticket</h2>
              <p>If you are having any issues you can log a new ticket and we will assist you with your problem.</p>
              <a class="btn border border-success text-monospace text-success" href="../Views/newticket.php">Raise new Ticket</a>
          </div>
        </div>
      </section>
</body>
</html>
      <?php include_once '../Views/footer.php'?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../../../../Cover%20Template%20for%20Bootstrap_files/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../../Cover%20Template%20for%20Bootstrap_files/popper.min.js"></script>
    <script src="../../../../../Cover%20Template%20for%20Bootstrap_files/bootstrap.min.js"></script>
    </div>
