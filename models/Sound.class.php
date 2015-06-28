<?php

class Sound {
	private $id;
	private $src;
	private $notes;
	private $idProject; // Because Fuck You_

	public function __construct ($id='', $src='', $notes=null, $idProject) {
		$this->setId($id);
		$this->setSrc($src);
		$this->setNotes($notes);
		$this->setIdProject($idProject);
	}

	public function getId () {
		return $this->id;
	}
	public function getSrc () {
		return $this->src;
	}
	public function getNotes () {
		return $this->notes;
	}
	public function getIdProject () {
		return $this->idProject;
	}


	public function setId ($id) {
		$this->id=$id;
	}
	public function setSrc ($src) {
		$this->src=trim($src);
	}
	public function setNotes ($notes) {
		$this->notes=$notes;
	}
	public function setIdProject ($idProject) {
		$this->idProject=$idProject;
	}


	public function __toString () {
		return 'Sound [ id : '.$this->id.'; src : '.$this->src.'; notes : '.$this->notes.'idProject : '.$this->idProject.' ]';
	}
}

?>