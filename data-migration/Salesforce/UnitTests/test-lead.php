<?php
// SOAP_CLIENT_BASEDIR - folder that contains the PHP Toolkit and your WSDL
// $USERNAME - variable that contains your Salesforce.com username (must be in the form of an email)
// $PASSWORD - variable that contains your Salesforce.ocm password


define("SOAP_CLIENT_BASEDIR", "../soapclient");
$USERNAME='walter.schweitzer@progyny.com';
$PASSWORD="artecs11Co3wOBHumBSr2x03lHItWDb8";
require_once (SOAP_CLIENT_BASEDIR.'/SforcePartnerClient.php');
require_once (SOAP_CLIENT_BASEDIR.'/SforceHeaderOptions.php');

try {
	$mySforceConnection = new SforcePartnerClient();
	$mySoapClient = $mySforceConnection->createConnection(SOAP_CLIENT_BASEDIR.'/partner2.wsdl.xml');
	$mylogin = $mySforceConnection->login($USERNAME, $PASSWORD);

    $fields = array (
    	'eggbanxx_interest__c' => 'true',
    	'ivfadvantage_interest__c' => 'true',
    	'salutation' => 'Mr.',
		'FirstName' => 'Walter upsert',
		'LastName' => 'API',
		'Phone' => '9144797109',
		'Company' => 'API Company', 
		'sugar_id__c' => 'abc12345',
		'Status' => 'Open',
		'Email' => 'walter.schweitzer@test.com',
		'Street' => '30 Hillside Terrace',
		'City' => 'New York',
		'State' => 'NY',
		'PostalCode' => '10019',
		'Country' => 'US',
		'Age__c' => '35',
		'date_of_birth__c' => '1979-08-12',
		'sex__c' => 'Male',
		'months_ttc__c' => '12',
		'relationship_status__c' => 'Couple',
		'sexual_orientation__c' => 'Straight',
		'will_use_insurance__c' => 'Yes',
		'insurance_name__c' => 'United Health Care',
		'doctor_clinic_email__c' => 'doctor@doctor.com',
		'requested_appointment__c' => '2014-07-01T09:00:00',
		'fertility_doctor_recommended_treatment__c' => 'none',
		'previously_seen_doctor__c' => 'no',
		'seeking_financing__c' => 'yes',
		'pay_egg_freezing__c' => 'scratch off lotto tickets',
		'appointment_type__c' => 'IVFAdvantage',
		'doctor_clinic_account__c' => 'Dr. Doom\'s Clinic',
		'appointment_dr_name__c' => 'Dr. Doom',
		'appointment_date__c' => '2014-07-01T09:00:00',
		'referred_date__c' => '2014-07-01T09:00:00',
		'imputed_lead_contract__c' => 'test',
		'billing_confirmed_date__c' => '2014-07-01T09:00:00',
		'outside_source_group__c' => 'oustide source group',
		'outside_source__c' => 'outside source',
		'outside_source_var__c' => 'outside source var 1',
		'outside_source_var_2__c' => 'outside source var 2',
		'outside_source_var_3__c' => 'outside source var 3',
		'appointment_schedule_date__c' => '2014-07-01T09:00:00',
		'lead_progress_update__c' => '2014-07-01T09:00:00',
		'convert_date__c' => '2015-10-26T21:32:52',
		'recommend_fa__c' => 'Yes',
		'recommended_doctor__c' => 'recommended doctor',
		'event_attendance__c' => 'Attend',
		'eggbanxx_event__c' => '2014-05-15 - Chicago (Hotel Monaco)',
		'payment_customer_id__c' => '12345',
		'initial_uuid__c' => 'adsfasdf',
		'payment_charge_id__c' => 'adsflksfd',
		'payment_amount__c' => '999.99',
		'status__c' => 'this is my status',
		'treatment_status__c' => 'treatment status',
		'status_description__c' => 'status description',
		'public_status_description__c' => 'public status description',
		'opportunity_amount__c' => '12000.00',
		'referred_by__c' => 'google',
		'LeadSource' => 'Web',
	);
    $sObj = new sObject();
    $sObj->fields = $fields; 
    $sObj->type = 'Lead'; 
    echo "namespace = " . $mySforceConnection->getNamespace();

    //$createResponse = $mySforceConnection->create(array($sObj));
    $upsertResponse = $mySforceConnection->upsert("sugar_id__c", array($sObj));
    echo "Creating New Lead\r\n";
    //print_r($createResponse);    
	print_r($upsertResponse);
	
} catch (Exception $e) {
	print_r($e);
}

?>
