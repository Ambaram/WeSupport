<!-- List of all the tickets present in the system -->
<!-- all the tickets will be visible to an admin user.Only ticket opened by specific client will be visible to that specific client--->
<?php
// load the user and ticket xml
$ticketxml = simplexml_load_file('../Data/Tickets/Support_Tickets.xml');
$userxml = simplexml_load_file("../Data/Users/Users.xml");
?>
<?php
$rows = "";
if(isset($_SESSION['id'])) {
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
    elseif($userxml->xpath("//User/Userid[text()='$id']/../Type[text()='Admin']")){
        $t = $ticketxml->children();
        for ($i=0;$i<count($t);$i++) {
            $t_id = $t[$i]->ID ;
            $rows .= "<tr>";
            $rows .= "<td>".$t[$i]->ID."</td>".
                "<td>".$t[$i]->Priority."</td>".
                "<td>".$t[$i]->Subject."</td>".
                "<td>".$t[$i]->State."</td>".
                "<td>".$t->xpath("//Timetracking/Created/Date")[$i]."</td>".
                "<td>".$t->xpath("//Client/Name/First")[$i]." ".$t->xpath("//Client/Name/Last")[$i]."</td>".
                "<td>".$t->xpath("//Admin/Userid")[$i]."</td>".
                "<td>".$t->xpath("//Timetracking/Lastupdated/Date")[$i]."</td>".
                "<td>".
                "<form method='post' action= 'ticketdetail.php?id=$t_id'>" .
                "<input type = 'hidden' name='t_id' value='$t_id'/>" .
                "<input type='submit' id='ticket' name = 'ticket' value='View Details' class='btn btn-primary'/>" .
                "</form> ".
                "</td>"."</tr>";
        }
    }
}
include_once '../Views/header.php'
?>

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
                <?php  echo $rows; ?>
            </tbody>
        </table>
    </div>
</main>
<?php include_once '../Views/footer.php'?>