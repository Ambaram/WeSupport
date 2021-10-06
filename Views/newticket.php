<?php
include_once "./header.php";
$userxml = simplexml_load_file("../Data/Tickets/Support_Tickets.xml");
$priorities = ["Critical", "High", "Medium", "Low"];
if (isset($_POST['save'])) {
    if (isset($_SESSION['id'])) {
        $tid = "TT" . rand(10000, 99999);
        $name = $_POST['client'];
        $name = $_POST['subject'];
        $name = $_POST['created'];
        $name = $_POST['priority'];
        $name = $_POST['description'];
        header('Location:../Views/index.php');
    } else {
        header('Location:../Views/login.php');
    }
}
?>
<form action="" method="post">
    <div class="row container m-auto">
        <div class="col-sm-6 form-group">
            <label for="client">Name(required)</label>
            <input required type="text" class="form-control" name="client" id="client" value="<?php echo $first . " " . $last ?>">
        </div>
        <div class="col-sm-6 form-group">
            <label for="subject">Application Name(required)</label>
            <input required type="text" class="form-control" name="subject" id="subject" value="<?php echo $subject ?>">
        </div>
        <div class="col-sm-4 form-group">
            <label for="created">Created(required)</label>
            <input required type="date" class="form-control" name="created" id="created" value="<?php echo $created ?>">
        </div>
        <div class="col-sm-4 form-group">
            <label for="priority">Priority(required)</label>
            <select required name="priority" id="priority" class="form-control">
                <?php foreach ($priorities as $ids => $option) {?>
                <option value="<?php echo $option ?>"<?php
if ($option == $priority) {
    echo "selected";
}?>><?php echo $option ?></option>
                <?php }?>
            </select>
        </div>
        <div  class="col-sm-12 form-group m-auto">
            <label for="description">Description(required)</label>
            <input required type="text" class="form-control" name="description" id="description" value="<?php echo $description ?>">
        </div>
        <div class="col-sm-12 form-group m-auto">
            <label for="messages">Messages</label>
            <?php echo $box ?>
        </div>
        <div class="col-sm-12 form-group">
            <label for="new" class="form-label">Any Other Comment</label>
            <input type="text" value="<?php echo $new ?>" name="new" id="new" class="form-control">
            <input type="submit" value="Post Message" name="post" class="btn btn-primary m-4 ml-0 float-right">
        </div>
        <div class="col-sm-2 form-group">
            <input type="hidden" value="<?php echo $t_id ?>" name='t_id' id="t_id" class="form-control">
            <input type="hidden" value="<?php echo $state ?>" name='none' id="state" class="form-control">
            <input type="submit" value="Save" name="save" id="save" class="form-control col-sm-9 btn btn-success">
        </div>
    </div>
</form>
<?php
include_once './footer.php';
?>