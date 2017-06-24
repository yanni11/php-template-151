<?php

namespace tsarov\Service;

use tsarov\Entity\Motorrad;
use tsarov\Entity\Type;
use tsarov\Entity\Model;

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
	
	public function getTypes()
	{
		if($this->types == null)
		{
			$stmt = $this->pdo->prepare("select * from typ");
			
			$stmt->execute();
			$types = [];
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
			while($row = $stmt->fetchObject()) {
				$model = new Model($row->Id, $row->Name);
				$models[$row->Id] = $model;
			}
			$this->models = $models;
		}
		return $this->models;
	}
}