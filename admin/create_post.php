<?php
require '../functions/Db.php'; 

if (!isset($_SESSION['current_session']))
{
	//Redirect to index if not log
	header("Location:  ../index.php");  
}



$post_id = 0;
$isEditingPost = false;
$title = "";
$post_slug = "";
$body = "";
$featured_image = "";
$name_file = "";
$post_topic = "";
$user_id =  $_SESSION['current_session']['user']['id'];

/* * * * * * * * * * * * * * * *
* Topics functions
* * *  * * * * * * * * * * * * */


function getAllTopics()
{
	$dbHandler = DbHandler();
    $query = $dbHandler->prepare
	(
		"SELECT `id`,`name`,`slug` 
		FROM topics"
	);
	$query->execute();
	$topics = $query->fetchAll(PDO::FETCH_ASSOC);
	return $topics;
}
$topics = getAllTopics();



/* - - - - - - - - - - 
-  Post functions
- - - - - - - - - - -*/

function editPost($role_id)
{
    $dbHandler = DbHandler();
	global $title, $post_slug,$featured_image,$body, $isEditingPost, $post_id;
	$query = $dbHandler->prepare
	( 
		"SELECT  `id`,`user_id`,`title`,`slug`,`body`, `image`,`created_at`,`updated_at`   
		FROM posts 
		WHERE id= :role_id 
		LIMIT 1"
	);
	$query->bindValue(':role_id', $role_id, PDO::PARAM_STR);
	$query->execute();
	$post = $query->fetch(PDO::FETCH_ASSOC);
	
	$title = $post['title'];
	$body = $post['body'];
	$featured_image = $post['image'];
}

// delete blog post
function deletePost($post_id)
{
    $dbHandler = DbHandler();
    $query = $dbHandler->prepare
	( 
		"DELETE FROM posts WHERE id= :post_id"
	);
	$query->bindValue(':post_id', $post_id, PDO::PARAM_STR);
	$query->execute();
   
	header("location: post.php");
	exit();
}

/* - - - - - - - - - - 
-  Post actions
- - - - - - - - - - -*/

// if user clicked the Edit post button
if (isset($_GET['edit-post'])) 
{
	$isEditingPost = true;
	$post_id = $_GET['edit-post'];
	editPost($post_id);
}
// if user clicks the Delete post button
if (isset($_GET['delete-post'])) 
{
	$post_id = $_GET['delete-post'];
	deletePost($post_id);
}


// manage errors
require 'functions/errorsTraitement.php';

require '../assets/admin/create_post.phtml';



