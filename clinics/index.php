<?php

$user = 'root';
$password = '%NN6prxt5';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=drupal', $user, $password);
   
} catch (PDOException $e) {
    print "Error with db connection: " . $e->getMessage() . "<br/>";
    die();
}


$sql = "SELECT * from fertility.clinics";

$stmt = $dbh->prepare($sql);
//$stmt->execute(array(':type' => 'clinic'));
$stmt->execute();
$clincs = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $clinics[] = $row;	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Progyny Data Tools</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css" />
<link rel="stylesheet" href="//cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css" />
<style>
table.display tr.odd {
	background-color: #ddddff !important;
}

table.display tr.even {
	background-color: #eeeeff !important;
}

table.display tr.odd td.sorting_1 {
	background-color: #ddddff !important;
}

table.display tr.even td.sorting_1 {
	background-color: #eeeeff !important;
}
.bubble {
  background-color: #90EE90;
  width: 10%;
  padding: 5px;
  margin: 5px;
  font-size: 14px;
  border-radius: 10px;
  margin-left:auto;
}
</style>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.6/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
	$('#example').dataTable( {
		"pagingType": "simple_numbers"
	} );
} );
</script>
</head>
<body>
	 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Progyny</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
<div class="container">
    <div class="page-header">
    	<div class="container">
        <h3><a href="../">Data Dashboard</a> > Clinics All Locations</h3>
        <p class="bubble">Actions: 
	    <a href="../csv/data/all-clinic-locations.csv"><span class="glyphicon glyphicon-file"></span></a>
	    </p>
    </div>
  
</div>

<div class="row">

				<table id="example" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>					
							<th>Name</th>
							<th>Address</th>
							<th>City</th>
							<th>State</th>
							<th>Zip</th>
							<th>Phone</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Name</th>
							<th>Address</th>
							<th>City</th>
							<th>State</th>
							<th>Zip</th>
							<th>Phone</th>
						</tr>
					</tfoot>
					<tbody>
						<?php foreach($clinics as $clinic) { ?>
						<tr class="sorting_1">
							<td><?php echo $clinic['clinic_name']; ?></td>
							<td><?php echo $clinic['address']; ?></td>
							<td><?php echo $clinic['city']; ?></td>
							<td><?php echo $clinic['state']; ?></td>
							<td><?php echo $clinic['zip']; ?></td>
							<td><?php echo $clinic['phone']; ?></td>
						</tr>
						<?php } ?>
					</table>
</div>
</body>
</html>