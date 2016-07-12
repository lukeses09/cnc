<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/bootstrap.css" rel="stylesheet"></link>
<script src="js/jquery-2.2.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<style type="text/css">
	ul 	li{
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
<script type="text/javascript">
	 	$( document ).ready(function() {
   		 $('#refresh').submit();
});
</script>
</head>

<body>
<?php include('forUser.php');
?>
<div class=" col-xs-9">
		<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Registration</h3>
				</div>
				<div class="panel-body">
				<div class="panel-heading">
					<h3 class="panel-title">Owner's Information</h3>
				</div>
				<form action="registraion.php" method="post">
						<div class="container-fluid">
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Owner Id</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="ownerId" name="ownerId" placeholder="Owner Id">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Firstname</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Middlename</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
									<input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middle Name">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Lastname</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
									<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Birthday</label>
								</div>
								<div class="col-xs-8">
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
									<label for="exampleInputEmail1">Contact No.</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
									<input type="text" class="form-control" id="contactno" name="contactno" placeholder="Contact Number">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Address</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
									<input type="text" class="form-control" id="address" name="address" placeholder="Address">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Sex</label>
								</div>
								<div class="col-xs-8">
									<label class="radio-inline"><input type="radio" name="optradio">Female</label>
									<label class="radio-inline"><input type="radio" name="optradio">Male</label>
								</div>
							</div>
						</div>

						<div class="panel-heading">
							<h3 class="panel-title">Pet's Information</h3>
						</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Owner Id</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="ownerId" name="ownerId" placeholder="Owner Id">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Pet Id</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="petId" name="petId" placeholder="Pet Id">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Pet Name</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="petname" name="petname" placeholder="Pet Name">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Breed</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
									<input type="text" class="form-control" id="breed" name="breed" placeholder="Breed">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Age</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
									<input type="text" class="form-control" id="age" name="age" placeholder="Age">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Species</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
									<input type="text" class="form-control" id="specied" name="species" placeholder="Species">
								</div>
								</div>
							</div>	
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Weight</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
									<input type="text" class="form-control" id="weight" name="weight" placeholder="Weight">
									</div>
								</div>
							</div>	
							
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Sex</label>
								</div>
								<div class="col-xs-8">
									<label class="radio-inline"><input type="radio" name="optradio" value="on">Female</label>
									<label class="radio-inline"><input type="radio" name="optradio"value="off">Male</label>
								</div>
							</div>
						</div>
			</form>
		</div>
	</div>
<div class="col-xs-9 col-xs-offset-3">
		<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Appointment</h3>
				</div>
				<div class="panel-body">
				<form action="appointment.php" method="post">
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Date</label>
								</div>
								<div class="col-xs-8">
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
								<div class="col-xs-8">
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
						


</body>
</htmml>
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