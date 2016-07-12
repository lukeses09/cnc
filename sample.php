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
<script src="js/accordion.js"></script>
<style type="text/css">
  ul  li{
    border-bottom: solid 1px #337ab7;
      text-align: center;
  }
  ul.nav{
    padding-left: 0px;
      padding-top: 0px;
      padding-right: 0px;
      padding-bottom: 0px;  
  }
</style>

<style type="text/css">
	
ul li{
 	display:block;
 	list-style-type: none;
}

.panel .panel-collapse ul .selected{
  background: lightgray;
}
</style>
</head>

<body>
<div class="page-header">
  <h1>ChatsN'Chiens <small>Veterinary Clinic</small>  <a href="logout.php" class="navbar-brand pull-right"><strong>Logout</strong></a></h1>

</div>
<div class="col-xs-3">
  <div class="panel-group" id="accordion">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Maintenance</a>
          <span class="glyphicon glyphicon-chevron-down" aria-hidden="true" style="float:right;"></span>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <ul  class="panel-body nav">
          <li><a href="client.php">Customer</a></li>
		       <li><a href="species.php">Species</a></li>
		       <li><a href="breed.php">Breed</a></li>
           <li><a href="patient.php">Pet</a></li>
           <li><a href="units.php">Units</a></li>
           <li><a href="category.php">Category</a></li>
           <li><a href="dosageform.php">Dosage Form</a></li>
           <li><a href="packaging.php">Packaging</a></li>
           <li><a href="generic.php">Generic</a></li>
           <li><a href="brand.php">Brand</a></li>
           <li><a href="products.php">Products</a></li>
		       <li><a href="medicines.php">Medicines</a></li>
		       <li><a href="services.php">Services</a></li>
		       <li><a href="cage.php">Cage</a></li>
        </ul>
      </div>
    </div>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Transaction</a>
          <span class="glyphicon glyphicon-chevron-down" aria-hidden="true" style="float:right;"></span>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <ul class="panel-body nav">
          <li><a href="registration.php">Registration</a></li>
           <li><a href="appointment1.php">Appointment</a></li>
          <li><a href="servicesandproducts.php">Services and Products</a></li>
          <li><a href="treatment.php">Treatment</a></li>
           <li><a href="payment.php">Payment</a></li>
        </ul>
      </div>
    </div>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Utilities</a>
          <span class="glyphicon glyphicon-chevron-down" aria-hidden="true" style="float:right;"></span>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <ul class="panel-body nav">
          <li><a href="employee.php">Employee</a></li>
          <li><a href="changepassword.php">Change Password</a></li>
        </ul>
      </div>
    </div>
    <!-- <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Records</a>
          <span class="glyphicon glyphicon-chevron-down" aria-hidden="true" style="float:right;"></span>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
          <ul class="panel-body nav">
                <li><a href="employee.php">Employee</a></li>
                <li><a href="changepassword.php">Change Password</a></li>
           </ul>
        </div>
      </div>
    </div> -->
  </div> 
</div>
</body>
</html>