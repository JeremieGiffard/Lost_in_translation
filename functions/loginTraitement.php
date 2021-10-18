<?php

     if(
   !isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ||
   !isset($_POST['password']) || empty($_POST['password']) 
    )
    {
        //redirection vers le formulaire
        header('Location: index.php');
        exit;
    }
    
    // call database
    require_once('Db.php');
  
    $Email = stripcslashes(strip_tags($_POST['email']));
    $Password = htmlspecialchars($_POST['password']);

    $dbHandler = DbHandler();
    
 $query = $dbHandler->prepare
(
    'SELECT `id`, `username`, `email`, `password`, `role` 
      FROM `user`
      WHERE `email` = ?'
);
$query->execute([$_POST['email']]);
$existUser = $query->fetch(PDO::FETCH_ASSOC);
$response['data'] = $existUser;

if (!$existUser) //$existUser doit être différent de false 
{
    header('Location: ../index.php?error=3');
    exit;
}

if (!password_verify($_POST['password'], $existUser['password']))
{
    //redirection vers le formulaire
        header('Location: ../index.php?error=3');
        exit;
}


//si l'identification est correct


    // start session
session_start();
$_SESSION['current_session'] = [
          'status' => 1,
          'user' => $response['data'],
          'date_time' => date('Y-m-d H:i:s'),
        ];
$_SESSION['current_session']['user']['email'] = $Email;       
  
   
  // mise à jour update_at dans la table user
  $dbHandler = DbHandler();
  $query = $dbHandler->prepare
  (
      'UPDATE user SET updated_at = NOW() WHERE Id = ?'
  );
  $query->execute([$_SESSION['current_session']['user']['id']]);
  
  // rediriger vers dashboard
  header("Location: ../admin/dashboard.php");
  exit;

