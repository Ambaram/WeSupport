<!-- a logout page will redirect to the login page -->
<?php
session_start() ;
unset($_SESSION['id']) ;
session_destroy();
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';
exit;
?>

