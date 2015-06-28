<?php
class Genre
{
//	VARIABLES
	private $id;
	private $name;

//	CONSTRUCTORS
	public function __construct($id, $name) {
		$this->setId($id);
		$this->setName($name);
	}
//	GETTERS & SETTERS
	public function getId() {
		return $this->id;
	}
    public function getName() {
		return $this->name;
	}
	public function setId($id) {
		$this->id = $id;
	}
	public function setName($name) {
		$this->name = $name;
	}
//	TO STRING
	public function __toString() {
		return "Id : ".$this->id." Name : ".$this->name;
	}
}
?>
