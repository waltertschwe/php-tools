a<?php
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
    	'WhoId' => '00Qf000000Ah7ME',  // required
    	'Status' => 'Completed',
    	'Priority' => 'Normal',
    	'Subject' => 'This is the subject',
    	'Description' => 'This is the description text'  	
	 );
	 
	$sObj = new sObject();
    $sObj->fields = $fields; 
    $sObj->type = 'Task'; 
    echo "namespace = " . $mySforceConnection->getNamespace();
	echo "Creating New Lead\r\n";
	//$upsertResponse = $mySforceConnection->upsert("sugar_id__c", array($sObj));
	$insertResponse =  $mySforceConnection->create(array($sObj));
	print_r($insertResponse);
	
} catch (Exception $e) {
	print_r($e);
}