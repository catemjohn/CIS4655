<!doctype html>      
<html xmlns="http://www.w3.org/1999/xhtml">
     <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <title> Display Sample Data from Activites2 Database </title>
     </head>
     <body  style="background-color:darkgrey;">
       <input id = "backButton" Type="button" VALUE="Back" onClick="history.go(-1);return true;"
								style="color:white;background-color: SaddleBrown;font-size: 20px;border-radius: 8px;">
     <h1 align="center"> Display Sample Data from Activites2 Database  </h1>
       <?php
      $servername = "localhost";
      $username = "test";
      $password = "password";
      $dbname = "activities2";
      
      //connect to the database
      $connection = mysqli_connect($servername, $username, $password, $dbname);
      //test the db connection
      /*if (!$connection){
        die ("database connection failure");
        } else {
        echo "database connection successful <br>";
      }
      */
      //select all columns from the table
      $query = "SELECT * FROM sample_data";
      $result_set = mysqli_query($connection, $query);
      
     ?> 
     <!--set up table headers --> 
     <form name="tableformat" action="<?php echo $_SERVER['PHP_SELF']; ?>">
     <table border="1" align= "center" >
      <tr >
           <th> First Name</th>
           <th>Last Name</th>
           <th>Phone Number</th>
           <th>Order Number</th>
           <th>Order Total</th>
					 
      </tr>
       <?php
           //fill table with columns from db table
           while($row = mysqli_fetch_assoc($result_set))
           {      echo '<tr>';
                  echo '<td>' . $row['fname']. '</td>';
                  echo '<td>' . $row['lname']  . '</td>';
                  echo '<td>' . $row['phone_number']   . '</td>';
                  echo '<td>' . $row['order_number']   . '</td>';
                  echo '<td>' . $row['order_total']   . '</td>';
									
                  echo '</tr>';
            }      	
       ?>                                        	
     </table>
     </form>
    </body>
    </html>