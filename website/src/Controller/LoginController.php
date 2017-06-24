<?php

namespace tsarov\Controller;

use tsarov\SimpleTemplateEngine;
use tsarov\Service\LoginService;
use tsarov\Entity\User;

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
  	echo $this->template->render("base.html.php", ["contentFile" => "login.html.php"]);
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
  	echo $this->template->render("base.html.php", ["contentFile" => "registration.html.php"]);
  }
  
  public function Register(User $user)
  {
  	if ($user->Email == null OR $user->Password == null)
  	{
  		$this->showRegistration();
  		return ;
  	}
  	if($this->loginService->register($user))
  	{
  		echo "erfolgreich registriert";
  	}
  	else
  	{
  		echo "benutzer ist bereits registriert";
  	}
  }
  
}
