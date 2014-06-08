<?php

function getTags($order, $page){
    global $conn;

    $offset = ($page-1) * 30;

    if($order == 'name')
      $query = "SELECT COUNT(\"TagQuestion\".\"idTag\") AS total , \"Tag\".\"name\", \"Tag\".\"idTag\", \"Tag\".\"description\"
                FROM \"Tag\" 
                LEFT JOIN \"TagQuestion\" 
                ON (\"Tag\".\"idTag\" = \"TagQuestion\".\"idTag\")
                WHERE \"Tag\".\"isAccepted\" = TRUE
                GROUP BY \"Tag\".\"name\", \"Tag\".\"idTag\"
                ORDER BY name
                LIMIT 30 OFFSET ?";

   else if($order == 'number_tags')
       $query = "SELECT COUNT(\"TagQuestion\".\"idTag\") AS total , \"Tag\".\"name\", \"Tag\".\"idTag\", \"Tag\".\"description\"
                FROM \"Tag\" 
                LEFT JOIN \"TagQuestion\" 
                ON (\"Tag\".\"idTag\" = \"TagQuestion\".\"idTag\")
                WHERE \"Tag\".\"isAccepted\" = TRUE
                GROUP BY \"Tag\".\"name\", \"Tag\".\"idTag\"
                ORDER BY total DESC
                LIMIT 30 OFFSET ?";
     $stmt = $conn->prepare($query);

    $stmt->execute(array($offset));

    return $stmt->fetchAll();
  }

 function getTotalTags(){
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM \"Tag\" WHERE \"Tag\".\"isAccepted\" = TRUE ");

    $stmt->execute(array());

    $count = $stmt->rowCount();

    return $count;
  }

  function getTagsBySearch($order, $page, $search){
    global $conn;

    $offset = ($page-1) * 30;

   if($order == 'name')
      $query = "SELECT COUNT(\"TagQuestion\".\"idTag\") AS total , \"Tag\".\"name\", \"Tag\".\"idTag\", \"Tag\".\"description\"
                FROM \"Tag\" 
                LEFT JOIN \"TagQuestion\" 
                ON (\"Tag\".\"idTag\" = \"TagQuestion\".\"idTag\")
                WHERE \"name\" LIKE ? AND \"Tag\".\"isAccepted\" = TRUE
                GROUP BY \"Tag\".\"name\", \"Tag\".\"idTag\"
                ORDER BY name
                LIMIT 30 OFFSET ?";
   else if($order == 'number_tags')
      $query =  "SELECT COUNT(\"TagQuestion\".\"idTag\") AS total , \"Tag\".\"name\", \"Tag\".\"idTag\", \"Tag\".\"description\"
                FROM \"Tag\" 
                LEFT JOIN \"TagQuestion\" 
                ON (\"Tag\".\"idTag\" = \"TagQuestion\".\"idTag\")
                WHERE \"name\" LIKE ? AND \"Tag\".\"isAccepted\" = TRUE
                GROUP BY \"Tag\".\"name\", \"Tag\".\"idTag\"
                ORDER BY total
                LIMIT 30 OFFSET ?";


    $stmt = $conn->prepare($query);

    $stmt->execute(array('%'.$search.'%', $offset));

    return $stmt->fetchAll();
  }

  function getTagsOnlyBySearch($search){
    global $conn;

    $offset = ($page-1) * 30;

    $query = "SELECT COUNT(\"TagQuestion\".\"idTag\") AS total , \"Tag\".\"name\", \"Tag\".\"idTag\", \"Tag\".\"description\"
                FROM \"Tag\" 
                LEFT JOIN \"TagQuestion\" 
                ON (\"Tag\".\"idTag\" = \"TagQuestion\".\"idTag\")
                WHERE \"name\" LIKE ? AND \"Tag\".\"isAccepted\" = TRUE
                GROUP BY \"Tag\".\"name\", \"Tag\".\"idTag\"";

    $stmt = $conn->prepare($query);

    $stmt->execute(array('%'.$search.'%'));

    return $stmt->fetchAll();
  }


  function getTotalTagsBySearch($search){

    global $conn;

      $query = "SELECT * FROM \"Tag\" WHERE \"name\" LIKE ? AND \"Tag\".\"isAccepted\" = TRUE";

    $stmt = $conn->prepare($query);

    $stmt->execute(array('%'.$search.'%'));

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