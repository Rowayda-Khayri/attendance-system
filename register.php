

<html>
<head>
    
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
    <?php
    
    if(isset($_POST['submit'])){  // check for submission 
        
        $name=filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
        $organization_name=filter_input(INPUT_POST, "organization_name", FILTER_SANITIZE_STRING);

        if(!empty($_POST['name'])&&!empty($_POST['organization_name'])) {  
            ?>
            <div class="alert alert-success"> <?php echo " Hello $name, you are registered "; ?></div> <br/>
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
               <div class="alert alert-danger"> <?php echo " please fill the 2 fields : "; ?> </div> <br/>
                <?php
        }
//        print_r($_POST);
    }   
    error_reporting(E_ALL & ~E_NOTICE);    
 ?>

<form method = "post"  action = "register.php">
    <nav class="navbar-inverse" style="height: 50px; text-align: center; line-height: 50px;color: white;font-size: 24;" > Registration Page</nav>
    <br/><br/>
    <table class="table">
		<tr>
			<td>Name : </td>
			<td>				
                            <input name = "name" required>
			</td>		
		</tr>
		
		<tr>
			<td>Organization Name : </td>
			<td>				
                            <input name = "organization_name" required>
			</td>		
		</tr>
                
                
		<tr>
		
		<td> 
                    <input  type="submit" name="submit" value="Register" class="btn btn-primary"/>  				
			
		</td>
		</tr>
	</table>
    
	
</form>

</body>
</html>

   <?php // print_r($_POST); ?>