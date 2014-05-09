<?php

function getTags($order, $page){
    global $conn;

    $offset = ($page-1) * 30;

    if($order == 'name')
      $query = "SELECT COUNT(*) AS total, \"TagQuestion\".\"idTag\",
              (
                SELECT \"name\" 
                FROM \"Tag\"
                WHERE \"Tag\".\"idTag\" = \"TagQuestion\".\"idTag\"
              ) AS name
              FROM \"TagQuestion\"
              GROUP BY \"idTag\"
              ORDER BY name
              LIMIT 30 OFFSET ?";

   else if($order == 'number_tags')
       $query = "SELECT COUNT(*) AS total, \"TagQuestion\".\"idTag\",
              (
                SELECT \"name\" 
                FROM \"Tag\"
                WHERE \"Tag\".\"idTag\" = \"TagQuestion\".\"idTag\"
              ) AS name
              FROM \"TagQuestion\"
              GROUP BY \"idTag\"
              ORDER BY total DESC
              LIMIT 30 OFFSET ?";
     $stmt = $conn->prepare($query);

    $stmt->execute(array($offset));

    return $stmt->fetchAll();
  }

 function getTotalTags(){
    global $conn;

    $stmt = $conn->prepare("SELECT COUNT(*) FROM \"Tag\" ");

    $stmt->execute(array());

    return $stmt->fetch();
  }

  function getTagsBySearch($order, $page, $search){
    global $conn;

    $offset = ($page-1) * 30;

   if($order == 'name')
      $query = "SELECT COUNT(*) AS total, \"TagQuestion\".\"idTag\",
              (
                SELECT \"name\" 
                FROM \"Tag\"
                WHERE \"Tag\".\"idTag\" = \"TagQuestion\".\"idTag\"
              ) AS name
              FROM \"TagQuestion\"
       		WHERE (
                SELECT \"name\" 
                FROM \"Tag\"
                WHERE \"Tag\".\"idTag\" = \"TagQuestion\".\"idTag\"
              )LIKE ?
              GROUP BY \"idTag\"
              ORDER BY name
              LIMIT 30 OFFSET ?";
   else if($order == 'number_tags')
      $query =  "SELECT COUNT(*) AS total, \"TagQuestion\".\"idTag\",
              (
                SELECT \"name\" 
                FROM \"Tag\"
                WHERE \"Tag\".\"idTag\" = \"TagQuestion\".\"idTag\"
              ) AS name
              FROM \"TagQuestion\"
       		WHERE (
                SELECT \"name\" 
                FROM \"Tag\"
                WHERE \"Tag\".\"idTag\" = \"TagQuestion\".\"idTag\"
              )LIKE ?
		GROUP BY \"TagQuestion\".\"idTag\"
 
              LIMIT 30 OFFSET ?";


    $stmt = $conn->prepare($query);

    $stmt->execute(array('%'.$search.'%', $offset));
	
	

    return $stmt->fetchAll();
  }

  function getTotalTagsBySearch($search){

    global $conn;

      $query = "SELECT COUNT(*) FROM \"Tag\" WHERE \"name\" LIKE ?";

    $stmt = $conn->prepare($query);

    $stmt->execute(array('%'.$search.'%'));
  }

?>