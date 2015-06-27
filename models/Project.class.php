<?php

class Project {
	//-------------------VARIABLES-------------------
	private $id;
	private $name; 
	private $genre;
	private $owner;
	private $version;
	private $description;
	private $parent;
	private $lock;


	//-------------------CONSTRUCTORS-------------------
	public function __construct($id, $name, $genre, $owner, $description, $parent, $locked) {
		$this->setId($id);
		$this->setName($name);
		$this->setGenre($genre);
		$this->setOwner($owner);
		$this->setDescription($description);
		$this->setParent($parent);
		$this->setLock($locked);

	}
	// -------------------GETTERS-------------------
	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}

	public function getGenre() {
		return $this->genre;
	}

	public function getOwner() {
		return $this->owner;
	}

	public function getDescription() {
		return $this->parent;
	}

	public function getParent() {
		return $this->parent;
	}

	public function getLock() {
		return $this->lock;
	}


	//-------------------SETTERS-------------------
	public function setId($id) {
		if(is_numeric($id) && $id >= 0)
			$this->id = $id;
		else
			throw new Exception("Id personne invalide : ".$id);
	}
	public function setName($name) {
		$this->name = trim($name);
	}
	public function setGenre($genre) {
		$this->genre = $genre;
	}
	public function setOwner($owner){
		$this->owner = $owner;
	}
	public function setDescription($description) {
		$this->version = trim($description);
	}
	public function setParent($parent) {
		$this->parent = $parent;
	}
	public function setLock($lock) {
		$this->lock = $lock;
	}
	
	//-------------------tostring-------------------
	public function __toString() {
		return "Id : ".$this->id." Nom du projet : ".$this->name." Genre : "
			.$this->genre." Proprietaire : ".$this->owner." Description : "
			.$this->description." Projet Parent : ".$this->parent." Projet privé : ".$this->lock;
	}
}
?>