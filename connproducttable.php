<?php
session_start();
    $id=$_POST['id'];
	$name=$_POST['name'];
	$description=$_POST['description'];
	$price=$_POST['price'];
	$created=$_POST['created'];
	$modified=$_POST['modified'];
	$qty=$_POST['quantity'];
	
$con=mysqli_connect("localhost","root","","gardencity");
if(!$con){
	die('Unable to reach database:' .mysql_error());
}
//if(isset($_POST['idno'])&&isset($_POST['REG_NO'])&&isset($_POST['CONTACT'])&&isset($_POST['SURNAME'])&&isset($_POST['mnane'])&&isset($_POST['FIRST_NAME'])&&isset($_POST['COURSE'])&&isset($_POST['YEAR_OF_STUDY'])&&isset($_POST['BALANCE'])&&isset($_POST['COUNTY'])){
	
	



	$result=mysqli_query($con,"select name,quantity from products where name='".$name."'");
	$row=mysqli_fetch_array($result);
	if($row){
		$quantity=$row['quantity'];
		$quantity=$quantity+$qty;
			
			$sql="UPDATE products SET quantity='".$quantity."' WHERE name='".$name."'";
		
	if($con->query($sql)===TRUE){
		$_SESSION['prompt']=(" item updated successifuly. ".$name."= ".$quantity);
		$_SESSION['COUNT']=1;


		}
}
		else
	{
	$sql="insert into products(id,name,description,price,created,modified,quantity) VALUES ('$id','$name','$description','$price','$created','$modified','$qty')";
		
	if($con->query($sql)===TRUE){
		$_SESSION['prompt']=("new item added successifuly");
		$_SESSION['COUNT']=1;
	}ELSE{
		$_SESSION['prompt']="failed" .$sql ."<br>" .$con->error;
		$_SESSION['COUNT']=1;
	
	}	

	}




	
$con->close();
header('location:addproducts.php');
?>
<html>
<head>
<title></title>
</head>
<body bgcolor="violet">
</body>
</html>

