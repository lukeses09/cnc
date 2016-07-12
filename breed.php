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
      	$content = "SELECT max(breed_id) FROM breed1";
      	$result = mysql_query($content) or die($content."<br/><br/>".mysql_error());
      	$row = mysql_fetch_array($result);
      	$id=$row['max(breed_id)']+1;

      	if($breedname != $breed_name)
      	{
      	if(isset($_POST['btnSave']))
      	{
      		$id=$id+1;
      	} }


				
?>
	<form action="breed.php" method="post" name="refresh">
	<div class="col-xs-5 form-align">
	<button class="btn-link glyphicon glyphicon-refresh" name="btnView" type="submit"/>
	</button>
	
	</div>
	</form>
	<form action="breed.php" method="post" name="button">
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
	<form action="breed.php" method="post">
	
	<div class="col-xs-9">
		<div class="panel-body">
			<div class="container-fluid">
		<div class="col-xs-12">	
		     <div class="col-xs-4 text-right" >
					<label for="exampleInputEmail1">Species <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
			</div>
		     <div class="col-xs-4">
				<div class="form-group">
				<form action="breed.php" method="post">
       				 <?php
	       			echo "<select name='species' class='form-control' >";
					$query = "SELECT species_id, species_name FROM species where status='active'";
  					$result = mysql_query ($query);
  					
	        					
  					while($r = mysql_fetch_array($result)) {
   					 echo "<option value=".$r['species_id'].">".$r['species_name']."</option>"; 
  						}
  						echo"</select>";
  						
  					?>					
   
        		</form>
     			 </div>
</div>
</div>
</div>
					<div class="container-fluid">
						<div class="col-xs-12">
							<div class="col-xs-4 text-right" >
								<label for="exampleInputEmail1">Breed Id <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
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
								<label for="exampleInputEmail1">Breed Name <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
							</div>
							<div class="col-xs-4">
								<div class="form-group">
									<input type="text" class="form-control" id="breedname" name="breedname" 
									placeholder="Breed Name">
								</div>
							</div>
						</div>
						<div class="col-xs-8 text-right">
							<button class="btn btn-success" name="btnSave" type="submit">Save</button>
						</div>
			</div>
		</div>
		</div>
<div class=" col-xs-7">			
<?php
	if($connect=@mysql_connect("localhost","root")){
		echo"";
	} else {
		die(@mysql_error());
	}
	$connect=@mysql_select_db("vet1");

	if(isset($_POST['btnView'])){
	
	$content=@mysql_query("select breed1.breed_name,breed1.breed_id, breed1.species_id, species.species_name from breed1 join species on breed1.species_id=species.species_id where breed1.status='active'");
	$total=@mysql_affected_rows();
	echo "<br>";
	echo "<br>";
	echo'<div class="col-xs-12 col-xs-offset-2">            
	  <table class="table">
	    <thead>
	      <tr>
	        <th>Species Name</th>
	        <th>Breed Name</th>
	      </tr>
	      </thead>';

	for($x=0;$x<=$total-1;$x++){
		$row=@mysql_fetch_array($content);
		$species_id=$row['species_id'];
		$breed_id=$row['breed_id'];
		$breed_name=$row['breed_name'];
      	$species_name=$row['species_name'];

		echo'<tbody>
		      <tr class="success">';
		echo" <td>".$species_name."</td>
		      <td>".$breed_name."</td>";
		      echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['breed_id']."';>
						<td style='width:10%'><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
						</form></td>
						<td style='width:10%'><a href='Breedupdate.php?id=$breed_id'><button class='btn btn-info' name='btnUpdate' type='button'><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td>
						</form></a></td>";
		 }
		echo' </tr>
		    </tbody>
		    </div>';
	
	
	} else if (isset($_POST['btnSearch'])){
		$connect=@mysql_select_db("vet1");
		$search = $_POST['search'];
		$content=@mysql_query("select s.species_id, b.breed_name from species s join breed1 b on s.species_id = b.species_id where b.breed_name like '%".$search."%' or s.species_name like '%".$search."%' and status='active'");
		$total=@mysql_affected_rows();
	echo "<br>";
	echo "<br>";
	echo'<div class="col-xs-12 col-xs-offset-2">            
	  <table class="table">
	    <thead>
	      <tr>
	        <th>Species Name</th>
	        <th>Breed Name</th>
	      </tr>
	      </thead>';

	
	for($x=0;$x<=$total-1;$x++){
		$row=@mysql_fetch_array($content);
		$species_id=$row['species_id'];
		$breed_id=$row['breed_id'];
		$breed_name=$row['breed_name'];
      	$species_name=$row['species_name'];

		echo'<tbody>
		      <tr class="success">';
		echo" <td>".$species_name."</td>
		      <td>".$breed_name."</td>";
		      echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['breed_id']."';>
						<td style='width:10%'><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
						<td style='width:10%'> <a href='Breedupdate.php?id=$breed_id'><button class='btn btn-info' name='btnUpdate' type='button'><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td>
</a>
						</form></a></td>";
			}
		} 

	
		
		else {
	$content=@mysql_query("select breed1.breed_name,breed1.breed_id, breed1.species_id, species.species_name from breed1 join species on breed1.species_id=species.species_id where breed1.status='active'");
	$total=@mysql_affected_rows();
	echo "<br>";
	echo "<br>";
	echo'<div class="col-xs-12 col-xs-offset-2">            
	  <table class="table">
	    <thead>
	      <tr>
	        <th>Species Name</th>
	        <th>Breed Name</th>
	      </tr>
	      </thead>';

	
	for($x=0;$x<=$total-1;$x++){
		$row=@mysql_fetch_array($content);
		$species_id=$row['species_id'];
		$breed_id=$row['breed_id'];
		$breed_name=$row['breed_name'];
      	$species_name=$row['species_name'];

		echo'<tbody>
		      <tr class="success">';
		echo" <td>".$species_name."</td>
		      <td>".$breed_name."</td>";
		      echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['breed_id']."';>
						<td style='width:10%'><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
						<td style='width:10%'> <a href='Breedupdate.php?id=$breed_id'><button class='btn btn-info' name='btnUpdate' type='button'><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td>
</a>
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
		mysql_query("update breed1 set status='$status' where breed_id='$id'"); 
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

$species=$_POST['species'];	
$breedId=$_POST['breedId'];
$breedname=$_POST['breedname'];
$status='active';
$content = @mysql_query("select * from breed where breed_name LIKE '%". $breedname ."%' and status='active'");
			while($row = @mysql_fetch_array($content))
			{
			    $a=1;
				$breed_name=$row['breed_name'];
			}
	if($breedname == $breed_name)
	{ echo '<script type="text/javascript">alert("Duplicate entry for breed name.")</script>'; }
	else if(empty($breedId) || empty($breedname))
	{ echo '<script type="text/javascript">alert("Please complete required fields")</script>'; }
	else
	{ 
	
mysql_query("insert into breed1 values(".$breedId.",".$species.",'".$breedname."','".$status."')");
echo '<script type="text/javascript">alert("Record has been added")</script>';
		} 
		
	
} ?>
</div>
</body>
</div>
