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
					<h3 class="panel-title">Change Password</h3>
				</div>
				<div class="panel-body">
				<form action="changepass.php" method="post">
						<div class="container-fluid">
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Old Password</label>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<input type="text" class="form-control" id="oldpass" name="oldpass">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">New Password</label>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<input type="text" class="form-control" id="newpass" name="newpass" >
									</div>
								</div>
							</div>
							<div class="col-xs-1 col-xs-offset-5">
								<button class="btn btn-primary" name="btnSave" type="submit">OK
								<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </button>
							</div>
				</div>
				</form>
		</div>
</div>
</div>
</body>
</html>