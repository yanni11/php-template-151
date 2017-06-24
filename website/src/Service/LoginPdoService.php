<?php

namespace tsarov\Service;

use tsarov\Entity\User;

class LoginPdoService implements LoginService
{
	
	private $pdo;
	
	public function  __construct(\PDO $pdo)
	{
		$this->pdo = $pdo;
	}
	
	public function authenticate($username, $password)
	{
		$stmt = $this->pdo->prepare("select * from user where email = ? and password = ?");
		$stmt->bindValue(1, $username);
		$stmt->bindValue(2, $password);
		$stmt->execute();

		 
		if ($stmt->rowCount() == 1)
		{
			$_SESSION["email"] = $username;
	
			return true;			 
		}
		else 
		{
			return false;
		}
	}
	
	public function register(User $user)
	{
		$stmt = $this->pdo->prepare("select * from user where email = ?");
		$stmt->bindValue(1, $user->Email);
		$stmt->execute();
			
		if ($stmt->rowCount() == 0)
		{
			$stmt = $this->pdo->prepare("insert into user values(0, ?, ?, ?, ?)");
			$stmt->bindValue(1, $user->Firstname);
			$stmt->bindValue(2, $user->Lastname);
			$stmt->bindValue(3, $user->Email);
			$stmt->bindValue(4, $user->Password);
			$stmt->execute();
		
			return true;
		}
		else
		{
			return false;
		}		
	}
}