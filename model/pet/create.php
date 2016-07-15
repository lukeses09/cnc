<?php
    include('../master/connect.php');

$pet_name = trim($_POST['pet_name']);
$breed = trim($_POST['breed']);
$color = trim($_POST['color']);
$markings = trim($_POST['markings']);
$birthdate = $_POST['birthdate'];
$sex = trim($_POST['sex']);

$id = uniqid('PT');

  $sql = "INSERT INTO patient values(?,?,?,?,?,?,?,?,?)";
  $q = $conn->prepare($sql);
  $q -> execute(array(null,$id,$pet_name,$breed,$color,$markings,$birthdate,$sex,'active'));
     

$conn = null;             

echo json_encode($output);
?>    