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

<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
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
      	$content = "SELECT * FROM brand where brand_id='$id'";
      	$result = mysql_query($content) or die($content."<br/><br/>".mysql_error());
      	$row = mysql_fetch_array($result);

				
?>
</div>
<form action="brand.php" method="post" name="refresh">
	<div class="col-xs-5 form-align">
	<button class="btn-link glyphicon glyphicon-refresh" name="btnView" type="submit"/>
	</button>
	<a href="brand.php" class="btn-link glyphicon glyphicon-plus-sign" role="button"></a>
	</div>
	</form>
	<form action="brandupdate.php" method="post" name="button">
		<div class="col-xs-2 pull-right">
			<div class="input-group">
				<input type="text" class="form-control" id="search" name="search" placeholder="Search">
				<span class="input-group-btn">
					<button class="btn btn-success glyphicon glyphicon-search btn-align" name="btnSearch" type="submit"/>
				</span>
			</div>
		</div>
	</form>	
	</div>
<div class=" col-xs-9">
<div class=" col-xs-9 ">
		<div class="panel panel-default">
				<div class="panel-heading">
				</div>
				<div class="panel-body">
				<form action="unitsupdate.php" method="post">
						<div class="container-fluid">
							<div class="col-xs-12">
					<div class="col-xs-4 text-right" >
						<label for="exampleInputEmail1">Brand Id</label>
					</div>
					<div class="col-xs-8">
						<div class="form-group">
							<input type="text" class="form-control" id="brandId" name="brandId" placeholder="Brand Id"
							value="<?php echo "$row[brand_id]"?>" readonly="true">
						</div>
					</div>
				</div>
				<div class="col-xs-12">
					 <div class="col-xs-4 text-right" >
						<label for="exampleInputEmail1">Generic Name</label>
					</div>
					  	<div class="col-xs-8">
						<div class="form-group">
							<form action="brand.php" method="post">
			       				 <?php
				       			echo "<select name='generic' class='form-control' >";
								$query = "SELECT generic_id, generic_name FROM generic where status='active'";
			  					$result = mysql_query ($query);
			  					
				        					
			  					while($r = mysql_fetch_array($result)) {
			   					 echo "<option value=".$r['generic_id'].">".$r['generic_name']."</option>"; 
			  						}
			  						echo"</select>";
			  						
			  					?>					
			   
			        		</form>
			     		 </div>
			     		 </div>
				</div>
				<div class="col-xs-12">
					<div class="col-xs-4 text-right" >
						<label for="exampleInputEmail1">Brand Name</label>
					</div>
					<div class="col-xs-8">
						<div class="form-group">
							<input type="text" class="form-control" id="brandname" name="brandname" 
							placeholder="Brand Name" value="<?php echo "$row[brand_name]"?>">
						</div>
					</div>
				</div>
							<div class="col-xs-18">
								<button class="btn btn-success" name="btnUpdate" type="submit">Update</button>
								<button class="btn btn-warning" name="btnDelete" type="submit" onclick="return checkDelete()">Delete
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>

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
$unitsId=$_POST['unitsId'];
$unitsname=$_POST['unitsname'];
$abbreviation=$_POST['abbreviation'];
$unittype=$_POST['unit_type'];
$status='active';
		if(empty($unitsname) || empty($abbreviation) || empty($unittype))
	{ echo '<script type="text/javascript">alert("Please complete required fields")</script>'; }
	else
{ mysql_query("update units set unit_name='$unitsname', abbr='$abbreviation', unit_type='$unittype' where unit_id='$unitsId' and status='$status'"); }
echo '<script type="text/javascript">alert("Record has been updated")</script>';
echo'</div>';
}
else if(isset($_POST['btnDelete']))
{
$unitsId=$_POST['unitsId'];
$unitsname=$_POST['unitsname'];
$abbreviation=$_POST['abbreviation'];
$unittype=$_POST['unit_type'];
$status='inactive';
	if(empty($unitsname) || empty($abbreviation) || empty($unittype))
	{ echo '<script type="text/javascript">alert("Please complete required fields")</script>'; }
	else
	{ mysql_query("update units set unit_name='$unitsname', abbr='$abbreviation', unit_type='$unittype', status='$status' where unit_id='$unitsId'");  
	echo '<script type="text/javascript">alert("Record has been deleted")</script>'; }
	
}
?>
												
							
				
</body>
</html>

	