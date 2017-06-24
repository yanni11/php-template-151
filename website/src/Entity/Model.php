<?php
namespace tsarov\Entity;

class Model
{
	public $Id;
	public $Name;
	
	
	public function __construct($id, $name)
	{
		$this->Id = (int) $id;
		$this->Name = $name;
	}
	
	public function getName()
	{
		return $this->name;
	}
}