<?php
    include('../master/connect.php');

$id = $_POST['id'];

  $sql = "UPDATE cage SET status = 'inactive' WHERE cage_id = ?";
  $q = $conn->prepare($sql);
  $q -> execute(array($id));
     
$conn = null;             

echo json_encode($output);
?>    