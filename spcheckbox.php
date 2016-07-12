<?php
   include('session.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="css/bootstrap.css" rel="stylesheet"></link>
<link href="css/bootstrap-datepicker3.css" rel="stylesheet"></link>
<script src="js/jquery-2.2.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
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
        $content = "SELECT max(pet_id) FROM patient";
        $result = mysql_query($content) or die($content."<br/><br/>".mysql_error());
        $row = mysql_fetch_array($result);
        $id=$row['max(pet_id)']+1;

        if(isset($_POST['btnSave']))
        {
          $id=$id+1;
        }

        
?>
  <form action="patient.php" method="post" name="refresh">
  <div class="col-xs-5 form-align">
  <button class="btn-link glyphicon glyphicon-refresh" name="btnView" type="submit"/>
  </button>
  </div>
  </form>
  <form action="patient.php" method="post" name="button">
    <div class="col-xs-2 pull-right">
      <div class="input-group">
        <input type="text" class="form-control" id="search" name="search" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn btn-success glyphicon glyphicon-search btn-align" name="btnSearch" type="submit"/>
        </span>
      </div>
    </div>
  </form>      

<div class="col-xs-9">
    <div class="panel-body">
      <div class="container-fluid">	
        <div class="col-xs-12">
          <div class="col-xs-4 text-right" >
            <label for="exampleInputEmail1">Owner <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
           </div>
           <div class="col-xs-4">	
              <div class="form-group">
                <form action="spcheckbox.php" method="post">
                  <?php
                    echo "<select name='owner' class='form-control' >";
                    $query = "SELECT owner_id, lastname, firstname, middle_initial FROM owner where status='active'";
                    $result = mysql_query ($query);
                          
                    while($r = mysql_fetch_array($result)) {
                      $lastname=$r['lastname'];
                      $firstname=$r['firstname'];
                      $mi=$r['middle_initial'];
                      $name=$firstname." ".$mi.".".$lastname;
                     echo "<option value=".$r['owner_id'].">".$name."</option>"; 
                      }
                      echo"</select>";
                      ?>
              </div>
            </div>

             <div class="col-xs-12">
              <div class="col-xs-4 text-right" >
                <label for="exampleInputEmail1">Pet Id <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
              </div>
              <div class="col-xs-4">
                <div class="form-group">
                  <input type="text" class="form-control" id="petId" name="petId" placeholder="Pet Id"
                  value="<?php echo "$id"?>" 
                      readonly="readonly">
                </div>
              </div>
            </div>
            <div class="col-xs-12">
              <div class="col-xs-4 text-right" >
                <label for="exampleInputEmail1">Pet Name <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
              </div>
              <div class="col-xs-4">
                <div class="form-group">
                  <input type="text" class="form-control" id="petname" name="petname" placeholder="Pet Name">
                </div>
              </div>
            </div>
           <div class="col-xs-12">
            <div class="col-xs-4 text-right" >
              <label for="exampleInputEmail1"> Species <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
             </div>
             <div class="col-xs-4"> 
                <div class="form-group">
                  <form action="spcheckbox.php" method="post">
                       <?php
                       echo "<select name='species' class='form-control' >";
                        $query = "SELECT species_id, species_name FROM species where status='active'";
                        $result = mysql_query ($query);
  
                        while($r = mysql_fetch_array($result)) {
                         echo "<option value=".$r['species_name'].">".$r['species_name']."</option>"; 
                          }
                          echo"</select>";
                          
                        ?>
                </div>
            </div>
           </div>
           <div class="col-xs-12">
            <div class="col-xs-4 text-right" >
              <label for="exampleInputEmail1"> Breed <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
             </div>
           <div class="col-xs-4"> 
            <div class="form-group">
              <form action="spcheckbox.php" method="post">
	       							 <?php
	       							 echo "<select name='breed' class='form-control' >";
              					$query = "SELECT breed_id, breed_name FROM breed1 where status='active'";
                					$result = mysql_query ($query);
                					
              	        					
                					while($r = mysql_fetch_array($result)) {
                 					 echo "<option value=".$r['breed_name'].">".$r['breed_name']."</option>"; 
                						}
                						echo"</select>";
                						
                					?>
              </div>
            </div>
          </div>
<div class="col-xs-12">
          <div class="col-xs-4 text-right" >
            <label for="exampleInputEmail1">Color <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
          </div>
          <div class="col-xs-4">
            <div class="form-group">
              <input type="text" class="form-control" id="color" name="color" placeholder="Color">
            </div>
          </div>
           </div>
           <div class="col-xs-12">
          <div class="col-xs-4 text-right" >
            <label for="exampleInputEmail1">Markings <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
          </div>
          <div class="col-xs-4">
            <div class="form-group">
              <input type="text" class="form-control" id="markings" name="markings" placeholder="Markings">
            </div>
          </div>
        </div>
        <div class="col-xs-12">
          <div class="col-xs-4 text-right" >
            <label for="exampleInputEmail1">Birthday <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
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
            <label for="exampleInputEmail1">Sex <span class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:orange"></span></label>
          </div>
          <div class="col-xs-4">
            <label class="radio-inline"><input type="radio" name="optradio" value="on">Female</label>
            <label class="radio-inline"><input type="radio" name="optradio" value="off">Male</label>
          </div>
        </div>
        <div class="col-xs-8 text-right">
          <button class="btn btn-success" name="btnSave" type="submit">Save</button>
        </div>
			</form>
		</div>


<?php
if($connect=@mysql_connect("localhost","root")){
    echo"";
  } else {
    die(@mysql_error());
  }

  if(isset($_POST['btnView'])){
    $connect=@mysql_select_db("vet1");
  $content=@mysql_query("select owner_id, pet_id, pet_name,species, breed, color, markings, birthday, sex from patient where status='active'");
  $total=@mysql_affected_rows();
  echo "<br>";
  echo "<br>"; 
  echo'<div class="container col-xs-12">           
   <table class="table">
     <thead>
      <tr>
        <th>Owner Name</th>
        <th>Pet ID</th>
        <th>Pet Name</th>
        <th>Species</th>
        <th>Breed</th>
        <th>Color</th>
        <th>Markings</th>
        <th>Birthday</th>
        <th>Sex</th>
      </tr>
      </thead>';
      
  for($x=0;$x<=$total-1;$x++)

  {
  $row=@mysql_fetch_array($content);
  $ownerid=$row['owner_id'];
  $petid=$row['pet_id'];
  $petname=$row['pet_name'];
  $species=$row['species'];
  $breed=$row['breed'];
  $color=$row['color'];
  $markings=$row['markings'];
  $birthday=$row['birthday'];
  $sex=$row['sex'];
  

 
        echo'<tbody>
        <tr class="success">';;
    echo"<td>".$ownerid."</td> 
        <td>".$petid."</td>
        <td>".$petname."</td>
        <td>".$species."</td>
        <td>".$breed."</td>
        <td>".$color."</td>
        <td>".$markings."</td>
        <td>".$birthday."</td>
        <td>".$sex."</td>"; 
    echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['pet_id']."';>
            <td ><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
            <td><a href='Patientupdate.php?id=$petid'><button class='btn btn-info' name='btnUpdate' type='button'><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td>
            </a></form></td>";}
  echo' </tr>
      </tbody>
</div>';
  
  
  } else if (isset($_POST['btnSearch'])){
$connect=@mysql_select_db("vet1");
$search=$_POST['search'];
$content=@mysql_query("select * from patient where owner_id like '%".$search."%' or pet_id like '%".$search."%' or pet_name like '%".$search."%' 
  or breed like '%".$search."%' or birthday like '%".$search."%' or species like '%".$search."%' or sex like '%".$search."%' or color like '%".$search."%' or markings like '%".$search."%' and status='active'");
  echo "<br>";
  echo "<br>";
  echo'<div class="container col-xs-12">            
   <table class="table">
     <thead>
      <tr>
        <th>Owner Name</th>
        <th>Pet ID</th>
        <th>Pet Name</th>
        <th>Species</th>
        <th>Breed</th>
        <th>Color</th>
        <th>Markings</th>
        <th>Birthday</th>
        <th>Sex</th>
      </tr>
      </thead>';

if(empty($search))
  { echo "Please input owner id first"; }

else
{
$a=0;
while($row = @mysql_fetch_array($content))
{
  $a=1;
  $ownerid=$row['owner_id'];
  $petid=$row['pet_id'];
  $petname=$row['pet_name'];
  $species=$row['species'];
  $breed=$row['breed'];
  $color=$row['color'];
  $markings=$row['markings'];
  $birthday=$row['birthday'];
  $sex=$row['sex'];
  
    echo'<tbody>
        <tr class="success">';;
    echo" <td>".$ownerid."</td>
        <td><a href='Patientupdate.php?id=$petid'>$petid</a></td>
        <td>".$petname."</td>
        <td>".$species."</td>
        <td>".$breed."</td>
        <td>".$color."</td>
        <td>".$markings."</td>
        <td>".$birthday."</td>
        <td>".$sex."</td>"; }
    echo' </tr>
      </tbody>
</div>';

}
    /*} else if(isset($_POST['btnAdd'])){
    require_once('patient.php');
    if(isset($_POST['btnSave']))
      {
        $ownerid=$_POST['ownerId'];
        $petid=$_POST['petId'];
        $petname=$_POST['petname'];
        $species=$_POST['species'];
        $breed=$_POST['breed'];
        $color=$_POST['color'];
        $markings=$_POST['markings'];
        $birthday=$_POST['datetimepicker2'];
        $sex1=$_POST['optradio'];
        $status='active';
        $sex=' ';
        if ($sex1 == 'on')
          {$sex='F';}
        else
          {$sex='M';}

      if(empty($ownerid) || empty($petid) || empty($petname) || empty($species) || empty($breed) || empty($color) || empty($markings) || empty($birthday) || empty($sex))
        { echo "Please complete required fields"; }
      else
      { mysql_query("insert into patient values(".$ownerid.",".$petid.",'".$petname."','".$species."','".$breed."','".$color."','".$markings."',".$birthday.",'".$sex."','".$status."')");
echo"<br> Record has been added";
}
  
}*/
    
  }
  else {
  $connect=@mysql_select_db("vet1");
  $content=@mysql_query("select owner_id, pet_id, pet_name,species, breed, color, markings, birthday, sex from patient where status='active'");
  $total=@mysql_affected_rows();
  echo "<br>";
  echo "<br>"; 
  echo'<div class="container col-xs-12">           
   <table class="table">
     <thead>
      <tr>
        <th>Owner Name</th>
        <th>Pet ID</th>
        <th>Pet Name</th>
        <th>Species</th>
        <th>Breed</th>
        <th>Color</th>
        <th>Markings</th>
        <th>Birthday</th>
        <th>Sex</th>
      </tr>
      </thead>';
      
  for($x=0;$x<=$total-1;$x++)

  {
  $row=@mysql_fetch_array($content);
  $ownerid=$row['owner_id'];
  $petid=$row['pet_id'];
  $petname=$row['pet_name'];
  $species=$row['species'];
  $breed=$row['breed'];
  $color=$row['color'];
  $markings=$row['markings'];
  $birthday=$row['birthday'];
  $sex=$row['sex'];

 
        echo'<tbody>
        <tr class="success">';;
    echo"<td>".$ownerid."</td> 
        <td>".$petid."</td>
        <td>".$petname."</td>
        <td>".$species."</td>
        <td>".$breed."</td>
        <td>".$color."</td>
        <td>".$markings."</td>
        <td>".$birthday."</td>
        <td>".$sex."</td>"; 
    echo "<td><form method=post>
                        <input name=id type=hidden value='".$row['pet_id']."';>
            <td><button class='btn btn-warning' name='btnDelete' type='submit' onclick='return checkDelete()''><span class='glyphicon glyphicon-trash' name='btnDelete' type='submit'/></td>
            <td><a href='Patientupdate.php?id=$petid'><button class='btn btn-info' name='btnUpdate' type='button'><span class='glyphicon glyphicon-pencil' name='btnUpdate' type='submit'/></td>
            </a></form></td>";}
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
    mysql_query("update patient set status='$status' where pet_id='$id'"); 
    echo '<script type="text/javascript">alert("Record has been deleted")</script>'; 
    }
    }
    }

  if($connect=@mysql_connect("localhost","root")){
    echo"";
  } else {
    die(@mysql_error());
  }

  $connect=@mysql_select_db("vet1");
 					if(isset($_POST['btnSave']))
{

$animal=$_POST['breed'];
$species=$_POST['species'];
$owner=$_POST['owner'];
$petid=$_POST['petId'];
$petname=$_POST['petname'];
$color=$_POST['color'];
$markings=$_POST['markings'];
$sex1=$_POST['optradio'];
$status='active';
        $sex=' ';
        if ($sex1 == 'on')
          {$sex='F';}
        else
          {$sex='M';}


      if(empty($petname) || empty($color) || empty($markings))
        { echo'<br> <script type="text/javascript">alert("Please complete required fields")</script>'; }
      else{
       mysql_query("insert into patient values(".$owner.",".$petid.",'".$petname."','".$species."','".$animal."','".$color."','".$markings."','".$birthday."','".$sex."','".$status."')");
      }
        echo'<br> <script type="text/javascript">alert("Record has been added") </script>';

      }
      ?>


</body>
</html>
<script type="text/javascript">
  $('#datetimepicker2').datepicker({
    toggleActive: true,
    autoclose: true,
    format: 'yyyy-mm-dd'
  });
</script>
