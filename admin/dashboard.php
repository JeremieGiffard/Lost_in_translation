<?php 
require '../functions/Db.php';  

if (!isset($_SESSION['current_session']))
{
	//Redirect to index if not log
	header("Location:  ../index.php");  
}

// load full session, needed to identify user and know what is allowed to do/ 
	$email=$_SESSION['current_session']['user']['email'];
	$dbHandler = DbHandler();
    $statement = $dbHandler->prepare(
      "SELECT `id`, `username`, `email`, `role` 
      FROM `user`
      WHERE `email` = :email");
    $statement->bindValue(':email', $email, PDO::PARAM_STR);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $response['data'] = $result;
	$_SESSION['current_session'] = [
          'status' => 1,
          'user' => $response['data'],
          'date_time' => date('Y-m-d H:i:s'),
        ];

require '../assets/admin/dashboard.phtml';
