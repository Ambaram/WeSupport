<!-- User Login Page -->
<?php
// load the xml files
$userxml = simplexml_load_file('../Data/Users/Users.xml');
$ticketxml = simplexml_load_file('../Data/Tickets/Support_Tickets.xml');
?>
<?php
// get all the children from userxml to verify the details entered while logging in
$users = $userxml->children();
$iderror = "";
$passerror = "";
$parent = "";
$user = array();
$passwords = array();
$ids = $users->xpath("//User/Userid"); // get all the userids.
$passes = $users->xpath("//User/Password"); // get all the passwords.
foreach ($ids as $x)
{
    $i = strip_tags($x->asXML());
    array_push($user,$i);
}
foreach ($passes as $item) {

    $p = strip_tags($item->asXML());
    array_push($passwords,$p);
}
if(isset($_POST['login']))
    {
        $id = $_POST['userid'];
        $pass = $_POST['password'];
        if(isset($id))
        {
            if($id == '')
            {
                $iderror = 'Please provide userid';
                echo $iderror;
            }
            elseif (in_array($id,$user))
            {
                if (array_search($id,$user) == array_search($pass,$passwords))
                {
                    // if userid and password matches, user will be logged in
                    session_start();
                    $_SESSION['id'] = $id;
                    header("Location: listtickets.php?id='$id'");
                    die();
                }
                elseif(!(array_search($id,$user) == array_search($pass,$passwords)))
                {
                    $passerror = "Incorrect password";
                    echo $passerror;
                }
            }
            else
            {
                $iderror="User id not found";
                echo $iderror;
            }
        }
    }

include_once 'header.php';
?>
<main id="login">
    <h1 class="h3 text-center">Login to view tickets</h1>
    <form action="./listtickets.php" method="post" class ="col-md-6 m-auto">
        <div class="column container border border-dark p-0 m-0">
            <div class="form-group col-sm-6 m-auto">
                <label for="userid" class="form-label">Userid</label>
                <input type="text" name="userid"  id="userid" class="form-control">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="col-md-12 text-center m-0">
                <input type="submit" class="btn btn-primary" value="Login" name="login">
            </div>
        </div>
    </form>
    <div class="text-center">
        <h2 class="h5">Don't have an account</h2>
        <a href="register.php">Register Here</a>
    </div>
</main>

<?php include_once 'footer.php'?>
