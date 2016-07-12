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
<?php include('forUser.php');
?>
<ul class="nav nav-tabs">
  <li><a href="treatment1.php">Treatment</a></li>
  <li><a href="admission1.php">Admission</a></li>
  <li class="active"><a href="discharge.php">Discharge</a></li>


<div class=" col-xs-9">
		<div class="panel panel-default">
				<div class="panel-heading">
				</div>
				<div class="panel-body">
				<form action="discharge.php" method="post">
						<div class="container-fluid">
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Patient Name</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<div class="dropdown">
										  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										    Patient Name
										    <span class="caret"></span>
										  </button>
										  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
										 
										  </ul>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Date of Discharge</label>
								</div>
								<div class="col-xs-5">
									<div class="form-group">
										<div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
										<div class='input-group date' id='datetimepicker2'>
			                   				 <input type='text' class="form-control" />
			                    				<span class="input-group-addon">
			                    				    <span class="glyphicon glyphicon-calendar"></span>
			                   					 </span>
			               				 </div>
									</div>
								</div>
							</div>
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Discharge Diagnosis</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<textarea class="form-control" rows="2" id="diagnosis" name="diagnosis"></textarea>
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Complications</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<textarea class="form-control" rows="2" id="complications" name="complications"></textarea>
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Consultations</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<textarea class="form-control" rows="2" id="consultations" name="consultations"></textarea>
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Pertinent History</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<textarea class="form-control" rows="3" id="history" name="history"></textarea>
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Condition on discharge</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<textarea class="form-control" rows="2" id="condition" name="conditionsss"></textarea>
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Discharge To</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
									<input type="text" class="form-control" id="dischargename" name="dischargename">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Follow up required</label>
								</div>
								<div class="col-xs-1">
									<div class="form-group">
										<input type="checkbox" class="form-control" value="">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1"> Next Appointment Date</label>
								</div>
								<div class="col-xs-5">
									<div class="form-group">
										<div class='input-group date' id='datetimepicker4'>
			                   				 <input type='text' class="form-control" />
			                    				<span class="input-group-addon">
			                    				    <span class="glyphicon glyphicon-calendar"></span>
			                   					 </span>
			               				 </div>
									</div>
								</div>
							</div>

							<div class="col-xs-3 col-xs-offset-10">
								<button class="btn btn-primary" name="btnSave" type="submit">Submit
								<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </button>
							</div>
							<br>
							<br>
						</div>
					</form>
				</div>
			</div>
		</div>
	</ul>
	</body>
	</html>
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
	$('#datetimepicker3').datepicker({
		toggleActive: true,
		autoclose: true,
		format: 'mm/dd/yyyy'
	});
	$('#datetimepicker4').datepicker({
		toggleActive: true,
		autoclose: true,
		format: 'mm/dd/yyyy'
	});
</script>