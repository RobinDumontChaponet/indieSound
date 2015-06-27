<?php
class Project {
	//-------------------VARIABLES-------------------
	private $id;
	private $name; 
	private $genre;
	private $owner;
	private $root;
	private $version;
	private $description;
	private $parent;
	private $locked;
	private $auth;

	//-------------------CONSTRUCTORS-------------------
	public function __construct($id, $name, $genre, $owner, $root, $version, $description, $parent, $locked, $auth) {
		$this->setId($id);
		$this->setName($name);
		$this->setGenre($genre);
		$this->setOwner($owner);
		$this->setRoot($root);
		$this->setVersion($version);
		$this->setDescription($description);
		$this->setParent($parent);
		$this->setLocked($lock);
		$this->setAuth($auth);

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

	public function getRoot() {
		return $this->root;
	}

	public function getVersion() {
		return $this->version;
	}

	public function getDescription() {
		return $this->parent;
	}

	public function getParent() {
		return $this->parent;
	}

	public function getLocked() {
		return $this->lock;
	}

	public function getAuth() {
		return $this->auth;
	}

	//-------------------SETTERS-------------------
	public function setId($id) {
		if(is_numeric($id) && $id >= 0)
			$this->id = $id;
		else
			throw new Exception("Id personne invalide : ".$id);
	}
	public function setNom($name) {
		$this->nom = trim($name);
	}
	public function setGenre($genre) {
		$this->genre = trim($genre);
	}
	public function setOwner($owner){
		$this->owner = trim($owner);
	}
	public function setRoot($root){ 
		$this->root = trim($root);
	}
	public function setVersion($version) {
		$this->version = trim($version);
	}
	public function setDescription($version) {
		$this->version = trim ($description);
	}
	public function setParent($parent) {
		$this->parent = trim($parent);
	}
	public function setLock($locked) {
		$this->locked = $locked;
	}
	public function setAuth($auth) {
		$this->auth = $auth;
	}

	
	//-------------------tostring-------------------
	public function __toString() {
		return "Id : ".$this->id." Nom du projet : ".$this->name." Genre : "
			.$this->genre." Proprietaire : ".$this->owner." Version : ".$this->version." Description : "
			.$this->description." Projet Parent : ".$this->parent." Projet privé : ".$this->locked." Droits : ".$this->auth;
	}
}
?>