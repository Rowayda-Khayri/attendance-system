
<html>
<head>
</head>
<body>
    
    <?php 
    
    if(!empty($_POST['name'])&&isset($_POST['check-in'])) {  //on btn check-in click
            
            
            $name=filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
            ?>
            <div> <?php echo " Hello $name, you are checked-in "; ?></div> <br/>
            <?php
            ////DB connection 
        
            $dbc=  mysqli_connect('localhost', 'root' , 'iti36', 'attendance_system_db')
                    or die('Error in db connection');

            $query = "insert into attendance (process,datetime,employee_id) "
                    . "values(1,NOW(),(select id from employee where name='$name'));";

            $result = mysqli_query($dbc, $query) 
                    or die("Error querying DB ");
            
            mysqli_close($dbc);
            
            print_r($_POST);
            //////////////////////////////////////////////////////////////////
        } else {
            if(!empty($_POST['name'])&&isset($_POST['check-out'])) {  //on btn check-out click
                
            $name=filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
            ?>
            <div> <?php echo " Hello $name, you are checked-out "; ?></div> <br/>
            <?php
            ////DB connection 
        
            $dbc=  mysqli_connect('localhost', 'root' , 'iti36', 'attendance_system_db')
                    or die('Error in db connection');

            $query = "insert into attendance (process,datetime,employee_id) "
                    . "values(2,NOW(),(select id from employee where name='$name'));";

            $result = mysqli_query($dbc, $query) 
                    or die("Error querying DB ");
            
            mysqli_close($dbc);
            
            print_r($_POST);

        }
        }
        ////////////////////////////////////////////////////////
           
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
                    <input  type="submit" name="check-in" value="check-in"/>
                    <input  type="submit" name="check-out" value="check-out" />
                </td>		
            </tr>

        </table>
	
</form>
        

</body>
</html>

   