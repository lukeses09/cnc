<?php
    include('../master/connect.php');

  $id = $_POST['id'];

  $sql = "SELECT * FROM units WHERE unit_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['unit_name'],$fetch['unit_abbreviation'],$fetch['unit_type']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    