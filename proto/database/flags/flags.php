<?php
	function getFlags($page, $order){
		global $conn;

    	$query ="
    		SELECT COUNT(*) AS flags, \"idContent\",
			( 
			  SELECT \"type\"
			  FROM \"Content\"
			  WHERE \"Content\".\"id\" = \"idContent\"
			) AS type, 
			(
			  SELECT \"contentText\"
			  FROM \"Content\"
			  WHERE \"Content\".\"id\" = \"idContent\"
			) AS text, 
			MAX(\"flagDate\") AS date
			FROM \"Flag\"
			GROUP BY \"idContent\"
    	";

    	if($order == 'flags_more')
    		$query .= "ORDER BY flags DESC";
    	else if($order == 'flags_less')
    		$query .= "ORDER BY flags";
    	else if($order == 'date_new')
    		$query .= "ORDER BY date DESC";
    	else if($order == 'date_old')
    		$query .= "ORDER BY date";

    	$query .=  " LIMIT 30 OFFSET ?";

    	$stmt = $conn->prepare($query);

	    $stmt->execute(array(30*($page-1)));

	    return $stmt->fetchAll();
	}


	function getTotalFlags(){
		global $conn;

    	$query ="
    		SELECT COUNT(*) AS total
    		FROM \"Flag\"
    	";

    	$stmt = $conn->prepare($query);

	    $stmt->execute(array());

	    return $stmt->fetch();
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


	function getReports($id, $page){
		global $conn;

		$query = "
			SELECT \"idContent\", \"reason\", \"flagDate\", 
			(
			  SELECT \"username\"
			  FROM \"User\"
			  WHERE \"User\".\"id\" = \"Flag\".\"idUser\"
			) AS username
			FROM \"Flag\" 
			WHERE \"idContent\" = ?
			LIMIT 10 OFFSET ?
		";

		$stmt = $conn->prepare($query);

	    $stmt->execute(array($id, 30*($page-1)));

	    return $stmt->fetchAll();
	}


	function getTotalReports($id){
		global $conn;

		$query = "
			SELECT COUNT(*) AS total
			FROM \"Flag\" 
			WHERE \"idContent\" = ?
		";

		$stmt = $conn->prepare($query);

	    $stmt->execute(array($id));

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


	function deleteFlag($id){
		global $conn;

		$query = "
			DELETE FROM \"Flag\"
			WHERE \"idContent\" = ?
		";

		$stmt = $conn->prepare($query);

	    $stmt->execute(array($id));
	}
?>