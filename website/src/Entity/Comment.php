<?php
namespace tsarov\Entity;

class Comment
{
	public $Id;
	public $Text;
	public $User;
	
	public function __construct($id, $text, User $user)
	{
		$this->Id = (int) $id;
		$this->Text = $text;
		$this->User = $user;
	}
}