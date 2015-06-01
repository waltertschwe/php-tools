<?php 
if(!empty($_POST)) {
	var_dump($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Progyny Data Tools</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link data-require="bootstrap@*" data-semver="3.3.2" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
<link data-require="bootstrap-css@3.3.*" data-semver="3.3.2" rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
    	$( "#clinic-1" ).click(function() {
    		var clinicId = $("#clinic-1").val();
    		var lastName = $("#last-name").val();
    		$.ajax({
                type: "POST",
                url: 'get-appointments.php',
                data: { "clinicId" : clinicId, "lastName" : lastName},
                success: function(data) { 
                    $('#appointments').html(data);            
                	
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
 					alert("Appointment Creation Failed");
				}
        	});		
		});
	    $( "#create-appointment").click(function() {
	    	alert("Create Appointment");
	     });
	     
	     $( "#clinic-2" ).click(function() {
    		var clinicId = $("#clinic-1").val();
    		var lastName = $("#last-name").val();
    		$.ajax({
                type: "POST",
                url: 'get-appointments.php',
                data: { "clinicId" : clinicId, "lastName" : lastName},
                success: function(data) { 
                    $('#appointments').html(data);            
                	
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
 					alert("Appointment Creation Failed");
				}
        	});		
		});
	    $( "#create-appointment").click(function() {
	    	alert("Create Appointment");
	     });
     });
</script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<style>
	.top-buffer { margin-top:20px; }
</style>
</head>
<body>
<div class="container">
    <div class="page-header">
    	<div class="container">
    		<div class="col-sm-4">
    		</div>
    		<div class="col-sm-4">
      <div class="starter-template">
        <h1><img src="img/progyny.png"</h1>
        <p class="lead">Make An Appointment</p>
      </div>
      </div>
    </div>
</div>
        <div class="row">
        <div class="col-sm-4">
         
         	 <div class="form-group">
		<input type="text" id="last-name" class="form-control" placeholder="Patient Last Name" aria-describedby="basic-addon2" required="required">
			</div>     	
        	    <div class="input-group">
			      <span class="input-group-addon">
			        <input type="radio" name="clinic" id="clinic-1" aria-label="..." value="1">
			      </span>
			      <input type="text" class="form-control" aria-label="..." value="RMA New York">
			    </div><!-- /input-group -->  
			     <div class="input-group top-buffer">
			      <span class="input-group-addon">
			        <input type="radio" name="clinic" id="clinic-2" aria-label="..." value="2">
			      </span>
			      <input type="text" class="form-control" aria-label="..." value="Sher Fertility">
			    </div><!-- /input-group -->      	     	 
		    
        </div><!-- /.col-sm-4 -->
        <div class="col-sm-6">
        	<div id="appointments"></div>
        </div><!-- /.col-sm-6 -->
      </div>
</body>
</html>