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
      <h3><a href="">Data Dashboard</a> > Home</h3>  
    </div>
</div>
        <div class="row">
        <div class="col-sm-4">
          <ul class="list-group">
            <li class="list-group-item active">
                <span class="glyphicon glyphicon-tower"></span>&nbsp;Clinics 
            </li>
            <li class="list-group-item"><a href="clinics/">All Locations</a></li> 
            <li class="list-group-item"><a href="clinics/banxx.php">Egg Banxx & IVF (only)</a></li>
            <li class="list-group-item"><a href="clinics/eeva.php">Eeva Test (only)</a></li>
		 </ul> 
        </div><!-- /.col-sm-4 -->
        <div class="col-sm-4">
        	 <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"> <span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Doctors</h3>
            </div>
            <div class="panel-body">
                <a href="">Doctors -> Basic Info</a><br/>
            </div>
          </div>
          <div class="panel panel-warning">
            <div class="panel-heading">
              <h3 class="panel-title"><span class="glyphicon glyphicon-piggy-bank"></span>&nbsp;&nbsp;EggBanxx</h3>
            </div>
            <div class="panel-body">
              <a href="">Treatments</a><br/>
            </div>
          </div>
          <div class="panel panel-danger">
            <div class="panel-heading">
              <h3 class="panel-title"><span class="glyphicon glyphicon-flash"></span>&nbsp;IVF Advantage</h3>
            </div>
            <div class="panel-body">
                <a href="">Treatments</a><br/>
            </div>
          </div>
        </div><!-- /.col-sm-4 -->
        <div class="col-sm-4">
        	<div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><span class="glyphicon glyphicon-earphone"></span>&nbsp;Call Center Tools</h3>
            </div>
            <div class="panel-body">
               <a href="call-center/lead-picker.php">Lead Picker</a><br/>        
            </div>
          </div>
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span>&nbsp;Patients</h3>
            </div>
            <div class="panel-body">
            	 <a href="">Patients -> Basic Info</a><br/>
            </div>
          </div>
        </div><!-- /.col-sm-4 -->
      </div>
</body>
</html>