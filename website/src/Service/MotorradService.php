<?php

namespace tsarov\Service;

class MotorradService
{
	
	private $pdo;
	
	public function  __construct(\PDO $pdo)
	{
		$this->pdo = $pdo;
	}
	
	public function getMotorrader($markeId = 0, $typeId = 0)
	{
		$stmt = $this->pdo->prepare("select * from motorrad where (? = 0 or markeId = ?) and (? = 0 or typId = ?)");
		$stmt->bindValue(1, $markeId);
		$stmt->bindValue(2, $markeId);
		$stmt->bindValue(3, $typeId);
		$stmt->bindValue(4, $typeId);
		
		$stmt->execute();
		$result = $stmt->fetchAll();
		
		return $result;
	}
}