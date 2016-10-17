
<html>
<head>
    
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
    

    <form method = "post"  action = "month_report.php">
	<nav class="navbar-inverse" style="height: 50px; text-align: center; line-height: 50px;color: white;font-size: 24;"> Month Report</nav>
        <br/><br/>
        <table class="table">
		<tr>
			<td>Employee : </td>
			<td>Date : </td>
                        <td>Check-in Time : </td>
                        <td>Check-out Time : </td>
		</tr>
		
                
                 <?php
                    ////DB connection 

                    error_reporting(E_ALL & ~E_NOTICE);
                                                                         
                    $dbc=  mysqli_connect('localhost', 'root' , 'iti36', 'attendance_system_db')
                    or die('Error in db connection');

                    $query = "select *, e.name as employee_name, date(a.datetime) as date, "
                            . "time(a.datetime) as time "
                            . "from attendance a "
                            . "left join employee e on a.employee_id = e.id "
                            . "where a.process = 1 ";
                    
                    $query2 = "select *, e.name as employee_name, date(a.datetime) as date, "
                            . "time(a.datetime) as time "
                            . "from attendance a "
                            . "left join employee e on a.employee_id = e.id "
                            . "where a.process = 2  ";
                    
                    

                    $result = mysqli_query($dbc, $query);
                    
                    $result2 = mysqli_query($dbc, $query2);

                    for($i=0;$i<=$employees;$i++) {
                         $employees=mysqli_fetch_array($result);
                         $employees2=mysqli_fetch_array($result2);
                         
                    ?>
                        <tr>
                            <td><?php echo $employees['employee_name'] ;?></td>
                            <td><?php echo $employees['date'] ;?></td>
                            <td><?php echo $employees['time'] ;?></td>
                            <td><?php echo $employees2['time'] ;?></td>
                        </tr>
                            <?php }
                            
                            
                            
                            ?>
                        
                     
	</table>
	
</form>

</body>
</html>



