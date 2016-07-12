<?php
   include('session.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="css/bootstrap.css" rel="stylesheet"></link>
<link href="css/bootstrap-datepicker3.css" rel="stylesheet"></link>
<script src="js/jquery-2.2.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
</head>

<body>
<?php include('forUser.php');
?>
<ul class="nav nav-tabs">
  <li class="active"><a href="#">Services</a></li>
  <li><a href="order1.php">Products</a></li>

<div class=" col-xs-9">
		<div class="panel panel-default">
				<div class="panel-heading">
				</div>
				<div class="panel-body">
				<form action="servicesandproducts1.php" method="post">
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
								<div class=" col-xs-10 col-xs-offset-1">
									<div class="panel panel-primary">
											<div class="panel-body">
												<label for="exampleInputEmail1">Services</label>
												<div class="checkbox">
													<label><input type="checkbox" value="">Home Service</label>
												</div>
												<div class="checkbox">
													  <label><input type="checkbox" value="">Deworming</label>
												</div>
												<div class="checkbox disabled">
													  <label><input type="checkbox" value="">Heartworm Prevention</label>
												</div>
												<div class="checkbox">
													<label><input type="checkbox" value="">DHLP+CPV</label>
												</div>
												<div class="checkbox">
													  <label><input type="checkbox" value="">DHLP+CPV+CV</label>
												</div>
												<div class="checkbox disabled">
													  <label><input type="checkbox" value="">Cat Vaccines</label>
												</div>
												<div class="checkbox">
													<label><input type="checkbox" value="">Rabbies</label>
												</div>
												<div class="checkbox">
													  <label><input type="checkbox" value="">Blood</label>
												</div>
												<div class="checkbox disabled">
													  <label><input type="checkbox" value="">Feclysis</label>
												</div>
												<div class="checkbox">
													<label><input type="checkbox" value="">Skin Test</label>
												</div>
												<div class="checkbox">
													  <label><input type="checkbox" value="">Nail Clipping</label>
												</div>
												<div class="checkbox disabled">
													  <label><input type="checkbox" value="">Dental Care</label>
												</div>
												<div class="checkbox">
													<label><input type="checkbox" value="">Ear Cleaning</label>
												</div>
												<div class="checkbox">
													  <label><input type="checkbox" value="">Boarding</label>
												</div>
												<div class="checkbox disabled">
													  <label><input type="checkbox" value="">Confinement</label>
												</div>
												<div class="checkbox">
													<label><input type="checkbox" value="">Surgery</label>
												</div>
												<div class="checkbox">
													  <label><input type="checkbox" value="">Check Up</label>
												</div>
												
											</div>
									</div>
								</div>
							
							<div class="col-xs-12">
								<div class="col-xs-4 text-left" >
									<label for="exampleInputEmail1">Details</label>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<textarea class="form-control" rows="5" id="details" name="details"></textarea>
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


</body>
</html>