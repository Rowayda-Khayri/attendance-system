
<html>
<head>
</head>
<body>
    

    <form method = "post"  action = "month_report.php">
	<table>
		<tr>
			<td>employee : </td>
			<td>date : </td>
                        <td>check-in time : </td>
                        <td>check-out time : </td>
		</tr>
		
                
                 <?php
                    ////DB connection 

                    $dbc=  mysqli_connect('localhost', 'root' , 'iti36', 'attendance_system_db')
                    or die('Error in db connection');

                    $query = "select *, e.name as employee_name "
                            . "from attendance a "
                            . "left join employee e on a.employee_id = e.id ;";

                    $result = mysqli_query($dbc, $query);

                    for($i=0;$i<=$employees;$i++) {
                         $employees=mysqli_fetch_array($result);
                    ?>
                        <tr>
                            <td><?php echo $employees['employee_name'] ;?></td>
                            <td><?php echo $employees['employee_name'] ;?></td>
                            <td><?php echo $employees['employee_name'] ;?></td>
                            <td><?php echo $employees['employee_name'] ;?></td>
                        </tr>
                            <?php }?>
                        
                        
                        

<!--                        <?php
                        ////DB connection 

//                        $dbc=  mysqli_connect('localhost', 'root' , 'iti36', 'attendance_system_db')
//                        or die('Error in db connection');
//
//                        $query = "SELECT name FROM employee ;";
//
//                        $result = mysqli_query($dbc, $query);
//
//                        
//                        for($i=0;$i<=$employees;$i++) {
//                            $employees=mysqli_fetch_array($result);
//                            ?>
                            <option > //<?php //echo $employees[0] ;?>  </option>
		-->
	</table>
	
</form>

</body>
</html>



