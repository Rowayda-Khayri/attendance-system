
<html>
<head>
</head>
<body>
    <?php
    
    if(isset($_POST)){
        $name=filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);

        if(!empty($_POST['name'])) 
        {
            ?>
        <div> <?php echo " Hello $name, you are checked-in "; ?></div>
            <?php
            
            $dbc2=  mysqli_connect('localhost', 'root' , 'iti36', 'attendance_system_db')
            or die('Error in db connection');

            $query2 = "INSERT INTO check_in ( employee_id , date )
                       VALUES
                       ( (select id from employee where name ='$name'),NOW() )";

          
                    


            $result2 = mysqli_query($dbc2, $query2);


            mysqli_close($dbc2);

        } 
    } ?>

        <form method = "post"  action = "check_in.php">
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

                                    ?>
                                            <?php
                                            
                                             for($i=0;$i<=$result;$i++) {
                                                 $employees=mysqli_fetch_array($result);
                                                 ?><option > <?php echo $employees['name'] ;?>  </option>
                                            
                                            <?php
                                            mysqli_close($dbc);
                                         } ?>
					

                                           
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
        
        
        <?php
           
        
//            function check_in(){
//                ////DB connection 
//        
////                $dbc=  mysqli_connect('localhost', 'root' , 'iti36', 'attendance_system_db')
////                or die('Error in db connection');
////                // employee_id
////                $query = "select id from employee where name = '$name';";
////                
////                $result = mysqli_query($dbc, $query);
////                $employee_id = mysqli_fetch_array($result);
////                print_r($employee_id);
//                
//                echo "hghghg";
//                ?> 
        <?php
////                $query = "INSERT INTO check_in ( employee_id,date )
////                       VALUES
////                       ( '$employee_id',NOW() );";
////                
////                $result = mysqli_query($dbc, $query);
//?>
               
                        
<?php
//
//            }
//            
//            function check_out(){
//                
//                
//                
//            }
//            
//            
//             if(!empty($_POST['check_in']) && $_SERVER['REQUEST_METHOD'] == "POST"){
//                check_in();
//            }
//            if(!empty($_POST['check_out']) && $_SERVER['REQUEST_METHOD'] == "POST"){
//                check_out();
//            }
//        ?>

</body>
</html>

   