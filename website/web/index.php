<?php

use tsarov\Factory;

error_reporting(E_ALL);
session_start();

require_once("../vendor/autoload.php");



$factory = Factory::createFromIniFile(__DIR__ . "/../config.ini");

/*
if(!array_key_exists("email", $_SESSION) && $_SERVER["REQUEST_URI"] != "/login") {
	header("Location: /login");
	die();
}
*/
switch(strtok($_SERVER["REQUEST_URI"],'?')) {
	
	case "/testroute":
		echo "Test bla bla";
		break;
	case "/":
		
		($factory->getIndexController())->homepage();
		break;
		
	case "/login":
		$ctrl = $factory->getLoginController();
		if ($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			$ctrl->showLogin();
		}
		else 
		{
			$ctrl->Login($_POST);
		}
		break;
	case "/catalog":
		
		$ctrl = $factory->getMotorradController();
		$ctrl->catalog($_GET["modelId"], $_GET["typeId"]);
		
		break;
	default:
		$matches = [];
		if(preg_match("|^/hello/(.+)$|", $_SERVER["REQUEST_URI"], $matches)) {
			($factory->getIndexController())->greet($matches[1]);
			break;
		}
		echo "Not Found";
}

