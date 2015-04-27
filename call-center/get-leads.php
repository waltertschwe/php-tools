<?php

$user = 'root';
$password = '%NN6prxt5';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=sugarweb_dev', $user, $password);
   
} catch (PDOException $e) {
    print "Error with db connection: " . $e->getMessage() . "<br/>";
    die();
}

$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];


$sql = "SELECT lead_source as 'label', count(lead_source) as 'value' from sugarweb_dev.leads where date_entered between ? and ? GROUP by lead_source";

$stmt = $dbh->prepare($sql);
$stmt->execute(array($startDate, $endDate));
$stmt->execute();
$leads = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $leads[] = $row;	
}
$data = json_encode($leads);

//build spreadsheet
$reportName = "call-center-leads_".$startDate."-".$endDate.".csv";
$fp = fopen('data/'.$reportName, 'w');
$header = array("Lead Source", "Count");
fputcsv($fp,$header);
foreach($leads as $lead) {
	fputcsv($fp, $lead);
}

fclose($fp);



echo '
<script type="text/javascript">
  FusionCharts.ready(function(){
    var revenueChart = new FusionCharts({
        "type": "column2d",
        "renderAt": "chartContainer",
        "width": "800",
        "height": "400",
        "dataFormat": "json",
        "dataSource":  {
          "chart": {
            "caption": "Progyny Call Center Report",
            "subCaption": "Start Date/Time: '. $startDate . ' End Date/Time:' . $endDate .'",
            "xAxisName": "Lead Source",
            "yAxisName": "Number of Calls",
            "theme": "fint"
         },
         "data": '.$data.'
      }

  });
revenueChart.render();
})
</script>
';
