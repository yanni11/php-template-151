<?php
namespace tsarov\Entity;

class Type
{
	public $Id;
	public $Name;
	
	
	public function __construct($id, $name)
	{
		$this->Id = (int) $id;
		$this->Name = $name;
	}
}