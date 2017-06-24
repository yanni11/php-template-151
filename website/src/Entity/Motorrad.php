<?php
namespace tsarov\Entity;

class Motorrad
{
	public $Id;
	public $Name;
	public $Hubraum;
	public $Price;
	public $Model;
	public $Type;
	
	public function __construct($id, $name, $hubraum, $price, Model $model, Type $type)
	{
		$this->Id = (int) $id;
		$this->Name = $name;
		$this->Hubraum = (int) $hubraum;
		$this->Price = (int) $price;
		$this->Model = $model;
		$this->Type = $type;
	}
}