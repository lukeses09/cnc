<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysql_real_escape_string($_POST['username']);
      $mypassword = mysql_real_escape_string($_POST['password']); 
      
      
      $query="SELECT * FROM employee WHERE username = '$myusername' and password = '$mypassword'";
      //$row = @mysql_fetch_array($result);
     
      $total=@mysql_affected_rows();
      $result = @mysql_query($query) or die(@mysql_error());
      $count = @mysql_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {

           $row=@mysql_fetch_array($result);

 			if ($row['user_level']=='admin'){
             $_SESSION['login_user'] = $myusername;
         		 header("location: sample.php");
                        }
                        elseif ($row['user_level']=="user") {
                         $_SESSION['login_user'] = $myusername;
         		 header("location: forUser.php");
                        }

      			 
      		
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="css/bootstrap.css" rel="stylesheet"></link>
<script src="js/jquery-2.2.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>

<body>
<div class="container" style="padding-top: 10%";>     
    <div id="loginbox" class="mainbox col-xs-6 col-xs-offset-3">     
		<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Login</h3>
				</div>
				<div class="panel-body">
				<form action="login.php" method="post">
				<div class="container-fluid">
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Username</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="text" class="form-control" id="username" name="username" placeholder="username">
									</div>
								</div>
							</div>
							
							<div class="col-xs-12">
								<div class="col-xs-4 text-right" >
									<label for="exampleInputEmail1">Password</label>
								</div>
								<div class="col-xs-8">
									<div class="form-group">
										<input type="password" class="form-control" id="password" name="password" placeholder="password">
									</div>
								</div>
							</div>
							
							<div class="col-xs-8 col-xs-offset-4">
								<button class="btn btn-success" name="btnLogin" type="submit">Login</button>
								<button class="btn btn-danger" name="btnCancel" type="submit">Cancel</button>
							</div>
				</div>
				</form>
				</div>
		</div>
</body>
</html>
