<?php

class User {
	private $id;
	private $login;
	private $password;
	private $mail;
	private $lastName;
	private $firstName;

	public function __construct ($id='', $login='', $password='', $mail='', $lastName='', $firstName='') {
		$this->id=$id;
		$this->login=$login;
		$this->password=$password;
		$this->mail=$mail;
		$this->lastName=$lastName;
		$this->firstName=$firstName;
	}

	public function getId () {
		return $this->id;
	}
	public function getLogin () {
		return $this->login;
	}
	public function getPassword () {
		return $this->password;
	}
	public function getMail () {
		return $this->mail;
	}
	public function getLastName () {
		return $this->lastName;
	}
	public function getFirstName () {
		return $this->firstName;
	}


	public function setId ($id) {
		$this->id=$id;
	}
	public function setLogin ($login) {
		$this->login=$login;
	}
	public function setPassword ($password) {
		$this->password=$password;
	}
	public function setMail ($mail) {
		$this->mail=$mail;
	}
	public function setLastName ($lastName) {
		$this->lastName=$lastName;
	}
	public function setFirstName ($firstName) {
		$this->firstName=$firstName;
	}

	public function __toString () {
		return 'User [ id : '.$this->id.'; login : '.$this->login.'; mail : '.$this->mail.'; lastName : '.$this->lastName.'; firstName : '.$this->firstName.' ]';
	}
}
?>