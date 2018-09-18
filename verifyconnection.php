<?php
session_start();
    $id=$_POST['id'];
	$name=$_POST['name'];
	$code=$_POST['code'];
	$image=$_POST['image'];
	$price=$_POST['price'];

$con=mysqli_connect("localhost","root","","gardencity");
if(!$con){
	die('Unable to reach database:' .mysql_error());
}
//if(isset($_POST['IDNO'])&&isset($_POST['firstname'])&&isset($_POST['secondname'])&&isset($_POST['county'])){
	
	
	$sql="INSERT INTO cart (id,name,code,image,price) VALUES ('$id','$name','$code','$image','$price')";
	
		if($con->query($sql)===TRUE){
		$_SESSION['prompt']=("thank you for registering..our tenders are awarded on merit basis!!");
		$_SESSION['COUNT']=1;
	}ELSE{
		$_SESSION['prompt']="sorry!!you had already registered before";
		$_SESSION['COUNT']=1;
	
	
	}
$con->close();
header ('location:cart.php');
?>
<html>
<body bgcolor="crimson">

</body>
</html> 