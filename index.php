<?php
// Start Session
session_start();

// Include Config
require('config.php');

require('classes/Database.php');
require('classes/Bootstrap.php');
require('classes/Controller.php');

require('controllers/Home.php');
require('controllers/Manufacturer.php');
require('controllers/Model.php');
//
require('models/Manufacturer.php');
require('models/Model.php');

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if($controller){
	$controller->executeAction();
}