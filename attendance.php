

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
 ?>

    <form method = "post"  action = "attendance.php">
	<table>
            <tr>
                <td>name : </td>
                <td>				
                    <select name="name">
                        <option selected >  Select your name </option>
                        <?php

                        ////DB connection 

                        $dbc=  mysqli_connect('localhost', 'root' , 'iti36', 'attendance_system_db')
                        or die('Error in db connection');

                        $query = "SELECT name FROM employee ;";

                        $result = mysqli_query($dbc, $query);

                        
                        for($i=0;$i<=$employees;$i++) {
                            $employees=mysqli_fetch_array($result);
                            ?>
                            <option > <?php echo $employees[0] ;?>  </option>

                            <?php
                            mysqli_close($dbc);
                        } 
                        ?>
                    </select>
                </td>		
            </tr>

            <tr>

                <td>				
                    <input  type="submit" value="check-in" />
                </td>		
            </tr>

        </table>
	
</form>
        

</body>
</html>

   