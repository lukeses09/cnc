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
<?php include('sample.php');
?>
	

<div class=" col-xs-9 ">
			
<?php
	if(isset($_GET['hasError'])){
	echo '<script type="text/javascript">alert("May Error Po!");</script>';
}

ob_start();
$isConnected=@mysql_connect("localhost","root");
	
	if(!$isConnected){
		die("Unable to establish connection".@mysql_error());
	}
		$connect=@mysql_select_db("vet1");
   		$id=$_GET['id']; 
      	$content = "SELECT * FROM breed1 where breed_id='$id'";
      	$result = mysql_query($content) or die($content."<br/><br/>".mysql_error());
      	$row = mysql_fetch_array($result);

				
?>
</div>

<div class=" col-xs-9">
		<div class="panel panel-default">
				<div class="panel-heading">
				</div>
				<div class="panel-body">
				<form action="employee.php" method="post">
						<div class="container-fluid">
						<div class="col-xs-12">
							<div class="col-xs-4 text-right" >
								<label for="exampleInputEmail1">User ID</label>
							</div>
							<div class="col-xs-8">
								<div class="form-group">
									<input type="text" class="form-control" id="userId" name="userId" placeholder="User Id">
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
								<label for="exampleInputEmail1">Middle Initial</label>
							</div>
							<div class="col-xs-8">
								<div class="form-group">
									<input type="text" class="form-control" id="mi" name="mi" placeholder="Middle Initial">
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="col-xs-4 text-right" >
								<label for="exampleInputEmail1">Last Name</label>
							</div>
							<div class="col-xs-8">
								<div class="form-group">
									<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="col-xs-4 text-right" >
								<label for="exampleInputEmail1">Username</label>
							</div>
							<div class="col-xs-8">
								<div class="form-group">
									<input type="text" class="form-control" id="username" name="username" placeholder="Username">
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="col-xs-4 text-right" >
								<label for="exampleInputEmail1">Password</label>
							</div>
							<div class="col-xs-8">
								<div class="form-group">
									<input type="text" class="form-control" id="password" name="password" placeholder="Password">
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="col-xs-4 text-right" >
								<label for="exampleInputEmail1">Confirm Password</label>
							</div>
							<div class="col-xs-8">
								<div class="form-group">
									<input type="text" class="form-control" id="conpassword" name="conpassword" 
									placeholder="Confirm Password">
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="col-xs-4 text-right" >
								<label for="exampleInputEmail1">User Level</label>
							</div>
							<div class="col-xs-8">
								<div class="form-group">
									<input type="text" class="form-control" id="userlevel" name="userlevel" placeholder="User Level">
								</div>
							</div>
						</div>
	
							<div class="col-xs-18">
								<button class="btn btn-success" name="btnSave" type="submit">Save</button>
							</div>

						</div>
				</form>
		</div>
</div>
<?php
		if($connect=@mysql_connect("localhost","root")){
		echo"";
	} else {
		die(@mysql_error());
	}

	$connect=@mysql_select_db("vet1");

		if(isset($_POST['btnSave']))
		{

		$userid=$_POST['userId'];
		$firstname=$_POST['firstname'];
		$mi=$_POST['mi'];
		$lastname=$_POST['lastname'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$position=$_POST['position'];
		$bday=$_POST['datetimepicker1'];
		$address=$_POST['address'];
		$contactno=$_POST['contactno'];
		$email=$_POST['email'];
		$userlevel=$_POST['userlevel'];
		$status='active';
		mysql_query("insert into employee (`user_id`, `user_firstname`, `user_mi`, `user_lastname`, `username`, `password`, `position`, `bday`, `address`, `contact_no`, `email`, `user_level`, `status`)  values(".$userid.",'".$firstname."','".$mi."','".$lastname."','".$username."','".$password."','".$position."','".$bday."','".$address."','".$contactno."','".$email."','".$userlevel."','".$status."')");
	    echo"<br> Record has been added";
			
		}
		?>										
							
				
</body>
</html>
<script type="text/javascript">
	$('#datetimepicker1').datepicker({
		toggleActive: true,
		autoclose: true,
		format: 'yyyy-mm-dd'
	});
</script>


