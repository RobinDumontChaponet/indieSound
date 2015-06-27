<?php

class HasParticipated {
	private $id;
	private $userId;
	private $versionId;

	public function __construct ($id='', $userId='', $versionId='') {
		$this->id=$id;
		$this->userId=$userId;
		$this->versionId=$versionId;
	}

	public function getId () {
		return $this->id;
	}
	public function getUserId () {
		return $this->userId;
	}
	public function getVersionId () {
		return $this->versionId;
	}

	public function setId ($id) {
		$this->projectId=$id;
	}
	public function setUserId ($userId) {
			$this->userId=($userId);
	}
	public function setVersionId ($versionId) {
		$this->versionId=$versionId;
	}

	public function __toString () {
		return 'HasParticipated [ id : '.$this->id.'; userId : '.$this->userId.'; versionId : '.$this->versionId.' ]';
	}
}
?>