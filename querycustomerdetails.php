<?php
$user="root";
$pass="";
$db="gardencity";
$host="localhost";
$con=mysqli_connect($host,$user,$pass,$db);
?>
<html>
<head>
	<style>
a.one:link {color:#ffffff;}
a.one:visited {color:#333300;}
a.one:hover {color:#FF0000
;}
</style>
<style>
table {
    background-color: #FFE6E6
;
}
</style>

<table>
<tr>
<td>
<div>
<b><h2>-----------------------------<a class="one" href="gardencity.html" target="_blank">Home</a></h2></b>
</td>
<td>
<b><a class="one" href="form1.php" target="_blank"><h2>tenders</h2></a></b>
</td>
<td>
<b><a class="one" href="enquiries.html" target="_blank"><h2>about us</h2></a></b></p>

</td>
<td>
</td>
<td>
<b><a class="one" href="enquiries.html" target="_blank"><h2>services</h2></a></b></p>
</td>
<td>
</td>
<td>
<b><a class="one" href="queryproducts.php" target="_blank"><h2>view products</h2></a></b></p>
</td>
<td>
<b><a class="one" href="querycustomerdetails.php" target="_blank"><h2>view customer details</h2></a></b></p>
</td>
<td>
</p><b><a class="one" href="waswa.html" target="_blank"><h2>contact us</h2></a>-----------------------------------------------------------</b></p>
</td>
</div>

</table>



</head>
<fieldset>
<p><b><h2>customer bank details</h2></b></p>
<body  bgcolor="#FFCC99
"style="text-align:center;">


<?php

	
	$search_query="SELECT * FROM details ";
	$results=mysqli_query($con,$search_query);
	$results_num=mysqli_num_rows($results);
	
	
	$out='<table border="1" style="text-align:center;">';
	
	if($results_num>0){
		$out.='<tr style="color:red;"><td>'.name.'</td><td>'.email.'</td><td>'.amount.'</td></tr>';
		
		while($row=mysqli_fetch_array($results)){
			
			$name=$row['name'];
			$email=$row['email'];
			
			$amount=$row['amount'];
                      
//echo "dear $fname $surname you are already registered!";			 
			$out.='<tr style="color:grey;"><td>'.$name.'</td><td>'.$email.'</td><td>'.$amount.'</td></tr>';
		}
		
		$out.='</table>';
		
		echo $out;
		
	}

?>
</fieldset>
</body>
</html>