<?php
session_start();
    $accountno=$_POST['accountno'];
	$name=$_POST['name'];
	
$con=mysqli_connect("localhost","root","","paypal");
if(!$con){
	die('Unable to reach database:' .mysql_error());
}
//if(isset($_POST['IDNO'])&&isset($_POST['firstname'])&&isset($_POST['secondname'])&&isset($_POST['county'])){
	
	
	$sql="INSERT INTO pay(accountno,name) VALUES ('$accountno','$name')";
	$sql1="accountno already exists";
	if($con->query($sql)===TRUE){
		$_SESSION['prompt']=("account created SUCCESSFULLY!!");
		$_SESSION['COUNT']=1;
	}else{
		$_SESSION['prompt'] ="ACCOUNTNO ALREADY EXIST" ."<br>" ;
		$_SESSION['COUNT']=1;
	}
$con->close();
header ('location:paypal.php');
?>
<html>
<body bgcolor="crimson">

</body>
</html> 