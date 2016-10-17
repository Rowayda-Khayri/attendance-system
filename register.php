

<html>
<head>
</head>
<body>
    <?php
    
    if(isset($_POST['submit'])){  // check for submission 
        
        $name=filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
        $organization_name=filter_input(INPUT_POST, "organization_name", FILTER_SANITIZE_STRING);

        if(!empty($_POST['name'])&&!empty($_POST['organization_name'])) {  
            ?>
            <div> <?php echo " Hello $name, you are registered "; ?></div> <br/>
            <?php
            ////DB connection 
        
            $dbc=  mysqli_connect('localhost', 'root' , 'iti36', 'attendance_system_db')
                    or die('Error in db connection');

            $query = "INSERT INTO employee ( name,organization,created_at )
                       VALUES
                       ( '$name','$organization_name',NOW() );";

            $result = mysqli_query($dbc, $query) 
                    or die("Error querying DB ");
            
            mysqli_close($dbc);

        } else {  // if empty name or organization :
            ?>
               <div> <?php echo " please fill the 2 fields : "; ?> </div> <br/>
                <?php
        }
//        print_r($_POST);
    }   
    error_reporting(E_ALL & ~E_NOTICE);    
 ?>

<form method = "post"  action = "register.php">
	<table>
		<tr>
			<td>name : </td>
			<td>				
                            <input name = "name" required>
			</td>		
		</tr>
		
		<tr>
			<td>organization name : </td>
			<td>				
                            <input name = "organization_name" required>
			</td>		
		</tr>
                
                
		<tr>
		
		<td> 
                    <input  type="submit" name="submit" value="Register" />  				
			
		</td>
		</tr>
	</table>
	
</form>

</body>
</html>

   <?php print_r($_POST); ?>