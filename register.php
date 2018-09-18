<?php
session_start();
if(isset($_SESSION['usr_id'])){
header("login.php");
}
//connect to mysql database
$con=mysqli_connect("localhost","root","","gardencity") or die(error);
if (!$con) {
die ("error".mysqli_error($con));	
}

//set validation error flag as false
$error=false;

//check if form is submitted
if(isset($_POST['signup'])){
$name=mysqli_real_escape_string($con,$_POST['name']);

$email=mysqli_real_escape_string($con,$_POST['email']);
	 $password=mysqli_real_escape_string($con,$_POST['password']);
 		 $cpassword=mysqli_real_escape_string($con,$_POST['cpassword']);
		 
		 //name can contain only alpha characters  and space 
if(!preg_match("/^[a-zA-Z]+$/",$name)){
$error=true;
$name_error="name must contain only alphabets and space";
}
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
$error=true;
$email_error="please enter  valid Email ID";
}
if(strlen($password)<6){
$error=true;
$password_error="password must be minimum of six characters";
}
if($password !=$cpassword){
$error=true;
$cpassword_error="password and confirm password does not match";
}
if(!$error){
$amount=2000000;
if(mysqli_query($con,"INSERT INTO details (name,email,amount,password) VALUES('" .$_POST['name'] . "', '" . $_POST['email']. "', '" . $amount. "', '" .md5($_POST['password']) ."')"))
{
$successmsg="successfully registered! <a href='login.php'> click here to login </a>";
}else{
$errormsg="error in registering ....please try again later!";
}
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>user registration script</title>
<meta content ="width=device-width,initial-scale=1.0"
name="viewport">
<link rel="stylesheet"
href="ccs/bootstrap.min.css"
type="text/css"/>
</head>
<body bgcolor="#FFCC99">
<nav class ="navbar navbar-default"
role="navigation">
<div
class="container-fluid">
<!--add header---->

<div class="navbar-header">
<button type ="button"
class="navbar-toggle data toggle="collapse"
data-target="#navbar1">
<span class="sr-only"> <b>garden city shopping mall</b></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>
<!---menu items---->
<div
<class"collapse navbar-collapse" id="navbar1">
<ul class nav navbar-nav navbar-right">

<li><a href="login.php">login</a></li>
<li class="active"><a href="register.php">
sign up</a></li>
</ul>
</div>
</div>
</nav>

<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4 well">

	<center>

<form role="form" action="<?php echo $_SERVER ['PHP_SELF'];?>" method="post" name="signupform">

<fieldset>
<legend>sign up</legend>



<div class="form-group">
<label for ="name">Name:</label>

<input type="text" name="name" placeholder="enter full name" size="32"required="required" class="form-control"/>
<span class="text-danger"><?php if (isset($name_error))?> </div>

<div class="form-group">

<label for="name"> email:</label>
<input type="text" name="email" placeholder="email" size="33" required="required" class ="form-control"/>
<span class="text-danger"><?php if(isset($email_error)) echo $email_error;?></span>
</div>

<div class="form-group">

<label for="name"> password:</label>
<input type="password" name="password" placeholder="password" size="28" required class="form-control"/>
<span class="text-danger"><?php if(isset($password_error)) echo $password_error;?></span>
</div>

<div class="form-group">

<label for="name"> confirm password:</label>
<input type="password" name="cpassword" placeholder="confirm password" size="20" required class ="form-control"/>
<span class="text-danger"><?php if(isset($cpassword_error)) echo $cpassword_error;?></span>
</div>

<div class="form-group">

<input type="submit" name="signup" value="signup" class ="btn btn-primary"/>
</div>
</fieldset>
</form>
<span class ="text-success"><?php if(isset($successmsg)){echo $successmsg;}?></span>
<span  class="text-danger"><? php if(isset($errormsg)){echo $errormsg;}?></span>
</div>
</div>
<div class="row">
</center>
<div class=""col-md-4 col-md-offset-4 text-center"> already registered?<a href="login.php"> login here</a>
</div>

</div>
<script> src="js/jquery-1.10.2.js"></script>
<script> src="js/bootstrap.min.js"></script>
</body>
</html>








		 
		 