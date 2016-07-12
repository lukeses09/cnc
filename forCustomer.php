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
</style>
</head>

<body>
<div class="page-header">
  <h1>ChatsN'Chiens <small>Veterinary Clinic</small>  
   <a href="logout.php" class="navbar-brand pull-right"><strong>Logout</strong></a></h1>
</div>
<ul class="nav nav-tabs nav-tabs-primary">
	<div class="pull-right">
	<button class="btn btn-success" name="btnProduct" type="submit">Products
	<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> </button>
	</div>
  <li class="active"><a href="#">Appointment</a></li>
  <li><a href="profile.php">Profile</a></li>
 </ul>
 
 <div class="col-xs-12">
		<div class="panel panel-default">
				<div class="panel-heading">
				</div>
				<div class="panel-body">
				<form action="forCustomer.php" method="post">
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Date</label>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<div class='input-group date' id='datetimepicker2'>
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
									<label for="exampleInputEmail1">Details</label>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<textarea class="form-control" rows="5" id="details" name="details"></textarea>
									</div>
								</div>
							</div>
							<div class="col-xs-3 col-xs-offset-7">
								<button class="btn btn-primary" name="btnSave" type="submit">Submit
								<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </button>
							</div>
							
				</div>
				</form>
		</div>
</div>
</body>
</html>
