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
<div class="col-xs-12">
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
      	$content = "SELECT max(product_id) FROM products";
      	$result = mysql_query($content) or die($content."<br/><br/>".mysql_error());
      	$row = mysql_fetch_array($result);
      	$id=$row['max(product_id)']+1;

      	if(isset($_POST['btnSave']))
      	{
      		$id=$id+1;
      	}
				
?>
<form action="products.php" method="post">
	<div class="col-xs-18">
		<button class="btn btn-success" name="btnSave" type="submit">Save</button>
	</div>
	<div class="col-xs-12">
		<div class="panel-body">
			<div class="container-fluid">
				<div class="col-xs-12">
					<div class="col-xs-4 text-right" >
						<label for="exampleInputEmail1">Product Id</label>
					</div>
					<div class="col-xs-4">
						<div class="form-group">
							<input type="text" class="form-control" id="productId" name="productId" placeholder="Product Id"
							value="<?php echo "$id"?>" 
									readonly='readonly'>
						</div>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="col-xs-4 text-right" >
						<label for="exampleInputEmail1">Product Name</label>
					</div>
					<div class="col-xs-4">
						<div class="form-group">
							<input type="text" class="form-control" id="productname" name="productname" 
							placeholder="Product Name">
						</div>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="col-xs-4 text-right" >
						<label for="exampleInputEmail1">Birthday</label>
					</div>
					<div class="col-xs-4">
						<div class="form-group">
							<div class='input-group date' id='datetimepicker2'>
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
									<label for="exampleInputEmail1">Description</label>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<input type="text" class="form-control" id="description" name="description" 
										placeholder="Description">
									</div>
								</div>
							</div>
				<div class="col-xs-12">
					<div class="col-xs-4 text-right" >
						<label for="exampleInputEmail1">Price</label>
					</div>
					<div class="col-xs-4">
						<div class="form-group">
							<input type="text" class="form-control" id="price" name="price" 
							placeholder="Price">
						</div>
					</div>
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
$productid=$_POST['productId'];
$productname=$_POST['productname'];
$price=$_POST['price'];
$desc=$_POST['description'];
$status='active';
	if(empty($productid) || empty($productname) || empty($price) || empty($desc))
	{ echo '<script type="text/javascript">alert("Please complete required fields.")</script>'; }
	else if($price <= 0)
	echo '<script type="text/javascript">alert("Price cannot be negative!")</script>';
	else
	{ mysql_query("insert into products values(".$productid.",'".$productname."',".$price.",'".$desc."','".$status."')");
echo '<script type="text/javascript">alert("Record has been added.")</script>';
	} }
		?>
</form>
</body>
</html> <script type="text/javascript">
	$('#datetimepicker2').datepicker({
		toggleActive: true,
		autoclose: true,
		format: 'yyyy-mm-dd'
	});
</script>