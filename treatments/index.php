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
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript">
    $(document).ready(function(){
        $('#submit-treatment').click(function(e){
        	e.preventDefault();
        	var patientId = $("#patient-id").val();
        	var iui = $("#iui").is(':checked') ? 1 : 0;
        	var egg1 = $("#egg-1").is(':checked') ? 1 : 0;
        	var egg2 = $("#egg-2").is(':checked') ? 1 : 0;
        	var egg3 = $("#egg-3").is(':checked') ? 1 : 0;
        	var ivf1 = $("#ivf-2fresh").is(':checked') ? 1 : 0;
        	var ivf2 = $("#ivf-2fresh2fet").is(':checked') ? 1 : 0;
            $.ajax({
                type: "POST",
                url: 'process-treatments.php',
                data: { "patientId" : patientId, "iui" : iui, "egg1" : egg1, "egg2" : egg2, "egg3": egg3, "ivf1" : ivf1, "ivf2" : ivf2},
                success: function(data) {              
                	alert("Thanks for updating your treatment status!");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
 					alert("Treatment updated failed.  Please Try Again");
				}
            });
        });
    });
</script>
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
        <p class="lead">Manage My Treatments</p>
      </div>
      </div>
    </div>
</div>
        <div class="row">
        <div class="col-sm-4">
         <div class="col-lg-6">	   
		  </div><!-- /.col-lg-6 -->		  
        </div><!-- /.col-sm-4 -->
        <div class="col-sm-6">
        	<div class="form-group">
			  <input type="text" id="patient-id" class="form-control" placeholder="Patient Unique Code (INITALS + LAST FOUR)" aria-describedby="basic-addon2" required="required">
			</div>
        	<div class="input-group top-buffer">
	      <span class="input-group-addon">
	        <input id="iui" type="checkbox" aria-label="...">
	      </span>
	      <input type="text" class="form-control" aria-label="..." value="IUI">
	    </div><!-- /input-group -->       	 
	    <div class="input-group">
	      <span class="input-group-addon">
	        <input id="egg-1" type="checkbox" aria-label="...">
	      </span>
	      <input type="text" class="form-control" aria-label="..." value="Egg Banxx 1 Cycle">
	    </div><!-- /input-group -->
	     <div class="input-group">
	      <span class="input-group-addon">
	        <input id="egg-2" type="checkbox" aria-label="...">
	      </span>
	      <input type="text" class="form-control" aria-label="..." value="Egg Banxx 2 Cycle">
	    </div><!-- /input-group -->
	     <div class="input-group">
	      <span class="input-group-addon">
	        <input id="egg-3" type="checkbox" aria-label="...">
	      </span>
	      <input type="text" class="form-control" aria-label="..." value="Egg Banxx 3 Cycle">
	    </div><!-- /input-group -->
	     <div class="input-group">
	      <span class="input-group-addon">
	        <input id="ivf-2fresh" type="checkbox" aria-label="...">
	      </span>
	      <input type="text" class="form-control" aria-label="..." value="IVF Advantage 2 Fresh">
	    </div><!-- /input-group -->
	     <div class="input-group">
	      <span class="input-group-addon">
	        <input type="checkbox" aria-label="...">
	      </span>
	      <input id="ivf-2fresh2fet" type="text" class="form-control" aria-label="..." value="IVF Advatage 2 Fresh/2 FET">
	    </div><!-- /input-group -->
	    <div class="input-group top-buffer">
	       <button type="submit" id="submit-treatment" class="btn btn-default btn-success">Submit Treatments &raquo;</button>
	    </div><!-- /input-group -->
	  </div><!-- /.col-lg-6 -->
        </div><!-- /.col-sm-6 -->
      </div>
</body>
</html>