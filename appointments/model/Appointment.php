<?php

class Appointment {
	
	public function construct() {
	}
	
	
	public function connect() {
		$user = 'root';
		$password = '%NN6prxt5';
		
		try {
		    $dbh = new PDO('mysql:host=localhost;dbname=progyny', $user, $password);
		   
		} catch (PDOException $e) {
		    print "Error with db connection: " . $e->getMessage() . "<br/>";
		    return 0;
		}
		
		return $dbh;
	}
	
	
	
}


