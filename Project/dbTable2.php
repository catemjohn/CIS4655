<!doctype html>
 
<html xmlns="http://www.w3.org/1999/xhtml">
     <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <title> Cat Profiles</title>
     </head>
<body style="background-color:CornflowerBlue">
  <input id = "backButton" Type="button" VALUE="Back" onClick="history.go(-1);return true;"
								style="color:white;background-color: SaddleBrown;font-size: 20px;border-radius: 8px;">
     <h1 align="center"> Pet Profiles  </h1>
    <?php
      $connection = mysqli_connect("localhost", "test", "password", "test_DB");
      //test db connection
      /*if (!$connection){
        die ("database connection failure");
        } else {
        echo "database connection successful <br>";
      }
      */
      $query = "SELECT * FROM AnimalProfiles2";
      $result_set = mysqli_query($connection, $query);
     ?> 
      
     <form name="tableformat" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
     <table border="1" align="center" >
      <tr >
           <th> Name</th>
           <th>Age</th>
           <th>City</th>
           <th>Birthday</th>
      </tr>
       <?php
           while($row = mysqli_fetch_assoc($result_set))
           {      echo '<tr>';
                  echo '<td>' . $row['Name']. '</td>';
                  echo '<td>' . $row['Age']  . '</td>';
                  echo '<td>' . $row['City']   . '</td>';
                  echo '<td>' . $row['Birthday']   . '</td>';
                  echo '</tr>';
            }      	
       ?>                                        	
     </table>
     </form>
    </body>
    </html>