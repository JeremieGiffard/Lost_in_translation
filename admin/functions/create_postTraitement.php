<?php
require '../../functions/Db.php'; 




// Post variables
$post_id = $_GET['edit-post'];
$isEditingPost = false;
$title = "";
$post_slug = "";
$body = "";
$featured_image = "";
$name_file = "";
$post_topic = "";
$user_id =  $_SESSION['current_session']['user']['id'];
if (isset($_GET['edit-post'])) 
{
	$isEditingPost = true;
	$post_id = $_GET['edit-post'];
}



/* - - - - - - - - - - 
-  Post actions
- - - - - - - - - - -*/
// if user clicks the create post button
if (isset($_POST['create_post'])) { createPost($_POST); }

// if user clicks the update post button
if (isset($_POST['update_post'])) 
{
	updatePost($_POST);
}



/* - - - - - - - - - - 
-  Post functions
- - - - - - - - - - -*/
function createPost($request_values)
{
    $dbHandler = DbHandler();
	global $errors,$user_id, $featured_image, $topic_id, $body;
	
	$title = htmlspecialchars($request_values['title']);
	$body = htmlspecialchars($request_values['body']);
	if (isset($request_values['topic_id'])) 
	{
		$topic_id = htmlspecialchars($request_values['topic_id']);
	}
	
	$post_slug = makeSlug($title);
	if (empty($title)) 
	{ 
		header('Location: ../create_post.php?error=1');
        exit;
	}
	if (empty($body)) 
	{ 
		header('Location: ../create_post.php?error=2');
        exit; 
	}
	if (empty($topic_id)) 
	{ 
		header('Location: ../create_post.php?error=3');
        exit; 
	}
	// Get image name
	$featured_image = $_FILES['featured_image']['name'];
	
	//if no image uploaded
  	if (empty($featured_image)) 
  	{
  		header('Location: ../create_post.php?error=4');
        exit; 
  	}
  	
  	//if file upload but not a image
  	elseif ($featured_image)
  	{
  		// test type files see in one exercice with jean-luc
  		$allowed_file_types = ['image/png', 'image/jpeg'];
	
	//tester si le type MIME du fichier ($_FILES['avatar_file']['tmp_name'] est dans le tableau $allowed_file_types 
		if (!in_array(mime_content_type($_FILES["featured_image"]["tmp_name"]), $allowed_file_types)) 
		{
		    //le type de fichier n'est pas le bon
		    header('Location: ../create_post.php?error=5');
        	exit; 
		}
		// File uploaded AND a image !
		else{
			//construire le nouveau nom du fichier (tjrs renommer les fichiers uploadés)
		switch(mime_content_type($_FILES["featured_image"]["tmp_name"]))
		{
		    case 'image/png':
		        //construction du nom du fichier
		        $name_file = $post_slug.'.png';
		        break;
		        
		    case 'image/jpeg':
		        //construction du nom du fichier
		        $name_file = $post_slug.'.jpg';
		        break;
		}
		//déplacer le fichier de l'espace temporaire vers le dossier d'upload du projet
		$resultat = move_uploaded_file($_FILES['featured_image']['tmp_name'],"../../assets/images/".$name_file);
	  	}
	
	}
	
	
	

	// Ensure that no post is saved twice. 
	$post_check_query = $dbHandler->prepare
	( 
		"SELECT slug 
		FROM posts 
		WHERE slug= :post_slug 
		LIMIT 1"
	);
	$post_check_query->bindValue(':post_slug', $post_slug, PDO::PARAM_STR);
    $post_check_query->execute();
    $result = $post_check_query->fetchColumn();
	

	if($result > 0) 
	{ // if post exists
		header('Location: ../create_post.php?error=4');
        exit; 
	}

	
    	$query = $dbHandler->prepare
    	( 
    		"INSERT INTO posts (user_id, title, slug, image, body, created_at, updated_at) 
    		VALUES( :user_id, :title, :post_slug, :featured_image, :body, now(), now())"
    	);
    	$query->bindValue(':user_id', $user_id, PDO::PARAM_STR);
    	$query->bindValue(':title', $title, PDO::PARAM_STR);
    	$query->bindValue(':post_slug', $post_slug, PDO::PARAM_STR);
    	$query->bindValue(':featured_image', $name_file, PDO::PARAM_STR);
    	$query->bindValue(':body', $body, PDO::PARAM_STR);
	    $query->execute();
	    $inserted_post_id = $dbHandler->lastInsertId();
	    $query = $dbHandler->prepare
    	( 
    		"INSERT INTO post_topic (post_id, topic_id) 
    		VALUES( :inserted_post_id, :topic_id)"
    	);
    	$query->bindValue(':inserted_post_id', $inserted_post_id, PDO::PARAM_STR);
    	$query->bindValue(':topic_id', $topic_id, PDO::PARAM_STR);
		$query->execute();
			// create relationship between post and topic
		$_SESSION['message'] = "Post created successfully";
		header('location: ../post.php');
		exit();
		
	
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

function updatePost()
{
    $dbHandler = DbHandler();
	global $errors, $post_id, $title, $featured_image,$name_file, $body; 

	$title = $_POST['title'];
	$body = $_POST['body'];
	$post_id = $_POST['post_id'];
	if (isset($_POST['topic_id'])) 
	{
		$topic_id = $_POST['topic_id'];
	}
	
	$post_slug = makeSlug($title);

	if (empty($title)) 
	{
		header('Location: ../create_post.php?error=1');
        exit;	
	}
	if (empty($body)) 
	{
		header('Location: ../create_post.php?error=1');
        exit;
	}
	
	// register topic if there are no errors in the form
	 
	
	    
	    $query = $dbHandler->prepare
    	( 
    		"UPDATE posts
    		SET title= ?, slug= ?, body= ? , updated_at=now() 
    		WHERE id= ? "
    	);
        $query->execute([$title, $post_slug,$body,$_POST['post_id'] ]);
    	
		$_SESSION['message'] = "Post created/updated successfully";
		header('location: ../post.php');
		exit();
			
	
}

// take slug and regex'it to returns 'exemple-sample-slug' for your URL
function makeSlug(String $string){
	$string = strtolower($string);
	$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
	return $slug;
}
