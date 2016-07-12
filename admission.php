<?php
   include('session.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="css/bootstrap.css" rel="stylesheet"></link>
<script src="js/jquery-2.2.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>

</head>

<body>
<?php include('sample.php');
?>
<ul class="nav nav-tabs">
  <li ><a href="treatment.php">Treatment</a></li>
  <li class="active"><a href="admission.php">Admission</a></li>
  <li><a href="discharge.php">Discharge</a></li>


<div class=" col-xs-9">
		<div class="panel panel-default">
				<div class="panel-heading">
				</div>
				<div class="panel-body">
				<form action="admision.php" method="post">
							<div class="form-group">
							
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Starting Date</label>
								</div>
								<div class="col-xs-5">
									<div class="form-group">
										<div class='input-group date' id='datetimepicker1'>
			                   				 <input type='text' class="form-control" />
			                    				<span class="input-group-addon">
			                    				    <span class="glyphicon glyphicon-calendar"></span>
			                   					 </span>
			               				 </div>
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Cage Number</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<div class="dropdown">
										  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										    Cage Number
										    <span class="caret"></span>
										  </button>
										  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
										 
										  </ul>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-3 col-xs-offset-10">
								<button class="btn btn-primary" name="btnSave" type="submit">Submit
								<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</ul>
	<script type="text/javascript">
	$('#datetimepicker1').datepicker({
		toggleActive: true,
		autoclose: true,
		format: 'mm/dd/yyyy'
	});
	$('#datetimepicker2').datepicker({
		toggleActive: true,
		autoclose: true,
		format: 'mm/dd/yyyy'
	});
</script>
