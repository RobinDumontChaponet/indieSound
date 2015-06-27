<?php

class Version {
	private $id;
	private $project;
	private $users;
	private  $views;
	private $duration;
	private $description;
	private $commentaires;

	public function __construct ($id='', $users='', $name='',$views='',$duration='', $description='', $commentaires='') {
		$this->id=$id;
		$this->users=$users;
		$this->name=$name;
		$this->views=$views;
		$this->duration=$duration;
		$this->description=$description;
		$this->commentaires=$commentaires;

	}

	public function getId () {
		return $this->id;
	}
	public function getUsers () {
		return $this->users;
	}
	public function getName () {
		return $this->name;
	}
	public function getViews(){
		return $this->views;
	}
	public function getDescription () {
		return $this->description;
	}
	public function getCommentaires () {
		return $this->commentaires;
	}
	public function  getDuration(){
		return $this->duration;
	}
	public function getProject(){
		return $this->project;
	}

	public function setId ($id) {
		$this->id=$id;
	}
	public function setUser ($users) {
		if (gettype($users) == 'array') {
			$this->author=($users);
		}
		else {
			echo "Version::users should be of type array : ".gettype($users);
		}
	}
	public function setProject($project){
		$this->project=$project;
	}
	public function setName ($name) {
		$this->name=$name;
	}
	public function setViews($views){
		$this->views=$views;
	}
	public function setDescription ($description) {
		$this->description=$description;
	}

public function setCommentaires ($commentaires) {
		if(gettype($commentaires) == 'array'){
		$this->commentaires=$commentaires;
		} else {
			echo "Version::commentaires should be of type array : ".gettype($commentaires);
		}	
	}
	public function setDuration($duration){
		$this->duration=$duration;
	}

	public function __toString () {
		return 'Comment [ id : '.$this->id.'; author : '.$this->author.'; comment : '.$this->comment.'; time : '.$this->time.' ]';
	}
}
?>