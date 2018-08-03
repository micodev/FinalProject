<?php
// login out using logout button.
session_start();
$_SESSION = array();
session_destroy();
header("Location:Home.php");
?>