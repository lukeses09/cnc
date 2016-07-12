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
  <li class="active"><a href="#">Profile</a></li>
  <li><a href="sales.php">Sales</a></li>
<div class=" col-xs-9">
		<div class="panel panel-default">
				<div class="panel-heading">
				</div>
				<div class="panel-body">
				<form action="profilesales.php" method="post">
						<div class="container-fluid">

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

</script>