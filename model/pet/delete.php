<?php
    include('../master/connect.php');

$id = $_POST['id'];

  $sql = "UPDATE patient SET status = 'inactive' WHERE pet_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
     
$conn = null;             

echo json_encode($output);
?>    