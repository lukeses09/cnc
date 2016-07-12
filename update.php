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
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>



</head>

<body>
<?php include('sample.php');
?>
	<form action="client.php" method="post" name="refresh">
	<div class="col-xs-5 form-align">
	<button class="btn-link glyphicon glyphicon-refresh" name="btnView" type="submit"/>
	</div>
	</form>
	<form action="client.php" method="post" name="button">
		<div class="col-xs-4 pull-right">
			<div class="input-group">
				<input type="text" class="form-control" id="search" name="search" placeholder="Search">
				<span class="input-group-btn">
					<button class="btn btn-success glyphicon glyphicon-search btn-align" name="btnSearch" type="submit"/>
				</span>
			</div>
		</div>
	</form>	
	</div>



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
      	$content = "SELECT * FROM owner where owner_id='$id'";
      	$result = mysql_query($content) or die($content."<br/><br/>".mysql_error());
      	$row = mysql_fetch_array($result);

				
?>
</div>

<div class=" col-xs-9">
		<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Owner's Information</h3>
				</div>
				<div class="panel-body">
				<form action="update.php" method="post">
						<div class="container-fluid">
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Owner Id</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="ownerId" name="ownerId" placeholder="Owner Id"
										value="<?php echo "$row[owner_id]"?>" readonly="readonly">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Firstname</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name"
										value="<?php echo "$row[firstname]"?>">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Middlename</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
									<input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middle Name"
									value="<?php echo "$row[middle_initial]"?>">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Lastname</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
									<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name"
									value="<?php echo "$row[lastname]"?>">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Birthday</label>
								</div>
							<div class="col-xs-8">
									<div class="form-group">
										<div class='input-group date' id='datetimepicker1' name='datetimepicker1'>
			                   				 <input type='text' class="form-control" name='datetimepicker1' />
			                    				<span class="input-group-addon">
			                    				    <span class="glyphicon glyphicon-calendar"></span>
			                   					 </span>
			               				 </div>
									</div>
								</div>
     </div>
     </div>
     <div class="container" id="sandbox-container">

   
  
</div>

							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Contact No.</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
									<input type="text" class="form-control" id="contactno" name="contactno" placeholder="Contact Number"
									value="<?php echo "$row[contact_no]"?>">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Address</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
									<input type="text" class="form-control" id="address" name="address" placeholder="Address"
									value="<?php echo "$row[address]"?>">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Sex</label>
								</div>
								<div class="col-xs-8">
									<label class="radio-inline"><input type="radio" name="optradio" value="on" "<?php echo "$row[sex]"?>">Female</label>
									<label class="radio-inline"><input type="radio" name="optradio" value="off" "<?php echo "$row[sex]"?>">Male</label>
								</div>
							</div>
							<div class="col-xs-18">
								<button class="btn btn-success" name="btnUpdate" type="submit">Update</button>
								

							</div>
<?php
if($connect=@mysql_connect("localhost","root")){
		echo"";
	} else {
		die(@mysql_error());
	}

	$connect=@mysql_select_db("vet1");


if(isset($_POST['btnUpdate']))
{
$ownerId=$_POST['ownerId'];
$firstname=$_POST['firstname'];
$middlename=$_POST['middlename'];
$lastname=$_POST['lastname'];
$age=$_POST['datetimepicker1'];
$contactno=$_POST['contactno'];
$address=$_POST['address'];
$sex1=$_POST['optradio'];
$status='active';
$sex=' ';
	if($sex1 =='on')
	{$sex='F';}
	else
	{$sex='M';}

	if(empty($ownerId) || empty($firstname) || empty($lastname)  || empty($contactno) || empty($address))
	{ echo '<script type="text/javascript">alert("Please complete required fields")</script>';}
	else
{ mysql_query("update owner set firstname='$firstname', middle_initial='$middlename', lastname='$lastname', bday='$age', contact_no='$contactno', address='$address', sex='$sex', status='$status' where owner_id='$ownerId' and status='$status'"); 
  echo '<script type="text/javascript">alert("Record has been updated")</script>';
}
}



?>
						</div>
				</form>
		</div>
</div>
												
							
				
</body>
</html>

<script type="text/javascript">
	$('#datetimepicker1').datepicker({
		toggleActive: true,
		autoclose: true,
		format: 'yyyy-mm-dd'
	});
	
</script>