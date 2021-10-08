<?php
require '../functions/Db.php'; 

if (!isset($_SESSION['current_session']))
{
	//Redirect to index if not log
	header("Location:  ../index.php");  
}


// Admin user variables
$admin_id = 0;
$username = "";
$role = "";
$email = "";




/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
* - Returns all users 
ORDER BY mean i have admin users show up first. Easier to find.
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
function getAdminUsers(){
    $dbHandler = DbHandler();
	global $role;
	$query = $dbHandler->prepare
	(
		"SELECT id, username, email, role 
		FROM `user` 
		ORDER by `role`= 'Author'"
	);
	$query->execute();
	$users = $query->fetchAll(PDO::FETCH_ASSOC);
	return $users;
}
	$admins = getAdminUsers();

// Total users on this site (I use email cause it's unique in DataBase)
function getTotalNumber()
{
	$dbHandler = DbHandler();
    $query = $dbHandler->prepare
	( 
		"SELECT COUNT(email) 
		AS total 
		FROM `user` "
	);
	$query->execute();
	$totalUser = $query->fetch(PDO::FETCH_ASSOC);
	return $totalUser['total'];
}



// if admin clicks the Delete admin button (in the table)
if (isset($_GET['delete-admin'])) 
{
	$admin_id = $_GET['delete-admin'];
	deleteUser($admin_id);
}

/* - - - - - - - - - - 
-  DELETE USER
pb rencontré : delete impossible si user a créé un post [Cannot delete or update a parent row: a foreign key constraint fails] a cause de table relationnelle
solution appliquée:
https://stackoverflow.com/questions/43493889/cannot-delete-or-update-a-parent-row-a-foreign-key-constraint-fails-mysql

 Add on delete set null meaning that when user is deleted user_id relating to that user should be set to null (though you will have to change user_id int(10) UNSIGNED NOT NULL to user_id int(10) UNSIGNED DEFAULT NULL
- - - - - - - - - - -*/

function deleteUser($admin_id) 
{
    
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
	header('Location: users.php');
    exit;
	
}

$messageNotification= '';
if (isset($_GET['error'])) {
    switch(intval($_GET['error'])) {
        case 1:
            $messageNotification = 'username is required';
            break;
            
        case 2:
            $messageNotification = 'email is required';
            break;
    }
}



$errors= [];

require '../assets/errors.php';
require '../assets/admin/users.phtml';
