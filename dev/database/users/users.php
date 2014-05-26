<?php
  
  function createUser($email, $login, $password, $username) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO \"User\" VALUES (DEFAULT, NULL, ?, NULL, ?, ?, NULL, DEFAULT, ?, DEFAULT, DEFAULT, DEFAULT)");
    $stmt->execute(array($email, $login, hash("sha256", $password), $username));
  }


  function isLoginCorrect($login, $password) {
    global $conn;
    $stmt = $conn->prepare("SELECT * 
                            FROM \"User\"
                            WHERE login = ? AND password = ?");

    $stmt->execute(array($login, hash("sha256", $password)));
    
    return $stmt->fetch() == true;
  }

  function getUserInfoByLogin($login){
    global $conn;
    $stmt = $conn->prepare("SELECT id, username, reputation, permission
                            FROM \"User\"
                            WHERE login = ?");

    $stmt->execute(array($login));
    
    $result = $stmt->fetch();

    return $result;
  }


  function getUserInfoByUsername($username){
    global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM \"User\"
                            WHERE username = ?");

    $stmt->execute(array($username));
    
    $result = $stmt->fetch();

    return $result;
  }


  function getTopQuestionsUser($userid){
    global $conn;
    $stmt = $conn->prepare("
      WITH myQ AS
      (
        SELECT q.\"idQuestion\", q.\"title\"
        FROM \"User\" u, \"Content\" c, \"Question\" q
        WHERE c.\"id\" = q.\"idQuestion\" AND u.\"id\" = ? AND c.\"userID\"= ?
      )
      SELECT myQ.\"idQuestion\", myQ.\"title\",
      SUM(
        CASE
              WHEN v.\"isUp\" IS NULL
              THEN 0
        WHEN v.\"isUp\"
        THEN 1
        ELSE -1
        END
      ) AS total
      FROM \"VoteQuestion\" v RIGHT OUTER JOIN myQ ON v.\"idQuestion\" = myQ.\"idQuestion\"
      GROUP BY myQ.\"title\", myQ.\"idQuestion\"
      ORDER BY total DESC
      LIMIT 5
    ");

    $stmt->execute(array($userid, $userid));
    
    return $stmt->fetchAll();

  }


  function getTopAnswersUser($userid){
    global $conn;
    $stmt = $conn->prepare("
      WITH myA AS
      (
        SELECT a.\"idAnswer\", q.\"idQuestion\", q.\"title\", c.\"contentText\"
        FROM \"User\" u, \"Content\" c, \"Question\" q, \"Answer\" a
        WHERE c.\"id\" = a.\"idAnswer\" AND a.\"idQuestion\" = q.\"idQuestion\" AND u.\"id\" = ? AND c.\"userID\"= ? 
      )
      SELECT myA.\"idAnswer\", myA.\"idQuestion\", myA.\"title\", myA.\"contentText\", SUM
      (
        CASE
        WHEN v.\"isUp\" IS NULL
        THEN 0
        WHEN v.\"isUp\"
        THEN 1
        ELSE -1
        END
      )AS total
      FROM \"VoteAnswer\" v RIGHT OUTER JOIN myA ON v.\"idAnswer\" = myA.\"idAnswer\"
      GROUP BY myA.\"idAnswer\", myA.\"title\", myA.\"idQuestion\", myA.\"contentText\"
      ORDER BY total DESC
      LIMIT 5
    ");

    $stmt->execute(array($userid, $userid));
    
    return $stmt->fetchAll();

  }


  function editUser($username, $field, $value){
    global $conn;

    if($field == 'realname')
      $query = "UPDATE \"User\" SET \"realName\" = ? WHERE \"username\" = ?";
    else if($field == 'location')
      $query = "UPDATE \"User\" SET \"realName\" = ? WHERE \"username\" = ?";
    else if($field == 'biography')
      $query = "UPDATE \"User\" SET \"biography\" = ? WHERE \"username\" = ?";


    $stmt = $conn->prepare($query);

    return $stmt->execute(array($value, $username));
    
  }
  


  function getUsers($order, $page){
    global $conn;

    $offset = ($page-1) * 30;

    if($order == 'username')
      $query = "SELECT \"username\", \"registry\", \"reputation\" FROM \"User\" ORDER BY \"username\" LIMIT 30 OFFSET ?";
    else if($order == 'reputation')
      $query = "SELECT \"username\", \"registry\", \"reputation\" FROM \"User\" ORDER BY \"reputation\" DESC LIMIT 30 OFFSET ?";
    else if($order == 'registry')
      $query = "SELECT \"username\", \"registry\", \"reputation\" FROM \"User\" ORDER BY \"registry\" LIMIT 30 OFFSET ?";

    $stmt = $conn->prepare($query);

    $stmt->execute(array($offset));

    return $stmt->fetchAll();
  }


  function getTotalUsers(){
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM \"User\"");

    $stmt->execute(array());

    $stmt->fetch();

    $count = $stmt->rowCount();

    return $count;
  }


  function getUsersBySearch($order, $page, $search){
    global $conn;

    $offset = ($page-1) * 30;

    if($order == 'username')
      $query = "SELECT \"username\", \"registry\", \"reputation\" FROM \"User\" WHERE \"username\" LIKE ? ORDER BY \"username\" LIMIT 30 OFFSET ?";
    else if($order == 'reputation')
      $query = "SELECT \"username\", \"registry\", \"reputation\" FROM \"User\" WHERE \"username\" LIKE ? ORDER BY \"reputation\" DESC LIMIT 30 OFFSET ?";
    if($order == 'registry')
      $query = "SELECT \"username\", \"registry\", \"reputation\" FROM \"User\" WHERE \"username\" LIKE ? ORDER BY \"registry\" LIMIT 30 OFFSET ?";

    $stmt = $conn->prepare($query);

    $stmt->execute(array('%'.$search.'%', $offset));

    return $stmt->fetchAll();
  }

  function getTotalUsersBySearch($search){

    global $conn;

    $query = "SELECT * FROM \"User\" WHERE \"username\" LIKE ?";

    $stmt = $conn->prepare($query);

    $stmt->execute(array('%'.$search.'%'));

    $stmt->fetch();

    $count = $stmt->rowCount();

    return $count;
  }

  function banUser($username){
    global $conn;

    $query = "UPDATE \"User\" SET \"banned\" = TRUE WHERE \"username\" = ?";

    $stmt = $conn->prepare($query);

    return $stmt->execute(array($username));
  }
?>
