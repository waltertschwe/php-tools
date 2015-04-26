<?php
$user = 'root';
$password = '%NN6prxt5';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=sugarweb_dev', $user, $password);
   
} catch (PDOException $e) {
    print "Error with db connection: " . $e->getMessage() . "<br/>";
    die();
}

$sql = "SELECT lead_source as 'label', count(lead_source) as 'value' from sugarweb_dev.leads where date_entered between ? and ? GROUP by lead_source";

$stmt = $dbh->prepare($sql);
$stmt->execute(array('2015-04-21 19:39:02', '2015-04-22 19:39:02'));
$stmt->execute();
$leads = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $leads[] = $row;	
}
$data = json_encode($leads);

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
            "caption": "Call center Report",
            "subCaption": "Date 4/23 - 4/24",
            "xAxisName": "Source",
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
