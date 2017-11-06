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
     
    	
    
?>