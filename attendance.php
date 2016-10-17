
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
    
    if(!empty($_POST['name'])&&isset($_POST['check-in'])) {  //on btn check-in click
            
            
            $name=filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
            ?>
            <div> <?php echo " Hello $name, you are checked-in "; ?></div> <br/>
            <?php
            ////DB connection 
            $dbc=  mysqli_connect('localhost', 'root' , 'iti36', 'attendance_system_db')
                    or die('Error in db connection');

            $query4 = "select a.datetime "
                    . "from attendance a "
                    . "left join employee e on a.employee_id = e.id "
                    . " where e.name='$name' and a.process= 1 limit 1;";

            $result4 = mysqli_query($dbc, $query4) 
                    or die("Error querying DB ");
            
            
            
            
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
        error_reporting(E_ALL & ~E_NOTICE);   
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
                    <input  type="submit" name="check-in" value="check-in" class="btn btn-primary"/>
                    <input  type="submit" name="check-out" value="check-out" class="btn btn-primary" />
                </td>		
            </tr>

        </table>
	
</form>
        

</body>
</html>

   