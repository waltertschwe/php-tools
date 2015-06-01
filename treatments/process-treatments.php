<?php

$user = 'root';
$password = '%NN6prxt5';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=treatments', $user, $password);
   
} catch (PDOException $e) {
    print "Error with db connection: " . $e->getMessage() . "<br/>";
    die();
}

$patientId = $_POST['patientId'];
$iui = $_POST['iui'];
$egg1 = $_POST['egg1'];
$egg2 = $_POST['egg2'];
$egg3 = $_POST['egg3'];
$ivf1 = $_POST['ivf1'];
$ivf2 = $_POST['ivf2'];


$stmt = $dbh->prepare("INSERT INTO treatments.patients (patient_id, isIui, isEgg1, isEgg2, isEgg3, isIvf1, isIvf2) VALUES (:field1,:field2,:field3,:field4,:field5,:field6,:field7)");
$stmt->execute(array(':field1' => $patientId,':field2' => $iui,':field3' => $egg1,':field4' => $egg2,':field5' => $egg3,':field6' => $ivf1,':field7' => $ivf2));

$affected_rows = $stmt->rowCount();

echo json_encode(array('affected_rows' => $affected_rows));

