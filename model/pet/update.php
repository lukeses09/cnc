<?php
    include('../master/connect.php');

$id = $_POST['id'];
$pet_name = trim($_POST['pet_name']);
$breed = trim($_POST['breed']);
$color = trim($_POST['color']);
$markings = trim($_POST['markings']);
$birthdate = $_POST['birthdate'];
$sex = trim($_POST['sex']);


  $sql = "UPDATE patient SET pet_name=?, breed=?, color=?, markings=?, birthdate=?, sex=? WHERE pet_id=?";
  $q = $conn->prepare($sql);
  $q -> execute(array($pet_name,$breed,$color,$markings,$birthdate,$sex,$id));
     
$conn = null;             

echo json_encode($output);
?>    