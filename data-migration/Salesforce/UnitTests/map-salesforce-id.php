<?php
// SOAP_CLIENT_BASEDIR - folder that contains the PHP Toolkit and your WSDL
// $USERNAME - variable that contains your Salesforce.com username (must be in the form of an email)
// $PASSWORD - variable that contains your Salesforce.ocm password


define("SOAP_CLIENT_BASEDIR", "../../salesforce-api/soapclient");

$USERNAME='walter.schweitzer@progyny.com';
$PASSWORD="artecs11Co3wOBHumBSr2x03lHItWDb8";
require_once (SOAP_CLIENT_BASEDIR.'/SforcePartnerClient.php');
require_once (SOAP_CLIENT_BASEDIR.'/SforceHeaderOptions.php');

$user = 'root';
$password = '%NN6prxt5';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=salesforce', $user, $password);

} catch (PDOException $e) {
    print "Error with db connection: " . $e->getMessage() . "<br/>";
    die();
}


try {
	$mySforceConnection = new SforcePartnerClient();
	$mySoapClient = $mySforceConnection->createConnection(SOAP_CLIENT_BASEDIR.'/partner2.wsdl.xml');
	$mylogin = $mySforceConnection->login($USERNAME, $PASSWORD);
	
	$query = 'SELECT Id,sugar_id__c from Lead';
	$response = $mySforceConnection->query($query);
	$queryResult = new QueryResult($response);
	
	for ($queryResult->rewind(); $queryResult->pointer < $queryResult->size; $queryResult->next()) {
		$result = $queryResult->current();
		$salesForceId = $result->Id;
		$sugarId = $result->fields->sugar_id__c;
		if(!empty($sugarId)) {
			echo "preapring to insert record\n";
		    $sql = "INSERT INTO sugarid_salesforceid VALUES ('".$sugarId."','".$salesForceId."')";
			echo $sql . "\n";
		    $stmt = $dbh->prepare($sql);
			$stmt->execute();
		}
	}

	
} catch (Exception $e) {
	print_r($e);
}
