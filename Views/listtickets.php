<?php
include_once "../Views/header.php";
// load the user and ticket xml
$ticketxml = simplexml_load_file("../Data/Tickets/Support_Tickets.xml");
$userxml = simplexml_load_file("../Data/Users/Users.xml");
$rows = "";
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
// generate the required list by getting node data of specific ticket using xpath.
    // client will see only their tickets
    if ($userxml->xpath("//User/Userid[text()='$id']/../Type[text()='Client']")) {
        $first = $ticketxml->xpath("//Client/Userid[text()='$id']/../../Client/Name/First");
        $last = $ticketxml->xpath("//Client/Userid[text()='$id']/../../Client/Name/Last");
        $userid = $ticketxml->xpath("//Client/Userid[text()='$id']/../../Admin/Userid");
        $created = $ticketxml->xpath("//Client/Userid[text()='$id']/../../Timetracking/Created/Date");
        $updated = $ticketxml->xpath("//Client/Userid[text()='$id']/../../Timetracking/Lastupdated/Date");
        $t = $ticketxml->xpath("//Client/Userid[text()='$id']/../..");
        for ($i = 0; $i < count($t); $i++) {
            $t_id = $t[$i]->ID;
            $rows .= "<tr>";
            $rows .= "<td>" . $t[$i]->ID . "</td>" . "<td>" . $t[$i]->Priority . "</td>" . "<td>" . $t[$i]->Subject . "</td>" . "<td>" . $t[$i]->State . "</td>" .
                "<td>" . $created[$i] . "</td>" . "<td>" . $first[$i] . " " . $last[$i] . "</td>" . "<td>$userid[$i]</td>" . "</td>"
                . "<td>" . $updated[$i] . "</td>" .
                "<td>" .
                "<form method='post' action= 'ticketdetail.php?id=$t_id'>" .
                "<input type = 'hidden' name='id' value='$id'/>" .
                "<input type = 'hidden' name='t_id' value='$t_id'/>" .
                "<input type='submit' id='ticket' name = 'ticket' value='View Details' class='btn btn-primary'/>" .
                "</form> " . "</td>";
            $rows .= "</tr>";
        }

    }
    // admin will see all the tickets.
    elseif ($userxml->xpath("//User/Userid[text()='$id']/../Type[text()='Admin']")) {
        $t = $ticketxml->children();
        for ($i = 0; $i < count($t); $i++) {
            $t_id = $t[$i]->ID;
            $rows .= "<tr>";
            $rows .= "<td>" . $t[$i]->ID . "</td>" .
            "<td>" . $t[$i]->Priority . "</td>" .
            "<td>" . $t[$i]->Subject . "</td>" .
            "<td>" . $t[$i]->State . "</td>" .
            "<td>" . $t->xpath("//Timetracking/Created/Date")[$i] . "</td>" .
            "<td>" . $t->xpath("//Client/Name/First")[$i] . " " . $t->xpath("//Client/Name/Last")[$i] . "</td>" .
            "<td>" . $t->xpath("//Admin/Userid")[$i] . "</td>" .
            "<td>" . $t->xpath("//Timetracking/Lastupdated/Date")[$i] . "</td>" .
                "<td>" .
                "<form method='post' action= 'ticketdetail.php?id=$t_id'>" .
                "<input type = 'hidden' name='t_id' value='$t_id'/>" .
                "<input type='submit' id='ticket' name = 'ticket' value='View Details' class='btn btn-primary'/>" .
                "</form> " .
                "</td>" . "</tr>";
        }
    }
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8 without BOM">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <main id="main" class="mt-0 pt-0">
    <div id="ticketlist" class="container text-center mt-0 mb-0">
        <table class="table table-striped text-center table-responsive mx-auto my-0 p-0 pt-0">
            <thead class="mx-auto">
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
                <?php echo $rows; ?>
            </tbody>
        </table>
    </div>
</main>
</body>
</html>
<?php include_once '../Views/footer.php'?>