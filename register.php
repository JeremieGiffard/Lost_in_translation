<?php
declare(strict_types=1);

//1 -  //call database
require 'functions/Db.php';

$messageNotification = '';

// manage errors for the public area
require 'functions/errorsTraitement.php';


require 'functions/getAllTopics(navbar).php';
//call template
require 'assets/templates/register.phtml';