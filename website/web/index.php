<?php

use tsarov\Factory;
use tsarov\Entity\User;

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
	case "/register":
		$ctrl = $factory->getLoginController();
		if ($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			$ctrl->showRegistration();
		}
		else
		{
			
			$ctrl->Register(new User(0, $_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["password"]));
		}
		break;
	case "/logout":
		
		unset($_SESSION['email']);
		header("location:/");
		
		break;
	case "/catalog":
		
		$ctrl = $factory->getMotorradController();
		$ctrl->catalog($_GET["modelId"], $_GET["typeId"]);
		
		break;
	case "/motorrad":
		$ctrl = $factory->getMotorradController();
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			
			$ctrl->motorrad($_GET["Id"]);
		} 
		else 
		{
			$ctrl->Comment($_POST);
		}
		
	
		break;
	default:
		$matches = [];
		if(preg_match("|^/hello/(.+)$|", $_SERVER["REQUEST_URI"], $matches)) {
			($factory->getIndexController())->greet($matches[1]);
			break;
		}
		echo "Not Found";
}

