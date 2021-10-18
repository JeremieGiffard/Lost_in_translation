<?php

// login and register error 

$messageNotification = '';
if (isset($_GET['error'])) {
    switch(intval($_GET['error'])) {
        case 1:
            $messageNotification = 'Sorry, username already in use.';
            break;
            
        case 2:
            $messageNotification = 'Sorry, email already in use.';
            break;
        case 3:
            $messageNotification = 'Sorry, please check credentials.';
            break;
        
            

    }
}

