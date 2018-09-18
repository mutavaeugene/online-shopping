<?php
session_start();
    $IDNO=$_POST['idno'];
	$name=$_POST['name'];

$con=mysqli_connect("localhost","root","","shopping");
if(!$con){
	die('Unable to reach database:' .mysql_error());
}
//if(isset($_POST['IDNO'])&&isset($_POST['firstname'])&&isset($_POST['secondname'])&&isset($_POST['county'])){
	
	
	$sql="INSERT INTO customer (customerId,customerName) VALUES ('$IDNO','$name')";
	
		if($con->query($sql)===TRUE){
		$_SESSION['prompt']=("thank you for registering..our tenders are awarded on merit basis!!");
		$_SESSION['COUNT']=1;
	}ELSE{
		$_SESSION['prompt']="sorry!!you had already registered before";
		$_SESSION['COUNT']=1;
	
	
	}
$con->close();
header ('location:form1.php');
?>
<html>
<body bgcolor="crimson">

</body>
</html> 




