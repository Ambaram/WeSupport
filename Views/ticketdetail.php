<!-- page will show details of the requested ticket id -->
<?php
session_start();
// load the ticket and user xml file
$ticketxml = simplexml_load_file('../Data/Tickets/Support_Tickets.xml');
$userxml = simplexml_load_file('../Data/Users/Users.xml');
?>
<?php
$priorities = ["Critical","High","Medium","Low"] ;
$states = ["Created","Assigned", "In Progress" , "Pending", "Closed"];
$new = "";
$id = $_SESSION['id'];
$t_id = $_POST['t_id'] ;
$description = $num = "" ;
$num = $t_id;
$t = $ticketxml->xpath("//Ticket/ID[text()='$t_id']/..") ;
$priority = $t[0]->Priority ;
$first = $t[0]->Client->Name->First;
$last = $t[0]->Client->Name->Last;
$admin = $t[0]->Admin->Userid;
$subject = $t[0]->Subject;
$created = $t[0]->Timetracking->Created->Date;
$state = $t[0]->State;
$description = $t[0]->Description;
$messages = $t[0]->Messages->Message;
if(isset($_POST['ticket'])){
    $box = "";
    foreach ($messages as $message) {
        $box.= "<div class='container form-control m-2 ml-0'>".$message->Content."(Message by ".$message->Userid." at ".$message->Timestamp.")"."</div>";
    }
}

// admin will be able to change the status of the ticket.
if (isset($_POST['save'])) {
    if(isset($_POST['id'])){
        if ($userxml->xpath("//User/Userid[text()='$id']/../Type[text()='Admin']")){
            $t[0]->State = $_POST['state'] ;
            $ticketxml->saveXML('../Data/Tickets/Support_Tickets.xml');
            $box = "";
            foreach ($messages as $message) {
                $box.= "<div class='container form-control m-2 ml-0'>".$message->Content."(Message by ".$message->Userid." at ".$message->Timestamp.")"."</div>";
            }
            header("Location:listtickets.php");
        }
        else {
            $box = "";
            foreach ($messages as $message) {
                $box .= "<div class='container form-control m-2 ml-0'>" . $message->Content . "(Message by " . $message->Userid . " at " . $message->Timestamp . ")" . "</div>";
            }
            echo "<script language = 'javascript'>";
            echo "alert('action not allowed')";
            echo "</script>";
        }
    }
}
// Messages between the client and user during the solution of the problem opened.
// user can post messages.
if (isset($_POST['post'])) {
    $newmsg = $t[0]->Messages->addChild("Message");
    $newmsg->addChild('Content',$_POST['new']);
    $newmsg->addChild('Timestamp',date('Y/m/d'));
    $newmsg->addChild('Userid',$t[0]->Client->Userid);
    $ticketxml->saveXML("../Data/Tickets/Support_Tickets.xml") ;
    $box = "";
    foreach ($messages as $message) {
        $box.= "<div class='container form-control m-2 ml-0'>".$message->Content."(Message by ".$message->Userid." at ".$message->Timestamp.")"."</div>";
    }
}
include_once 'header.php'
?>
<form action="" method="post">
    <div class="row container m-auto">
        <div class="col-sm-6 form-group">
            <label for="id">Ticket Number</label>
            <input type="text" name="id" id="id" class="form-control" value=<?php echo $num?>>
        </div>
        <div class="col-sm-6 form-group">
            <label for="client">Client</label>
            <input type="text" class="form-control" name="client" id="client" value="<?php echo $first . " ".$last ?>">
        </div>
        <div class="col-sm-6 form-group">
            <label for="admin">Assigned</label>
            <input type="text" class="form-control" name="admin" id="admin" value="<?php echo $admin ?>">
        </div>
        <div class="col-sm-6 form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" name="subject" id="subject" value="<?php echo $subject ?>">
        </div>
        <div class="col-sm-4 form-group">
            <label for="created">Created</label>
            <input type="date" class="form-control" name="created" id="created" value="<?php echo $created ?>">
        </div>
        <div class="col-sm-4 form-group">
            <label for="priority">Priority</label>
            <select name="priority" id="priority" class="form-control">
                <?php foreach ($priorities as $ids => $option) {?>
                <option value="<?php echo $option?>"<?php
                if($option == $priority){
                echo "selected";
                }?>><?php echo $option ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-sm-4 form-group">
            <label for="state">State</label>
            <select name="state" id="state" class="form-control">
                <?php foreach ($states as $ids => $option) {?>
                    <option value="<?php echo $option?>"
                        <?php
                        if($option == $state){
                            echo "selected";
                        }?>>
                        <?php echo $option ?></option>
                <?php } ?>
            </select>
        </div>
        <div  class="col-sm-12 form-group m-auto">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" id="description" value="<?php echo $description ?>">
        </div>
        <div class="col-sm-12 form-group m-auto">
            <label for="messages">Messages</label>
            <?php echo $box?>
        </div>
        <div class="col-sm-12 form-group">
            <label for="new" class="form-label">New Message</label>
            <input type="text" value="<?php echo $new ?>" name="new" id="new" class="form-control">
            <input type="submit" value="Post Message" name="post" class="btn btn-primary m-4 ml-0 float-right">
        </div>
        <div class="col-sm-2 form-group">
            <input type="hidden" value="<?php echo $t_id ?>" name='t_id' id="t_id" class="form-control">
            <input type="hidden" value="<?php echo $state?>" name='none' id="state" class="form-control">
            <input type="submit" value="Save" name="save" id="save" class="form-control col-sm-9 btn btn-success">
        </div>
    </div>
</form>
<?php include_once 'footer.php'?>
