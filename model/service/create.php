<?php
    include('../master/connect.php');

$unit_name = trim($_POST['unit_name']);
$abbreviation = trim($_POST['abbreviation']);
$unit_type = trim($_POST['unit_type']);

$id = uniqid('U');

  $sql = "INSERT INTO units values(?,?,?,?,?)";
  $q = $conn->prepare($sql);
  $q -> execute(array($id,$unit_name,$abbreviation,$unit_type,'active'));
     

$conn = null;             

echo json_encode($output);
?>    