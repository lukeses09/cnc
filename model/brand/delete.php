<?php
    include('../master/connect.php');

$id = $_POST['id'];

  $sql = "UPDATE brand SET brand_status = 'inactive' WHERE brand_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
     
$conn = null;             

echo json_encode($output);
?>    