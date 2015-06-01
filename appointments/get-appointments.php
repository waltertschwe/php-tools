<?php

$user = 'root';
$password = '%NN6prxt5';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=progyny', $user, $password);
   
} catch (PDOException $e) {
    print "Error with db connection: " . $e->getMessage() . "<br/>";
    die();
}
$clinicId = $_POST['clinicId'];
$lastName = $_POST['lastName'];


$sql = "SELECT patient_id, email FROM event_patients WHERE last_name LIKE '%".$lastName."%'";
$stmt = $dbh->prepare($sql);
$stmt->execute();


$emails = '';
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $emails .=	'<div class="input-group">
	            <span class="input-group-addon">
	        		<input id="patient-id" type="radio" aria-label="..." name="patient-id" value="'.$row['patient_id'].'">
	      		</span>
	      			<input type="text" class="form-control" aria-label="..." value="'.$row['email'].'">
	    		</div><!-- /input-group -->   ';

	  
	 }

$sql = "SELECT appointment_id, appt_date_time, isAvailable FROM appointments WHERE clinic_id = ". $clinicId. " AND isAvailable = 1";
$stmt = $dbh->prepare($sql);
$stmt->execute();

$appointments = '';
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $phpdate = strtotime($row['appt_date_time']);
	$formatDate = date( 'D, m/d/Y h:i a', $phpdate );
    $appointments .= '<div class="input-group">
	      <span class="input-group-addon">
	        <input id="" type="radio" name="appointment-date" value="'.$row['appointment_id'].'" aria-label="...">
	      </span>
	      <input type="text" class="form-control" aria-label="..." value="'.$formatDate.'">
	    </div><!-- /input-group -->';
	
	
}


if(empty($emails)) {
	$error = "Last Name Not Found";
	echo $error;
	exit();
}

$resultHTML = '<form action="" method="post"><b>Select Email</b>'.$emails.'
			<div class="top-buffer">
			<b>Select Appointment</b>
			</div>
        	'.$appointments.'
        	<div class="input-group top-buffer">
	       <button type="submit" id="create-appointment" class="btn btn-default btn-success">Create Appointment &raquo;</button>
	    </div><!-- /input-group -->    
	  </form>
	  ';
echo $resultHTML;	