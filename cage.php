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
	<form action="cage.php" method="post" name="refresh">
	<div class="col-xs-5 form-align">
	<button class="btn-link glyphicon glyphicon-refresh" name="btnView" type="submit"/>
	</button>
	</div>
	</form>
	<form action="cage.php" method="post" name="button">
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
			
<?php
	include('cageForm.php');
	if($connect=@mysql_connect("localhost","root")){
		echo"";
	} else {
		die(@mysql_error());
	}

	$connect=@mysql_select_db("vet1");

	if(isset($_POST['btnView'])){
	$content=@mysql_query("select * from cage where status='active'");
	$total=@mysql_affected_rows();
	echo "<br>";
	echo "<br>";
	echo'<div class="col-xs-12">            
	  <table class="table">
	    <thead>
	      <tr>
	        <th>Cage Name</th>
	        <th>Dimension</th>
	        <th>Price</th>
	        <th> Description</th>
	        
	      </tr>
	      </thead>';

	

for($x=0;$x<=$total-1;$x++)
{
$row=@mysql_fetch_array($content);
$cageid=$row['cage_id'];
$cagename=$row['cage_name'];
$price=$row['price'];
$size=$row['size'];


		echo'<tbody>
		      <tr class="success">';
		echo" <td>".$cageid."</td>
		      <td>".$cagename."</td>
		      <td>".$price."</td>
		      <td>".$size."</td>";
		      echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['cage_id']."';>
						<td><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
						<td><a href='Cageupdate.php?id=$cageid'><button class='btn btn-info' name='btnUpdate' type='submit'><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td>
						</a></form></td>";
		 }
		echo' </tr>
		    </tbody>
		    </div>';	
	
	
	} else if (isset($_POST['btnSearch'])){
		$search = $_POST['search'];
		$content = @mysql_query("select * from cage where cage_id like '%".$search."%' or cage_name like '%".$search."%' or price like '%".$search."%' or size like '%".$search."%' and status='active'");
		$total = @mysql_affected_rows();
	echo "<br>";
	echo "<br>";
	echo'<div class="col-xs-12">            
	  <table class="table">
	    <thead>
	      <tr>
	        <th>Cage ID</th>
	        <th>Cage Name</th>
	        <th>Price</th>
	        <th>Size</th>
	      </tr>
	      </thead>';



		 if(empty($search)){ 
		 	echo "Please input ID number first."; 
		 } else {
			$a=0;
			while($row = @mysql_fetch_array($content)){
				$cageid=$row['cage_id'];
				$cagename=$row['cage_name'];
				$price=$row['price'];
				$size=$row['size'];


		echo'<tbody>
		      <tr class="success">';
		echo" <td><a href='Cageupdate.php?id=$cageid'>$cageid</a</td>
		      <td>".$cagename."</td>
		      <td>".$price."</td>
		      <td>".$size."</td>";
		 }
		echo' </tr>
		    </tbody>
		    </div>';	
		  }

		} 
		else {
	$content=@mysql_query("select * from cage where status='active'");
	$total=@mysql_affected_rows();
	echo "<br>";
	echo "<br>";
	echo'<div class="col-xs-12">            
	  <table class="table">
	    <thead>
	      <tr>
	        <th>Cage Name</th>
	        <th> Dimension </th>
	        <th>Price</th>
	        <th> Description</th>
	      </tr>
	      </thead>';

	

for($x=0;$x<=$total-1;$x++)
{
$row=@mysql_fetch_array($content);
$cageid=$row['cage_id'];
$cagename=$row['cage_name'];
$price=$row['price'];
$size=$row['size'];


		echo'<tbody>
		      <tr class="success">';
		echo" <td><a href='Cageupdate.php?id=$cageid'>$cageid</a</td>
		      <td>".$cagename."</td>
		      <td>".$price."</td>
		      <td>".$size."</td>";
		      echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['cage_id']."';>
						<td><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
						</form></td>";
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
		mysql_query("update cage set status='$status' where cage_id='$id'"); 
		echo '<script type="text/javascript">alert("Record has been deleted")</script>'; 
    }
    }
    }


?>
