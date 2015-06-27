<?php

class HasParticipatedDAO {

	public static function create (&$hasParticipated) {
		if (get_class( $obj ) == "HasParticipated") {
			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('INSERT INTO version(user, version) VALUES (?, ?)');
				$statement->bindParam(1, $version->getUserId());
				$statement->bindParam(2, $version->getVersionId());
				$statement->execute();

				return $connect->lastInsertId();
			} catch (PDOException $e) {
				die('Error create comment!: ' . $e->getMessage() . '<br/>');
			}
		}
	}

	public static function update ($hasParticipated) {
		if (get_class( $obj ) == "HasParticipated") {
			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('UPDATE version SET user=?, version=?  WHERE idHasParticipated=?');
				$statement->bindParam(1, $hasParticipated->getUserId());
				$statement->bindParam(2, $hasParticipated->getVersionId());
				$statement->bindParam(3, $hasParticipated->getId());
				$statement->execute();

				return $connect->lastInsertId();
			} catch (PDOException $e) {
				die('Error update user!: ' . $e->getMessage() . '<br/>');
			}
		}
	}

	public static function delete ($hasParticipated) {
		if (get_class( $obj ) == "HasParticipated") {
			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('DELETE FROM version WHERE idHasParticipated=?');
				$statement->bindParam(1, $hasParticipated->getId());
				$statement->execute();
			} catch (PDOException $e) {
				die('Error delete user!: ' . $e->getMessage() . '<br/>');
			}
		}
	}

	public static function getAll () {
		$hasParticipated = array();
		try {
			$connect=SPDO::getInstance();
			$statement = $connect->prepare('SELECT * FROM hasParticipated');

			$statement->execute();

			while ($rs = $statement->fetch(PDO::FETCH_OBJ))
				$hasParticipated[]=new $HasParticipated($rs->id, $rs->users[], $rs->name, $rs->description, $rs->commentaires[]);
		} catch (PDOException $e) {
			die('Error!: ' . $e->getMessage() . '<br/>');
		}
		return $hasParticipated;
	}

	public static function getById ($id) {
		if (get_class( $obj ) == "$HasParticipated") {
			$version = null;
			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('SELECT * FROM hasParticipated where id=?');
				$statement->bindParam(1, $id);
				$statement->execute();

				if($rs = $statement->fetch(PDO::FETCH_OBJ))
					$version=new HasParticipated($rs->id, $rs->users[], $rs->name, $rs->description, $rs->commentaires[]);
			} catch (PDOException $e) {
				die('Error!: ' . $e->getMessage() . '<br/>');
			}
			return $version;
		}
	}	
}
?>