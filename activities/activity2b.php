<!doctype html>

<html lang="en">
<head>
    <title>Database Search</title>
</head>
<body style="background-color:darkgrey;">
  <div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<center>
						<h1 style="color:saddlebrown">
							Search Results
						</h1>
					</center>
				</div></div></div>
	<!--Back Button -->
 <center><input id = "backButton" Type="button" VALUE="Back" onClick="history.go(-1);return true;"
								style="color:white;background-color: SaddleBrown;font-size: 20px;border-radius: 8px;">
<?php
    //connect to database
	  $connection = mysqli_connect("localhost", "test", "password", "activities2");
   //test connection 
	 /*if (!$connection){
        die ("database connection failure");
        } else {
        echo "database connection successful <br>";
      }
		*/
	// gets value sent over search form
    $query = $_GET['query'];
       //pulls values from table which match user input  
   		 $query2="SELECT * FROM sample_data
           WHERE (`fname` LIKE '%".$query."%') OR (`lname` LIKE '%".$query."%')" or die(mysql_error());
			
        $result_set = mysqli_query($connection, $query2);
         
if(mysqli_num_rows($result_set) >= 1){ // if one or more rows are returned do following
?>
	 <!--set up table headings -->
   <form name="tableformat" action="activity2.php" >
     		<table border="1" >
      	<tr >
           <th>First Name</th>
           <th>Last Name</th>
           <th>Phone Number</th>
           <th>Order Number</th>
           <th>Order Total</th>
     		</tr>
		  
	<!-- output results in the table --> 
  <?php  while($row = mysqli_fetch_array($result_set))
		 {      echo "<tr><td>"; 
						echo $row['fname'];
						echo "</td><td>";   
						echo $row['lname'];
						echo "</td><td>";    
						echo $row['phone_number'];
						echo "</td><td>";
						echo $row['order_number'];
						echo "</td><td>";  
						echo $row['order_total'];
						echo "</td></tr>";   
            }  
        ?>

	
     </table>
     </form>        
<?php        
      
     }
	 //if no results match user input output message
	 else if(mysqli_affected_rows($result_set) < 1){
          echo " There are no matching results";
            } 
	 $result_close();
	 
?>      
  </center>
</body>
</html>