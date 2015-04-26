<?php

$user = 'root';
$password = '%NN6prxt5';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=drupal', $user, $password);
   
} catch (PDOException $e) {
    print "Error with db connection: " . $e->getMessage() . "<br/>";
    die();
}


$stmt = $dbh->prepare("SELECT clinic_name,address,address2,city,state,zip,phone FROM fertility.clinics WHERE is_eeva_test = ?");
$stmt->execute(array(1));
$clinics = $stmt->fetchAll(PDO::FETCH_ASSOC);

$fp = fopen('data/eeva-test-locations.csv', 'w');
$header = array("Clinic Name", "Address", "Address 2", "City", "State", "Zip", "Phone");
fputcsv($fp, $header);
foreach($clinics as $clinic) {
	fputcsv($fp, $clinic);
}

fclose($fp);
echo "success eeva test csv created";

?>