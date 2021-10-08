<?php 
require 'functions/Db.php';
	// Get posts off a particular author + redirect to last page if deleted account
	if ($_GET['author'] == NULL) 
	{
	    
		header("Location: $_SERVER[HTTP_REFERER]"); 
	}
	if (isset($_GET['author'])) 
	{
		$user_id = $_GET['author'];
		$posts = getAllPostsByAuthor($user_id);
	}


/* * * * * * * * * * * * * * * *
* Returns all author's stories  (single_post.phtml)

* * * * * * * * * * * * * * * * */

function getAllPostsByAuthor($user_id)
{
	$dbHandler = DbHandler();
	$query = $dbHandler->prepare
	(
	    "SELECT `id`, `user_id`, `title`, `image`, `slug`,`body`, `created_at`
	    FROM posts
	    WHERE user_id= :user_id "
	) ;
	$query->bindValue(':user_id', $user_id, PDO::PARAM_STR);
	$query->execute();
	$posts = $query->fetchAll(\PDO::FETCH_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) 
	{
		$post['author'] = getPostAuthor($post['user_id']);
		$post['topic'] = getPostTopic($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;
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
$result['username']  = getPostAuthor($user_id);


/* * * * * * * * * * * * * * * *
* Returns topic matching post_id

* * * * * * * * * * * * * * * * */
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

//navbar need getalltopic function
require 'functions/getAllTopics(navbar).php';
// call template
require 'assets/templates/author_posts.phtml';