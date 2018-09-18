<?php
ob_start();
session_start();
?>
<html>
<p><center><h1>dear customer,register first to facilitate processing of tenders</h1></center><p>
<body bgcolor="#FFCC99
">

<form name="MyForm" method="POST" action="link.php">
<fieldset>
<legend> <b>register</b></legend> 

<table border="1" align="center" cellspacing="0" cellpadding="0">
<tr> 
 <td align="center" colspan="3"> 
<strong>register for our tenders<BR> </strong>  </td> 
  </tr> 
 <tr> 
 <td align="right"> 
 <B> IDNO:</B>
   </td> 
 <td align="left"> 
<input type="text" name="idno" maxlength="8" required="required"
 size="20" value="" />  </td> 
 <td align="left"> 
 <i>Type your idno <b>(8 Characters)</b> </i>  </td> 
  </tr> 
 <tr> 
 <td align="right"> 
 <B> NAME:</B>
   </td> 
 <td align="left"> 
<input type="text" name="name" required="required" size="30" value="" />  </td> 
 <td align="left"> 
 <i>Type your full names</i>  </td> 
  </tr> 
  <tr>
   <td align="center" colspan="3"> 
<input type="hidden" name="logonTokenID" value="JKUTVO1222" > 
<font color="red"><input type="submit" name="register" value ="register"/> </td> 
  </tr>
</table>
<?PHP

if($_SESSION['COUNT']>0)
echo '<font color=red>'.$_SESSION['prompt'].'</font>';
if($_SESSION['COUNT']>0)
	$_SESSION['COUNT']=$_SESSION['COUNT']-1;
?>
</fieldset> 
</form>
</body>
</html>



