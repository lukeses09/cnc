<?php
    include('../master/connect.php');

  $id = $_POST['id'];

  $sql = "SELECT * FROM species WHERE species_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['species_name']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    