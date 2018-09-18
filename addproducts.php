<?php
session_start();
?>


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body bgcolor="#FFFFCC"><form name="myform" method="POST" action="connproducttable.php">
       <table border="2" align="center">
       
        <tr style="background-color: red" align="center">
            <th>
            products Registation Details
            </th>
        </tr>
        <table border="2" align="center">
        <tr style="background-color: red">
            <td>
            ID:
            </td><td>
        <input type="text" name="ID" value="" /><br></td></tr>
        <tr style="background-color: red">
        
                        <td> name:
            
                 </td><td>   <input type="text" name="name" value="" /><br></td></tr>
            <tr style="background-color: red">
        
            <td>
            description:
          
                 </td><td><input type="text" name="description" value="" /><br></td></tr>

                 <tr style="background-color: red">
        
                        <td> price:
            
                 </td><td>   <input type="price" name="price" value="" /><br></td></tr>

                 <tr style="background-color: red">
        
                        <td> created:
            
                 </td><td>   <input type="created" name="created" value="" /><br></td></tr>

                 <tr style="background-color: red">
        
                        <td> modified:
            
                 </td><td>   <input type="modified" name="modified" value="" /><br></td></tr>

                 <tr style="background-color: red">
        
                        <td> quantity:
            
                 </td><td>   <input type="text" name="quantity" value="" /><br></td></tr>
           
            </td><td><input type="submit" name="submit" value ="submit"/>
        </td> </form>
<?PHP

if($_SESSION['COUNT']>0)
echo '<font color=red>'.$_SESSION['prompt'].'</font>';
if($_SESSION['COUNT']>0)
    $_SESSION['COUNT']=$_SESSION['COUNT']-1;
?>
    </body>
</html>
                                                                                              