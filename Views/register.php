<?php
$userxml = simplexml_load_file("../Data/Users/Users.xml");
?>
<?php
if (isset($_POST['register'])){
    $userid = 'TT'.rand(10000,99999);
    $passerror = "";
    $hashp = md5($_POST['password']);
    $confirm = ($_POST['confirm']);
    $password = $_POST['password'];
    if($password==$confirm)
    {
        $user = $userxml->addChild('User');
        $user->addChild('Type',$_POST['type']);
        $user->addChild('Userid',$userid);
        $name = $user->addChild('Name');
        $name->addChild('First',$_POST['fname']);
        $name->addChild('Last',$_POST['lname']);
        $user->addChild('Password',$password);
        $user->addChild('Hashpassword',$hashp);
        $user->addChild('Country');
        $contact = $user->addChild('Contact');
        $contact->addChild('Email',$_POST['email']);
        $contact->addChild('Phone',$_POST['phone']);
        $userxml->saveXML('../Data/Users/Users.xml');
        header("Location:login.php");
    }
    else
    {
        $passerror = "Passwords do not match";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width initial-scale = 1.0">
    <meta name="description" content="registration page">
</head>
<body>
<form class="" action="" method="post">
    <div class="row container col-md-6 m-auto">
        <label class="form-group m-auto">User Type: </label>
        <div class="form-check m-auto">
            <input class="form-check-input" type="radio" name="type" id="client" value="Client">
            <label class="form-check-label" for="client">
                Client
            </label>
        </div>
        <div class="form-check m-auto p-4">
            <input class="form-check-input" name="type" value="Admin" id="admin" type="radio">
            <label class="form-check-label" for="admin">
                Admin
            </label>
        </div>
    </div>
    <div class="container">
        <div class="row col-md-6 m-auto">
            <div class="col-md-6 p-2">
                <label class="form-group" for="fname">First Name</label>
                <input class="form-control" type="text" name="fname" id="fname">
            </div>
            <div class="col-md-6 p-2">
                <label class="form-group" for="lname">Last Name</label>
                <input class="form-control" type="text" name="lname" id="lname">
            </div>
            <div class="col-md-6 p-2">
                <label class="form-group" for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email">
            </div>
            <div class="col-md-6 p-2">
                <label class="form-group" for="country">Country</label>
                <input class="form-control" type="text" name="phone" id="phone">
            </div>

            <div class="col-md-4 p-2">
                <label class="form-group" for="phone">Phone</label>
                <input class="form-control" type="tel" name="phone" id="phone">
            </div>
            <div class="col-md-4 p-2">
                <label class="form-group" for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password">
            </div>
            <div class="col-md-4 p-2">
                <label class="form-group" for="confirm">Confirm Password</label>
                <input class="form-control" type="text" name="confirm" id="confirm">
            </div>
            <div class="col-md-6 text-center m-auto pt-2">
                <input type="submit" name="register" value="Register" class="btn btn-primary">
            </div>
        </div>
    </div>
</form>
</body>
</html>
