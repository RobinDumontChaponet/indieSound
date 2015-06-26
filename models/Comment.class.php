<?php

class Comment {
	private $id;
	private $author;
	private $comment;
	private $time;

	public function __construct ($id='', $author='', $comment='', $time='') {
		$this->id=$id;
		$this->author=$author;
		$this->comment=$comment;
		$this->time=$time;
	}

	public function getId () {
		return $this->id;
	}
	public function getAuthor () {
		return $this->author;
	}
	public function getComment () {
		return $this->comment;
	}
	public function getTime () {
		return $this->time;
	}

	public function setId ($id) {
		$this->id=$id;
	}
	public function setAuthor ($author) {
		$this->author=htmlspecialchars($author);
	}
	public function setComment ($comment) {
		$this->comment=$comment;
	}
	public function setTime ($time) {
		$this->time=$time;
	}

	public function __toString () {
		return 'Comment [ id : '.$this->id.'; author : '.$this->author.'; comment : '.$this->comment.'; time : '.$this->time.' ]';
	}
}
?>