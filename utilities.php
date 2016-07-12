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

<div class=" col-xs-9">
		<div class="panel panel-default">
				<div class="panel-heading">
				</div>
				<div class="panel-body">
				<form action="utilities.php" method="post">
				<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Username</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="docfee" name="docfee" disabled="disabled">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Old Password</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="emergencyfee" name="emergencyfee" disabled="disabled">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">New Password</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="hservicefee" name="hservicefee" disabled="disabled">
									</div>
								</div>
							</div>
							<div class="col-xs-3 col-xs-offset-10">
								<button class="btn btn-primary" name="btnSave" type="submit">Change password
								<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</ul>
	
