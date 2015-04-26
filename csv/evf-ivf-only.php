<?php

$user = 'root';
$password = '%NN6prxt5';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=drupal', $user, $password);
   
} catch (PDOException $e) {
    print "Error with db connection: " . $e->getMessage() . "<br/>";
    die();
}


$stmt = $dbh->prepare("SELECT clinic_name,address,address2,city,state,zip,phone FROM fertility.clinics WHERE is_egg_banxx = ? OR is_ivf_advantage = ?");
$stmt->execute(array(1,1));
$clinics = $stmt->fetchAll(PDO::FETCH_ASSOC);

$fp = fopen('data/ivf-banxx-locations.csv', 'w');
$header = array("Clinic Name", "Address", "Address 2", "City", "State", "Zip", "Phone");
fputcsv($fp, $header);
foreach($clinics as $clinic) {
	fputcsv($fp, $clinic);
}

fclose($fp);
echo "success egg banxx & ivf csv created";

?>