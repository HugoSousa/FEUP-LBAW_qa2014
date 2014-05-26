<?php
	function getNotifications($userid){
		global $conn;

    	$query ="
			SELECT *,
			(SELECT username
			FROM \"User\", \"Content\"
			WHERE \"Content\".\"userID\" = \"User\".\"id\"
			AND \"Content\".\"id\" = \"idContent\") AS username
			FROM \"Notification\"
			WHERE \"idUser\" = ? 
			AND \"isSeen\" IS FALSE
			ORDER BY \"notificationDate\" DESC
    	";

    	$stmt = $conn->prepare($query);

	    $stmt->execute(array($userid));

	    return $stmt->fetchAll();
	}



	function seeNotification($notificationid){
		global $conn;

    	$query ="
			UPDATE \"Notification\" SET \"isSeen\" = TRUE WHERE \"idNotification\" = ?
    	";

    	$stmt = $conn->prepare($query);

	    $stmt->execute(array($notificationid));

	    return $stmt->fetchAll();
	}

?>