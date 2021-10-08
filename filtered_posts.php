<?php
require 'functions/Db.php';


// get topic id or redirect if not
if (isset($_GET['topic'])) 
{
		$topic_id = $_GET['topic'];
		$posts = getAllPostsByTopic($topic_id);
	} elseif (!isset($_GET['topic']) || $_GET['topic'] == NULL )
	{
		header("Location:  index.php");
	}
	
/* * * * * * * * * * * * * * * *
* Returns all stories under a topic (filtered_post.phtml)

* * * * * * * * * * * * * * * * */

function getAllPostsByTopic($topic_id) 
{
	$dbHandler = DbHandler();
	$query = $dbHandler->prepare
	(
	    "SELECT `id`,`title`, `image`, `slug`,`body`, `created_at`
	    FROM posts 
		WHERE id IN 
			(SELECT post_id 
			FROM post_topic
			WHERE topic_id= :topic_id 
			GROUP BY post_id )"
	) ;
	$query->bindValue(':topic_id', $topic_id, PDO::PARAM_STR);
	$query->execute();
	$posts = $query->fetchAll(\PDO::FETCH_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) 
	{
		$post['topic'] = getPostTopic($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;
}	


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

/* * * * * * * * * * * * * * * *
* Returns topic name (exemple : science-fiction )
* * * * * * * * * * * * * * * * */

function getTopicNameById($topic_id)
{
	$dbHandler = DbHandler();
    $query = $dbHandler->prepare
	( 
		"SELECT name 
		FROM topics 
		WHERE id= :id"
	);
	$query->bindValue(':id', $topic_id, PDO::PARAM_STR);
	$query->execute();
	$topic = $query->fetch(PDO::FETCH_ASSOC);
	return $topic['name'];
}
$topic['name'] = getTopicNameById($topic_id);

require 'functions/getAllTopics(navbar).php';
//call template
require 'assets/templates/filtered_posts.phtml';