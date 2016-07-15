<?php
    include('../master/connect.php');


  $sql = "SELECT * FROM pets";
  $q = $conn->prepare($sql);
  $q -> execute();
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['pet_id'],
    	$fetch['pet_name'],$fetch['pet_breed'],
    	$fetch['pet_status']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    