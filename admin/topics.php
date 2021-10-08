<?php
require '../functions/Db.php'; 

if (!isset($_SESSION['current_session']))
{
	//Redirect to index if not log
	header("Location:  ../index.php");  
}

/* * * * * * * * * * * * * * * *
* Topics functions
* * *  * * * * * * * * * * * * */
$topic_id = 0;
$isEditingTopic = false;
$topic_name = "";

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


// if user clicks the Edit topic button
function editTopic($topic_id) 
{
    $dbHandler = DbHandler();
	global $topic_name, $isEditingTopic, $topic_id;
	 $query = $dbHandler->prepare
	(
		"SELECT `id`,`name`,`slug`
		FROM topics 
		WHERE id= :topic_id 
		LIMIT 1"
	);
	$query->bindValue(':topic_id', $topic_id, PDO::PARAM_STR);
	$query->execute();
	$topic = $query->fetch(PDO::FETCH_ASSOC);
	
	$topic_name = $topic['name'];
}

// if user clicks the Edit topic button
if (isset($_GET['edit-topic'])) 
{
	$isEditingTopic = true;
	$topic_id = $_GET['edit-topic'];
	editTopic($topic_id);
}


// delete topic 
function deleteTopic($topic_id) 
{
    $dbHandler = DbHandler();
    $query = $dbHandler->prepare
	(
		"DELETE FROM topics 
		WHERE id= :topic_id"
	);
	$query->bindValue(':topic_id', $topic_id, PDO::PARAM_STR);
	$query->execute();
    
		$_SESSION['message'] = "Topic supprimé";
		header("location: topics.php");
		exit();
}


// if user clicks the Delete topic button
if (isset($_GET['delete-topic'])) 
{
	$topic_id = $_GET['delete-topic'];
	deleteTopic($topic_id);
}

// manage errors
require 'functions/errorsTraitement.php';

require '../assets/admin/topics.phtml';