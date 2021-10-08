<?php
declare(strict_types=1);

//1 -  //call database
require 'functions/Db.php';


 /* * * * * * * * * * * * * * * *
* Return All posts with matching topic and name
Avec 2 inner join pour avoir les topics qui vont avec les posts
/!\ Mauvaise idée ! si on suppr un topic les posts lié à ce topic ne s'affichent plus /!\
* * * * * * * * * * * * * * * * */ 
function getAllPosts() 
{
	$dbHandler = DbHandler();
    $query = $dbHandler->prepare
    (
      "SELECT id, title,slug, image,body, created_at
      FROM posts"
    );
    $query->execute();
    $posts = $query->fetchAll(\PDO::FETCH_ASSOC);
    
    $All_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getPostTopic($post['id']); 
		array_push($All_posts, $post);
	}
	return $All_posts;
}
$posts = getAllPosts();

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

// manage errors for the public area
require 'functions/errorsTraitement.php';

//navbar need getalltopic function
require 'functions/getAllTopics(navbar).php';
//call template
require 'assets/templates/index.phtml';
