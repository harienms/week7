<?php
 
 	class dbConn{
	 
  	
 	protected static $db;
  
  	
  	private function __construct() {
   
  	 try {
   
   	self::$db = new PDO( 'mysql:host=sql1.njit.edu;dbname=sm2542', 'sm2542', 'RQeS5oUJT' );
   	self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        echo "<strong>Connected Successfully</strong>";
        echo "</br>";
        echo"</br>";
   	}
   	catch (PDOException $e) {
   	echo "Connection Error: " . $e->getMessage();
   	}
    
    	}
      public static function getConnection() {
      
      	if (!self::$db) {
      	new dbConn();
      	}
       
       	return self::$db;
       	} 
	} 
    $db = dbConn::getConnection();
    
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $db->prepare('SELECT * from accounts WHERE id < 6');
    $statement->execute();
    $numOfRecords = $statement->rowCount();
    print( " <i>Number of records in result are</i> : " .$numOfRecords .'</br>');
    while($result = $statement->fetch(PDO::FETCH_ASSOC)) {
          $data[] = $result;
    }
 
        echo '</br> <h4> <u><mark>Below is the HTML table that displays the records whose ID is  less than 6:</mark></u> </h4>';
        
        echo "<table border=\"3\">
          <tr>
               <th>ID</th>
               <th>Email</th>
               <th>First Name</th>
               <th>Last Name</th>
               <th>Phone</th>
               <th>Birthdate</th>
               <th>Gender</th>
               <th>Password</th>
          </tr>";
        foreach ($data as $list) {
            echo "<tr>";
            echo "<td>" . $list["id"] . "</td>
			            <td>" . $list["email"] . "</td>
                  <td>" . $list["fname"] . "</td>
                  <td>" . $list["lname"] . "</td>
                  <td>" . $list["phone"] . "</td>
                  <td>" . $list["birthday"] . "</td>
                  <td>" . $list["gender"] . "</td>
                  <td>" . $list["password"] . "</td>";
            echo "</tr>";
        }
     
    	
    
?>