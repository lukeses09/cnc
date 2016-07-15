<?php
    include('../master/connect.php');


  $sql = "SELECT m.medicine_id as id, m.medicine_name as medicine_name, c.cat_name as category_name, 
  pk.pack_name as pack_name, d.dosage_name as dosage_name, b.brand_name as brand_name, g.generic_name as generic_name,
  m.content, u.unit_abbreviation as uom, m.price, m.description, m.status 
  FROM medicines m, category c, packaging pk, dosage d, brand b, generic g, units u 
  WHERE (m.category = c.cat_id) 
  AND (m.packaging = pk.pack_id) 
  AND (m.dosage = d.dosage_id) 
  AND (m.brand = b.brand_id) 
  AND (b.brand_generic_id = g.generic_id) 
  AND (m.unit = u.unit_id) 
  AND (m.status = 'active') 
  GROUP BY m.medicine_id";

  $q = $conn->prepare($sql);
  $q -> execute();
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['id'],$fetch['medicine_name'],$fetch['category_name'],$fetch['pack_name'],
    	$fetch['dosage_name'],$fetch['brand_name'],$fetch['generic_name'],$fetch['content']."".$fetch['uom'],
      $fetch['price'],$fetch['description']);				 	
  }         
$conn = null;             

echo json_encode($output);
?>    