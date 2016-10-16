
<html>
<head>
</head>
<body>

<form method = "post"  action = "registeration.php">
	<table>
		<tr> 
			<td>first name : </td>
			<td>				
				<input name = "firstname"/>
			</td>
		</tr>
		<tr>
			<td>last name : </td>
			<td>				
				<input name = "lastname"/>
			</td>		
		</tr>

		<tr>
			<td>address : </td>
			<td>				
				<textarea rows="4" cols="22" name="address"/> 
				</textarea>
			</td>		
		</tr>

		<tr>
			<td>country : </td>
			<td>				
				<select name="country">
					<option selected> -------- Select One -------- 			</option>
					<option> Egypt </option>
					<option> USA </option>
					<option> KSA </option>
					<option> France </option>
				</select>
			</td>		
		</tr>

		<tr>
			<td>Gender : </td>
			<td>				
				<input type="radio" name="gender" value="female"> Female<br>
				<input type="radio" name="gender" value="male"> Male<br>

			</td>		
		</tr>

		<tr>
			<td>Skills : </td>
			<td>				
				<input type="checkbox" name="skills[]" value = "PHP">PHP
				<input type="checkbox" name="skills[]" value = "MySQL" >MySQL<br>
				<input type="checkbox" name="skills[]" value = "J2SE">J2SE
				<input type="checkbox" name="skills[]" value = "postgreeSQL">PostgreeSQL

				
			</td>		
		</tr>

		<tr>
			<td>username : </td>
			<td>				
				<input name = "username"/>
			</td>		
		</tr>
		<tr>
			<td>password : </td>
			<td>				
				<input type= "password" name = "password"/>
			</td>		
		</tr>
		<tr>
			<td>department : </td>
			<td>				
				<input name = "department"/>
			</td>		
		</tr>

		<tr>
		
		<td> 
			<input  type="submit" value="Submit" />  				
			<input type="reset" value="Reset"/>
		</td>
		</tr>
	</table>
	
</form>

</body>
</html>

<?php 

 echo "<h1> Your Data </h1> <br>";
 echo "Name \n".
"Age " ;       

 $gender=$_POST['gender'];
 
 $firstname=$_POST['firstname'];
 $lastname=$_POST['lastname'];
 $address=$_POST['address'];
 $department=$_POST['department'];

if ($gender=="male")
{
	$title = "Mr.";
}
elseif ($gender =="female")
{
	$title= "Miss";
}


#<h2>
echo "Thanks $title $firstname $lastname ";
echo "<br>";
echo "Please review your information : ";
echo "<br>";
echo "<br>";	
echo "Name : $firstname $lastname ";
echo "<br>";
echo "Address : $address";
echo "<br>";

echo "Department : $department";
echo "<br>";

echo "Your Skills are : ";
if(!empty($_POST['skills'])) 
{
    foreach($_POST['skills'] as $check) 
	{
            echo "$check," ; 
                        
         }
}

#</h2>
?>
	

