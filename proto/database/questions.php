<?php
  
  function getQuestions($page, $order, $filter_ans, $filter_acc) {
    global $conn;

    $query = "SELECT * FROM
      (SELECT \"Content\".\"id\" AS \"id\", \"Content\".\"contentText\" AS \"contentText\", \"Content\".\"contentDate\" AS \"contentDate\", \"title\" AS \"title\",
      (
          SELECT \"User\".\"username\"
          FROM \"User\"
          WHERE \"User\".\"id\" = \"Content\".\"userID\"
      )AS \"user\",  
      (
          SELECT COUNT(*) 
          FROM \"VoteQuestion\"
          WHERE \"idQuestion\" = \"Content\".\"id\" AND \"VoteQuestion\".\"isUp\" IS TRUE
      ) AS \"upvotes\",
      (
          SELECT COUNT(*) 
          FROM \"VoteQuestion\"
          WHERE \"idQuestion\" = \"Content\".\"id\" AND \"VoteQuestion\".\"isUp\" IS FALSE
      ) AS \"downvotes\",
      (
          SELECT COUNT(*)
          FROM \"Answer\"
          WHERE \"Answer\".\"idQuestion\" = \"Content\".\"id\"
      ) AS \"answers\",
      (
          SELECT COALESCE(SUM(CASE WHEN \"isAccepted\" THEN 1 ELSE 0 END),0) 
          AS accepted 
          FROM \"Answer\" 
          WHERE \"Answer\".\"idQuestion\" = \"Content\".\"id\"
      ) AS \"accepted\"
      FROM \"Question\", \"Content\"
      WHERE\"Content\".\"id\" = \"Question\".\"idQuestion\"
      ORDER BY \"contentDate\"";

    if($order == 'new')
      $query .= " DESC ";

    $query .=  "LIMIT 30 OFFSET ?) AS result";

    if($filter_ans == 'y'){
      $query .= " GROUP BY result.\"id\", result.\"contentText\", result.\"contentDate\", result.\"title\", result.\"user\", result.\"upvotes\", result.\"downvotes\", result.\"answers\", result.\"accepted\"
                HAVING answers > 0";
      
      if($filter_acc == 'y')
        $query .= " AND accepted = 1";
      else if($filter_acc == 'n')
        $query .= " AND accepted = 0";
    }
    else if($filter_ans == 'n'){
      $query .= " GROUP BY result.\"id\", result.\"contentText\", result.\"contentDate\", result.\"title\", result.\"user\", result.\"upvotes\", result.\"downvotes\", result.\"answers\", result.\"accepted\"
                HAVING answers = 0";
    }
    else{
      if($filter_acc == 'y')
        $query .= " GROUP BY result.\"id\", result.\"contentText\", result.\"contentDate\", result.\"title\", result.\"user\", result.\"upvotes\", result.\"downvotes\", result.\"answers\", result.\"accepted\"
                HAVING accepted = 1";
      else if($filter_acc == 'n')
        $query .= " GROUP BY result.\"id\", result.\"contentText\", result.\"contentDate\", result.\"title\", result.\"user\", result.\"upvotes\", result.\"downvotes\", result.\"answers\", result.\"accepted\"
                HAVING accepted = 0";
    }

    $stmt = $conn->prepare($query);

    $stmt->execute(array(30*($page-1)));

    return $stmt->fetchAll();
  }


  function getTotalResults($filter_ans, $filter_acc){
  	global $conn;

    $query = "SELECT * FROM
      (SELECT \"Content\".\"id\", 
      (
          SELECT COUNT(*)
          FROM \"Answer\"
          WHERE \"Answer\".\"idQuestion\" = \"Content\".\"id\"
      ) AS \"answers\",
      (
          SELECT COALESCE(SUM(CASE WHEN \"isAccepted\" THEN 1 ELSE 0 END),0) 
          AS accepted 
          FROM \"Answer\" 
          WHERE \"Answer\".\"idQuestion\" = \"Content\".\"id\"
      ) AS \"accepted\"
      FROM \"Question\", \"Content\"
      WHERE\"Content\".\"id\" = \"Question\".\"idQuestion\") AS result";

  
  if($filter_ans == 'y'){
      $query .= " GROUP BY result.\"id\", result.\"answers\", result.\"accepted\"
                HAVING answers > 0";
      
      if($filter_acc == 'y')
        $query .= " AND accepted = 1";
      else if($filter_acc == 'n')
        $query .= " AND accepted = 0";
    }
    else if($filter_ans == 'n'){
      $query .= " GROUP BY result.\"id\", result.\"answers\", result.\"accepted\"
                HAVING answers = 0";
    }
    else{
      if($filter_acc == 'y')
        $query .= " GROUP BY result.\"id\", result.\"answers\", result.\"accepted\"
                HAVING accepted = 1";
      else if($filter_acc == 'n')
        $query .= " GROUP BY result.\"id\", result.\"answers\", result.\"accepted\"
                HAVING accepted = 0";
    }

    $stmt = $conn->prepare($query);

    $stmt->execute();

    $count = $stmt->rowCount();

    return $count;

  }

?>