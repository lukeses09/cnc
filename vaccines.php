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
	<form action="vaccines.php" method="post" name="refresh">
	<div class="col-xs-5 form-align">
	<button class="btn-link glyphicon glyphicon-refresh" name="btnView" type="submit"/>
	</button>
	</div>
	</form>
	<form action="vaccines.php" method="post" name="button">
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
<div class=" col-xs-9 ">
			
<?php
	include('vaccinesForm.php');
	if($connect=@mysql_connect("localhost","root")){
		echo"";
	} else {
		die(@mysql_error());
	}

	$connect=@mysql_select_db("vet1");

	if(isset($_POST['btnView'])){
	$content=@mysql_query("select vaccine_id, vaccine_name, size, price from vaccines where status='active'");
$total=@mysql_affected_rows();
	echo "<br>";
echo "<br>";
	echo'<div class="col-xs-12">            
	  <table class="table">
	    <thead>
	      <tr>
	        <th>Vaccine ID</th>
	        <th>Vaccine Name</th>
	        <th>Size</th>
	        <th>Price</th>
	      </tr>
	      </thead>';

for($x=0;$x<=$total-1;$x++)
{
$row=@mysql_fetch_array($content);
$vaccineid=$row['vaccine_id'];
$vaccinename=$row['vaccine_name'];
$size=$row['size'];
$price=$row['price'];

		echo'<tbody>
		      <tr class="success">';
		echo" <td>".$vaccineid."</td>
		        <td>".$vaccinename."</td>
		        <td>".$size."</td>
		        <td>".$price."</td>";
		        echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['vaccine_id']."';>
						<td><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
						<td><a href='Vaccinesupdate.php?id=$vaccineid'><button class='btn btn-info' name='btnUpdate' type='submit'><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td>
						</a></form></td>";
		 }
		echo' </tr>
		    </tbody>
		    </div>';	
	
	
	} else if (isset($_POST['btnSearch'])){
		$search = $_POST['search'];
		$content = @mysql_query("select * from vaccines where vaccine_name like '%".$search."%' or vaccine_id like '%".$search."%' or size like '%".$search."%' or price like '%".$search."%' and status='active'");
		$total = @mysql_affected_rows();
		echo "<br>";
		echo "<br>";
		echo'<div class="col-xs-12">            
	  	<table class="table">
	    <thead>
	      <tr>
	        <th>Vaccine ID</th>
	        <th>Vaccine Name</th>
	        <th>Size</th>
	        <th>Price</th>
	      </tr>
	      </thead>';


		 if(empty($search)){ 
		 	echo "Please input ID number first."; 
		 } else {
			$a=0;
			while($row = @mysql_fetch_array($content)){
			    $a=1;
			   	$vaccineid=$row['vaccine_id'];
				$vaccinename=$row['vaccine_name'];
				$size=$row['size'];
				$price=$row['price'];

				echo'<tbody>
		     	 <tr class="success">';
				echo" <td><a href='Vaccinesupdate.php?id=$vaccineid'>$vaccineid</a></td>
		        <td>".$vaccinename."</td>
		        <td>".$size."</td>
		        <td>".$price."</td>
		        ";
			 }
		echo' </tr>
		    </tbody>
		    </div>';
			}
		}

		else {
			$content=@mysql_query("select vaccine_id, vaccine_name, size, price from vaccines where status='active'");
			$total=@mysql_affected_rows();
			echo "<br>";
				echo "<br>";
				echo'<div class="col-xs-12">            
				  <table class="table">
				    <thead>
				      <tr>
				        <th>Vaccine ID</th>
				        <th>Vaccine Name</th>
				        <th>Size</th>
				        <th>Price</th>
				      </tr>
				      </thead>';

			for($x=0;$x<=$total-1;$x++)
{
$row=@mysql_fetch_array($content);
$vaccineid=$row['vaccine_id'];
$vaccinename=$row['vaccine_name'];
$size=$row['size'];
$price=$row['price'];

		echo'<tbody>
		      <tr class="success">';
		echo" <td>".$vaccineid."</td>
		        <td>".$vaccinename."</td>
		        <td>".$size."</td>
		        <td>".$price."</td>";
		        echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['vaccine_id']."';>
						<td><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
						<td><a href='Vaccinesupdate.php?id=$vaccineid'><button class='btn btn-info' name='btnUpdate' type='submit'><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td>
						</a></form></td>";
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
		mysql_query("update vaccines set status='$status' where vaccine_id='$id'"); 
		echo '<script type="text/javascript">alert("Record has been deleted")</script>'; 
    }
    }
    }
?>
</div>
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="css/bootstrap.css" rel="stylesheet"></link>
<script src="js/jquery-2.2.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>

<body>
<nav class="navbar navbar-primary">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">ChatsN'Chiens</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="Maintenance.php">Maintenance<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="customer.php">Customer</a></li>
		  <li><a href="species.php">Species</a></li>
		  <li><a href="breed.php">Breed</a></li>
          <li><a href="patient.php">Patient</a></li>
          <li><a href="products.php">Products</a></li>
		  <li  class="active"><a href="vaccines.php">Vaccines</a></li>
		  <li><a href="medicines.php">Medicines</a></li>
		  <li><a href="services.php">Services</a></li>
		  <li><a href="cage.php">Cage</a></li>
        </ul>
      </li>
      <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="">Transaction<span class="caret"></span></a>
      <ul class="dropdown-menu">
          <li><a href="appointment.php">Appointment</a></li>
          <li><a href="otherServices.php">Services</a></li>
          <li><a href="treatment.php">Treatment</a></li>
          <li><a href="order.php">Order</a></li>
          <li><a href="payment.php">Payment</a></li>
       </ul>
      </li>
       <li><a href="#">Records</a></li>
    </ul>
  </div>
</nav>

<div class=" col-xs-6 col-xs-offset-3">
		<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Vaccines</h3>
				</div>
				<div class="panel-body">
				<form action="vaccines.php" method="post">
						<div class="container-fluid">
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Vaccine Id</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="vaccineId" name="vaccineId" placeholder="Vaccine Id">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Vaccine Name</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="vaccinename" name="vaccinename" 
										placeholder="Vaccine Name">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Weight</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="weight" name="weight" 
										placeholder="Weight">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Price</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="price" name="price" 
										placeholder="Price">
									</div>
								</div>
							</div>
							<div class="col-xs-18">
								<button class="btn btn-success" name="btnSave" type="submit">Save</button>
								<button class="btn btn-success" name="btnUpdate" type="submit">Update</button>
								<button class="btn btn-success" name="btnDelete" type="submit">Delete</button>
								<button class="btn btn-success" name="btnView" type="submit">View</button>
								<button class="btn btn-success" name="btnSearch" type="submit">Search</button>
							</div>
							<br>
							<br>
							<?php
if($connect=@mysql_connect("localhost","root"))
	echo"";
else
	die(@mysql_error());
$connect=@mysql_select_db("vet1");

if(isset($_POST['btnSave']))
{
$vaccineid=$_POST['vaccineId'];
$vaccinename=$_POST['vaccinename'];
$status='active';
	if(empty($vaccineid) || empty($vaccinename))
	{ echo "Please complete required fields"; }
	else
	
	{ mysql_query("insert into vaccines values(".$vaccineid.",'".$vaccinename."','".$status."')");
echo"<br> Record has been added";
	}
}
else if(isset($_POST['btnUpdate']))
{
$vaccineid=$_POST['vaccineId'];
$vaccinename=$_POST['vaccinename'];
$status='active';
	if(empty($vaccineid) || empty($vaccinename))
	{ echo "Please complete required fields"; }
	else
{ mysql_query("update vaccines set vaccine_name='$vaccinename' where vaccine_id='$vaccineid' and status='$status'"); }
echo"Record has been updated";
echo'</div>';
}
else if(isset($_POST['btnDelete']))
{
	$vaccineid=$_POST['vaccineId'];
$vaccinename=$_POST['vaccinename'];
$status='inactive';
	if(empty($vaccineid))
	{ echo "Please complete required fields"; }
	else
{	mysql_query("update vaccines  set vaccine_name='$vaccinename', status='$status' where vaccine_id='$vaccineid'"); 
	echo "Record has been deleted"; }
	
}
else if(isset($_POST['btnView']))
{
$content=@mysql_query("select vaccine_id, vaccine_name from vaccines where status='active'");
$total=@mysql_affected_rows();
echo'<table border=1 align="center">';
echo"<tr><th>Vaccine ID</th><th>Vaccine Name</th></tr>";
for($x=0;$x<=$total;$x++)
{
$row=@mysql_fetch_array($content);
$vaccineid=$row['vaccine_id'];
$vaccinename=$row['vaccine_name'];

echo"<tr><th>$vaccineid</th><th>$vaccinename</th></tr>";
}
echo'</table>';
echo'</div>';
}
else if(isset($_POST['btnSearch']))
{
$vaccineid=$_POST['vaccineId'];

$content=@mysql_query("select * from vaccines where vaccine_id='$vaccineid' and status='active'");
if(empty($vaccineid))
	{ echo "Please input ID numbers."; }

else
{
$a=0;
while($row = @mysql_fetch_array($content))
{
    $a=1;
    $vaccineid=$row['vaccine_id'];
	$vaccinename=$row['vaccine_name'];
	
	echo'<table border=1 align="center">';
echo"<tr><th>Vaccine ID</th><th>Vaccine Name</th></tr>";
echo"<tr><th>$vaccineid</th><th>$vaccinename</th></tr>";
echo'</table>';

}
}
}

?>
														
							
				</div>
				</form>
		</div>
</div>
</div>
</body>
</html>
 -->