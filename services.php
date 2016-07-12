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
	<form action="services.php" method="post" name="refresh">
	<div class="col-xs-5 form-align">
	<button class="btn-link glyphicon glyphicon-refresh" name="btnView" type="submit"/>
	</button>
	</div>
	</form>
	<form action="services.php" method="post" name="button">
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
      	$content = "SELECT max(service_id) FROM services";
      	$result = mysql_query($content) or die($content."<br/><br/>".mysql_error());
      	$row = mysql_fetch_array($result);
      	$id=$row['max(service_id)']+1;

      	if(isset($_POST['btnSave']))
      	{
      		$id=$id+1;
      	}

				
?>
<div class=" col-xs-9">
<form action="services.php" method="post">
	
	<div class="col-xs-12">
		<div class="panel-body">
			<div class="container-fluid">
				<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Service Id <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<input type="text" class="form-control" id="servicesId" name="servicesId" placeholder="Service Id"
										value="<?php echo "$id"?>" 
									readonly="readonly">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Service Name <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<input type="text" class="form-control" id="servicename" name="servicename" 
										placeholder="Service Name">
									</div>
								</div>
							</div>
				<div class="col-xs-12">
					<div class="col-xs-4 text-right" >
						<label for="exampleInputEmail1">Category <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
					</div>
					<div class="col-xs-4">
						<label class="radio-inline"><input type="radio" name="optradio" value="Vet">Vet</label>
						<label class="radio-inline"><input type="radio" name="optradio" value="Grooming">Grooming</label>
						<label class="radio-inline"><input type="radio" name="optradio" value="Exam">Lab Exam</label>
					</div>
				</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Price <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<input type="text" class="form-control" id="price" name="price" placeholder="Price">
									</div>
								</div>
							</div>
							<div class="col-xs-8 text-right">
								<button class="btn btn-success" name="btnSave" type="submit">Save</button>
							</div>

		</div>
		</div>
		<?php

		if($connect=@mysql_connect("localhost","root")){
		echo"";
	} else {
		die(@mysql_error());
	}
	$connect=@mysql_select_db("vet1");

		if(isset($_POST['btnSave']))
{
$servicesId=$_POST['servicesId'];
$servicename=$_POST['servicename'];
$price=$_POST['price'];
$category=$_POST['optradio'];
$status='active';
	if(empty($servicesId) || empty($servicename) || empty($price))
	{ echo "Please complete required fields"; }
	else if($price<=0)
		echo '<script type="text/javascript">alert("Price cannot be negative!")</script>';
	else
	{ mysql_query("insert into services values(".$servicesId.",'".$servicename."','".$category."',".$price.",'".$status."')");
echo '<script type="text/javascript">alert("Record has been added.")</script>';
	}
} ?>
</form>
</body>
</html> 

<div class=" col-xs-9 col-xs-offset-2">
<?php
	if($connect=@mysql_connect("localhost","root")){
		echo"";
	} else {
		die(@mysql_error());
	}

	if(isset($_POST['btnView'])){
	$connect=@mysql_select_db("vet1");
	$content=@mysql_query("select * from services where status='active'");
	$total=@mysql_affected_rows();
	echo "<br>";
	echo "<br>";
	echo'<div class="col-xs-12">            
	  <table class="table">
	    <thead>
	      <tr>
	        
	        <th>Service Name</th>
	        <th>Category</th>
	        <th>Price</th>
	        <th></th>
	      </tr>
	      </thead>';


for($x=0;$x<=$total-1;$x++)
{
$row=@mysql_fetch_array($content);
$service_id=$row['service_id'];
$sername=$row['service_name'];
$category=$row['category'];
$price=$row['price'];
echo'<tbody>
				      <tr class="success">';
				echo" 
				      <td>".$sername."</td>
				      <td>".$category."</td>
				      <td>".$price."</td>";
				    echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['service_id']."';>
						<td><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
						<td><a href='Serviceupdate.php?id=$service_id'></a><button class='btn btn-info' type='button' name='btnUpdate'><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td>
						</form></td>";
				      }
echo'</table>';
echo'</div>';
	
	} else if(isset($_POST['btnSearch'])){
		$search = $_POST['search'];
		$content = @mysql_query("select * from services where service_id like '%".$search."%' or service_name like '%".$search."%' or price like '%".$search."%' or category like '%".$search."%'  and status='active'");
		$total = @mysql_affected_rows();
		echo "<br>";
	echo "<br>";
	echo'<div class="col-xs-12">            
	  <table class="table">
	    <thead>
	      <tr>
	        <th>Service Name</th>
	        <th>Category</th>
	        <th>Price</th>
	      </tr>
	      </thead>';


		 if(empty($search)){ 
		 	echo "Please input ID number first."; 
		 } else {
			$a=0;
			while($row = @mysql_fetch_array($content)){
				$service_id=$row['service_id'];
				$sername=$row['service_name'];
				$category=$row['category'];
				$price=$row['price'];


		echo'<tbody>
		      <tr class="success">';
		echo" 
		      <td>".$sername."</td>
		      <td>".$category."</td>
		      <td>".$price."</td>";
		      echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['service_id']."';>
						<td><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
						<td><a href='Serviceupdate.php?id=$service_id'></a><button class='btn btn-info' type='button' name='btnUpdate'><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td>
						</form></td>";
		 }
		echo' </tr>
		    </tbody>
		    </div>';	
		  }

		} 

		else {
$connect=@mysql_select_db("vet1");
	$content=@mysql_query("select * from services where status='active'");
	$total=@mysql_affected_rows();
	echo "<br>";
	echo "<br>";
	echo'<div class="col-xs-12">            
	  <table class="table">
	    <thead>
	      <tr>
	        
	        <th>Service Name</th>
	        <th>Category</th>
	        <th>Price</th>
	        <th> </th>
	      </tr>
	      </thead>';

for($x=0;$x<=$total-1;$x++)
{
$row=@mysql_fetch_array($content);
$service_id=$row['service_id'];
$sername=$row['service_name'];
$category=$row['category'];
$price=$row['price'];
echo'<tbody>
				      <tr class="success">';
				echo" 
				      <td>".$sername."</td>
				      <td>".$category."</td>
				      <td>".$price."</td>";
				    echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['service_id']."';>
						<td><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
						<td><a href='Serviceupdate.php?id=$service_id'></a><button class='btn btn-info' type='button' name='btnUpdate'><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td>
						</form></td>";
				      }
echo'</table>';
echo'</div>';	}


if($_SERVER['REQUEST_METHOD'] == "POST")
    {
    if(isset($_POST['id']))
    {
    	if(isset($_POST['btnDelete'])){
    $id = mysql_real_escape_string($_POST['id']);
    $status='inactive';
		mysql_query("update services set status='$status' where service_id='$id'"); 
		echo '<script type="text/javascript">alert("Record has been deleted")</script>'; 
    }
    }
    }



?>
</div>
</body>
