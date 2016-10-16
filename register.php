

<html>
<head>
</head>
<body>
    <?php
    
    if(isset($_POST)){
       $name=filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);

        if(!empty($_POST['name'])&&!empty($_POST['organization_name'])) 
        {
            ?>
        <div> <?php echo " Hello , you are registered "; ?></div>
            <?php
            ////DB connection 
        
            $dbc=  mysqli_connect('localhost', 'root' , 'iti36', 'attendance_system_db')
            or die('Error in db connection');

            $query = "INSERT INTO employee ( name,organization,created_at )
                       VALUES
                       ( '$name','organization_name',NOW() );";


            $result = mysqli_query($dbc, $query);


            mysqli_close($dbc);

          

        } else {
            if(empty($_POST['name'])||empty($_POST['organization_name'])) 
        {?>
            <div> <?php echo " please fill the 2 fields : "; ?> </div> <br/>
            <?php
        }
        }
        
        
        
        
} ?>

<form method = "post"  action = "register.php">
	<table>
		<tr>
			<td>name : </td>
			<td>				
				<input name = "name"/>
			</td>		
		</tr>
		
		<tr>
			<td>organization name : </td>
			<td>				
				<input name = "organization_name"/>
			</td>		
		</tr>
                
                

		<tr>
		
		<td> 
			<input  type="submit" value="Submit" />  				
			
		</td>
		</tr>
	</table>
	
</form>

</body>
</html>

   