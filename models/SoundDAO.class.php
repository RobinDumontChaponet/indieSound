<?php

require_once("Sound.class.php");

class SoundDAO {

	public static function create (&$object) {
		if (get_class( $object ) == "Sound") {
			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('INSERT INTO sound (src) VALUES (?)');

				$statement->bindParam(1, $object->getSrc());
				$statement->execute();
				} else {
					return false;
				}
				return $connect->lastInsertId();
			} catch (PDOException $e) {
				die('Error create user!: ' . $e->getMessage() . '<br/>');
			}
		}
	}

	public static function update ($object) {
		if (get_class( $object ) == "Sound") {
			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('UPDATE sound SET src=? WHERE idSound=?');
				$statement->bindParam(1, $object->getSrc();
				$statement->bindParam(2, $object->getId());
				$statement->execute();

				return $connect->lastInsertId();
			} catch (PDOException $e) {
				die('Error update sound!: ' . $e->getMessage() . '<br/>');
			}
		}
	}

	public static function delete ($object) {
		if (get_class( $object ) == "Sound") {
			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('DELETE FROM sound WHERE idSound=?');
				$statement->bindParam(1, $object->getId());
				$statement->execute();
			} catch (PDOException $e) {
				die('Error delete sound!: ' . $e->getMessage() . '<br/>');
			}
		}
	}

	public static function getAll () {
		$sound = array();
		try {
			$connect=SPDO::getInstance();
			$statement = $connect->prepare('SELECT * FROM sound');

			$statement->execute();

			while ($rs = $statement->fetch(PDO::FETCH_OBJ)) {
				$notes = NoteDAO::getBySoundId($rs->idSound);

				$user[]=new Sound($rs->idSound, $rs->src, $notes);
			}
		} catch (PDOException $e) {
			die('Error! getAll:' . $e->getMessage() . '<br/>');
		}
		return $sound;
	}

	public static function getById ($id) {
			$sound = null;
			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('SELECT * FROM sound where idSound=?');
				$statement->bindParam(1, $id);
				$statement->execute();

				if($rs = $statement->fetch(PDO::FETCH_OBJ)) {
					$notes = NoteDAO::getBySoundIdAndProjectId($rs->idSound, $rs->project);

					$user=new Sound($rs->idSound, $rs->src, $notes, $rs->project);
				}
			} catch (PDOException $e) {
				die('Error! getById:' . $e->getMessage() . '<br/>');
			}
			return $sound;
	}
}
?>
