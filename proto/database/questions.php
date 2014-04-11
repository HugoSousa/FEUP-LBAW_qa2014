<?php
  
  function getQuestions($page) {
    global $conn;
    $stmt = $conn->prepare("
    	SELECT \"Content\".\"id\", \"Content\".\"contentText\", \"Content\".\"contentDate\", \"title\",
		(
  			SELECT \"User\".\"username\"
  			FROM \"User\"
  			WHERE \"User\".\"id\" = \"Content\".\"userID\"
		)as user,  
		(
  			SELECT COUNT(*) 
  			FROM \"VoteQuestion\"
  			WHERE \"idQuestion\" = \"Content\".\"id\" AND \"VoteQuestion\".\"isUp\" IS TRUE
		) as upvotes,
		(
  			SELECT COUNT(*) 
  			FROM \"VoteQuestion\"
  			WHERE \"idQuestion\" = \"Content\".\"id\" AND \"VoteQuestion\".\"isUp\" IS FALSE
		) as downvotes,
		(
  			SELECT COUNT(*)
  			FROM \"Answer\"
  			WHERE \"Answer\".\"idQuestion\" = \"Content\".\"id\"
		) as answers,
		(
  			SELECT COALESCE(sum(CASE WHEN \"isAccepted\" THEN 1 ELSE 0 END),0) 
  			as accepted 
  			FROM \"Answer\" 
  			WHERE \"Answer\".\"idQuestion\" = \"Content\".\"id\"
		) as accepted
		FROM \"Question\", \"Content\"
		WHERE \"Content\".\"id\" = \"Question\".\"idQuestion\"
		ORDER BY \"contentDate\"
		LIMIT 30 OFFSET ?");

    $stmt->execute(array(30*($page-1)));

    return $stmt->fetchAll();
  }

  function getTotalQuestions(){
  	global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) FROM \"Question\"");

    $stmt->execute();
    return $stmt->fetch();

  }

?>