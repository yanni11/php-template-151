<?php

namespace tsarov;

class Factory
{
	private $config;
	
	public static function createFromIniFile($filename)
	{
		return new Factory(parse_ini_file($filename, true));
	}
	public function __construct(array $config)
	{
		$this->config = $config;
	}
	
	public function getTemplateEngine()
	{
		return new SimpleTemplateEngine(__DIR__ . "/../templates/");
	}
	
	public function  getIndexController()
	{
		return new Controller\IndexController($this->getTemplateEngine());
	}
	
	public function  getPdo()
	{
		return new \PDO("mysql:host=mariadb;dbname=app;charset=utf8",
		$this->config["database"]["user"],
		$this->config["database"]["password"],
		[\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
	}
	
	public function  getLoginService()
	{
		return new Service\LoginPdoService($this->getPdo());
	}
	
	public function  getLoginController()
	{
		return new Controller\LoginController($this->getTemplateEngine(), $this->getLoginService());
	}
	
	public function  getMotorradService()
	{
		return new Service\MotorradService($this->getPdo());
	}
	
	public function  getMotorradController()
	{
		return new Controller\MotorradController($this->getTemplateEngine(), $this->getMotorradService());
	}
	
}