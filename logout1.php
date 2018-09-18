<?php
session_start();
unset($_SESSION['username']);
session_destroy();
$_SESSION['usr_id']=0;

header("Location: login.php");
exit;
?>
