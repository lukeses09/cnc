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
<form action="medicines.php" method="post" name="refresh">
	<div class="col-xs-5 form-align">
	<button class="btn-link glyphicon glyphicon-refresh" name="btnView" type="submit"/></button>
	<a href="medicinesForm.php" class="btn-link glyphicon glyphicon-plus-sign" role="button"></a>
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
      	$content = "SELECT * FROM medicines where medicine_id='$id'";
      	$result = mysql_query($content) or die($content."<br/><br/>".mysql_error());
      	$row = mysql_fetch_array($result);

				
?>
</div>

<div class=" col-xs-9">
		<div class="panel panel-default">
				<div class="panel-heading">
				</div>
				<div class="panel-body">
				<form action="Medicinesupdate.php" method="post">
						<div class="container-fluid">
						<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Medicine Id</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="medicineId" name="medicineId" placeholder="Medicine Id"
										value="<?php echo "$row[medicine_id]"?>" readonly="readonly">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Medicine Name</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="medicinename" name="medicinename" 
										placeholder="Medicine Name" value="<?php echo "$row[medicine_name]"?>">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Category</label>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<input type="text" class="form-control" id="category" name="category" 
										placeholder="Category" value="<?php echo "$row[category]"?>">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Price</label>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<input type="text" class="form-control" id="price" name="price" 
										placeholder="Price" value="<?php echo "$row[price]"?>">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Description</label>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<input type="text" class="form-control" id="description" name="description" 
										placeholder="Description" value="<?php echo "$row[description]"?>">
									</div>
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
$medicineid=$_POST['medicineId'];
$medicinename=$_POST['medicinename'];
$price=$_POST['price'];
$category=$_POST['category'];
$description=$_POST['description'];
$status='active';
	if(empty($medicineid) || empty($medicinename) || empty($price) || empty($category) || empty($description))
	{ echo '<script type="text/javascript">alert("Please complete required fields.")</script>'; }
	else
{ mysql_query("update medicines set medicine_name='$medicinename', price=$price, category='$category', description='$description' where medicine_id='$medicineid' and status='$status'"); }
echo '<script type="text/javascript">alert("Record has been updated.")</script>';
echo'</div>';
}
						
?>				
</body>
</html>
