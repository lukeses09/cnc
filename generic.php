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
      	$content = "SELECT max(generic_id) FROM generic";
      	$result = mysql_query($content) or die($content."<br/><br/>".mysql_error());
      	$row = mysql_fetch_array($result);
      	$id=$row['max(generic_id)']+1;

      	if($genericname != $generic_name)
      	{
      	if(isset($_POST['btnSave']))
      	{
      		$id=$id+1;
      	}
      	}	
?>
	<form action="generic.php" method="post" name="refresh">
	<div class="col-xs-5 form-align">
	<button class="btn-link glyphicon glyphicon-refresh" name="btnView" type="submit"/>
	</button>
	</div>
	</form>
	<form action="generic.php" method="post" name="button">
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
<form action="generic.php" method="post">
	
	<div class="col-xs-12">
		<div class="panel-body">
			<div class="container-fluid">
				<div class="col-xs-12">
					<div class="col-xs-4 text-right" >
						<label for="exampleInputEmail1">Generic Id <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
					</div>
					<div class="col-xs-4">
						<div class="form-group">
							<input type="text" class="form-control" id="genericId" name="genericId" placeholder="Generic Id"
							value="<?php echo "$id"?>" 
									readonly="readonly">
						</div>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="col-xs-4 text-right" >
						<label for="exampleInputEmail1">Generic Name <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
					</div>
					<div class="col-xs-4">
						<div class="form-group">
							<input type="text" class="form-control" id="genericname" name="genericname" 
							placeholder="Generic Name">
						</div>
					</div>
				</div>
				
				<div class="col-xs-8 text-right">
					<button class="btn btn-success" name="btnSave" type="submit">Save</button>
				</div>
			</div>
		</div>
		
 <div class=" col-xs-7 col-xs-offset-2">
			
<?php
	//include('speciesForm.php');
	if($connect=@mysql_connect("localhost","root")){
		echo"";
	} else {
		die(@mysql_error());
	}
	$connect=@mysql_select_db("vet1");


if(isset($_POST['btnView'])){

$content=@mysql_query("select * from generic where status='active'");
$total=@mysql_affected_rows();
echo "<br>";
echo "<br>";
echo'<div class="col-xs-12">            
  <table class="table">
    <thead>
      <tr>
        <th>Generic Name</th>
        <th></th>
      </tr>
      </thead>';

for($x=0;$x<=$total-1;$x++){
	$row=@mysql_fetch_array($content);
	$generic_name=$row['generic_name'];
	$generic_id=$row['generic_id'];
	echo'<tbody>
	      <tr class="success">';
	echo"<td>".$generic_name."</td>";
	        echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['generic_id']."';>
						<td><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
						</form></td>
						<td><a href='genericupdate.php?id=$generic_id'><button class='btn btn-info' type='button' name='btnUpdate''><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td>
						</form></a></td>";
	 }
	echo' </tr>
	    </tbody>
	    </div>';
	} 
else if (isset($_POST['btnSearch'])){
	$connect=@mysql_select_db("vet1");
	$generic_name = $_POST['search'];
	$content = @mysql_query("select * from generic where generic_name LIKE '%". $generic_name ."%' and status='active'");
	$total=@mysql_affected_rows();
echo "<br>";
echo "<br>";
echo'<div class="col-xs-12">            
  <table class="table">
    <thead>
      <tr>
        <th>Generic Name</th>
        <th></th>
      </tr>
      </thead>';

for($x=0;$x<=$total-1;$x++){
	$row=@mysql_fetch_array($content);
	$generic_id=$row['generic_id'];
	$generic_name=$row['generic_name'];
	echo'<tbody>
	      <tr class="success">';
	echo"<td>".$generic_name."</td>";
	        echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['generic_id']."';>
						<td><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
						</form></td>
						<td><a href='genericupdate.php?id=$generic_id'><button class='btn btn-info' type='button' name='btnUpdate''><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td>
						</form></a></td>";
			}
		} 


else {
	$connect=@mysql_select_db("vet1");
	$content=@mysql_query("select * from generic where status='active'");
	$total=@mysql_affected_rows();
	echo "<br>";
	echo "<br>";
	echo'<div class="col-xs-12">            
	<table class="table">
	<thead>
	<tr>
	<th>Generic Name</th>
	<th> </th>
	</tr>
	</thead>';

	for($x=0;$x<=$total-1;$x++){
	$row=@mysql_fetch_array($content);
	$generic_name=$row['generic_name'];
	$generic_id=$row['generic_id'];
	echo'<tbody>
	<tr class="success">';
	echo"<td>".$generic_name."</td>";
	echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['generic_id']."';>
						<td><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
						</form></td>
						<td><a href='genericupdate.php?id=$generic_id'><button class='btn btn-info' type='button' name='btnUpdate''><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td>
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
		mysql_query("update generic set status='$inactive' where generic_id='$id'"); 
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
$genericid=$_POST['genericId'];
$genericname=$_POST['genericname'];
$status='active';
$content = @mysql_query("select * from generic where generic_name LIKE '%". $genericname ."%' and status='active'");
while($row = @mysql_fetch_array($content))
			{
			    $a=1;
				$generic_name=$row['generic_name'];
			}
	if($genericname == $generic_name)
	{ echo '<script type="text/javascript">alert("Duplicate entry for generic name")</script>'; }
	else if(empty($genericname))
	{ echo '<script type="text/javascript">alert("Please complete required fields")</script>'; }
	else
	
	{ mysql_query("insert into generic values(".$genericid.",'".$genericname."','".$status."')");
echo '<script type="text/javascript">alert("Record has been added")</script>';
	}
}
		?>
</div>
</body>