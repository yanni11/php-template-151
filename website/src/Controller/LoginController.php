<?php

namespace tsarov\Controller;

use tsarov\SimpleTemplateEngine;
use tsarov\Service\LoginService;

class LoginController 
{
  /**
   * @var tsarov\SimpleTemplateEngine Template engines to render output
   */
  private $template;
  
  /**
   * @param tsarov\SimpleTemplateEngine
   */
  
  private $loginService;
  
  
  public function __construct(SimpleTemplateEngine $template, LoginService $service)
  {
     $this->template = $template;
     $this->loginService = $service;
  }

  public function showLogin()
  {
  	  echo $this->renderpage("login.html.php");
  }
  public function Login(array $data)
  {
  	if (!array_key_exists('email', $data) OR !array_key_exists('password', $data)) 
  	{
  		$this->showLogin();
  		return ;
  	}
  	if($this->loginService->Authenticate($data['email'], $data['password']))
  	{
  		$_SESSION["email"] = $data["email"];
  		header('Location: /');
  	}
  	else 
  	{
  		echo $this->template->render("login.html.php", ["email" => $data["email"]]);
  	}
  }
  
  public function showRegistration()
  {
  	echo $this->renderpage("registration.html.php");
  }
  
  public function Register(array $data)
  {
  	if (!array_key_exists('email', $data) OR !array_key_exists('password', $data))
  	{
  		$this->showRegistration();
  		return ;
  	}
  	if($this->loginService->register($data['email'], $data['password']))
  	{
  		echo "erfolgreich registriert";
  	}
  	else
  	{
  		echo "benutzer ist bereits registriert";
  	}
  }
  
  public function renderpage($page) {
  	echo $this->template->render("base.html.php", ["contentMidFile" => $page]);
  }
}
