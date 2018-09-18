<?php
session_start();
if(!isset($_REQUEST['id'])){
    header("Location: transaction.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Success - PHP Shopping Cart Tutorial</title>
    <meta charset="utf-8">
    <style>
    .container{width: 100%;padding: 50px;}
    p{color: #34a853;font-size: 18px;}
    </style>
</head>
</head>
<fieldset>
<body bgcolor="#FFCC99">
<div class="container">
	
	<center><h1>Gardencity Shopping Mall</h1></center>
    <center><h2>Order Status</h2></center>
    <center><p>  <?php echo $_SESSION['CASHOUT'].$_GET['id']; ?></p></center>
    <center><p>  <?php echo "your Shopping bill is Ksh.".$_SESSION['bill']; ?></p></center>
    <center><p>  <?php echo "your bank balance is Ksh.".$_SESSION['balance']; ?></p></center>
    	<center><P><a href="transaction.php" target="_blank"><h2> shop again?</h2></a><a href="logout2.php" target="_blank">leave page</a></center>
    
</div>
</fieldset>
</body>
</html>