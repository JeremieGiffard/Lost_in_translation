<?php
require '../../functions/Db.php'; 


// Topics variables
$topic_id = 0;
$isEditingTopic = false;
$topic_name = "";

/* * * * * * * * * * * * * * * *
* Topic clicks actions
* * *  * * * * * * * * * * * * */
// if user clicks the create topic button
if (isset($_POST['create_topic'])) 
{ 
    $topic_name = htmlspecialchars($_POST['topic_name']);
	createTopic($topic_name); 
}

// if user clicks the update topic button
if (isset($_POST['update_topic'])) 
{
    $topic_name = htmlspecialchars($_POST['topic_name']);
	updateTopic($topic_name);
}




// called by create topic button
function createTopic($topic_name)
{
    $dbHandler = DbHandler();
    $topic_name = htmlspecialchars($_POST['topic_name']);
	global $errors;
	
	if (empty($topic_name)) 
	{ 
	    header('Location: ../topics.php?error=7');
        exit;
	}
	
	// Ensure that no topic is saved twice. 
    $query = $dbHandler->prepare
	( 
		"SELECT `id`,`name`,`slug`
		FROM topics 
		WHERE name= :topic_name 
		LIMIT 1"
	);
	$query->bindValue(':topic_name', $topic_name, PDO::PARAM_STR);
	$query->execute();
	$result = $query->fetch(PDO::FETCH_ASSOC);
	
	if(!empty($result))
	{
	    header('Location: ../topics.php?error=8');
        exit; 
	}
	
	
		// create slug: "science fiction" become "science-fiction"
		$topic_slug = makeSlug($topic_name);
		$query = $dbHandler->prepare
	( 
		"INSERT INTO topics (name, slug) 
	    VALUES(:topic_name, :topic_slug)"
	);
	$query->bindValue(':topic_name', $topic_name, PDO::PARAM_STR);
	$query->bindValue(':topic_slug', $topic_slug, PDO::PARAM_STR);
		$query->execute();

		$_SESSION['message'] = "Topic créé";
		header('location: ../topics.php');
		exit();
	
}

// take slug and regex'it to returns 'exemple-sample-slug' for your URL
function makeSlug(String $string)
{
	$string = strtolower($string);
	$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
	return $slug;
}



// if user clicks the update topic button
function updateTopic($request_values) 
{
    $dbHandler = DbHandler();
    $topic_name = htmlspecialchars($_POST['topic_name']);
    $topic_id = htmlspecialchars($_POST['topic_id']);
	global $errors;
	
	$topic_slug = makeSlug($topic_name);
	if (empty($topic_name)) { 
		header('Location: ../topics.php?error=1');
        exit;
	}
	
	
		$query = $dbHandler->prepare
	(
		"UPDATE topics 
		SET name= :topic_name, 
		slug= :topic_slug 
		WHERE id= :topic_id"
	);
	$query->bindValue(':topic_name', $topic_name, PDO::PARAM_STR);
	$query->bindValue(':topic_slug', $topic_slug, PDO::PARAM_STR);
	$query->bindValue(':topic_id', $topic_id, PDO::PARAM_STR);
	$query->execute();

		$_SESSION['message'] = "Topic uploadé avec succès";
		header('location: ../topics.php');
		exit();
	
}



