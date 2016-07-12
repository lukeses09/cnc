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
</head>

<body>
<nav class="navbar navbar-primary">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="Maintenance.php">Maintenance<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li class="active"><a href="customer.php">Customer</a></li>
		  <li><a href="species.php">Species</a></li>
		  <li><a href="breed.php">Breed</a></li>
          <li><a href="patient.php">Patient</a></li>
          <li><a href="products.php">Products</a></li>
		  <li><a href="vaccines.php">Vaccines</a></li>
		  <li><a href="medicines.php">Medicines</a></li>
		  <li><a href="services.php">Services</a></li>
		  <li><a href="cage.php">Cage</a></li>
        </ul>
      </li>
      <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="">Transaction<span class="caret"></span></a>
      <ul class="dropdown-menu">
          <li><a href="appointment.php">Registration and Appointment</a></li>
          <li><a href="payment.php">Payment</a></li>
          <li><a href="otherServices.php">Services</a></li>
          <li><a href="treatment.php">Treatment</a></li>
          <li><a href="order.php">Order</a></li>
      </ul>
      </li>
      <li><a href="#">Records</a></li>
    </ul>
  </div>
</nav>

<div class=" col-xs-6 col-xs-offset-3">
		<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Owner's Information</h3>
				</div>
				<div class="panel-body">
				<form action="customer.php" method="post">
						<div class="container-fluid">
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Owner Id</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="ownerId" name="ownerId" placeholder="Owner Id">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Firstname</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Middlename</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
									<input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middle Name">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Lastname</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
									<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Birthday</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<div class='input-group date' id='datetimepicker1'>
			                   				 <input type='text' class="form-control" />
			                    				<span class="input-group-addon">
			                    				    <span class="glyphicon glyphicon-calendar"></span>
			                   					 </span>
			               				 </div>
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Contact No.</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
									<input type="text" class="form-control" id="contactno" name="contactno" placeholder="Contact Number">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Address</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
									<input type="text" class="form-control" id="address" name="address" placeholder="Address">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Sex</label>
								</div>
								<div class="col-xs-8">
									<label class="radio-inline"><input type="radio" name="optradio">Female</label>
									<label class="radio-inline"><input type="radio" name="optradio">Male</label>
								</div>
							</div>
							<div class="col-xs-18">
								<button class="btn btn-success" name="btnUpdate" type="submit">Update</button>
								<button class="btn btn-success" name="btnDelete" type="submit">Delete</button>
								
								<button class="btn btn-success" name="btnSearch" type="submit">Search</button>
								<button class="btn btn-success" name="btnView" type="submit">Refresh
								<span class="glyphicon glyphicon-refresh"></span></button>

							</div>
						</div>
				</form>
		</div>
</div>

							<br>
							<br>
<?php
if($connect=@mysql_connect("localhost","root"))
	echo"";
else
	die(@mysql_error());
$connect=@mysql_select_db("vet1");

$content=@mysql_query("select * from owner where status='active'");
$total=@mysql_affected_rows();

echo'<div class="container col-xs-11">            
  <table class="table">
    <thead>
      <tr>
        <th>Ownerid</th>
        <th>Name</th>
        <th>Birthday</th>
        <th>Contact_No</th>
        <th>Sex</th>
        <th>Address</th>

      </tr>
      </thead>';

for($x=0;$x<=$total-1;$x++)
{
$row=@mysql_fetch_array($content);
$owner_id=$row['owner_id'];
$firstname=$row['firstname'];
$middlename=$row['middle_initial'];
$lastname=$row['lastname'];
$birthday=$row['bday'];
$contact_no=$row['contact_no'];
$address=$row['address'];
$sex=$row['sex'];
$name=$firstname." ". $middlename." ".$lastname; 
echo'<tbody>
      <tr class="success">';
echo" <td>".$owner_id."</td>
        <td>".$name."</td>
        <td>".$bday."</td>
        <td>".$contact_no."</td>
        <td>".$address."</td>
        <td>".$sex."</td>"; 
    echo "<td><form method=post>
           <input name=id type=hidden value='".$row['owner_id']."';>
			<td><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
			</form></td>";}
echo' </tr>
    </tbody>
    </div>';





else if(isset($_POST['btnSearch']))
{
$owner_id=$_POST['ownerId'];

$content=@mysql_query("select * from owner where owner_id='$owner_id' and status='active'");
if(empty($owner_id))
	{ echo "Please input ID number first."; }

else
{
$a=0;
while($row = @mysql_fetch_array($content))
{
    $a=1;
   $owner_id=$row['owner_id'];
$firstname=$row['firstname'];
$middlename=$row['middle_initial'];
$lastname=$row['lastname'];
$age=$row['age'];
$contact_no=$row['contact_no'];
$address=$row['address'];
$sex=$row['sex'];
$name=$firstname." ". $middlename." ".$lastname; 
	
	echo'<table border=1 align="center">';
echo"<tr><th>Owner ID</th><th>Name</th><th>Age</th><th>Contact No.</th><th>Address</th><th>Sex</th></tr>";
echo"<tr><th>$owner_id</th><th>$name</th><th>$age</th><th>$contact_no</th><th>$address</th><th>$sex</th></tr>";
echo'</table>';

}
}
}


if($_SERVER['REQUEST_METHOD'] == "POST")
    {
    if(isset($_POST['id']))
    {
    	if(isset($_POST['btnDelete'])){
    $id = mysql_real_escape_string($_POST['id']);
    $status='inactive';
		mysql_query("update owner set status='$status' where owner_id='$id'"); 
		echo '<script type="text/javascript">alert("Record has been deleted")</script>'; 
    }
    }
    }

?>
														
							
				
</body>
</html>
<script type="text/javascript">
	$('#datetimepicker1').datepicker({
		toggleActive: true,
		autoclose: true,
		format: 'mm/dd/yyyy'
	});
</script>