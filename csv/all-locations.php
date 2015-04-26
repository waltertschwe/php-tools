<?php

$user = 'root';
$password = '%NN6prxt5';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=drupal', $user, $password);
   
} catch (PDOException $e) {
    print "Error with db connection: " . $e->getMessage() . "<br/>";
    die();
}


$stmt = $dbh->query("SELECT clinic_name,address,address2,city,state,zip,phone from fertility.clinics");
$clinics = $stmt->fetchAll(PDO::FETCH_ASSOC);

// potential time stamp for file
$date = new DateTime();
$timeStamp = $date->format('Y-m-d');
$fp = fopen('data/all-clinic-locations.csv', 'w');
$header = array("Clinic Name", "Address", "Address 2", "City", "State", "Zip", "Phone");
fputcsv($fp, $header);
foreach($clinics as $clinic) {
	fputcsv($fp, $clinic);
}

fclose($fp);
echo "success all clinics created";
?>

