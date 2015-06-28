<?php

require_once("Note.class.php");
require_once("SoundDAO.class.php");

class NoteDAO {

	public static function create (&$object) {
		if (get_class( $object ) == "Note") {
			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('INSERT INTO note (sound, startTime) VALUES (?, ?)');

				$statement->bindParam(1, $object->getSound()->getId());
				$statement->bindParam(2, $object->getStartTime());
				$statement->execute();
				return $connect->lastInsertId();
			} catch (PDOException $e) {
				die('Error create Note!: ' . $e->getMessage() . '<br/>');
			}
		} else
			return false;
	}

	public static function update ($object) {
		if (get_class( $object ) == "Note") {
			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('UPDATE note SET src=? WHERE idNote=?');
				$statement->bindParam(1, $object->getSrc());
				$statement->bindParam(2, $object->getId());
				$statement->execute();

				return $connect->lastInsertId();
			} catch (PDOException $e) {
				die('Error update Note!: ' . $e->getMessage() . '<br/>');
			}
		}
	}

	public static function delete ($object) {
		if (get_class( $object ) == "Note") {
			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('DELETE FROM note WHERE idNote=?');
				$statement->bindParam(1, $object->getId());
				$statement->execute();
			} catch (PDOException $e) {
				die('Error delete note!: ' . $e->getMessage() . '<br/>');
			}
		}
	}

	public static function getAll () {
		$notes = array();
		try {
			$connect=SPDO::getInstance();
			$statement = $connect->prepare('SELECT * FROM note');

			$statement->execute();

			while ($rs = $statement->fetch(PDO::FETCH_OBJ)) {
				$sound = SoundDAO::getById($rs->sound);

				$notes[]=new Note($rs->idNote, $sound, $rs->startTime);
			}
		} catch (PDOException $e) {
			die('Error! getAll:' . $e->getMessage() . '<br/>');
		}
		return $notes;
	}

	public static function getById ($id) {
		$note = null;
		try {
			$connect=SPDO::getInstance();
			$statement = $connect->prepare('SELECT * FROM note where idNote=?');
			$statement->bindParam(1, $id);
			$statement->execute();

			if($rs = $statement->fetch(PDO::FETCH_OBJ)) {
				$sound = SoundDAO::getById($rs->sound);

				$note=new Note($rs->idNote, $sound, $rs->startTime);
			}
		} catch (PDOException $e) {
			die('Error! getById:' . $e->getMessage() . '<br/>');
		}
		return $note;
	}

	public static function getBySoundIdAndProjectId($soundId, $projectId) {
		$notes = array();
		try {
			$connect=SPDO::getInstance();
			$statement = $connect->prepare('SELECT * FROM note where sound=? AND ...');
			$statement->bindParam(1, $soundId);
			$statement->execute();

			while ($rs = $statement->fetch(PDO::FETCH_OBJ)) {
				$sound = SoundDAO::getById($rs->sound);

				$notes[]=new Note($rs->idNote, $sound, $rs->startTime);
			}
		} catch (PDOException $e) {
			die('Error! getAll:' . $e->getMessage() . '<br/>');
		}
		return $notes;
	}

}

?>