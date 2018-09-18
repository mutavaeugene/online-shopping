
<?php
$user="root";
$pass="";
$db="paypal";
$host="localhost";
$con=mysqli_connect($host,$user,$pass,$db);
?>

<html>
<p><h2>paypal payment page</h2></p>
<form name="post" method="post" action="paypalconn.php" style="text-align:center;">
	accountno:. <input type="text" maxlength="8" size="30" required="required" name="post" /></br>

name. <input type="text" maxlength="8" size="31" required="required" name="post" /></br>
<input type="submit" maxlength="8"  required="required" name="submit" value="submit"/></br>
<name="search" method="post" action="search.php" style="text-align:center;">


</form>
</html>
