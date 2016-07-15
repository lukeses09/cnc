<?php
    include('../master/connect.php');


  $sql = "SELECT p.pet_id as id, p.pet_name as name,b.breed_name as breed,s.species_name as species,
  p.color as color,p.markings as markings,p.birthdate as birthdate, TIMESTAMPDIFF(YEAR, p.birthdate , CURDATE()) as age,
  p.sex as sex
  FROM patient p, breed1 b, species s 
  WHERE p.breed = b.breed_id 
  AND (b.species_id = s.species_id) 
  AND (p.status = 'active') 
  GROUP BY p.pet_id";
  $q = $conn->prepare($sql);
  $q -> execute();
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['id'],$fetch['name'],
    	$fetch['breed'],$fetch['species'],$fetch['color'],$fetch['markings'],$fetch['birthdate'],
      $fetch['age'],$fetch['sex']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    