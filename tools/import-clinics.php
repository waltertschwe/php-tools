<?php

$user = 'root';
$password = '%NN6prxt5';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=drupal', $user, $password);
   
} catch (PDOException $e) {
    print "Error with db connection: " . $e->getMessage() . "<br/>";
    die();
}

$sql = "SELECT n.nid as 'id', 
	   n.title as 'clinic_name',
       ft.field_tagline_value as 'tagline', 
      fs.field_statement_value as 'statement',
       fa.field_address_address as 'address', 
       fa.field_address_address2 as 'address2', 
       fa.field_address_city as 'city', 
       fa.field_address_state as 'state', 
       fa.field_address_zip as 'zip',
       fa.field_address_lat as 'address_lat', 
       fa.field_address_lng as 'address_lng', 
       fc.field_country_value as 'country', 
       fe.field_email_active_email as 'email',
       fp.field_phone_value as 'phone', 
       fw.field_website_active_url as 'website_url', 
       fw.field_website_active_title as 'website_title', 
       frc.field_art_data_report_clinic_url as 'art_data_report_url',
       ivf.field_ivfadvantage_value as 'is_ivf_advantage',
       egg.field_eggbanxx_value as 'is_egg_banxx',
       eeva.field_eevatest_value as 'is_eeva_test'
FROM drupal.node n 
left join drupal.field_data_field_tagline ft on ft.entity_id = n.nid
left join drupal.field_data_field_statement fs on fs.entity_id = n.nid
left join drupal.field_data_field_address fa on fa.entity_id = n.nid
left join drupal.field_data_field_country fc on fc.entity_id = n.nid
left join drupal.field_data_field_email_active fe on fe.entity_id = n.nid
left join drupal.field_data_field_phone fp on fp.entity_id = n.nid
left join drupal.field_data_field_website_active fw on fw.entity_id = n.nid
left join drupal.field_data_field_art_data_report_clinic frc on frc.entity_id = n.nid
left join drupal.field_data_field_ivfadvantage ivf on ivf.entity_id = n.nid
left join drupal.field_data_field_eggbanxx egg on egg.entity_id = n.nid
left join drupal.field_data_field_eevatest eeva on eeva.entity_id = n.nid
WHERE n.type = :type";

$stmt = $dbh->prepare($sql);
$stmt->execute(array(':type' => 'clinic'));
$clincs = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $clinics[] = $row;	
}

foreach($clinics as $clinic) {
	$address = $clinic['address'];
	//print "address = " . $address;
	if(empty($address)) {
		continue;
	}
	
	if($clinic['is_ivf_advantage'] == NULL) {
		$clinic['is_ivf_advantage'] = 0;
	}
	
	if($clinic['is_egg_banxx'] == NULL) {
		$clinic['is_egg_banxx'] = 0;
	}
	
	if($clinic['is_eeva_test'] == NULL) {
		$clinic['is_eeva_test'] = 0;
	}

	$sql = "INSERT INTO fertility.clinics (id,clinic_name,tagline,statement,address,address2,city,state,zip,address_lat,address_lng,country,email,phone,website_url,website_title,art_data_report_url,is_ivf_advantage,is_egg_banxx,is_eeva_test) 
										  VALUES (:id,:clinic_name,:tagline,:statement,:address,:address2,:city,:state,:zip,:address_lat,:address_lng,:country,:email,:phone,:website_url,:website_title,:art_data_report_url,:is_ivf_advantage,:is_egg_banxx,:is_eeva_test)";
	$q = $dbh->prepare($sql);
	$q->execute(array(':id'=>$clinic['id'],':clinic_name'=>$clinic['clinic_name'],':tagline'=>$clinic['tagline'],':statement'=>$clinic['statement'],':address'=>$clinic['address'],
							':address2'=>$clinic['address2'],':city'=>$clinic['city'],':state'=>$clinic['state'],':zip'=>$clinic['zip'],':address_lat'=>$clinic['address_lat'],':address_lng'=>$clinic['address_lng'],':country'=>	
							 $clinic['country'],':email'=> $clinic['email'],':phone' => $clinic['phone'],':website_url' => $clinic['website_url'], ':website_title' => $clinic['website_title'], 
							 ':art_data_report_url' => $clinic['art_data_report_url'], ':is_ivf_advantage' => $clinic['is_ivf_advantage'], ':is_egg_banxx' => $clinic['is_egg_banxx'], 'is_eeva_test' => $clinic['is_eeva_test']
	));

   $affected_rows = $q->rowCount();
   print("affected rows = " . $affected_rows . "\n");	
}
