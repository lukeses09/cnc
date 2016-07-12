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
      	$content = "SELECT max(cage_id) FROM cage";
      	$result = mysql_query($content) or die($content."<br/><br/>".mysql_error());
      	$row = mysql_fetch_array($result);
      	$id=$row['max(cage_id)']+1;

      	if(isset($_POST['btnSave']))
      	{
      		$id=$id+1;
      	}
				
?>
<div class=" col-xs-12">
<form action="cage.php" method="post">
	<div class="col-xs-12">
		<div class="panel-body">
			<div class="container-fluid">
				<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Cage Id <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<input type="text" class="form-control" id="cageId" name="cageId" placeholder="Cage Id"
										value="<?php echo "$id"?>" 
									readonly="readonly">
									</div>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Cage Name <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<input type="text" class="form-control" id="cagename" name="cagename" 
										placeholder="Cage Name">
									</div>
								</div>
							</div>
							
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Length <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
								</div>
								<div class="col-xs-2">
									<div class="form-group">
										<input type="text" class="form-control" id="length" name="length" placeholder="Length">
									</div>
								</div>
								<div class="col-xs-2">
								<div class="form-group">
									<form action="cageForm.php" method="post">
				       					  <?php
				       				 				 echo "<select name='lengthunit' class='form-control' >";
					$query = "SELECT unit_id, abbr FROM units where status='active'";
  					$result = mysql_query ($query);
  					
	        					
  					while($r = mysql_fetch_array($result)) {
   					 echo "<option value=".$r['abbr'].">".$r['abbr']."</option>"; 
  						}

  						echo "</select";
 					
  					?>			
				        			</form>
				     			 </div>
				     			 </div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Width <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
								</div>
								<div class="col-xs-2">
									<div class="form-group">
										<input type="text" class="form-control" id="width" name="width" placeholder="Width">
									</div>
								</div>
								<div class="col-xs-2">
								<div class="form-group">
									<form action="cageForm.php" method="post">
				       					 <?php
				       				 				 echo "<select name='widthunit' class='form-control' >";
					$query = "SELECT unit_id, abbr FROM units where status='active'";
  					$result = mysql_query ($query);
  					
	        					
  					while($r = mysql_fetch_array($result)) {
   					 echo "<option value=".$r['abbr'].">".$r['abbr']."</option>"; 
  						}

  						echo "</select";
 					
  					?>			
				        			</form>
				     			 </div>
				     			 </div>
				      	</div>
							</div>
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Height <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
								</div>
								<div class="col-xs-2">
									<div class="form-group">
										<input type="text" class="form-control" id="height" name="height" placeholder="Height">
									</div>
								</div>
								<div class="col-xs-2">
								<div class="form-group">
									<form action="cageForm.php" method="post">
				       					 <?php
				       				 				 echo "<select name='heightunit' class='form-control' >";
					$query = "SELECT unit_id, abbr FROM units where status='active'";
  					$result = mysql_query ($query);
  					
	        					
  					while($r = mysql_fetch_array($result)) {
   					 echo "<option value=".$r['abbr'].">".$r['abbr']."</option>"; 
  						}

  						echo "</select";
 					
  					?>			
				        			</form>
				     			 </div>
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
		<?php
	if($connect=@mysql_connect("localhost","root")){
		echo"";
	} else {
		die(@mysql_error());
	}

	$connect=@mysql_select_db("vet1");

	if(isset($_POST['btnSave']))
{
$cageId=$_POST['cageId'];
$cagename=$_POST['cagename'];
$size=$_POST['size'];
$price=$_POST['price'];
$status='active';
	if(empty($cageId) || empty($cagename) ||empty($size)|| empty($price))
	{ echo '<script type="text/javascript">alert("Please complete required fields.")</script>'; }
	else if($price<=0)
		{
			echo '<script type="text/javascript">alert("Price cannot be negative")</script>';
		}
	else
	{ mysql_query("insert into cage values(".$cageId.",'".$cagename."','".$size."',".$price.",'".$status."')");
echo '<script type="text/javascript">alert("Record has beed added.")</script>';;
	}
}
?>
</form>
</body>
</html> 