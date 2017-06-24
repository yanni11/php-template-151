<?php

namespace tsarov\Service;

use tsarov\Entity\Motorrad;
use tsarov\Entity\Type;
use tsarov\Entity\Model;
use tsarov\Entity\Comment;
use tsarov\Entity\User;

class MotorradService
{
	
	private $pdo;
	
	private $types = [];
	private $models = [];
	
	public function  __construct(\PDO $pdo)
	{
		$this->pdo = $pdo;
		
	}
	
	public function getMotorrader($modelId, $typeId)
	{
		$stmt = $this->pdo->prepare("select * from motorrad where (? = 0 or modelId = ?) and (? = 0 or typId = ?)");
		$stmt->bindValue(1, $modelId);
		$stmt->bindValue(2, $modelId);
		$stmt->bindValue(3, $typeId);
		$stmt->bindValue(4, $typeId);
		
		$stmt->execute();
		$motorraeder = [];
		
		while($row = $stmt->fetchObject()) {
			$motorrad = new Motorrad($row->Id, 
					$row->Name, 
					$row->Hubraum, 
					$row->Price, 
					$this->getModels()[$row->ModelId], 
					$this->getTypes()[$row->TypId]);
			
			$motorraeder[$row->Id] = $motorrad;
		}	
		return $motorraeder;
	}
	
	public function getMotorrad($Id)
	{
		$stmt = $this->pdo->prepare("select * from motorrad where Id = ?");
		$stmt->bindValue(1, $Id);
		
		$stmt->execute();
		$motorrad = $stmt->fetchObject();

		return new Motorrad($motorrad->Id, 
				$motorrad->Name, 
				$motorrad->Hubraum, 
				$motorrad->Price, 
				$this->getModels()[$motorrad->ModelId],
				$this->getTypes()[$motorrad->TypId]);
	}
	public function getComments($Id)
	{
		$stmt = $this->pdo->prepare("select * from comment where MotorradId = ?");
		$stmt->bindValue(1, $Id);
		
		$stmt->execute();
		$comments = []; 
		
		while($row = $stmt->fetchObject()) {
			$comment = new Comment($row->Id,
					$row->Text,
					$this->getUser($row->UserId));
				
			$comments[$row->Id] = $comment;
		}
		
		
		return $comments;
	}
	public function getUser($id)
	{
		
		$stmt = $this->pdo->prepare("select * from user where Id = ?");
		$stmt->bindValue(1, $id);
		$stmt->execute();
		$user = $stmt->fetchObject();
				
			
		return new User($user->Id, $user->Firstname, $user->Lastname, $user->Email, $user->Password);
	}
	
	public function getTypes()
	{
		if($this->types == null)
		{
			$stmt = $this->pdo->prepare("select * from typ");
			
			$stmt->execute();
			$types = [];
			
			$types[0] = new Type(0, "All types");
			while($row = $stmt->fetchObject()) {
				$type = new Type($row->Id, $row->Name);
				$types[$row->Id] = $type;
			}
			$this->types = $types;
		}
		return $this->types;
	}
	
	public function getModels()
	{
		if($this->models == null)
		{
			$stmt = $this->pdo->prepare("select * from model");
			
			$stmt->execute();
			$models = [];
			
			$models[0] = new Model(0, "All models");
			while($row = $stmt->fetchObject()) {
				$model = new Model($row->Id, $row->Name);
				$models[$row->Id] = $model;
			}
			$this->models = $models;
		}
		return $this->models;
	}
	public function postComment($data)
	{
		$stmt = $this->pdo->prepare("insert into comment Values(0, (Select Id from user where Email = ?), ? , ?)");
		$stmt->bindValue(1, $_SESSION["email"]);
		$stmt->bindValue(2, $_REQUEST["Id"]);
		$stmt->bindValue(3, $data["text"]);
		$stmt->execute();
	}
}