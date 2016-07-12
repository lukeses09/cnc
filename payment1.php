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
<div class=" col-xs-9">
		<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Payment</h3>
				</div>
				<div class="panel-body">
				<form action="payment1.php" method="post">
						<div class="container-fluid">
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Client Name</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<div class="dropdown">
										  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										    Client Name
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
									<label for="exampleInputEmail1">Pet Name</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<div class="dropdown">
										  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										    Pet Name
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
									<label for="exampleInputEmail1">Doctor's Fee</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="docfee" name="docfee" disabled="disabled">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Emergency Fee</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="emergencyfee" name="emergencyfee" disabled="disabled">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Home Service Fee</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="hservicefee" name="hservicefee" disabled="disabled">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Deworming</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="deworming" name="deworming" disabled="disabled">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Heartworm Prevention</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="heartworm" name="heartworm" disabled="disabled">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Vaccinations</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<div class="dropdown">
										  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										    Vaccinations
										    <span class="caret"></span>
										  </button>
										  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
										 	<li><a href="#">DHLP+CPV</a></li>
										 	<li><a href="#">DHLP+CPV+CV</a></li>
										 	<li><a href="#">CAT VACCINE</a></li>
										 	<li><a href="#">RABBIES</a></li>
										  </ul>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Laboratory Exam</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<div class="dropdown">
										  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										    Laboratory Exam
										    <span class="caret"></span>
										  </button>
										  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
										 	<li><a href="#">BLOOD</a></li>
										 	<li><a href="#">FECLYSIS</a></li>
										 	<li><a href="#">SKIN TEST</a></li>
										  </ul>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Grooming</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<div class="dropdown">
										  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										    Grooming
										    <span class="caret"></span>
										  </button>
										  <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
										 	<li><a href="#">NAIL CLIPPING</a></li>
										 	<li><a href="#">DENTAL CARE</a></li>
										 	<li><a href="#">EAR CLEANING</a></li>
										  </ul>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Boarding</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="boarding" name="boarding" disabled="disabled">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Confinement</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="confinement" name="confinement" disabled="disabled">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Surgery</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="surgery" name="surgery" disabled="disabled">
									</div>
								</div>
							</div>
							
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Total</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="total" name="total" disabled="disabled">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Discount</label>
								</div>

								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="discount" name="discount" >
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Cash</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="cash" name="cash" >
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Change</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="change" name="change" >
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
</body>
</html>