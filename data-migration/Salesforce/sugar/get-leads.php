<?php

$user = 'root';
$password = '%NN6prxt5';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=sugarweb_dev', $user, $password);

} catch (PDOException $e) {
    print "Error with db connection: " . $e->getMessage() . "<br/>";
    die();
}

$sql = "SELECT id, 
			   l.salutation, 
			   l.first_name, 
			   l.last_name, 
			   l.primary_address_street, 
			   l.primary_address_city, 
			   l.primary_address_state, 
			   l.primary_address_postalcode, 
			   l.primary_address_country, 
			   l.phone_home, 
			   l.description,
               lc.*
		FROM leads l 
		JOIN leads_cstm lc on lc.id_c = l.id
		LIMIT 5";



$stmt = $dbh->prepare($sql);
$stmt->execute();
$leads = array();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$item = $results[0];
$columns = array_keys($item);
$columns[0] = 'sugar_id';
unset($columns[11]);

$leads[] = array(); 
foreach($results as $result) {
    unset($result['id_c']);
    $result['Company'] = 'SugarLead';
    $leads[] = $result;
}


$fp = fopen('data/leads-data.csv', 'w');
//$header = array("sugar_id", "salutation", "First Name", "Last Name", "Address", "City", "State", "Zip Code", "Country", "Phone", "Description");
$header = $columns;
fputcsv($fp,$header);
foreach($leads as $lead) {
    fputcsv($fp, $lead);
}

fclose($fp);

echo "process complete";
