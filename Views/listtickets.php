<?php
session_start();
$ticketxml = simplexml_load_file('../Data/Tickets/Support_Tickets.xml');
?>
<?php
if(isset($_SESSION['id']))
{
    $id = $_SESSION['id'];
    $rows = "";
    $first= $ticketxml->xpath("//Client/Userid[text()='$id']/../../Client/Name/First");
    $last = $ticketxml->xpath("//Client/Userid[text()='$id']/../../Client/Name/Last");
    $userid = $ticketxml->xpath("//Client/Userid[text()='$id']/../../Admin/Userid");
    $created = $ticketxml->xpath("//Client/Userid[text()='$id']/../../Timetracking/Created/Date");
    $updated = $ticketxml->xpath("//Client/Userid[text()='$id']/../../Timetracking/Lastupdated/Date");
    $t = $ticketxml->xpath("//Client/Userid[text()='$id']/../..");
    for($i=0; $i<count($t); $i++)
    {
    $rows.= "<tr>";
    $rows.="<td>".$t[$i]->ID."</td>"."<td>".$t[$i]->Priority."</td>"."<td>".$t[$i]->Subject."</td>"."<td>".$t[$i]->State."</td>".
        "<td>".$created[$i]."</td>"."<td>".$first[$i] ." ". $last[$i]."</td>"."<td>$userid[$i]</td>"."</td>"
        ."<td>".$updated[$i]."</td>"."<td><a href=ticketdetail.php?id=".$t[$i]->ID. " class='btn btn-primary'>View Details</a> </td>";
    $rows.="</tr>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>List Tickets</title>
    <meta name="description" content="ticket list">
    <meta name="viewport" content="width=device-width initial-scale = 1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<header class="container">
    <nav>
        <ul class="nav">
            <li class="nav-item" >
                <a class="nav-link active" href="listtickets.php">Home</a>
            </li>
            <li class="nav-item" >
                <a class="nav-link active" href="listtickets.php">Tickets</a>
            </li>
            <li class="nav-item" >
                <a class="nav-link active" href="login.php">Contact</a>
            </li>
            <li class="nav-item" >
                <a class="nav-link active" href="logout.php">Logout</a>
            </li>
        </ul>
    </nav>
</header>
<main id="main">
    <div id="ticketlist" class="container">
        <table class="table table-striped table-responsive m-auto p-4">
            <thead>
                <tr class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Status</th>
                    <th scope="col">Opened</th>
                    <th scope="col">Client</th>
                    <th scope="col">Assigned</th>
                    <th scope="col">Last Updated</th>
                    <th scope="col">Details</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!-- Simple xml load -->
                <?php  echo $rows; ?>
            </tbody>
        </table>
    </div>
</main>
</body>
</html>