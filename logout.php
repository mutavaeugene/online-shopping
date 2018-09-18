<?php
session_start();
if(!isset($_SESSION['USER'])){
header("location:login.php");
}
else if(isset($_SESSION[user])!=""){
header("location:index.php");
}
if(isset($_GET['logout'])){
unset($_SESSION['user']);
session_unset();
session_destroy();
header("location:login.php");
exit;
}
?>