<?php

require '../../functions/Db.php';  
// Admin user variables
$admin_id = 0;
$username = "";
$role = "";
$email = "";
// if something went wrong
$errors = [];

// if user clicks the update admin button
if (isset($_POST['update_user'])) 
{
	updateUser($_POST);
}
// if user clicks the delete your account button
if (isset($_POST['close_account'])) 
{
	deleteAccount($_POST);
}



/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
* - Receives admin request from form and updates in database
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

function updateUser(){
    $dbHandler = DbHandler();
	global $errors;
	// get id of the admin to be updated
	$admin_id = htmlspecialchars($_SESSION['current_session']['user']['id']);

	$username = htmlspecialchars($_POST['username']);
	
	$email = htmlspecialchars($_POST['email']);
	if(empty($_POST['password2']) ||empty($_POST['password'])){array_push($errors, "password is required 2 time");}
	if (isset($_POST['password']) && $_POST['password'] == $_POST['password2'] ) 
	{
		$password = htmlspecialchars($_POST['password']);
	}
	
	if (empty($username)) 
	{ 
		header('Location: ../users.php?error=1');
        exit;
		
	}
	if (empty($email)) 
	{ 
		header('Location: ../users.php?error=2');
        exit;
		
	}
	
	
		//encrypt the password 
		$password = password_hash($password, PASSWORD_BCRYPT);
		
		$query = $dbHandler->prepare
	(
		"UPDATE user 
		SET username= :username, 
			email= :email, 
			password= :password
		WHERE id= :admin_id"
	);
	$query->bindValue(':username', $username, PDO::PARAM_STR);
	$query->bindValue(':email', $email, PDO::PARAM_STR);
	$query->bindValue(':password', $password, PDO::PARAM_STR);
	$query->bindValue(':admin_id', $admin_id, PDO::PARAM_STR);
	$query->execute();

	$_SESSION['current_session']['user']['username'] = $username;
	$_SESSION['current_session']['user']['email'] = $email;

		$_SESSION['message'] = "Admin user updated successfully";
		header('location: ../users.php');
		exit();
	
}

function deleteAccount(){
	$admin_id = htmlspecialchars($_SESSION['current_session']['user']['id']);
	$dbHandler = DbHandler();
	$query = $dbHandler->prepare
	( 
		"DELETE 
		FROM user 
		WHERE id= :admin_id"
	);
	$query->bindValue(':admin_id', $admin_id, PDO::PARAM_STR);
	$query->execute();
	$delete = $query->fetch(PDO::FETCH_ASSOC);
	header("location: ../../index.php");
}

