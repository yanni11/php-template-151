<?php
namespace tsarov\Entity;

class User
{
	public $Id;
	public $Firstname;
	public $Lastname;
	public $Email;
	public $Password;
	
	public function __construct($id, $firstname, $lastname, $email, $password)
	{
		$this->Id = (int) $id;
		$this->Firstname = $firstname;
		$this->Lastname = $lastname;
		$this->Email = $email;
		$this->Password = $password;
	}
}