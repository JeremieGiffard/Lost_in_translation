<?php
require 'functions/Db.php';

if (isset($_GET['post-slug'])) {
		$post = getPost($_GET['post-slug']);
	}
	$topics = getAllTopics();

/* * * * * * * * * * * * * * *
* Returns a single post
* * * * * * * * * * * * * * */
/**
 I put bindValue(PDO::PARAM_STR) before $query->execute(); cause I read it protect against SQL injection. Prepare() and execute() should be enough but... still better be safe.
 J'ai mis bindValue partout où je pouvais, ça protege mieux des injections SQL apparement (meme si prepare/execute() protege aussi).
 
*/
function getPost($slug)
{
	$dbHandler = DbHandler();
	$post_slug = $_GET['post-slug'];
	$query = $dbHandler->prepare
	( 
		"SELECT `id`, `user_id`, `title`, body
		FROM posts 
		WHERE slug= :post_slug "
	);
	$query->bindValue(':post_slug', $post_slug, PDO::PARAM_STR);
	$query->execute();
	$post = $query->fetch(PDO::FETCH_ASSOC);
	
	if ($post) 
	{
		$post['topic'] = getPostTopic($post['id']);
		$post['author'] = getPostAuthor($post['user_id']);
	}
	return $post;
}


				

function getPostTopic($post_id)
{
	$dbHandler = DbHandler();
	$query = $dbHandler->prepare
    (
		"SELECT `id`,`name`,`slug` 
		FROM topics 
		WHERE id= (
			SELECT topic_id 
			FROM post_topic 
			WHERE post_id= :post_id) 
			LIMIT 1"
	);
	$query->bindValue(':post_id', $post_id, PDO::PARAM_STR);
	$query->execute();
	$topic = $query->fetch(PDO::FETCH_ASSOC);
	return $topic;
}

/* * * * * * * * * * * * * * * *
* fetch author name of a story

* * * * * * * * * * * * * * * * */

function getPostAuthor($user_id)
{
	$dbHandler = DbHandler();
	// "deleted acount" 
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

/* * * * * * * * * * * *
*  Returns all topics
* * * * * * * * * * * * */
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

//     /!\   getAllTopics()  already here so my navbar is ready to work.



require 'assets/templates/single_post.phtml';