<?php
    include('../master/connect.php');

  $id = $_POST['id'];

  $sql = "SELECT * FROM generic WHERE generic_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['generic_name']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    