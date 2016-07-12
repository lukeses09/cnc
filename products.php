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
      	$content = "SELECT max(product_id) FROM products";
      	$result = mysql_query($content) or die($content."<br/><br/>".mysql_error());
      	$row = mysql_fetch_array($result);
      	$id=$row['max(product_id)']+1;

      	if($productname != $_productname)
      	{
      	if(isset($_POST['btnSave']))
      	{
      		$id=$id+1;
      	}
      }
				
?>	
	<form action="products.php" method="post" name="refresh">
	<div class="col-xs-5 form-align">
	<button class="btn-link glyphicon glyphicon-refresh" name="btnView" type="submit"/>
	</button>
	</div>
	</form>
	<form action="products.php" method="post" name="button">
		<div class="col-xs-2 pull-right">
			<div class="input-group">
				<input type="text" class="form-control" id="search" name="search" placeholder="Search">
				<span class="input-group-btn">
					<button class="btn btn-success glyphicon glyphicon-search btn-align" name="btnSearch" type="submit"/>
				</span>
			</div>
		</div>
	</div>
	</form>
	<form action="products.php" method="post">
	<div class="col-xs-9">
		<div class="panel-body">
			<div class="container-fluid">
				<div class="col-xs-12">
					<div class="col-xs-4 text-right" >
						<label for="exampleInputEmail1">Product Id <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
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
						<label for="exampleInputEmail1">Product Name <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
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
						<label for="exampleInputEmail1">Category<span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
					</div>
					  	<div class="col-xs-4">
							<div class="form-group">
								<form action="products.php" method="post">
								 <?php
									echo"<select name='category' class='form-control' >";
		       					 	$connect=@mysql_connect("localhost","root");
									$connect=@mysql_select_db("vet1");
									$content=mysql_query("select category_name from category where status='active' and category_use='Product'");
									$total=@mysql_affected_rows();
									for($x=1;$x<=$total;$x++)
										{
											$row=mysql_fetch_array($content);
											$category_name=$row['category_name'];
											echo'<option value="'.$category_name.'">'.$category_name.'</option>';
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
								<form action="products.php" method="post">
									
			       					 <?php

			       					 echo"<select name='packaging' class='form-control' >";
			       					 	$connect=@mysql_connect("localhost","root");
										$connect=@mysql_select_db("vet1");
										$content1=mysql_query("select packaging_name from packaging where status='active'");
										$total1=@mysql_affected_rows();
										for($x1=1;$x1<=$total1;$x1++)
											{
												$row1=mysql_fetch_array($content1);
												$packaging_name=$row1['packaging_name'];
												echo'<option value="'.$packaging_name.'">'.$packaging_name.'</option>';
											}

											echo "</select>";
					  					?>
			     			 </div>
			      		</div>
			     </div>
			     <div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Weight<span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
								</div>
								<div class="col-xs-2">
									<div class="form-group">
										<input type="text" class="form-control" id="weight" name="weight" placeholder="weight">
									</div>
								</div>
								<div class="col-xs-2">
								<div class="form-group">
									<form action="products.php" method="post">
				       				  <?php	 

				       				  echo"<select name='weightunit' class='form-control' >";
			       					 	$connect=@mysql_connect("localhost","root");
										$connect=@mysql_select_db("vet1");
										$content2=mysql_query("select unit_id, abbr from units where status='active'");
										$total2=@mysql_affected_rows();
										for($x2=1;$x2<=$total2;$x2++)
											{
												$row2=mysql_fetch_array($content2);
												$abbr=$row2['abbr'];
												echo'<option value="'.$abbr.'">'.$abbr.'</option>';
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
										<input type="text" class="form-control" id="price" name="price" placeholder="Price">
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

			</div>
		</div>
		<div class="col-xs-8 text-right">
		<button class="btn btn-success" name="btnSave" type="submit">Save</button>
		</div>


<div class="col-xs-12">
<?php
	//include('productsForm.php');
	if($connect=@mysql_connect("localhost","root")){
		echo"";
	} else {
		die(@mysql_error());
	}
	$connect=@mysql_select_db("vet1");

	if(isset($_POST['btnView'])){
$content=@mysql_query("select product_name, category, packaging, weight, weightunit, price, description from products where status='active'");
$total=@mysql_affected_rows();
echo'<table border=1 align="center">';
echo "<br>";
echo "<br>";
echo'<div class="col-xs-12">            
	  <table class="table">
	    <thead>
	      <tr>
	        <th>Product Name</th>
	        <th>Category</th>
	        <th>Packaging</th>
	        <th>Weight</th>
	        <th>Price</th>
	        <th>Description</th>
	        
	      </tr>
	      </thead>';
for($x=0;$x<=$total-1;$x++)
{
$row=@mysql_fetch_array($content);
$productname=$row['product_name'];
$category=$row['category'];
$packaging=$row['packaging'];
$weight=$row['weight'];
$weightunit=$row['weightunit'];
$price=$row['price'];
$description=$row['description'];
$total=$weight." ".$weightunit;
	
				echo'<tbody>
				      <tr class="success">';
				echo" <td>".$productname."</td>
				      <td>".$category."</td>
				      <td>".$packaging."</td>
				      <td>".$total."</td>
				      <td>".$price."</td>
				      <td>".$description."</td>
				      
				      ";
				  echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['product_id']."';>
						<td style='width:10%'><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
						<td style='width:10%'><a href='Productsupdate.php?id=$productid'></a><button class='btn btn-info' name='btnUpdate''><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td></a>
						</form></td>";}
echo'</table>';
echo'</div>';

	} else if (isset($_POST['btnSearch'])){
		$search = $_POST['search'];
		$content=@mysql_query("select * from products where product_name like '%".$search."%' or category like '%".$search."%' or packaging like '%".$search."%' or weight like '%".$search."%' or weightunit like '%".$search."%' or description like '%".$search."%' or price like '%".$search."%' and status='active'");
		echo "<br>";
		echo "<br>";
		echo'<table border=1 align="center">';
		echo'<div class="col-xs-12">            
			  <table class="table">
			    <thead>
			      <tr>
			        <th>Product Name</th>
	        		<th>Category</th>
	        		<th>Packaging</th>
	        		<th>Weight</th>
	        		<th>Price</th>
	        		<th>Description<th>
			      </tr>
			      </thead>';
					if(empty($search)){ 
						echo "Please input ID number."; 
					} else {
						$a=0;
						while($row = @mysql_fetch_array($content)){
				   			$a=1;
				    		$productname=$row['product_name'];
							$category=$row['category'];
							$packaging=$row['packaging'];
							$weight=$row['weight'];
							$weightunit=$row['weightunit'];
							$price=$row['price'];
							$description=$row['description'];
							$total=$weight." ".$weightunit;	
							echo'<tbody>
							      <tr class="success">';
							echo" <td><a href='Productsupdate.php?id=$productid'>$productid</a></td>
							      <td>".$productname."</td>
							      <td>".$category."</td>
							      <td>".$packaging."</td>
							      <td>".$total."</td>
							      <td>".$price."</td>
							      <td>".$description."</td>
							      ";
							
						}
							echo' </tr>
							    </tbody>
							    </div>';
					}
	} 
		
	else {
		$content=@mysql_query("select * from products where status='active'");
$total=@mysql_affected_rows();
echo'<table border=1 align="center">';
echo "<br>";
echo "<br>";
echo'<div class="col-xs-12">            
	  <table class="table">
	    <thead>
	      <tr>
	        <th>Product Name</th>
	        <th>Category</th>
	        <th>Packaging</th>
	        <th>Weight</th>
	        <th>Price</th>
	        <th>Description</th>
	        
	      </tr>
	      </thead>';
for($x=0;$x<=$total-1;$x++)
{
$row=@mysql_fetch_array($content);
$productname=$row['product_name'];
$category=$row['category'];
$packaging=$row['packaging'];
$weight=$row['weight'];
$weightunit=$row['weightunit'];
$price=$row['price'];
$description=$row['description'];
$total=$weight." ".$weightunit;
	
				echo'<tbody>
				      <tr class="success">';
				echo" <td>".$productname."</td>
				      <td>".$category."</td>
				      <td>".$packaging."</td>
				      <td>".$total."</td>
				      <td>".$price."</td>
				      <td>".$description."</td>
				      
				      ";
				  echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['product_id']."';>
						<td style='width:10%'><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
						<td style='width:10%'><a href='Productsupdate.php?id=$productid'></a><button class='btn btn-info' name='btnUpdate''><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td></a>
						</form></td>";}
echo'</table>';
echo'</div>';

	}

	if($_SERVER['REQUEST_METHOD'] == "POST")
    {
    if(isset($_POST['id']))
    {
    	if(isset($_POST['btnDelete'])){
    $id = mysql_real_escape_string($_POST['id']);
    $status='inactive';
		mysql_query("update products set status='$status' where product_id='$id'"); 
		echo '<script type="text/javascript">alert("Record has been deleted")</script>'; 


    }
    }
    }

    if(isset($_POST['btnSave']))
{
$productid=$_POST['productId'];
$productname=$_POST['productname'];
$category=$_POST['category'];
$packaging=$_POST['packaging'];
$weight=$_POST['weight'];
$weightunit=$_POST['weightunit'];
$description=$_POST['description'];
$price=$_POST['price'];
$status='active';
$content=@mysql_query("select * from products where product_name like '%".$productname."%' or category like '%".$category."%' or packaging like '%".$packaging."%'  or weight like '%.$weight.%' or weight like '%".$weightunit."%' or description like '%".$description."%' or price like '%.$price.%' and status='active'");
	while($row = @mysql_fetch_array($content)){
				   			$a=1;
				    		$_productname=$row['product_name'];
												}
	if(($productname == $_productname))
	{ echo '<script type="text/javascript">alert("Duplicte Entry for product name.")</script>';}
	else if(empty($category))
	{ echo '<script type="text/javascript">alert("Please complete required fields.")</script>'; }
	else if($price <= 0)
	echo '<script type="text/javascript">alert("Price cannot be negative!")</script>';
	else
	{ mysql_query("insert into products values(".$productid.",'".$productname."','".$category."','".$packaging."',".$weight.",'".$weightunit."','".$description."',".$price.",'".$status."')");
echo '<script type="text/javascript">alert("Record been added.")</script>';
	} } 
?>

</div>
