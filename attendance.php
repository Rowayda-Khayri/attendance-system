
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
            <div class="alert alert-success"> <?php echo " Hello $name, you are checked-in "; ?></div> <br/>
            <?php
            
            ////DB connection 
            
            $dbc=  mysqli_connect('localhost', 'root' , 'iti36', 'attendance_system_db')
                    or die('Error in db connection');

            // select last check-in for choosed employee
            $query4 = "select a.datetime "
                    . "from attendance a "
                    . "left join employee e on a.employee_id = e.id "
                    . " where e.name='$name' and a.process= 1 limit 1;";

            $result4 = mysqli_query($dbc, $query4) 
                    or die("Error querying DB ");
            
            $row= mysqli_fetch_array($result4);
            $last_check_in = $row[0];
            $last_check_in_day = date("d/m/Y", strtotime($last_check_in));
            $today=date("d/m/Y");
            ?>
<!--            <div> <?php //echo $last_check_in_day; ?></div> <br/>
            <div> <?php //echo  date("d/m/Y"); ?> </div> <br/>-->
            
            
            <?php
            
            if ( $last_check_in_day=$today){ // insert check-in only if not checked-in today
                $query = "insert into attendance (process,datetime,employee_id) "
                        . "values(1,NOW(),(select id from employee where name='$name'));";

                $result = mysqli_query($dbc, $query) 
                        or die("Error querying DB ");

                mysqli_close($dbc);

                
            } 
             else {// already checked-in today
                ?><div class="alert alert-warning"> <?php echo  "you have already checked-in today"; ?> </div> <br/>
            <?php }
            
            
            //////////////////////////////////////////////////////////////////
        } else {
            if(!empty($_POST['name'])&&isset($_POST['check-out'])) {  //on btn check-out click
                
            $name=filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
            ?>
            <div class="alert alert-success"> <?php echo " Hello $name, you are checked-out "; ?></div> <br/>
            <?php
            ////DB connection 
            
            $dbc=  mysqli_connect('localhost', 'root' , 'iti36', 'attendance_system_db')
                    or die('Error in db connection');

            // select last check-out for choosed employee
            $query4 = "select a.datetime "
                    . "from attendance a "
                    . "left join employee e on a.employee_id = e.id "
                    . " where e.name='$name' and a.process= 2 limit 1;";

            $result4 = mysqli_query($dbc, $query4) 
                    or die("Error querying DB ");
            
            $row= mysqli_fetch_array($result4);
            $last_check_out = $row[0];
            $last_check_out_day = date("d/m/Y", strtotime($last_check_out));
            $today=date("d/m/Y");
            ?>
<!--            <div> <?php //echo $last_check_out_day; ?></div> <br/>
            <div> <?php //echo  date("d/m/Y"); ?> </div> <br/>-->
                
            <?php
            //delete last check-out  
            
            if ( $last_check_out_day==$today){ 
                $query2 = "update attendance "
                        . "set deleted_at = NOW() "
                        . "where employee_id= (select id from employee where name = '$name') "
                        . "and process= 2";

                $result2 = mysqli_query($dbc, $query2) 
                        or die("Error querying DB ");
//                print_r($_POST);
                ?>
                <div class="alert alert-success"> <?php echo  "your check-out has been updated" ;?> </div> <br/>

                <?php  
            } 
            
            $query = "insert into attendance (process,datetime,employee_id) "
                    . "values(2,NOW(),(select id from employee where name='$name'));";

            $result = mysqli_query($dbc, $query) 
                    or die("Error querying DB ");
            
            mysqli_close($dbc);
            
            

        }
        }
        ////////////////////////////////////////////////////////
        error_reporting(E_ALL & ~E_NOTICE);   
 ?>
    <form method = "post"  action = "attendance.php">
        <nav class="navbar-inverse" style="height: 50px; text-align: center; line-height: 50px;color: white;font-size: 24;"> Attendance Page</nav>
        <br/><br/>
	<table class="table">
            <tr>
                <td>Name : </td>
                <td>				
                    <select name="name" class="" required>
                        <option selected value="">  Select your name </option>
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
                    <input  type="submit" name="check-in" value="Check-in" class="btn btn-primary"/>
                    <input  type="submit" name="check-out" value="Check-out" class="btn btn-primary" />
                </td>		
            </tr>

        </table>
	
</form>
        

</body>
</html>

   