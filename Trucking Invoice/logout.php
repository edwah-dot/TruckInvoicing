<?php
session_start();

// empty $_SESSION data
$_SESSION = array();
// unset($_SESSION);

session_destroy();

header("Location: login.php");
exit;
?>
