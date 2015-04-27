<!DOCTYPE html>
<html lang="en">
<head>
<title>Progyny Data Tools</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link data-require="bootstrap@*" data-semver="3.3.2" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
<link data-require="bootstrap-css@3.3.*" data-semver="3.3.2" rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/d004434a5ff76e7b97c8b07c01f34ca69e635d97/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/d004434a5ff76e7b97c8b07c01f34ca69e635d97/src/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="../js/fusioncharts.js"></script>
<script type="text/javascript" src="../js/themes/fusioncharts.theme.fint.js"></script>

<<script type="text/javascript">
        $(document).ready(function(){
            $('#generate-report').click(function(e){
            	e.preventDefault();
            	var startDate = $("#start-date").val();
            	var endDate = $("#end-date").val();
                $.ajax({
                    type: "POST",
                    url: 'get-leads.php',
                    data: { "startDate" : startDate, "endDate" : endDate},
                    success: function(data) {              
                    	$('#data').html(data);
                    	var fileName = "data/call-center-leads_" + startDate + "-" + endDate + ".csv";
                    	$('#download-report').html("<a href=\""+fileName+"\"><span class=\"glyphicon glyphicon-file\"></span></a>");
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
     					alert("failed to get data");
  					}
                });
            });
        });
</script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<style>
#download-report {
	 margin-left:auto;
}
</style>
</head>
<body>
	
	<div id="data"></div>
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
      <h3><a href="">Data Dashboard</a> > Call Center > Lead Picker</h3>  
    </div>
</div>
<div class="container">
    <div class='col-md-5'>
    	<h4>Select A Date Range</h4>
    </div>
</div>
<form method="post" role="form" id="date-form">
<div class="container">
    <div class='col-md-5'>
        <div class="form-group">
            <div class='input-group date' id='datetimepicker6'>
                <input name="start-date" id="start-date" type='text' class="form-control" placeHolder="Start Date Time"  />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
    <div class='col-md-5'>
        <div class="form-group">
            <div class='input-group date' id='datetimepicker7'>
                <input name="end-date" id="end-date" type='text' class="form-control" placeHolder="End Date Time"  />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker6').datetimepicker({ format: 'YYYY-MM-DD H:mm'
        	     	
        });
        $('#datetimepicker7').datetimepicker({ format: 'YYYY-MM-DD H:mm'
        	
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>
<div class="container">
	<div class="form-group">
    <div class='col-md-5'>
   		<button id="generate-report" name="submit" class="btn btn-lg btn-primary">Generate Report</button>
    </div>
</div>
</form>
</div>
<div class="container">
	 <div class="col-md-5"><br/>
   </div>
</div>
<div class="container">
	 <div class="col-md-5">
	 	<div id="download-report" class="report"></div>
     <div id="chartContainer"></div>
   </div>
</div>
</body>
</html>