<?php 


  // konichiwa, hello, sa mga dev, to the devs
  // let's all build a better web together
  // Read first README in the github for FULL Description, Instructions and Notes
  

//  this upper part before the start of <HTML> tag is a Javascript Code
//  para, for conditions in SESSION
// IF you are logged in, SESSION variable is CREATED


  if(!isset($_SESSION)) 
  { session_start(); }
  
  if($_SESSION["chatsnchiens_user_name"]=="" || $_SESSION["chatsnchiens_user_type"]=="") // IF WALANG SESSION VARIABLE (means hindi naka login), redirect sa LOGIN PAGE
  {?>
    <script type="text/javascript">   
      function Redirect() 
      {  
        window.location="view/master/login.php"; 
       // alert("Please Log-in"); 
      } 
      Redirect();
    </script>
  <?php } 
  else{ // ELSE of course MAYROONG SESSION VARIABLE, edi wala pasok dito sa INDEX.php, but iistore ang SESSION sa local php variables for other uses
  $chatsnchiens_user_name = $_SESSION["chatsnchiens_user_name"];
  $chatsnchiens_user_type = $_SESSION["chatsnchiens_user_type"];
  echo'<input type="hidden" id="chatsnchiens_user_type" value="'.$chatsnchiens_user_type.'">';
  }
?>

<!DOCTYPE html>
<html lan='en'>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>chatsnchiens</title>

    <link href="assets/css/custom.css" rel="stylesheet" />

    <script src="controller/master/logout.js" type="text/javascript"></script>

  <!--GEMS-->
    <link href="gems/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />  
    <!--Bootstrap CSS BELOW-->
    <link href="gems/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />  
    <!--JQUERY BELOW-->
    <script src="gems/jQuery/jQuery-2.1.4.min.js"></script>
    <!--Datatables BELOW-->
    <script src="gems/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <!--Datatables Bootsrap CSS BELOW -->
    <script src="gems/datatables/dataTables.bootstrap.js" type="text/javascript"></script>   
    <!--Datatables Javascript BELLOW -->
    <link href="gems/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />  

    <script src="controller/master/logout.js" type="text/javascript"></script>
  <!-- end of gems-->
</head>
<body>
     
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <img src="assets/img/logo.png" alt="chatsnchiens"/> <!-- LOGO HERE -->
                    </a>
                    
                </div>
              
                <span class="logout-spn" > <!-- LOG OUT -->
                  <a href="model/master/logout_process.php" style="color:#fff;" onclick="return logout();">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <!-- Here is the SIDEBAR, BELOW IS THE SIDEBAR -->
        <!-- All view files calls only 1NE sidebar.html in the view directory,  -->
        <!-- INDEX is an excemption, it has its own sidebar here since it's outside the VIEW directory so -->
        <!-- so Links are different -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">                 
                    <li>
                        <a href="index.php" ><i class="fa fa-home "></i>Dashboard</a>
                    </li>
              
               
                    <li> 
                        <a href="view/user/main.php"><i class="fa fa-users "></i>Users</a>
                    </li>                   

                    <li>
                        <a href="view/client/main.php"><i class="fa fa-user "></i>Clients</a>
                    </li>   

                    <li>
                        <a href="view/discount/main.php"><i class="fa fa-sitemap "></i>Discounts</a></a>
                    </li>

                    <li>
                        <a href="view/pet/main.php"><i class="fa fa-paw"></i>Pets</a></a>
                    </li>

                    <li>
                        <a href="view/species/main.php"><i class="fa fa-paw"></i>Species</a></a>
                    </li>

                    <li>
                        <a href="view/breed/main.php"><i class="fa fa-paw"></i>Breed</a></a>
                    </li>
                    <li>
                        <a href="view/unit/main.php"><i class="fa fa-opencart"></i>Unit</a></a>
                    </li>

                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                      <!-- Dashboard Type Title,  using SESSION variable of user type -->
                     <h2><?php echo(strtoupper($chatsnchiens_user_type)); ?> DASHBOARD</h2>  
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                              <!-- Dashboard Greeting,  using SESSION variable of username -->                          
                             <strong>Welcome <?php echo($chatsnchiens_user_name).', ';?> </strong> Select On the Menu Below
                        </div>
                       
                    </div>
                    </div>


                <!-- DASHBOARD MENU SHORTCUTS -->
                  <!-- /. ROW  --> 
                <div class="row text-center pad-top">
 
                  <div id="menu_users" class="col-lg-2 col-md-2 col-sm-2 col-xs-6" title="Maintain User Accounts">
                      <div class="div-square">
                         <a href="view/user/main.php" ><i class="fa fa-users fa-5x"></i>
                           <h4>Users</h4>
                         </a>
                      </div>                                          
                  </div> <!--col-->
              
                  <div id="menu_clients" class="col-lg-2 col-md-2 col-sm-2 col-xs-6" title="Maintain Clients">
                      <div class="div-square">
                         <a href="view/client/main.php" ><i class="fa fa-user fa-5x"></i>
                           <h4>Clients</h4>
                         </a>
                      </div>                                          
                  </div> <!--col-->                                                                           

                  <div id="menu_discounts" class="col-lg-2 col-md-2 col-sm-2 col-xs-6" title="Maintain Discounts">
                      <div class="div-square">
                         <a href="view/duration/main.php" ><i class="fa fa-sitemap fa-5x"></i>
                           <h4>Discounts</h4>
                         </a>
                      </div>                                          
                  </div> <!--col-->  

              </div><!-- ROW-->


             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">    <!-- FOOTER HERE -->
            <div class="row">
              <?php include('view/master/footer.html'); ?>
            </div>
        </div>
          

     <!-- /. WRAPPER  -->

   
</body>
</html>
