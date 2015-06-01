<?php

$user = 'root';
$password = '%NN6prxt5';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=sugarweb_dev', $user, $password);

} catch (PDOException $e) {
    print "Error with db connection: " . $e->getMessage() . "<br/>";
    die();
}

$sql = "SELECT n.id, 
			   n.parent_id,
			   n.date_entered,
			   n.date_modified,
			   n.name,
			   n.description
		FROM notes n 
		LIMIT 5";



$stmt = $dbh->prepare($sql);
$stmt->execute();
$notes = array();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($results);
