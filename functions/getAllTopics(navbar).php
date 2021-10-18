<?php 


/* * * * * * * * * * * *
*  Returns all topics (needed for navbar)
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
$topics = getAllTopics();

