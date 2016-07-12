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
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}

</script>
</head>

<body>
<?php include('sample.php');

?>
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
      	$content = "SELECT max(unit_id) FROM units";
      	$result = mysql_query($content) or die($content."<br/><br/>".mysql_error());
      	$row = mysql_fetch_array($result);
      	$id=$row['max(unit_id)']+1;

      	if($unitname != $unit_name)
      	if(isset($_POST['btnSave']))
      	{
      		$id=$id+1;
      	}

				
?>
	<form action="units.php" method="post" name="refresh">
	<div class="col-xs-5 form-align">
	<button class="btn-link glyphicon glyphicon-refresh" name="btnView" type="submit"/>
	</button>
	</div>
	</form>
	<form action="units.php" method="post" name="button">
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
<form action="units.php" method="post">
	
	<div class="col-xs-12">
		<div class="panel-body">
			<div class="container-fluid">
				<div class="col-xs-12">
					<div class="col-xs-4 text-right" >
						<label for="exampleInputEmail1">Unit Id <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
					</div>
					<div class="col-xs-4">
						<div class="form-group">
							<input type="text" class="form-control" id="unitId" name="unitId" placeholder="Unit Id"
							value="<?php echo "$id"?>" 
									readonly="readonly">
						</div>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="col-xs-4 text-right" >
						<label for="exampleInputEmail1">Unit Name <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
					</div>
					<div class="col-xs-4">
						<div class="form-group">
							<input type="text" class="form-control" id="unitname" name="unitname" 
							placeholder="Unit Name">
						</div>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="col-xs-4 text-right" >
						<label for="exampleInputEmail1">Abbreviation <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
					</div>
					<div class="col-xs-4">
						<div class="form-group">
							<input type="text" class="form-control" id="abbr" name="abbr" 
							placeholder="Abbreviation">
						</div>
					</div>
				</div>
				<div class="col-xs-12">
							 <div class="col-xs-4 text-right" >
								<label for="exampleInputEmail1">Unit Type <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
							</div>
							  	<div class="col-xs-4">
									<div class="form-group">
					       					 <select id="unit_type" name="unit_type" class="form-control">
					       				 		<option value="Length">Length </option>
					       				 		<option value="Mass">Mass </option>	
					       				 		<option value="Time">Time </option>					
					      					 </select> 
					     			 </div>
					      		</div>
					     </div>
				<div class="col-xs-8 text-right">
					<button class="btn btn-success" name="btnSave" type="submit">Save</button>
				</div>
			</div>
		</div>
<div class=" col-xs-8 col-xs-offset-2">
			
<?php
	//include('speciesForm.php');
	if($connect=@mysql_connect("localhost","root")){
		echo"";
	} else {
		die(@mysql_error());
	}
	$connect=@mysql_select_db("vet1");


if(isset($_POST['btnView'])){

$content=@mysql_query("select * from units where status='active'");
$total=@mysql_affected_rows();
echo "<br>";
echo "<br>";
echo'<div class="col-xs-12">            
  <table class="table">
    <thead>
      <tr>
        <th>Unit Name</th>
        <th> Abbreviation </th>
        <th>Unit Type</th>
      </tr>
      </thead>';

for($x=0;$x<=$total-1;$x++){
	$row=@mysql_fetch_array($content);
	$unit_id=$row['unit_id'];
	$unit_name=$row['unit_name'];
	$unit_type=$row['unit_type'];
	$abbr=$row['abbr'];
	echo'<tbody>
	      <tr class="success">';
	echo"  
	        <td>".$unit_name."</td>
	        <td>".$abbr."</td>
	        <td>".$unit_type."</td>";
	        echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['unit_id']."';>
						<td><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
						</form></td>
						<td><a href='Unitsupdate.php?id=$unit_id'><button class='btn btn-info' type='button' name='btnUpdate''><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td>
						</form></a></td>";
	 }
	echo' </tr>
	    </tbody>
	    </div>';
	} 
else if (isset($_POST['btnSearch'])){
	$connect=@mysql_select_db("vet1");
	$unit_id = $_POST['search'];
	$content = @mysql_query("select * from units where unit_name LIKE '%". $unit_id ."%' or unit_type LIKE '%". $unit_id ."%' and status='active'");
	$total=@mysql_affected_rows();
if(empty($unit_id))
	{ echo '<script type="text/javascript">alert("Please input something.")</script>'; }
else
{
echo "<br>";
echo "<br>";
echo'<div class="col-xs-12">            
  <table class="table">
    <thead>
      <tr>
        <th>Unit Name</th>
        <th> Abbreviation </th>
        <th>Unit Type</th>
      </tr>
      </thead>';

for($x=0;$x<=$total-1;$x++){
	$row=@mysql_fetch_array($content);
	$unit_id=$row['unit_id'];
	$unit_name=$row['unit_name'];
	$unit_type=$row['unit_type'];
	$abbr=$row['abbr'];
	echo'<tbody>
	      <tr class="success">';
	echo"  
	        <td>".$unit_name."</td>
	        <td>".$abbr."</td>
	        <td>".$unit_type."</td>";
	        echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['unit_id']."';>
						<td><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
						</form></td>
						<td><a href='Unitsupdate.php?id=$unit_id'><button class='btn btn-info' type='button' name='btnUpdate''><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td>
						</form></a></td>";
			}
		} 
}

else {
$content=@mysql_query("select * from units where status='active'");
$total=@mysql_affected_rows();
echo "<br>";
echo "<br>";
echo'<div class="col-xs-12">            
  <table class="table">
    <thead>
      <tr>
        <th>Unit Name</th>
        <th> Abbreviation</th>
        <th>Unit Type</th>
      </tr>
      </thead>';

for($x=0;$x<=$total-1;$x++){
	$row=@mysql_fetch_array($content);
	$unit_id=$row['unit_id'];
	$unit_name=$row['unit_name'];
	$unit_type=$row['unit_type'];
	$abbr=$row['abbr'];
	echo'<tbody>
	      <tr class="success">';
	echo"  
	        <td>".$unit_name."</td>
	        <td>".$abbr."</td>
	        <td>".$unit_type."</td>";
	        echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['unit_id']."';>
						<td><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
						</form></td>
						<td><a href='Unitsupdate.php?id=$unit_id'><button class='btn btn-info'  type='button'name='btnUpdate''><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td>
						</form></a></td>";
				 				}
	echo' </tr>
	</tbody>
	</div>';
		}

		if($_SERVER['REQUEST_METHOD'] == "POST")
    {
    if(isset($_POST['id']))
    {
    	if(isset($_POST['btnDelete'])){
    $id = mysql_real_escape_string($_POST['id']);
    $status='inactive';
		mysql_query("update units set status='$status' where unit_id='$id'"); 
		echo '<script type="text/javascript">alert("Record has been deleted")</script>'; 
    }
    }
    }

	


?>
<?php
		if($connect=@mysql_connect("localhost","root")){
		echo"";
	} else {
		die(@mysql_error());
	}
	$connect=@mysql_select_db("vet1");


			if(isset($_POST['btnSave']))
{

$unit_id=$_POST['unitId'];
$unit_name=$_POST['unitname'];
$unit_type=$_POST['unit_type'];
$abbr=$_POST['abbr'];
$status='active';

$content = @mysql_query("select * from units where unit_type LIKE '%". $unit_type ."%' or $unit_name LIKE '%". $unit_name ."%' and status='active'");
while($row = @mysql_fetch_array($content))
			{
			    $a=1;
			   	$unitname=$row['unit_name'];
			   	$abbr=$row['abbr'];
				$unitType=$row['unit_type'];
			}
	if(($unitname == $unit_name))
	{ echo '<script type="text/javascript">alert("Duplicate entry for unit name. ")</script>'; }
	else if(empty($unit_name))
	{ echo '<script type="text/javascript">alert("Please complete required fields")</script>'; }
	else
	
	{ mysql_query("insert into units values(".$unit_id.",'".$unit_name."','".$abbr."','".$unit_type."','".$status."')");
echo '<script type="text/javascript">alert("Record has been added")</script>';
	}
}
		?>
</div>
</body>