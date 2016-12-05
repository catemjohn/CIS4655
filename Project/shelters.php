<!doctype html>
 
<html xmlns="http://www.w3.org/1999/xhtml">
     <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <title> Module 3 Course Project</title>
     </head>
<body style="background-color:CornflowerBlue">
  <input id = "backButton" Type="button" VALUE="Back" onClick="history.go(-1);return true;"
								style="color:white;background-color: SaddleBrown;font-size: 20px;border-radius: 8px;">
     <h1 align="center"> Module 3 Course Project  </h1>
    <h2 align="center">
      This results page shows which shelter each animal is located at. The animal's profile contains the shelter ID but not the 
      shelter name so the database was queried using joins to match the animal with the appropriate shelter name. 
  </h2>
    <?php
      $connection = mysqli_connect("localhost", "test", "password", "test_DB");
      //test db connection
      /*if (!$connection){
        die ("database connection failure");
        } else {
        echo "database connection successful <br>";
      }
      */
      $query = "SELECT shelter_accounts.shelter_name, AnimalProfiles.shelter_id, AnimalProfiles.Name
        FROM AnimalProfiles
        INNER JOIN shelter_accounts
        ON AnimalProfiles.shelter_id=shelter_accounts.id";
      $result_set = mysqli_query($connection, $query);
     ?> 
      
     <form name="tableformat" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
     <table border="1" align="center" >
      <tr >
           <th>Animal Name</th>
           <th>Shelter ID</th>
           <th>Shelter Name</th>
      </tr>
       <?php
           while($row = mysqli_fetch_assoc($result_set))
           {      echo '<tr>';
                  echo '<td>' . $row['Name']. '</td>';
                  echo '<td>' . $row['shelter_id']  . '</td>';
                  echo '<td>' . $row['shelter_name']   . '</td>';
                  echo '</tr>';
            }      	
       ?>                                        	
     </table>
     </form>
    </body>
    </html>