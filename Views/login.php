<?php
$userxml = simplexml_load_file('../Data/Users/Users.xml');
$ticketxml = simplexml_load_file('../Data/Tickets/Support_Tickets.xml');
?>
<?php
$users = $userxml->children();
$iderror = "";
$passerror = "";
$parent = "";
$user = array();
$passwords = array();
$ids = $users->xpath("//User/Userid");
$passes = $users->xpath("//User/Password");
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<main>
    <h1 class="h3 text-center">Login to view tickets</h1>
    <form action="" method="post" class ="col-md-6 m-auto">
        <div class="column container border border-dark p-4 m-4">
            <div class="form-group col-md-6 m-auto p-2">
                <label for="userid" class="form-label">Userid</label>
                <input type="text" name="userid"  id="userid" class="form-control">
            </div>
            <div class="form-group col-md-6 m-auto p-2">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="col-md-12 text-center p-4">
                <input type="submit" class="btn btn-primary" value="Login" name="login">
            </div>
        </div>
    </form>
</main>
</body>
</html>
