
<?php
   include('session.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
	
	<form action="patient.php" method="post" name="refresh">
	<div class="col-xs-5 form-align">
	<button class="btn-link glyphicon glyphicon-refresh" name="btnView" type="submit"/>
	</button>
	<a href="patientForm.php" class="btn-link glyphicon glyphicon-plus-sign" role="button"></a>
	</div>
	</form>
	<form action="patient.php" method="post" name="button">
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
      	$content = "SELECT * FROM patient where pet_id='$id'";
      	$result = mysql_query($content) or die($content."<br/><br/>".mysql_error());
      	$row = mysql_fetch_array($result);

				
?>
</div>

<div class=" col-xs-9">
		<div class="panel panel-default">
				<div class="panel-heading">
				</div>
				<div class="panel-body">
				<form action="Patientupdate.php" method="post">
						<div class="container-fluid">
					<div class="col-xs-12">
					<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Owner Id</label>
					</div>
					<div class="col-xs-8">
						<div class="form-group">
							<input type="text" class="form-control" id="ownerId" name="ownerId" placeholder="Owner Id"
							value="<?php echo "$row[owner_id]"?>" >
						</div>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="col-xs-4 text-right" >
						<label for="exampleInputEmail1">Pet Id</label>
					</div>
					<div class="col-xs-8">
						<div class="form-group">
							<input type="text" class="form-control" id="petId" name="petId" placeholder="Pet Id"
							value="<?php echo "$row[pet_id]"?>" readonly="readonly">
						</div>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="col-xs-4 text-right" >
						<label for="exampleInputEmail1">Pet Name</label>
					</div>
					<div class="col-xs-8">
						<div class="form-group">
							<input type="text" class="form-control" id="petname" name="petname" placeholder="Pet Name"
							value="<?php echo "$row[pet_name]"?>">
						</div>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="col-xs-4 text-right" >
						<label for="exampleInputEmail1">Species</label>
					</div>
					<div class="col-xs-8">
						<div class="form-group">
						<input type="text" class="form-control" id="species" name="species" placeholder="Species" value="<?php echo "$row[species]"?>">
						</div>
					</div>
				</div>	
				<div class="col-xs-12">
					<div class="col-xs-4 text-right" >
						<label for="exampleInputEmail1">Breed</label>
					</div>
					<div class="col-xs-8">
						<div class="form-group">
						<input type="text" class="form-control" id="breed" name="breed" placeholder="Breed"
						value="<?php echo "$row[breed]"?>">
						</div>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="col-xs-4 text-right" >
						<label for="exampleInputEmail1">Age</label>
					</div>
					<div class="col-xs-8">
						<div class="form-group">
						<input type="text" class="form-control" id="age" name="age" placeholder="Age" value="<?php echo "$row[age]"?>">
						</div>
				</div>
				
				<div class="col-xs-12">
					<div class="col-xs-4 text-right" >
						<label for="exampleInputEmail1">Weight</label>
					</div>
					<div class="col-xs-8">
						<div class="form-group">
						<input type="text" class="form-control" id="weight" name="weight" placeholder="Weight" value="<?php echo "$row[weight]"?>">
						</div>
					</div>
				</div>	
				
				<div class="col-xs-12">
					<div class="col-xs-4 text-right">
						<label for="exampleInputEmail1">Sex</label>
					</div>
					<div class="col-xs-8">
						<label class="radio-inline"><input type="radio" name="optradio" value="on">Female</label>
						<label class="radio-inline"><input type="radio" name="optradio" value="off">Male</label>
					</div>
				</div>
							<div class="col-xs-18">
								<button class="btn btn-success" name="btnUpdate" type="submit">Update</button>
								
							</div>

						</div>
				</form>
		</div>
</div>
												
<?php
error_reporting(E_ALL&~E_NOTICE);
if($connect=@mysql_connect("localhost","root"))
	echo"";
else
	die(@mysql_error());
$connect=@mysql_select_db("vet1");

if(isset($_POST['btnUpdate']))
{
$ownerid=$_POST['ownerId'];
$petid=$_POST['petId'];
$petname=$_POST['petname'];
$breed=$_POST['breed'];
$age=$_POST['age'];
$species=$_POST['species'];
$sex=$_POST['optradio'];
$weight=$_POST['weight'];
$status='active';
$sex=' ';
				if ($sex1 == 'on')
					{$sex='F';}
				else
					{$sex='M';}
	if(empty($petid))
	{ echo "Please complete required fields"; }
	else
	
{ mysql_query("update patient set owner_id=$ownerid, pet_name='$petname', breed='$breed', age=$age, species='$species', sex='$sex', weight='$weight' where pet_id='$petid' and status='$status'"); 
echo '<script type="text/javascript">alert("Record has been updated.")</script>'; }
echo'</div>';
}

?>						
				
</body>
</html>
