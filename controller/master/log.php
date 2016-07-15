<?php 
  if(!isset($_SESSION)) 
  { session_start(); }
  
  if($_SESSION["mosys_user_name"]=="" || $_SESSION["mosys_user_type"]=="")
  {?>
    <script type="text/javascript">   
      function Redirect() 
      {  
        window.location="../master/login.php"; 
       // alert("Please Log-in"); 
      } 
      Redirect();
    </script>
  <?php } 
  else{
  $mosys_user_name = $_SESSION["mosys_user_name"];
  $mosys_user_type = $_SESSION["mosys_user_type"];
  }
  echo'<input type="hidden" id="mosys_user_type" value="'.$mosys_user_type.'">';  
?>
