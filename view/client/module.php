<?php
   include('../../controller/global/session.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Customer</title>
<?php include('../../view/global/include_gems.html'); ?>  <!-- Plugins/Dependencies -->


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
<?php include('../../view/global/sample.php');
?>
	<form action="module.php" method="post" name="refresh">
	<div class="col-xs-5 form-align">
	<button class="btn-link glyphicon glyphicon-refresh" name="btnView" type="submit"/>
	</div>
	</form>
	<form action="client.php" method="post" name="button">
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
	if($connect=@mysql_connect("localhost","root")){
		echo"";
	} else {
		die(@mysql_error());
	}

	if(isset($_POST['btnView'])){

			$connect=@mysql_select_db("vet1");
			$content=@mysql_query("select * from owner where status='active'");
			$total=@mysql_affected_rows();
			echo "<br>";
			echo "<br>";
			echo'<div class="col-xs-12">            
			  <table class="table">
			    <thead>
			      <tr>
			        <th>Name</th>
			        <th>Birthday</th>
			        <th>Contact No</th>
			        <th>Address</th>
			        <th>Sex</th>
			      </tr>
			      </thead>';

			for($x=0;$x<=$total-1;$x++){
				$row=@mysql_fetch_array($content);
				$owner_id=$row['owner_id'];
				$firstname=$row['firstname'];
				$middlename=$row['middle_initial'];
				$lastname=$row['lastname'];
				$bday=$row['bday'];
				$contact_no=$row['contact_no'];
				$address=$row['address'];
				$sex=$row['sex'];
				$name=$firstname." ". $middlename." ".$lastname; 
				echo'<tbody>
				      <tr class="success">';
				echo"
				        <td>".$name."</td>
				        <td>".$bday."</td>
				        <td>".$contact_no."</td>
				        <td>".$address."</td>
				        <td>".$sex."</td>"; 
				    echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['owner_id']."';>
						<td style='width:10%'><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
						<td style='width:10%'><a href='update.php?id=$owner_id'><button class='btn btn-info' name='btnUpdate' type='button'><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td>
						</form></a></td>";}
				echo' </tr>
				    </tbody>
				    </div>';
	} else if (isset($_POST['btnSearch'])){
		$owner_id = $_POST['search'];
		$content = @mysql_query("select * from owner where owner_id like '%".$owner_id."%' or firstname like '%".$owner_id."%' or middle_initial like '%".$owner_id."%' or lastname like '%".$owner_id."%' or bday like '%".$owner_id."%' or contact_no like '%".$owner_id."%' or address like '%".$owner_id."%' or sex like '%".$owner_id."%' and status='active'");
		$total = @mysql_affected_rows();
		echo "<br>";
		echo "<br>";
		echo'<div class="col-xs-12">            
		  <table class="table">
		    <thead>
		      <tr>
		        <th>Owner ID</th>
		        <th>Name</th>
		        <th>Birthdate</th>
		        <th>Contact No</th>
		        <th>Address</th>
		        <th>Sex</th>
		        
		      </tr>
		      </thead>';

		 if(empty($owner_id)){ 
		 	echo "Please input ID number first."; 
		 } else {
			$a=0;
			while($row = @mysql_fetch_array($content)){
			    $a=1;
			   	$owner_id=$row['owner_id'];
				$firstname=$row['firstname'];
				$middlename=$row['middle_initial'];
				$lastname=$row['lastname'];
				$bday=$row['bday'];
				$contact_no=$row['contact_no'];
				$address=$row['address'];
				$sex=$row['sex'];
				$name=$firstname." ". $middlename." ".$lastname; 
					
				echo'<tbody>
				      <tr class="success">';
				echo" <td><a href='update.php?id=$owner_id'>$owner_id</a>
				      <td>".$name."</td>
				      <td>".$bday."</td>
				      <td>".$contact_no."</td>
				      <td>".$address."</td>
				      <td>".$sex."</td>"; }
				echo' </tr>
				    </tbody>
				    </div>';
			}
		} else {
			$connect=@mysql_select_db("vet1");
			$content=@mysql_query("select * from owner where status='active'");
			$total=@mysql_affected_rows();
			echo "<br>";
			echo "<br>";
			echo'<div class="col-xs-12">            
			  <table class="table">
			    <thead>
			      <tr>
			        <th>Name</th>
			        <th>Birthday</th>
			        <th>Contact No</th>
			        <th>Address</th>
			        <th>Sex</th>
			      </tr>
			      </thead>';

			for($x=0;$x<=$total-1;$x++){
				$row=@mysql_fetch_array($content);
				$owner_id=$row['owner_id'];
				$firstname=$row['firstname'];
				$middlename=$row['middle_initial'];
				$lastname=$row['lastname'];
				$bday=$row['bday'];
				$contact_no=$row['contact_no'];
				$address=$row['address'];
				$sex=$row['sex'];
				$name=$firstname." ". $middlename." ".$lastname; 
				echo'<tbody>
				      <tr class="success">';
				echo"
				        <td>".$name."</td>
				        <td>".$bday."</td>
				        <td>".$contact_no."</td>
				        <td>".$address."</td>
				        <td>".$sex."</td>"; 
				    echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['owner_id']."';>
						<td style='width:10%'><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
						<td style='width:10%'><a href='update.php?id=$owner_id'><button class='btn btn-info' name='btnUpdate' type='button'><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td>
						</form></a></td>";}
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
		mysql_query("update owner set status='$status' where owner_id='$id'"); 
		echo '<script type="text/javascript">alert("Record has been deleted")</script>'; 
    }
    }
    }

?>
</div>
												
							
				
</body>
</html>
<script type="text/javascript">
	$('#datetimepicker1').datepicker({
		toggleActive: true,
		autoclose: true,
		format: 'mm/dd/yyyy'
	});
</script>