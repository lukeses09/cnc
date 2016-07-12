<?php
   include('session.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/bootstrap.css" rel="stylesheet"></link>
<script src="js/jquery-2.2.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
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
<div class=" col-xs-12">
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
      	$content = "SELECT max(breed_id) FROM breed1";
      	$result = mysql_query($content) or die($content."<br/><br/>".mysql_error());
      	$row = mysql_fetch_array($result);
      	$id=$row['max(breed_id)']+1;

      	if(isset($_POST['btnSave']))
      	{
      		$id=$id+1;
      	}


				
?>
<form action="breed.php" method="post">
	<div class="col-xs-18">
		<button class="btn btn-success" name="btnSave" type="submit">Save</button>
	</div>
	<div class="col-xs-12">
		<div class="panel-body">
			<div class="container-fluid">
		<div class="col-xs-12">	
		     <div class="col-xs-4 text-right" >
					<label for="exampleInputEmail1">Species</label>
			</div>
		     <div class="col-xs-4">
				<div class="form-group">
				<form action="breedForm.php" method="post">
       				 <select name="species" class="form-control" >
       				 <?php echo get_options($selected); ?>						
      				 </select> 
        		</form>
     			 </div>
      		</div>
    	</div>
					<div class="container-fluid">
						<div class="col-xs-12">
							<div class="col-xs-4 text-right" >
								<label for="exampleInputEmail1">Breed Id</label>
							</div>
							<div class="col-xs-4">
								<div class="form-group">
									<input type="text" class="form-control" id="breedId" name="breedId" placeholder="Breed Id"value="<?php echo "$id"?>" 
									readonly="readonly">
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="col-xs-4 text-right" >
								<label for="exampleInputEmail1">Breed Name</label>
							</div>
							<div class="col-xs-4">
								<div class="form-group">
									<input type="text" class="form-control" id="breedname" name="breedname" 
									placeholder="Breed Name">
								</div>
							</div>
						</div>
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

		if(isset($_POST['btnSave']))
{
	
$breedId=$_POST['breedId'];
$breedname=$_POST['breedname'];
$status='active';


	if(empty($breedId) || empty($breedname))
	{ echo '<script type="text/javascript">alert("Please complete required fields")</script>'; }
	else
	{ 
	
mysql_query("insert into breed1 values(".$breedId.",".$selected.",'".$breedname."','".$status."')");
echo '<script type="text/javascript">alert("Record has been added")</script>';
		} }

		
	
} ?>
</form>
</body>
</html> 