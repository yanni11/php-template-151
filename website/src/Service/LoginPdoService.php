<?php

namespace tsarov\Service;

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
	
	public function register($username, $password)
	{
		$stmt = $this->pdo->prepare("select * from user where email = ?");
		$stmt->bindValue(1, $username);
		$stmt->execute();
			
		if ($stmt->rowCount() == 0)
		{
			$stmt = $this->pdo->prepare("insert into user values(?, ?)");
			$stmt->bindValue(1, $username);
			$stmt->bindValue(2, $password);
			$stmt->execute();
		
			return true;
		}
		else
		{
			return false;
		}		
	}
}