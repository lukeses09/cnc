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
      	$content = "SELECT max(brand_id) FROM brand";
      	$result = mysql_query($content) or die($content."<br/><br/>".mysql_error());
      	$row = mysql_fetch_array($result);
      	$id=$row['max(brand_id)']+1;

      	if($brandname != $brand_name)
      	{
      	if(isset($_POST['btnSave']))
      	{
      		$id=$id+1;
      	}
      	}	
?>
	<form action="brand.php" method="post" name="refresh">
	<div class="col-xs-5 form-align">
	<button class="btn-link glyphicon glyphicon-refresh" name="btnView" type="submit"/>
	</button>
	</div>
	</form>
	<form action="brand.php" method="post" name="button">
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
<form action="brand.php" method="post">
	
	<div class="col-xs-12">
		<div class="panel-body">
			<div class="container-fluid">
				<div class="col-xs-12">
					<div class="col-xs-4 text-right" >
						<label for="exampleInputEmail1">Brand Id <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
					</div>
					<div class="col-xs-4">
						<div class="form-group">
							<input type="text" class="form-control" id="brandId" name="brandId" placeholder="Brand Id"
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
									<form action="breed.php" method="post">
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
				<div class="col-xs-12">
					<div class="col-xs-4 text-right" >
						<label for="exampleInputEmail1">Brand Name <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
					</div>
					<div class="col-xs-4">
						<div class="form-group">
							<input type="text" class="form-control" id="brandname" name="brandname" 
							placeholder="Brand Name">
						</div>
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

$content=@mysql_query("select brand.brand_name, brand.brand_id, brand.generic_id, generic.generic_name from brand join generic on brand.generic_id=generic.generic_id where brand.status='active'");
$total=@mysql_affected_rows();
echo "<br>";
echo "<br>";
echo'<div class="col-xs-12">            
  <table class="table">
    <thead>
      <tr>
        <th>Generic Name </th>
        <th>Brand Name</th>
        <th></th>
      </tr>
      </thead>';

for($x=0;$x<=$total-1;$x++){
	$row=@mysql_fetch_array($content);
	$brand_id=$row['brand_id'];
	$brand_name=$row['brand_name'];
	$generic_name=$row['generic_name'];
	echo'<tbody>
	      <tr class="success">';
	echo"<td>".$generic_name."</td>
		<td>".$brand_name."</td>";
	        echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['brand_id']."';>
						<td><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
						</form></td>
						<td><a href='Brandupdate.php?id=$brand_id'><button class='btn btn-info' type='button' name='btnUpdate''><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td>
						</form></a></td>";
	 }
	echo' </tr>
	    </tbody>
	    </div>';
	} 
else if (isset($_POST['btnSearch'])){
	$connect=@mysql_select_db("vet1");
	$brand_name = $_POST['search'];
	$content = @mysql_query("select * from brand where brand_name LIKE '%". $brand_name ."%' and status='active'");
	$total=@mysql_affected_rows();
echo "<br>";
echo "<br>";
echo'<div class="col-xs-12">            
  <table class="table">
    <thead>
      <tr>
        <th>Generic Name </th>
        <th>Brand Name</th>
        <th></th>
      </tr>
      </thead>';

for($x=0;$x<=$total-1;$x++){
	$row=@mysql_fetch_array($content);
	$brand_name=$row['brand_name'];
	$generic_name=$row['generic_name'];
	echo'<tbody>
	      <tr class="success">';
	echo"<td>".$generic_name."</td>
		<td>".$brand_name."</td>";
	        echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['brand_id']."';>
						<td><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
						</form></td>
						<td><a href='brandupdate.php?id=$brand_id'><button class='btn btn-info' name='btnUpdate''><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td>
						</form></a></td>";
			}
		} 


else {
	$content=@mysql_query("select brand.brand_name,brand.brand_id, brand.generic_id, generic.generic_name from brand join generic on brand.generic_id=generic.generic_id where brand.status='active'");
$total=@mysql_affected_rows();
echo "<br>";
echo "<br>";
echo'<div class="col-xs-12">            
  <table class="table">
    <thead>
      <tr>
        <th>Generic Name </th>
        <th>Brand Name</th>
        <th></th>
      </tr>
      </thead>';

for($x=0;$x<=$total-1;$x++){
	$row=@mysql_fetch_array($content);
	$brand_id=$row['brand_id'];
	$brand_name=$row['brand_name'];
	$generic_name=$row['generic_name'];
	echo'<tbody>
	      <tr class="success">';
	echo"<td>".$generic_name."</td>
		<td>".$brand_name."</td>";
	        echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['brand_id']."';>
						<td><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
						</form></td>
						<td><a href='brandupdate.php?id=$brand_id'><button class='btn btn-info' type='button' name='btnUpdate''><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td>
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
		mysql_query("update brand set status='$status' where brand_id='$id'"); 
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
$brandid=$_POST['brandId'];
$genericid=$_POST['generic'];
$brandname=$_POST['brandname'];
$status='active';
$content = @mysql_query("select * from brand where brand_name LIKE '%". $brandname ."%' and status='active'");
while($row = @mysql_fetch_array($content))
			{
			    $a=1;
				$brand_name=$row['brand_name'];
			}
	if($brandname == $brand_name)
	{ echo '<script type="text/javascript">alert("Duplicate entry for brand name")</script>'; }
	else if(empty($brandname))
	{ echo '<script type="text/javascript">alert("Please complete required fields")</script>'; }
	else
	
	{ mysql_query("insert into brand values(".$brandid.",".$genericid.",'".$brandname."','".$status."')");
echo '<script type="text/javascript">alert("Record has been added")</script>';
	}
}
		?>
</div>
</body>