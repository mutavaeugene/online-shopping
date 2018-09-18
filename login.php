<?php 
session_start(); 
if(isset($_SESSION['usr_id'])){
	if (($_SESSION['usr_id'])!==0){
	header("location:transaction.php");
	
	}
}
$_SESSION['usr_id']=0;
//connect to mysql database
$con=mysqli_connect("localhost","root","","gardencity");
mysql_connect("localhost","root","","gardencity");
if (!$con) {
 die("error".mysqli_error($con));	
}

//check if form is submitted
if(isset($_POST['login'])){
	
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	$result=mysqli_query($con,"select * from details where email='".$email."'and password='".md5($password)."'");
	$row=mysqli_fetch_array($result);
	if($row){
			$_SESSION['usr_id']=$row['email'];
			$_SESSION['usr_name']=$row['name'];
			header("location:transaction.php");
		}
		else
	{
		$errormsg="Incorrect Email or password!!";
		$_SESSION['usr_id']=0;
	}
}
	
		
	
	


?>
<!DOCTYPE html>
<html>
<head>
<title>php login script</title>
<meta content="width=device-width,initial-scale=1.0"
name="viewport">

<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
</head>
<body bgcolor="#FFCC99">
<nav class="navbar navbar-default" role="navigation">
<div class="container-fluid">
<!--add header-->
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
<p><b>garden city shopping mall</b></p>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>
<!--menu items
-->
<div
class="collapse navbar-collapse" id="navbar1">
<ul
class="nav navbar-nav navbar-right">
<li
class="active">
<a href="login.php">Login</a>
</li>
<li><a 
href="register.php">
Sign Up</a></li>
</ul>
</div>
</nav>
<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4 well">
<form
role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>"
method="post"
name="loginform">
<fieldset>
<legend>Login</legend>

<div class="form-group">
<label
for="name">Email</label>
<input type="text"
name="email"
placeholder="Your Email"  size="25" 
required class="form-control"/>
</div
<div class="form-group">
<label
for="name">Password</
<label>
<input type="password"
name="password"
placeholder="Your Password" 
required class="form-control"/>
</div>
<div class="form-group">
<input type="submit"
name="login"
value="Login"
class="btn btn-primary"/>
</div>
</fieldset>
</form>

<span class="text-danger">
<?php if (isset($errormsg)) {echo $errormsg;} ?>
</span>
</div>
</div>
<div class="row">
<div class="col-md4 col-md-offset-4 text-center">
New User?
<a href="register.php">
Sign Up Here</a>
</div>
</div>


<script src="js/jquery-1.10.2.js">
</script>
<script src="js/bootstrap.min.js">
</script>
</body>
</html>
