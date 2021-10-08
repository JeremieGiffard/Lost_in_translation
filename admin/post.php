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
* Post functions
* * *  * * * * * * * * * * * * */

function getAllPosts()
{
	$dbHandler = DbHandler();
	
	// Admin can view all posts
	if ($_SESSION['current_session']['user']['role'] == "Admin") 
	{
	    $query = $dbHandler->prepare
    (
      "SELECT `id`,`user_id`,`title`,`slug`,`body`,`created_at`,`updated_at`  
      FROM posts"
    );
	}
	// Author can only view their posts
	// Le bindValue doit etre à l'interieur du elseif sinon variable $user_id inconnu. 
	elseif ($_SESSION['current_session']['user']['role'] == "Author") 
	{
		$user_id = $_SESSION['current_session']['user']['id'];
		 $query = $dbHandler->prepare
    (
      "SELECT `id`,`user_id`,`title`,`slug`,`body`,`created_at`,`updated_at` 
      FROM posts 
      WHERE user_id= :user_id"
    );
    $query->bindValue(':user_id', $user_id, PDO::PARAM_STR);
	}
	$query->execute();
	$posts = $query->fetchAll(\PDO::FETCH_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) 
	{
		$post['author'] = getPostAuthorById($post['user_id']);
		array_push($final_posts, $post);
	}
	return $final_posts;
	
}
$posts = getAllPosts();

/* - - - - - - - - - - 
-  get the author/username of a post 
Trouver une solution à l'username d'un post d'un compte supprimé (value user_id NULL dans database) était pas simple. 
J'étais parti sur une requette SQL avec WHERE ISNULL  ou IFNULL ou meme une toute nouvelle fonction avec inner join. Finalement un if/else suffit. 

- - - - - - - - - - -*/
function getPostAuthorById($user_id)
{
	$dbHandler = DbHandler();
		if (is_null($user_id)) 
		{
			$result['username'] = "deleted acount";
		} else 
		{
		$query = $dbHandler->prepare
	    (
	      "SELECT username 
	      FROM user 
	      WHERE id= :user_id"
	    );
	    $query->bindValue(':user_id', $user_id, PDO::PARAM_STR);
	    $query->execute();
		$result = $query->fetch(PDO::FETCH_ASSOC);
		}
    
	if ($result) {
		// return $result[username] pour eviter Warning: Array to string conversion
		return $result['username'];
	} else {
		return null;
	}
}

$TotalStories = '';
//total stories on this site
function getTotalStories()
{
	$dbHandler = DbHandler();
    $query = $dbHandler->prepare
	( 
		"SELECT COUNT(id) 
		AS total 
		FROM `posts` "
	);
	$query->execute();
	$totalStories = $query->fetch(PDO::FETCH_ASSOC);
	return $totalStories['total'];
}
$TotalStories = getTotalStories();


//if clic button editPost
if (isset($_GET['edit-post'])) 
{
	$isEditingPost = true;
	$post_id = $_GET['edit-post'];
	editPost($post_id);
}


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


// if user clicks the Delete post button
if (isset($_GET['delete-post'])) 
{
	$post_id = $_GET['delete-post'];
	deletePost($post_id);
}

if (isset($_GET['edit-post'])) 
{
	$isEditingPost = true;
	$post_id = $_GET['edit-post'];
	editPost($post_id);
}


require '../assets/admin/post.phtml';