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
              ) AS name,
              (
                SELECT \"description\" 
                FROM \"Tag\"
                WHERE \"Tag\".\"idTag\" = \"TagQuestion\".\"idTag\"
              ) AS description
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
              ) AS name,
              (
                SELECT \"description\" 
                FROM \"Tag\"
                WHERE \"Tag\".\"idTag\" = \"TagQuestion\".\"idTag\"
              ) AS description
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

    $stmt = $conn->prepare("SELECT * FROM \"Tag\" ");

    $stmt->execute(array());

    $stmt->fetch();

    $count = $stmt->rowCount();

    return $count;
  }

  function getTagsBySearch($order, $page, $search){
    global $conn;

    $offset = ($page-1) * 30;

   if($order == 'name')
      $query = "SELECT COUNT(\"TagQuestion\".\"idQuestion\") AS total,
                \"Tag\".\"idTag\", name, \"Tag\".description
                FROM \"Tag\", \"TagQuestion\" 
                WHERE \"name\" LIKE ?
                AND \"Tag\".\"idTag\" = \"TagQuestion\".\"idTag\"
                GROUP BY \"Tag\".\"idTag\"
                ORDER BY name
                LIMIT 30 OFFSET ?";
   else if($order == 'number_tags')
      $query =  "SELECT COUNT(\"TagQuestion\".\"idQuestion\") AS total,
                \"Tag\".\"idTag\", name, \"Tag\".description 
                FROM \"Tag\", \"TagQuestion\" 
                WHERE \"name\" LIKE ?
                AND \"Tag\".\"idTag\" = \"TagQuestion\".\"idTag\"
                GROUP BY \"Tag\".\"idTag\"
                ORDER BY total
                LIMIT 30 OFFSET ?";


    $stmt = $conn->prepare($query);

    $stmt->execute(array('%'.$search.'%', $offset));

    return $stmt->fetchAll();
  }

  function getTotalTagsBySearch($search){

    global $conn;

      $query = "SELECT * FROM \"Tag\" WHERE \"name\" LIKE ?";

    $stmt = $conn->prepare($query);

    $stmt->execute(array('%'.$search.'%'));

    $stmt->fetch();

    $count = $stmt->rowCount();

    return $count;
  }

  function getNotAcceptedTags(){

    global $conn;

    $stmt = $conn->prepare("SELECT * FROM \"Tag\" WHERE \"isAccepted\" = False");

    $stmt->execute(array());

    return $stmt->fetchAll();

  }

?>