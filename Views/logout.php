<?php
include_once "../Views/header.php";
unset($_SESSION['id']);
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./login.php">';
die;
