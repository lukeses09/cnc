<?php
    include('../master/connect.php');


  $sql = "SELECT * FROM units WHERE unit_status = 'active'";
  $q = $conn->prepare($sql);
  $q -> execute();
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['unit_id'],$fetch['unit_name'],$fetch['unit_abbreviation'],
    	$fetch['unit_type']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    