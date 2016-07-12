
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
      	$content = "SELECT max(medicine_id) FROM medicines";
      	$result = mysql_query($content) or die($content."<br/><br/>".mysql_error());
      	$row = mysql_fetch_array($result);
      	$id=$row['max(medicine_id)']+1;

      	if(isset($_POST['btnSave']))
      	{
      		$id=$id+1;
      	}

				
?>
<div class=" col-xs-12">
<form action="medicines.php" method="post">
	<div class="col-xs-12">
		<div class="panel-body">
			<div class="container-fluid">
				<div class="col-xs-12">
					<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Medicine Id <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<input type="text" class="form-control" id="medicineId" name="medicineId" placeholder="Medicine Id"
										value="<?php echo "$id"?>" 
									readonly="readonly">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Medicine Name <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<input type="text" class="form-control" id="medicinename" name="medicinename" 
										placeholder="Medicine Name">
									</div>
								</div>
							</div>

						<div class="col-xs-12">
							 <div class="col-xs-4 text-right" >
								<label for="exampleInputEmail1">Category <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
							</div>
							  	<div class="col-xs-4">
									<div class="form-group">
										<form action="medicinesForm.php" method="post">
					       					 
					       				<?php
						       			echo "<select name='category' class='form-control' >";
										$query = "SELECT category_id, category_name FROM category where status='active' and category_use='Medicine'";
					  					$result = mysql_query ($query);
					  					
						        					
					  					while($r = mysql_fetch_array($result)) {
					   					 echo "<option value=".$r['category_name'].">".$r['category_name']."</option>"; 
					  						}
					  						echo"</select>";
					  						
					  					?>			

					     			 </div>
					      		</div>
					     </div>
					     <div class="col-xs-12">
							 <div class="col-xs-4 text-right" >
								<label for="exampleInputEmail1">Packaging <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
							</div>
							  	<div class="col-xs-4">
									<div class="form-group">
										<form action="medicinesForm.php" method="post">
					       					 
					       				<?php
						       			echo "<select name='packaging' class='form-control' >";
										$query = "SELECT packaging_id, packaging_name FROM packaging where status='active'";
					  					$result = mysql_query ($query);
					  					
						        					
					  					while($r = mysql_fetch_array($result)) {
					   					 echo "<option value=".$r['packaging_name'].">".$r['packaging_name']."</option>"; 
					  						}
					  						echo"</select>";
					  						
					  					?>			
					      					
					     			 </div>
					      		</div>
					     </div>

						<div class="col-xs-12">
							 <div class="col-xs-4 text-right" >
								<label for="exampleInputEmail1">Dosage Form <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
							</div>
							  	<div class="col-xs-4">
									<div class="form-group">
										<form action="medicinesForm.php" method="post">
					       					 
					       				<?php
						       			echo "<select name='dosageform' class='form-control' >";
										$query = "SELECT dosageform_id, dosageform_name FROM dosage_form where status='active'";
					  					$result = mysql_query ($query);
					  					
						        					
					  					while($r = mysql_fetch_array($result)) {
					   					 echo "<option value=".$r['dosageform_name'].">".$r['dosageform_name']."</option>"; 
					  						}
					  					echo"</select>";
					  						
					  					?>		
					     			 </div>
					      		</div>
					     </div>
					     <div class="col-xs-12">
							 <div class="col-xs-4 text-right" >
								<label for="exampleInputEmail1">Generic Name <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
							</div>
							  	<div class="col-xs-4">
									<div class="form-group">
										<form action="medicinesForm.php" method="post">
											<?php
					       					 echo"<select name='packaging' class='form-control'>";
												$query = "SELECT generic_id, generic_name FROM generic where status='active'";
							  					$result = mysql_query ($query);
							  					
								        					
							  					while($r = mysql_fetch_array($result)) {
							   					 echo "<option value=".$r['generic_id'].">".$r['generic_name']."</option>"; 
							  						}
					      					 echo"</select>";
					      					 ?>
					     			 </div>
					      		</div>
					     </div>
					     <div class="col-xs-12">
							 <div class="col-xs-4 text-right" >
								<label for="exampleInputEmail1">Brand <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
							</div>
							  	<div class="col-xs-4">
									<div class="form-group">
										<form action="medicinesForm.php" method="post">
										<?php
					       					echo" <select name='packaging' class='form-control'>";
												$query = "SELECT brand_id, brand_name FROM brand where status='active'";
							  					$result = mysql_query ($query);
							  					
								        					
							  					while($r = mysql_fetch_array($result)) {
							   					 echo "<option value=".$r['brand_id'].">".$r['brand_name']."</option>"; 
							  						}
					      					 echo"</select>"; 
					      				?>
					     			 </div>
					      		</div>
					     </div>
					     <div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Content <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
								</div>
								<div class="col-xs-2">
									<div class="form-group">
										<input type="text" class="form-control" id="weight" name="content" placeholder="Content">
									</div>
								</div>
								<div class="col-xs-2">
									<div class="form-group">
										<form action="medicinesForm.php" method="post">
											<?php
					       					 echo"<select name='weight' class='form-control'>";
												$query = "SELECT unit_id, abbr FROM units where status='active'";
							  					$result = mysql_query ($query);
							  					
								        					
							  					while($r = mysql_fetch_array($result)) {
							   					 echo "<option value=".$r['abbr'].">".$r['abbr']."</option>"; 
							  						}		
					      					 echo"</select>";
					      					 ?> 
					     			 </div>
				     			 </div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Price <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<input type="text" class="form-control" id="price" name="price" 
										placeholder="Price">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Description <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<input type="text" class="form-control" id="description" name="description" 
										placeholder="Description">
									</div>
								</div>
							</div>
							<div class="col-xs-8 text-right">
								<button class="btn btn-success" name="btnSave" type="submit">Save</button>
							</div>
			</div>
		</div>
	</form>
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

		$medicineid=$_POST['medicineId'];
		$medicinename=$_POST['medicinename'];
		$category=$_POST['category'];
		$price=$_POST['price'];
		$description=$_POST['description'];
		$status='active';
		if(empty($medicineid) || empty($medicinename) || empty($price) || empty($category) || empty($description))
		{ echo '<script type="text/javascript">alert("Please complete required fields.")</script>'; }
		if($price<=0)
		{
			echo '<script type="text/javascript">alert("Price cannot be negative")</script>';
		}
		else
		{ mysql_query("insert into medicines values(".$medicineid.",'".$medicinename."','".$category."','".$status."',".$price.",'".$description."')");
	    echo '<script type="text/javascript">alert("Record has been added.")</script>'; }
			
		}
		?>
		
</form>
</body>
</html> 