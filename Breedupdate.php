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
	<form action="breed.php" method="post" name="refresh">
	<div class="col-xs-5 form-align">
	<button class="btn-link glyphicon glyphicon-refresh" name="btnView" type="submit"/>
	</button>
	<a href="breed.php" class="btn-link glyphicon glyphicon-plus-sign" role="button"></a>
	</div>
	</form>
	<form action="breed.php" method="post" name="button">
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
				<form action="Breedupdate.php" method="post">
						<div class="container-fluid">
							<div class="col-xs-12">	
           	 <div class="form-group">
		     <div class="col-xs-4 text-right" >
								<label for="exampleInputEmail1">Species</label>
			</div>
		     <div class="col-xs-4">
				<div class="form-group">
        <select name="species" class="form-control" value="<?php echo "$row[species_id]"?>">
      // <?php echo get_options($selected); ?>
									
        </select> 
      </div>
      </div>
    </div>
					<div class="container-fluid">
						<div class="col-xs-12">
							<div class="col-xs-4 text-right" >
								<label for="exampleInputEmail1">Breed Id</label>
							</div>
							<div class="col-xs-8">
								<div class="form-group">
									<input type="text" class="form-control" id="breedId" name="breedId" placeholder="Breed Id"
									value="<?php echo "$row[breed_id]"?>" readonly="readonly">
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="col-xs-4 text-right" >
								<label for="exampleInputEmail1">Breed Name</label>
							</div>
							<div class="col-xs-8">
								<div class="form-group">
									<input type="text" class="form-control" id="breedname" name="breedname" 
									placeholder="Breed Name" value="<?php echo "$row[breed_name]"?>">
								</div>
							</div>
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

 	$selected='';
 function get_options($select)
 {

 if($connect=@mysql_connect("localhost","root")){
echo"";
} else {
die(@mysql_error());
}
$connect=@mysql_select_db("vet1");
$total=@mysql_affected_rows();
$sql = "SELECT species_id,species_name from species where status='active'";
$result = mysql_query($sql) or die(mysql_error());

$array = array();

while($row = mysql_fetch_array($result)) 
{
	$speciesname=$row['species_name'];
	$speciesid=$row['species_id'];
    $species [$speciesname]= $speciesid;
}


$options='';

while (list($k,$v)=each($species)) 
{
	if($select==$v){
	$options.='<option value="'.$v.'" selected>'.$k.'</option>';}
	else
	{$options.='<option value="'.$v.'">'.$k.'</option>';}
}

return $options; }

 if(isset($_POST['species']))
 {
 	
 	$selected= $_POST['species'];




		if($connect=@mysql_connect("localhost","root")){
		echo"";
	} else {
		die(@mysql_error());
	}
	$connect=@mysql_select_db("vet1");

		if(isset($_POST['btnUpdate']))
{
	
$breedId=$_POST['breedId'];
$breedname=$_POST['breedname'];
$status='active';
if(empty($breedId) || empty($breedname))
	{ echo '<script type="text/javascript">alert("Please complete required fields")</script>';}
	else
{ mysql_query("update breed1  set breed_name='$breedname', species_id='$selected' where breed_id='$breedId' and status='$status'"); }
echo '<script type="text/javascript">alert("Record has been updated")</script>';
}

		} 
	
 ?>										
							
				
</body>
</html>
