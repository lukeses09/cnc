	<?php
error_reporting(E_ALL & ~E_NOTICE);
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = @mysql_query($connect,"select username from employee where username = '$user_check' ");
   
   $row = @mysql_fetch_array($ses_sql,MYSQL_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>