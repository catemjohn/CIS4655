<!doctype html>
 <?php
      $connection = mysqli_connect("localhost", "root", "password", "test_DB" );
      
      if (!$connection){
        die ("database connection failure");
        } else {
        echo "database connection successful <br>";
      }
    /*  echo "Name  Age   City   Birthday <br>";*/
      $query = "SELECT * FROM AnimalProfiles";
      $result_set = mysqli_query($connection, $query);
      /*
      if($result_set){
        while ($result = mysqli_fetch_assoc($result_set)){
          echo $result["Name"]. $result["Age"]. $result["City"]. $result["Birthday"]. "<br>";
        }
      }
    */
      
     ?> 
      
<html xmlns="http://www.w3.org/1999/xhtml">
     <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <title> Test Database Connections and Display Test Data </title>
     </head>
<body>
     <h1 align="center"> Test Database Connections and Display Test Data  </h1>
     <form name="tableformat" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
     <table border="1" >
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