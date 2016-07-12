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
      	$content = "SELECT max(dosageform_id) FROM dosage_form";
      	$result = mysql_query($content) or die($content."<br/><br/>".mysql_error());
      	$row = mysql_fetch_array($result);
      	$id=$row['max(dosageform_id)']+1;

      	if($dfname != $df_name)
      	{
      	if(isset($_POST['btnSave']))
      	{
      		$id=$id+1;
      	} }


				
?>
	<form action="dosageform.php" method="post" name="refresh">
	<div class="col-xs-5 form-align">
	<button class="btn-link glyphicon glyphicon-refresh" name="btnView" type="submit"/>
	</button>
	
	</div>
	</form>
	<form action="dosageform.php" method="post" name="button">
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
	<form action="dosageform.php" method="post">
	
	<div class="col-xs-9">
		<div class="panel-body">
			<div class="container-fluid">
		<div class="col-xs-12">	
		     <div class="col-xs-4 text-right" >
				<label for="exampleInputEmail1">Dosage Form Id <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
					</div>
					<div class="col-xs-4">
						<div class="form-group">
							<input type="text" class="form-control" id="dosageFormId" name="dosageFormId" placeholder="Dosage Form Id"
							value="<?php echo "$id"?>" 
						readonly="readonly">
						</div>
					</div>
				</div>
			</div>
				<div class="col-xs-12">
					<div class="col-xs-4 text-right" >
						<label for="exampleInputEmail1">Dosage Form Name <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
					</div>
					<div class="col-xs-4">
						<div class="form-group">
							<input type="text" class="form-control" id="dosageformname" name="dosageformname" 
							placeholder="Dosage Form Name">
						</div>
					</div>
				</div>
				<div class="col-xs-8 text-right">
					<button class="btn btn-success" name="btnSave" type="submit">Save</button>
				</div>
			</div>
		</div>
		</div>
<div class=" col-xs-6">			
<?php
	if($connect=@mysql_connect("localhost","root")){
		echo"";
	} else {
		die(@mysql_error());
	}
	$connect=@mysql_select_db("vet1");

	if(isset($_POST['btnView'])){
	
	$content=@mysql_query("select dosageform_id, dosageform_name from dosage_form where status='active'");
	$total=@mysql_affected_rows();
	echo "<br>";
	echo "<br>";
	echo'<div class="col-xs-12 col-xs-offset-2">            
	  <table class="table">
	    <thead>
	      <tr>
	        <th>Dosage Form Name</th>
	      </tr>
	      </thead>';

	for($x=0;$x<=$total-1;$x++){
		$row=@mysql_fetch_array($content);
		$df_id=$row['dosageform_id'];
		$df_name=$row['dosageform_name'];


		echo'<tbody>
		      <tr class="success">';
		echo" <td>".$df_name."</td>";
		      echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['dosageform_id']."';>
						<td style='width:10%'><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
						</form></td>
						<td style='width:10%'><a href='dosageupdate.php?id=$df_id'><button class='btn btn-info' name='btnUpdate' type='button'><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td>
						</form></a></td>";
		 }
		echo' </tr>
		    </tbody>
		    </div>';
	
	
	} else if (isset($_POST['btnSearch'])){
		$connect=@mysql_select_db("vet1");
		$search = $_POST['search'];
		$content=@mysql_query("select * from dosage_form where dosageform_name like '%".$search."%' and status='active'");
		$total=@mysql_affected_rows();
	echo "<br>";
	echo "<br>";
	echo'<div class="col-xs-12 col-xs-offset-2">            
	  <table class="table">
	    <thead>
	      <tr>
	        <th>Dosage Form Name</th>
	      </tr>
	      </thead>';

	for($x=0;$x<=$total-1;$x++){
		$row=@mysql_fetch_array($content);
		$df_id=$row['dosageform_id'];
		$df_name=$row['dosageform_name'];


		echo'<tbody>
		      <tr class="success">';
		echo" <td>".$df_name."</td>";
		      echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['dosageform_id']."';>
						<td style='width:10%'><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
						</form></td>
						<td style='width:10%'><a href='dosageformpdate.php?id=$df_id'><button class='btn btn-info' name='btnUpdate' type='button'><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td>
						</form></a></td>";
			}
		} 

	
		
		else {
		$content=@mysql_query("select dosageform_id, dosageform_name from dosage_form where status='active'");
	$total=@mysql_affected_rows();
	echo "<br>";
	echo "<br>";
	echo'<div class="col-xs-12 col-xs-offset-2">            
	  <table class="table">
	    <thead>
	      <tr>
	        <th>Dosage Form Name</th>
	      </tr>
	      </thead>';

	for($x=0;$x<=$total-1;$x++){
		$row=@mysql_fetch_array($content);
		$df_id=$row['dosageform_id'];
		$df_name=$row['dosageform_name'];


		echo'<tbody>
		      <tr class="success">';
		echo" <td>".$df_name."</td>";
		      echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['dosageform_id']."';>
						<td style='width:10%'><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
						</form></td>
						<td style='width:10%'><a href='dosageupdate.php?id=$df_id'><button class='btn btn-info' name='btnUpdate' type='button'><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td>
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
		mysql_query("update dosage_form set status='$status' where dosageform_id='$id'"); 
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

$dfId=$_POST['dosageFormId'];
$dfname=$_POST['dosageformname'];
$status='active';
$content = @mysql_query("select * from dosage_form where dosageform_name LIKE '%". $dfname ."%' and status='active'");
			while($row = @mysql_fetch_array($content))
			{
			    $a=1;
				$df_name=$row['dosageform_name'];
			}
	if($dfname == $df_name)
	{ echo '<script type="text/javascript">alert("Duplicate entry for dosage form name.")</script>'; }
	else if(empty($dfId) || empty($dfname))
	{ echo '<script type="text/javascript">alert("Please complete required fields")</script>'; }
	else
	{ 
	
mysql_query("insert into dosage_form values(".$dfId.",'".$dfname."','".$status."')");
echo '<script type="text/javascript">alert("Record has been added")</script>';
		} 
		
	
} ?>
</div>
</body>
</div>
