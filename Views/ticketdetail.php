<?php
$ticketxml = simplexml_load_file('../Data/Tickets/Support_Tickets.xml');
?>
<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ticket Detail - Ticket ID</title>
    <meta charset="utf-8">
    <meta name="" content="">
    <meta name="" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<header class="container">
    <nav>
        <ul class="nav">
            <li class="nav-item" >
                <a class="nav-link active" href="#">Home</a>
            </li>
            <li class="nav-item" >
                <a class="nav-link active" href="#">Tickets</a>
            </li>
            <li class="nav-item" >
                <a class="nav-link active" href="#">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">Update</a>
            </li>
        </ul>
    </nav>
</header>
<form action="" method="get">
    <div class="row container m-auto">
        <div class="col-sm-6 form-group">
            <label for="id">Ticket Number</label>
            <input type="text" name="id" id="id" class="form-control" value="">
        </div>
        <div class="col-sm-6 form-group">
            <label for="client">Client</label>
            <input type="text" class="form-control" name="client" id="client" value="">
        </div>
        <div class="col-sm-6 form-group">
            <label for="admin">Assigned</label>
            <input type="text" class="form-control" name="admin" id="admin" value="">
        </div>
        <div class="col-sm-6 form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" name="subject" id="subject" value="">
        </div>
        <div class="col-sm-4 form-group">
            <label for="created">Created</label>
            <input type="date" class="form-control" name="created" id="created" value="">
        </div>
        <div class="col-sm-4 form-group">
            <label for="priority">Priority</label>
            <select name="priority" id="priority" class="form-control">
                <option value="1">Critical</option>
                <option value="2">High</option>
                <option value="3">Medium</option>
                <option value="4">Low</option>
            </select>
        </div>
        <div class="col-sm-4 form-group">
            <label for="state">State</label>
            <select name="status" id="status" class="form-control">
                <option value="1">Assigned</option>
                <option value="2">Work in Progress</option>
                <option value="3">Pending</option>
                <option value="4">Closed</option>
            </select>
        </div>
    </div>
    <div  class="row container form-group m-auto">
        <label for="subject">Description</label>
        <input type="text" name="subject" id="subject" class="form-control" value="">
    </div>
    <div class="row form-group m-auto">
        <!-- Simple XML Message here -->
    </div>
</form>
</body>
</html>
