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
<nav class="navbar navbar-primary">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">ChatsN'Chiens</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="Maintenance.php">Maintenance<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="customer.php">Customer</a></li>
		  <li><a href="species.php">Species</a></li>
		  <li><a href="breed.php">Breed</a></li>
          <li><a href="patient.php">Patient</a></li>
          <li><a href="products.php">Products</a></li>
		  <li><a href="vaccines.php">Vaccines</a></li>
		  <li><a href="medicines.php">Medicines</a></li>
		  <li><a href="services.php">Services</a></li>
		  <li><a href="cage.php">Cage</a></li>
        </ul>
      </li>
      <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="">Transaction<span class="caret"></span></a>
      <ul class="dropdown-menu">
          <li><a href="appointment.php">Appointment</a></li>
          <li class="active"><a href="otherServices.php">Services</a></li>
          <li><a href="treatment.php">Treatment</a></li>
          <li><a href="order.php">Order</a></li>
          <li><a href="payment.php">Payment</a></li>
      </ul>
      </li>
      <li><a href="#">Records</a></li>
    </ul>
  </div>
</nav>

<div class=" col-xs-6 col-xs-offset-3">
		<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Services</h3>
				</div>
				<div class="panel-body">
				<form action="otherServices.php" method="post">
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
									<label for="exampleInputEmail1">Services</label>
								</div>
								<div class=" col-xs-10 col-xs-offset-1">
									<div class="panel panel-primary">
											<div class="panel-body">
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
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Details</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<textarea class="form-control" rows="5" id="details" name="details"></textarea>
									</div>
								</div>
								</div>
							</div>
							
							<div class="col-xs-18">
								<button class="btn btn-success" name="btnSave" type="submit">Save</button>
								<button class="btn btn-success" name="btnUpdate" type="submit">Update</button>
								<button class="btn btn-success" name="btnDelete" type="submit">Delete</button>
								<button class="btn btn-success" name="btnView" type="submit">View</button>
								<button class="btn btn-success" name="btnSearch" type="submit">Search</button>
							</div>
							<br>
							<br>