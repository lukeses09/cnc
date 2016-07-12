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
	

<form action="services.php" method="post" name="refresh">
	<div class="col-xs-5 form-align">
	<button class="btn-link glyphicon glyphicon-refresh" name="btnView" type="submit"/>
	</button>
	</div>
	</form>
	<form action="services.php" method="post" name="button">
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
      	$content = "SELECT * FROM services where service_id='$id'";
      	$result = mysql_query($content) or die($content."<br/><br/>".mysql_error());
      	$row = mysql_fetch_array($result);

				
?>
</div>

<div class=" col-xs-9">
		<div class="panel panel-default">
				<div class="panel-heading">
				</div>
				<div class="panel-body">
				<form action="Serviceupdate.php" method="post">
						<div class="container-fluid">
						<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Service Id</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="servicesId" name="servicesId" placeholder="Service Id"
										value="<?php echo "$row[service_id]"?>" readonly="readonly">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Service Name</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="servicename" name="servicename" 
										placeholder="Service Name" value="<?php echo "$row[service_name]"?>">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
					<div class="col-xs-4 text-right" >
						<label for="exampleInputEmail1">Category</label>
					</div>
					<div class="col-xs-4">
						<label class="radio-inline"><input type="radio" name="optradio" value="Vet">Vet</label>
						<label class="radio-inline"><input type="radio" name="optradio" value="Grooming">Grooming</label>
						<label class="radio-inline"><input type="radio" name="optradio" value="Exam">Lab Exam</label>
					</div>
				</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Price</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="price" name="price" placeholder="Price" value="<?php echo "$row[price]"?>">
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
if($connect=@mysql_connect("localhost","root"))
	echo"";
else
	die(@mysql_error());
$connect=@mysql_select_db("vet1");												
if(isset($_POST['btnUpdate']))
{
$servicesId=$_POST['servicesId'];
$servicename=$_POST['servicename'];
$price=$_POST['price'];
$category=$_POST['optradio'];
$status='active';
	if(empty($servicesId) || empty($servicename) || empty($price) || empty($category))
	{ echo "Please complete required fields"; }
	else if($price<=0)
		{
			echo '<script type="text/javascript">alert("Price cannot be negative")</script>';
		}else
{ mysql_query("update services set service_name='$servicename', price=$price, status='$status', category='$category' where service_id='$servicesId' and status='$status'"); }
echo '<script type="text/javascript">alert("Record has been updated.")</script>';
echo'</div>';
}
					
?>				
</body>
</html>
