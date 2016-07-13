<?php
   include('../../controller/global/session.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Home</title>
<?php include('../../view/global/include_gems.html'); ?>  <!-- Plugins/Dependencies -->
<script src="../../js/accordion.js"></script>
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
          <li><a href="../../view/client/module.php">Customer</a></li>
		       <li><a href="../../view/species/module.php">Species</a></li>
		       <li><a href="../../view/breed/module.php">Breed</a></li>
           <li><a href="../../view/patient/module.php">Pet</a></li>
           <li><a href="../../view/units/module.php">Units</a></li>
           <li><a href="../../view/category/module.php">Category</a></li>
           <li><a href="../../view/dosageform/module.php">Dosage Form</a></li>
           <li><a href="../../view/packaging/module.php">Packaging</a></li>
           <li><a href="../../view/generic/module.php">Generic</a></li>
           <li><a href="../../view/brand/module.php">Brand</a></li>
           <li><a href="../../view/products/module.php">Products</a></li>
		       <li><a href="../../view/medicines/module.php">Medicines</a></li>
		       <li><a href="../../view/services/module.php">Services</a></li>
		       <li><a href="../../view/cage/module.php">Cage</a></li>
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
          <li><a href="../../view/registration/module.php">Registration</a></li>
           <li><a href="../../view/appointment1/module.php">Appointment</a></li>
          <li><a href="../../view/servicesandproducts/module.php">Services and Products</a></li>
          <li><a href="../../view/treatment/module.php">Treatment</a></li>
           <li><a href="../../view/payment/module.php">Payment</a></li>
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
          <li><a href="../../view/employee/module.php">Employee</a></li>
          <li><a href="../../view/changepassword/module.php">Change Password</a></li>
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