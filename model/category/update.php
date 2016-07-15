<?php
    include('../master/connect.php');

$id = $_POST['id'];
$category = trim($_POST['category']);


  $sql = "UPDATE category SET cat_name=? where cat_id=?";
  $q = $conn->prepare($sql);
  $q -> execute(array($category, $id));
     
$conn = null;             

echo json_encode($output);
?>    