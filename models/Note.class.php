<?php

class Note {
	private $id;
	private $sound;
	private $startTime;

	public function __construct ($id='', $sound, $startTime=0) {
		$this->setId($id);
		$this->setSound($sound);
		$this->setStartTime($startTime);
	}

	public function getId () {
		return $this->id;
	}
	public function getSound () {
		return $this->sound;
	}
	public function getStartTime () {
		return $this->startTime;
	}


	public function setId ($id) {
		$this->id=$id;
	}
	public function setSound ($sound) {
		$this->sound=sound;
	}
	public function setStartTime ($startTime) {
		$this->startTime=$startTime;
	}


	public function __toString () {
		return 'Note [ id : '.$this->id.'; sound : '.$this->sound.'; startTime : '.$this->startTime.' ]';
	}
}

?>