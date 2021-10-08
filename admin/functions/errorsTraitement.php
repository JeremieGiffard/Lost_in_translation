<?php

// All admin errors in the same file. easier to find and manage


$messageNotification= '';
if (isset($_GET['error'])) {
    switch(intval($_GET['error'])) {
        case 1:
            $messageNotification = 'Post title is required';
            break;
            
        case 2:
            $messageNotification = 'Post body is required';
            break;
            
        case 3:
            $messageNotification = 'Post topic is required';
            break;
        case 4:
            $messageNotification = 'Featured image is required';
            break;
        case 5:
            $messageNotification = 'Failed to upload image. Only jpeg and png allowed';
            break;
        case 6:
            $messageNotification = 'A post already exists with that title.';
            break;
        case 7:
            $messageNotification = 'username is required';
            break;
        case 8:
            $messageNotification = 'email is required';
            break;
        
    	
            

    }
}

