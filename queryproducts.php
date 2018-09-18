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
<b>----------------------------------------<a class="one" href="gardencity.html" target="_blank">Home</a></b>
</td>
<td>
<b><a class="one" href="form1.php" target="_blank">tenders</a></b>
</td>
<td>
<b><a class="one" href="enquiries.html" target="_blank">about us</a></b></p>

</td>
<td>
</td>
<td>
<b><a class="one" href="enquiries.html" target="_blank">services</a></b></p>
</td>
<td>
</td>
<td>
<b><a class="one" href="queryproducts.php" target="_blank">view products</a></b></p>
</td>
<td>
<b><a class="one" href="querycustomerdetails.php" target="_blank">view customer details</a></b></p>
</td>
<td>
<b><a class="one" href="waswa.html" target="_blank">contact us</a>------------------------------</b>
</div>

</table>
</head>
<body  bgcolor="#FFCC99"style="text-align:center;">

<?php
//if(isset($_POST['submit'])){
	
	
	$search_query="SELECT * FROM products ";
	$results=mysqli_query($con,$search_query);
	$results_num=mysqli_num_rows($results);
	
	$out='<table border="1" style="text-align:center;">';
	
	if($results_num>0){
		$out.='<tr style="color:red"><td>'.id.'</td><td>'.name.'</td><td>'.description.'</td><td>'.price.'</td><td>'.created.'</td><td>'.modified.'</td><td>'.quantity.'</td></tr>';
		while($row=mysqli_fetch_array($results)){			
			$id=$row['id'];
			$name=$row['name'];
			$description=$row['description'];
			$price=$row['price'];
			$created=$row['created'];			
			$modified=$row['modified'];	
			$quantity=$row['quantity'];	
			//echo "Dear $name we are happy to inform you of the receipt of your lost ID";
			
			$out.='<tr><td>'.$id.'</td><td>'.$name.'</td><td>'.$description.'</td><td>'.$price.'</td><td>'.$created.'</td><td>'.$modified.'</td><td>'.$quantity.'</td></tr>';
		}
		
		$out.='</table>';
		
		echo $out;
		
	}else{		
		//echo '<style="text-align:center;font-size:18px; font color:red;">SORRY !ID HOLDER DOES NOT EXIST</style>';
		
	}	
//}

?>
</fieldset>

</body>
</html>