<?php 
    declare(strict_types=1);
    
     if(
   !isset($_POST['username']) || empty($_POST['username']) ||
   !isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ||
   !isset($_POST['password']) || empty($_POST['password']) 
    )
    {
        //redirection vers le formulaire
        header('Location: register.php');
        exit;
    }
     
     
 require 'Db.php';
 
 
$username = stripcslashes(strip_tags($_POST['username']));
$email = stripcslashes(strip_tags($_POST['email']));

 //check email/username already in user
 $dbHandler = DbHandler();
 $query = $dbHandler->prepare
(
    'SELECT 
        username, 
        email
    FROM 
        user 
    WHERE
        email LIKE ? OR username LIKE ?
    LIMIT 0,1'
);
      
$query->execute([$_POST['email'], $_POST['username']]);
$existUser = $query->fetch(PDO::FETCH_ASSOC);  

if ($existUser) //$existUser doit être différent de false 
{
    
    if ($existUser['username'] == $_POST['username'])
    {
        header('Location: ../register.php?error=1');
        exit;  
    }
    
    header('Location: ../register.php?error=2');
    exit;
    
} else{
    
    $statement = $dbHandler->prepare(
    "INSERT INTO `user` 
        (username, email, password, status, role, created_at, updated_at) 
    VALUES (:username, :email, :password, :status, 'Author', :created_at, :updated_at)");

//#Defaults....
$timestamps = date('Y-m-d H:i:s');
$status = 1;
//string password_hash( $password, $algo, $options )
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
//Values Bindings....
$statement->bindValue(':username', $username, PDO::PARAM_STR);
$statement->bindValue(':email', $email, PDO::PARAM_STR);
$statement->bindValue(':password', $password, PDO::PARAM_STR);
$statement->bindValue(':status', $status, PDO::PARAM_INT);
$statement->bindValue(':created_at', $timestamps, PDO::PARAM_STR);
$statement->bindValue(':updated_at', $timestamps, PDO::PARAM_STR);

$result = $statement->execute();

 
$role = 'Author';
$Data = [
    'username' => $username,
    'email' => $email,
    'role' => $role,
    'password' => $password
    
];

$_SESSION['current_session'] = [
                    'status' => 1,
                    'user' => $Data,
                    'date_time' => date('Y-m-d H:i:s'),
                ];
                header("Location: ../admin/dashboard.php");
}





        



