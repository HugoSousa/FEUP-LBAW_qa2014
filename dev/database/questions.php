<?php
  
  function getQuestions($page, $order, $filter_ans, $filter_acc) {
    global $conn;

    $query = "SELECT * FROM
      (SELECT info.id, info.\"contentText\", info.\"contentDate\", info.title, info.user, info.upvotes, info.downvotes, answers.answers, answers.accepted  FROM 
      (
        SELECT \"Content\".\"id\", \"Content\".\"contentText\", \"Content\".\"contentDate\", \"title\",
        (
          SELECT \"User\".\"username\"
          FROM \"User\"
          WHERE \"User\".\"id\" = \"Content\".\"userID\"
        )AS USER,  
        (
          SELECT COUNT(*) 
          FROM \"VoteQuestion\"
          WHERE \"idQuestion\" = \"Content\".\"id\" AND \"VoteQuestion\".\"isUp\" IS TRUE
        ) AS upvotes,
        (
          SELECT COUNT(*) 
          FROM \"VoteQuestion\"
          WHERE \"idQuestion\" = \"Content\".\"id\" AND \"VoteQuestion\".\"isUp\" IS FALSE
        ) AS downvotes
        FROM \"Question\", \"Content\"
        WHERE\"Content\".\"id\" = \"Question\".\"idQuestion\"
      ) as info

      LEFT JOIN

      (
        SELECT q.id,
        CASE WHEN answers.numAnswers IS NULL THEN 0 ELSE answers.numAnswers END AS answers, 
        CASE WHEN answers.accepted IS NULL THEN 0 ELSE answers.accepted END AS accepted

        FROM
        (
          SELECT c.\"id\"
          FROM \"Content\" c, \"Question\" q
          WHERE q.\"idQuestion\" = c.\"id\"
        ) AS q

        LEFT JOIN

        (
          SELECT answers.id, answers.numAnswers, accepted.accepted FROM
          (
            SELECT COUNT(*) as numAnswers, \"Content\".\"id\" AS id
            FROM \"Answer\", \"Content\", \"Question\"
            WHERE \"Content\".\"id\" = \"Question\".\"idQuestion\" AND \"Answer\".\"idQuestion\" = \"Content\".\"id\"
            GROUP BY id
            ORDER BY id
          ) AS answers LEFT JOIN 
          (
            SELECT \"Question\".\"idQuestion\" AS id, 
              COALESCE(sum(CASE WHEN a.\"isAccepted\" THEN 1 ELSE 0 END),0) AS accepted
            FROM \"Question\", \"Answer\" a
            WHERE \"Question\".\"idQuestion\" = a.\"idQuestion\"
            GROUP BY \"Question\".\"idQuestion\"
            ORDER BY \"Question\".\"idQuestion\" DESC
          ) AS accepted ON answers.id = accepted.id 
        ) AS answers

        ON q.id = answers.id
      ) as answers

      ON info.id = answers.id
      ORDER BY \"contentDate\"";

    if($order == 'new')
      $query .= " DESC ";

    $query .=  " OFFSET ?) AS result";

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

    $query .= ' LIMIT 30';

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

  function getNumberOfQuestions($filter_ans, $filter_acc){
    global $conn;

    $query = "SELECT * FROM
              (SELECT q.id,
              CASE WHEN answers.numAnswers IS NULL THEN 0 ELSE answers.numAnswers END AS answers, 
              CASE WHEN answers.accepted IS NULL THEN 0 ELSE answers.accepted END AS accepted

              FROM
              (
                SELECT c.\"id\"
                FROM \"Content\" c, \"Question\" q
                WHERE q.\"idQuestion\" = c.\"id\"
              ) AS q

              LEFT JOIN

              (
                SELECT answers.id, answers.numAnswers, accepted.accepted FROM
                (
                  SELECT COUNT(*) as numAnswers, \"Content\".\"id\" AS id
                  FROM \"Answer\", \"Content\", \"Question\"
                  WHERE \"Content\".\"id\" = \"Question\".\"idQuestion\" AND \"Answer\".\"idQuestion\" = \"Content\".\"id\"
                  GROUP BY id
                  ORDER BY id
                ) AS answers LEFT JOIN 
                (
                  SELECT \"Question\".\"idQuestion\" AS id, 
                    COALESCE(sum(CASE WHEN a.\"isAccepted\" THEN 1 ELSE 0 END),0) AS accepted
                  FROM \"Question\", \"Answer\" a
                  WHERE \"Question\".\"idQuestion\" = a.\"idQuestion\"
                  GROUP BY \"Question\".\"idQuestion\"
                  ORDER BY \"Question\".\"idQuestion\" DESC
                ) AS accepted ON answers.id = accepted.id 
              ) AS answers

              ON q.id = answers.id
              ) as result";

  
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


  function getQuestion($userid, $questionid){

    global $conn;

     $stmt = $conn->prepare("
        SELECT q.\"idQuestion\", c.\"contentText\", c.\"contentDate\", q.\"title\",
        ( 
          SELECT \"username\"
          FROM \"User\"
          WHERE c.\"userID\" = \"User\".\"id\"
        ) AS username,
        SUM(
         CASE
         WHEN v.\"isUp\" 
         THEN 1
         ELSE CASE
              WHEN v.\"isUp\" IS NULL
              THEN 0
              ELSE -1
              END
         END
        ) AS votes,
        ( 
          SELECT
          CASE 
            WHEN COUNT(\"idUser\") = 0
            THEN FALSE
            ELSE TRUE
          END 
          FROM \"VoteQuestion\"
          WHERE \"VoteQuestion\".\"idQuestion\" = q.\"idQuestion\"
          AND \"VoteQuestion\".\"isUp\" IS TRUE
          AND \"idUser\" = ?
        ) AS myvoteup,
        ( 
          SELECT
          CASE 
            WHEN COUNT(\"idUser\") = 0
            THEN FALSE
            ELSE TRUE
          END 
          FROM \"VoteQuestion\"
          WHERE \"VoteQuestion\".\"idQuestion\" = q.\"idQuestion\"
          AND \"VoteQuestion\".\"isUp\" IS FALSE
          AND \"idUser\" = ?
        ) AS myvotedown
        FROM \"VoteQuestion\" v RIGHT JOIN \"Question\" q ON v.\"idQuestion\" = q.\"idQuestion\" JOIN \"Content\" c ON q.\"idQuestion\" = c.\"id\"
        WHERE q.\"idQuestion\" = ?
        GROUP BY q.\"idQuestion\", c.\"contentText\", c.\"contentDate\", username
      ");

    $stmt->execute(array($userid, $userid, $questionid));

    return $stmt->fetch();
  }


  function getQuestionComments($questionid){
    global $conn;

     $stmt = $conn->prepare("
        SELECT \"idComment\", \"contentText\", \"contentDate\", \"userID\",
        (
          SELECT \"username\"
          FROM \"User\"
          WHERE \"User\".\"id\" = \"userID\"
        ) AS username
        FROM \"CommentQuestion\", \"Content\"
        WHERE \"idQuestion\" = ?
        AND \"CommentQuestion\".\"idComment\" = \"Content\".\"id\"
      ");

    $stmt->execute(array($questionid));

    return $stmt->fetchAll();
  }


  function getAnswers($userid, $questionid){
    global $conn;

     $stmt = $conn->prepare("
        SELECT a.\"idAnswer\", c.\"contentText\", c.\"contentDate\", a.\"isAccepted\",
        ( 
          SELECT \"username\"
          FROM \"User\"
          WHERE c.\"userID\" = \"User\".\"id\"
        ) AS username,
        SUM(
         CASE
         WHEN v.\"isUp\" 
         THEN 1
         ELSE CASE
              WHEN v.\"isUp\" IS NULL
              THEN 0
              ELSE -1
              END
         END
        ) AS votes,
        ( 
          SELECT
          CASE 
            WHEN COUNT(\"idUser\") = 0
            THEN FALSE
            ELSE TRUE
          END 
          FROM \"VoteAnswer\"
          WHERE \"VoteAnswer\".\"idAnswer\" = a.\"idAnswer\"
          AND \"VoteAnswer\".\"isUp\" IS TRUE
          AND \"idUser\" = ?
        ) AS myvoteup,
        ( 
          SELECT
          CASE 
            WHEN COUNT(\"idUser\") = 0
            THEN FALSE
            ELSE TRUE
          END 
          FROM \"VoteAnswer\"
          WHERE \"VoteAnswer\".\"idAnswer\" = a.\"idAnswer\"
          AND \"VoteAnswer\".\"isUp\" IS FALSE
          AND \"idUser\" = ?
        ) AS myvotedown
        FROM \"Answer\" a JOIN \"Content\" c ON a.\"idAnswer\" = c.\"id\"  LEFT JOIN \"VoteAnswer\" v ON v.\"idAnswer\" = a.\"idAnswer\"
        WHERE a.\"idQuestion\" = ?
        GROUP BY a.\"idAnswer\", c.\"contentText\", c.\"contentDate\", username
        ORDER BY votes DESC
      ");

    $stmt->execute(array($userid, $userid, $questionid));

    return $stmt->fetchAll();
  }


  function getCommentsAnswer($answerid){
    global $conn;

     $stmt = $conn->prepare("
        SELECT \"idComment\", \"idAnswer\", \"contentText\" AS text, \"contentDate\" AS DATE,
        (
          SELECT \"username\" 
          FROM \"User\"
          WHERE \"Content\".\"userID\" = \"User\".\"id\"
        ) AS USER
        FROM \"CommentAnswer\", \"Content\"
        WHERE \"idAnswer\" = ?
        AND \"CommentAnswer\".\"idComment\" = \"Content\".\"id\"
      ");

    $stmt->execute(array($answerid));

    return $stmt->fetchAll();
  }


  function getTagsQuestion($questionid){
    global $conn;


    $stmt = $conn->prepare("
      SELECT \"TagQuestion\".\"idTag\", \"Tag\".\"name\"
      FROM \"TagQuestion\", \"Question\", \"Tag\"
      WHERE \"TagQuestion\".\"idQuestion\" = \"Question\".\"idQuestion\"
      AND \"Tag\".\"idTag\" = \"TagQuestion\".\"idTag\"
      AND \"Question\".\"idQuestion\" = ?
    ");

    $stmt->execute(array($questionid));

    return $stmt->fetchAll();

  }

   function getTotalQuestions(){
    global $conn;


    $stmt = $conn->prepare("
      SELECT count(*) AS total
      FROM \"Question\" 
      ");

    $stmt->execute();

    return $stmt->fetch();

  }


  function searchQuestions($page, $order, $filter_ans, $filter_acc, $search){
    global $conn;

    $query = "SELECT * FROM
      (SELECT info.id, info.\"contentText\", info.\"contentDate\", info.title, info.user, info.upvotes, info.downvotes, answers.answers, answers.accepted  FROM 
      (
        SELECT \"Content\".\"id\", \"Content\".\"contentText\", \"Content\".\"contentDate\", \"title\",
        (
          SELECT \"User\".\"username\"
          FROM \"User\"
          WHERE \"User\".\"id\" = \"Content\".\"userID\"
        )AS USER,  
        (
          SELECT COUNT(*) 
          FROM \"VoteQuestion\"
          WHERE \"idQuestion\" = \"Content\".\"id\" AND \"VoteQuestion\".\"isUp\" IS TRUE
        ) AS upvotes,
        (
          SELECT COUNT(*) 
          FROM \"VoteQuestion\"
          WHERE \"idQuestion\" = \"Content\".\"id\" AND \"VoteQuestion\".\"isUp\" IS FALSE
        ) AS downvotes
        FROM \"Question\", \"Content\"
        WHERE\"Content\".\"id\" = \"Question\".\"idQuestion\" AND (\"Question\".\"title\" LIKE ? OR \"Content\".\"contentText\" LIKE ?)
      ) as info

      LEFT JOIN

      (
        SELECT q.id,
        CASE WHEN answers.numAnswers IS NULL THEN 0 ELSE answers.numAnswers END AS answers, 
        CASE WHEN answers.accepted IS NULL THEN 0 ELSE answers.accepted END AS accepted

        FROM
        (
          SELECT c.\"id\"
          FROM \"Content\" c, \"Question\" q
          WHERE q.\"idQuestion\" = c.\"id\"
        ) AS q

        LEFT JOIN

        (
          SELECT answers.id, answers.numAnswers, accepted.accepted FROM
          (
            SELECT COUNT(*) as numAnswers, \"Content\".\"id\" AS id
            FROM \"Answer\", \"Content\", \"Question\"
            WHERE \"Content\".\"id\" = \"Question\".\"idQuestion\" AND \"Answer\".\"idQuestion\" = \"Content\".\"id\"
            GROUP BY id
            ORDER BY id
          ) AS answers LEFT JOIN 
          (
            SELECT \"Question\".\"idQuestion\" AS id, 
              COALESCE(sum(CASE WHEN a.\"isAccepted\" THEN 1 ELSE 0 END),0) AS accepted
            FROM \"Question\", \"Answer\" a
            WHERE \"Question\".\"idQuestion\" = a.\"idQuestion\"
            GROUP BY \"Question\".\"idQuestion\"
            ORDER BY \"Question\".\"idQuestion\" DESC
          ) AS accepted ON answers.id = accepted.id 
        ) AS answers

        ON q.id = answers.id
      ) as answers

      ON info.id = answers.id
      ORDER BY \"contentDate\"";

    if($order == 'new')
      $query .= " DESC ";

    $query .=  " OFFSET ?) AS result";

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

    $query .= ' LIMIT 30';
    
     $stmt = $conn->prepare($query);

    $stmt->execute(array('%'.$search.'%', '%'.$search.'%', 30*($page-1)));

    return $stmt->fetchAll();

  }

    function getTotalResultsBySearch($filter_ans, $filter_acc, $search){
    global $conn;

     $query = "SELECT * FROM
                (SELECT info.id, info.\"contentText\", info.\"contentDate\", info.title, info.user, info.upvotes, info.downvotes, answers.answers, answers.accepted  FROM 
                (
                  SELECT \"Content\".\"id\", \"Content\".\"contentText\", \"Content\".\"contentDate\", \"title\",
                  (
                    SELECT \"User\".\"username\"
                    FROM \"User\"
                    WHERE \"User\".\"id\" = \"Content\".\"userID\"
                  )AS USER,  
                  (
                    SELECT COUNT(*) 
                    FROM \"VoteQuestion\"
                    WHERE \"idQuestion\" = \"Content\".\"id\" AND \"VoteQuestion\".\"isUp\" IS TRUE
                  ) AS upvotes,
                  (
                    SELECT COUNT(*) 
                    FROM \"VoteQuestion\"
                    WHERE \"idQuestion\" = \"Content\".\"id\" AND \"VoteQuestion\".\"isUp\" IS FALSE
                  ) AS downvotes
                  FROM \"Question\", \"Content\"
                  WHERE\"Content\".\"id\" = \"Question\".\"idQuestion\" AND (\"Question\".\"title\" LIKE ? OR \"Content\".\"contentText\" LIKE ?)
                ) as info

                LEFT JOIN

                (
                  SELECT q.id,
                  CASE WHEN answers.numAnswers IS NULL THEN 0 ELSE answers.numAnswers END AS answers, 
                  CASE WHEN answers.accepted IS NULL THEN 0 ELSE answers.accepted END AS accepted

                  FROM
                  (
                    SELECT c.\"id\"
                    FROM \"Content\" c, \"Question\" q
                    WHERE q.\"idQuestion\" = c.\"id\"
                  ) AS q

                  LEFT JOIN

                  (
                    SELECT answers.id, answers.numAnswers, accepted.accepted FROM
                    (
                      SELECT COUNT(*) as numAnswers, \"Content\".\"id\" AS id
                      FROM \"Answer\", \"Content\", \"Question\"
                      WHERE \"Content\".\"id\" = \"Question\".\"idQuestion\" AND \"Answer\".\"idQuestion\" = \"Content\".\"id\"
                      GROUP BY id
                      ORDER BY id
                    ) AS answers LEFT JOIN 
                    (
                      SELECT \"Question\".\"idQuestion\" AS id, 
                        COALESCE(sum(CASE WHEN a.\"isAccepted\" THEN 1 ELSE 0 END),0) AS accepted
                      FROM \"Question\", \"Answer\" a
                      WHERE \"Question\".\"idQuestion\" = a.\"idQuestion\"
                      GROUP BY \"Question\".\"idQuestion\"
                      ORDER BY \"Question\".\"idQuestion\" DESC
                    ) AS accepted ON answers.id = accepted.id 
                  ) AS answers

                  ON q.id = answers.id
                ) as answers

                ON info.id = answers.id
              ) as result";

  
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

    $stmt->execute(array('%'.$search.'%', '%'.$search.'%'));

    $count = $stmt->rowCount();

    return $count;

  }


  function createQuestion($title, $body, $userID, $tags){
    global $conn;

    //try{
      $conn->beginTransaction();

      $stmt = $conn->prepare("INSERT INTO \"Content\" VALUES(DEFAULT, ?, DEFAULT, ?, ?) RETURNING \"id\"");
      $stmt->execute(array($body, $userID, QUESTION));
      $id = $stmt->fetchColumn();

      $stmt = $conn->prepare("INSERT INTO \"Question\" VALUES(?, ?)");
      $stmt->execute(array($id, $title));

      //inserir as tags
      for($i=0; $i < count($tags); $i++){
        //echo $tags[$i];
        if(!empty($tags[$i])){
          $stmt = $conn->prepare("INSERT INTO \"TagQuestion\" VALUES(?, (SELECT \"idTag\" FROM \"Tag\" WHERE \"name\" = ?))");
          $stmt->execute(array($id, $tags[$i]));
        }
      }

      $conn->commit();
      return $id;

    /*}catch(PDOException $e){
      echo 'erro';
      echo $e->getMessage();
      $conn->rollBack();
    }
    */
  }

    function getQuestionOfAnswer($idAnswer){
    global $conn;

      $query ="
        SELECT \"idQuestion\"
      FROM \"Answer\" 
      WHERE \"idAnswer\" = ?
      ";

      $stmt = $conn->prepare($query);

      $stmt->execute(array($idAnswer));

      return $stmt->fetch();
  }


  function getQuestionOfCommentQuestion($idComment){
    global $conn;

      $query ="
      SELECT \"idQuestion\"         
      FROM \"CommentQuestion\"     
      WHERE \"idComment\" = ?
      ";

      $stmt = $conn->prepare($query);

      $stmt->execute(array($idComment));

      return $stmt->fetch();

  }


  function getQuestionOfCommentAnswer($idComment){
    global $conn;

      $query ="
      SELECT \"idQuestion\"
      FROM \"Answer\"
      WHERE \"idAnswer\" =
      (
        SELECT \"idAnswer\"
        FROM \"CommentAnswer\" 
        WHERE \"idComment\" = ?
      )
      ";

      $stmt = $conn->prepare($query);

      $stmt->execute(array($idComment));

      return $stmt->fetch();
  }


  function getContent($id){
    global $conn;

    $query = "
      SELECT \"id\", \"contentText\", \"type\"
      FROM \"Content\" 
      WHERE \"id\" = ?
    ";

    $stmt = $conn->prepare($query);

    $stmt->execute(array($id));

    return $stmt->fetch();
  }

  function getQuestionsByTag($idTag, $page){

    global $conn;

    $query = "SELECT * FROM
      (SELECT info.id, info.\"contentText\", info.\"contentDate\", info.title, info.user, info.upvotes, info.downvotes, answers.answers, answers.accepted  FROM 
      (
        SELECT \"Content\".\"id\", \"Content\".\"contentText\", \"Content\".\"contentDate\", \"title\",
        (
          SELECT \"User\".\"username\"
          FROM \"User\"
          WHERE \"User\".\"id\" = \"Content\".\"userID\"
        )AS USER,  
        (
          SELECT COUNT(*) 
          FROM \"VoteQuestion\"
          WHERE \"idQuestion\" = \"Content\".\"id\" AND \"VoteQuestion\".\"isUp\" IS TRUE
        ) AS upvotes,
        (
          SELECT COUNT(*) 
          FROM \"VoteQuestion\"
          WHERE \"idQuestion\" = \"Content\".\"id\" AND \"VoteQuestion\".\"isUp\" IS FALSE
        ) AS downvotes
        FROM \"Question\", \"Content\"
        WHERE\"Content\".\"id\" = \"Question\".\"idQuestion\"
      ) as info

      LEFT JOIN

      (
        SELECT q.id,
        CASE WHEN answers.numAnswers IS NULL THEN 0 ELSE answers.numAnswers END AS answers, 
        CASE WHEN answers.accepted IS NULL THEN 0 ELSE answers.accepted END AS accepted

        FROM
        (
          SELECT c.\"id\"
          FROM \"Content\" c, \"Question\" q
          WHERE q.\"idQuestion\" = c.\"id\"
        ) AS q

        LEFT JOIN

        (
          SELECT answers.id, answers.numAnswers, accepted.accepted FROM
          (
            SELECT COUNT(*) as numAnswers, \"Content\".\"id\" AS id
            FROM \"Answer\", \"Content\", \"Question\"
            WHERE \"Content\".\"id\" = \"Question\".\"idQuestion\" AND \"Answer\".\"idQuestion\" = \"Content\".\"id\"
            GROUP BY id
            ORDER BY id
          ) AS answers LEFT JOIN 
          (
            SELECT \"Question\".\"idQuestion\" AS id, 
              COALESCE(sum(CASE WHEN a.\"isAccepted\" THEN 1 ELSE 0 END),0) AS accepted
            FROM \"Question\", \"Answer\" a
            WHERE \"Question\".\"idQuestion\" = a.\"idQuestion\"
            GROUP BY \"Question\".\"idQuestion\"
            ORDER BY \"Question\".\"idQuestion\" DESC
          ) AS accepted ON answers.id = accepted.id 
        ) AS answers

        ON q.id = answers.id
      ) as answers

      ON info.id = answers.id, \"TagQuestion\"
      WHERE \"TagQuestion\".\"idTag\" = ? AND \"TagQuestion\".\"idQuestion\" = info.id
      ORDER BY \"contentDate\"";

    $query .=  " OFFSET ?) AS result";

    $query .= ' LIMIT 30';
    
    $stmt = $conn->prepare($query);

    $stmt->execute(array($idTag, 30*($page-1)));

    return $stmt->fetchAll();

  }

  function getTotalQuestionsByTag($idTag){

    global $conn;

    $query = "SELECT * FROM
      (SELECT info.id, info.\"contentText\", info.\"contentDate\", info.title, info.user, info.upvotes, info.downvotes, answers.answers, answers.accepted  FROM 
      (
        SELECT \"Content\".\"id\", \"Content\".\"contentText\", \"Content\".\"contentDate\", \"title\",
        (
          SELECT \"User\".\"username\"
          FROM \"User\"
          WHERE \"User\".\"id\" = \"Content\".\"userID\"
        )AS USER,  
        (
          SELECT COUNT(*) 
          FROM \"VoteQuestion\"
          WHERE \"idQuestion\" = \"Content\".\"id\" AND \"VoteQuestion\".\"isUp\" IS TRUE
        ) AS upvotes,
        (
          SELECT COUNT(*) 
          FROM \"VoteQuestion\"
          WHERE \"idQuestion\" = \"Content\".\"id\" AND \"VoteQuestion\".\"isUp\" IS FALSE
        ) AS downvotes
        FROM \"Question\", \"Content\"
        WHERE\"Content\".\"id\" = \"Question\".\"idQuestion\"
      ) as info

      LEFT JOIN

      (
        SELECT q.id,
        CASE WHEN answers.numAnswers IS NULL THEN 0 ELSE answers.numAnswers END AS answers, 
        CASE WHEN answers.accepted IS NULL THEN 0 ELSE answers.accepted END AS accepted

        FROM
        (
          SELECT c.\"id\"
          FROM \"Content\" c, \"Question\" q
          WHERE q.\"idQuestion\" = c.\"id\"
        ) AS q

        LEFT JOIN

        (
          SELECT answers.id, answers.numAnswers, accepted.accepted FROM
          (
            SELECT COUNT(*) as numAnswers, \"Content\".\"id\" AS id
            FROM \"Answer\", \"Content\", \"Question\"
            WHERE \"Content\".\"id\" = \"Question\".\"idQuestion\" AND \"Answer\".\"idQuestion\" = \"Content\".\"id\"
            GROUP BY id
            ORDER BY id
          ) AS answers LEFT JOIN 
          (
            SELECT \"Question\".\"idQuestion\" AS id, 
              COALESCE(sum(CASE WHEN a.\"isAccepted\" THEN 1 ELSE 0 END),0) AS accepted
            FROM \"Question\", \"Answer\" a
            WHERE \"Question\".\"idQuestion\" = a.\"idQuestion\"
            GROUP BY \"Question\".\"idQuestion\"
            ORDER BY \"Question\".\"idQuestion\" DESC
          ) AS accepted ON answers.id = accepted.id 
        ) AS answers

        ON q.id = answers.id
      ) as answers

      ON info.id = answers.id, \"TagQuestion\"
      WHERE \"TagQuestion\".\"idTag\" = ? AND \"TagQuestion\".\"idQuestion\" = info.id
      ORDER BY \"contentDate\" DESC";

    $query .=  ") AS result";
    
    $stmt = $conn->prepare($query);

    $stmt->execute(array($idTag));

    $count = $stmt->rowCount();

    return $count;


  }

?>