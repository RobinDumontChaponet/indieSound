<?php

include_once MODELS_INC.'Version.class.php';
include_once MODELS_INC.'HasParticipatedDAO.php';

class VersionDAO {

//$id='', $users='', $name='', $description='', $commentaires='', $projectId=''

	public static function create (&$version) {
		if (get_class( $obj ) == "Version") {
			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('INSERT INTO version(name, description, project) VALUES (?, ?, ?)');
				$statement->bindParam(1, $version->getName());
				$statement->bindParam(2, $version->getDescription());
				$statement->bindParam(3, $version->getProjectId());
				$statement->execute();

//////

				return $connect->lastInsertId();
			} catch (PDOException $e) {
				die('Error create comment!: ' . $e->getMessage() . '<br/>');
			}
		}
	}

	public static function update ($version) {
		if (get_class( $obj ) == "Version") {
			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('UPDATE version SET description=? WHERE id=?');
				$description = $description->getDescription();
				$statement->bindParam(1, $description);
				$statement->execute();
				
//////

				return $connect->lastInsertId();
			} catch (PDOException $e) {
				die('Error update user!: ' . $e->getMessage() . '<br/>');
			}
		}
	}

	public static function delete ($version) {
		if (get_class( $obj ) == "Version") {
			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('DELETE FROM version WHERE idVersion=?');
				$id = $comment->getId();
				$statement->bindParam(1, $id);
				$statement->execute();
			} catch (PDOException $e) {
				die('Error delete user!: ' . $e->getMessage() . '<br/>');
			}
		}
	}

	public static function getAll () {
		if (get_class( $obj ) == "Version") {
			$versions = array();

			try {
				$connect = SPDO::getInstance();
				$statement = $connect->prepare('SELECT * FROM version');

				$statement->execute();

				while ($rs = $statement->fetch(PDO::FETCH_OBJ)) {
					$users   = HasParticipatedDAO::getByVersionId($rs->idVersion);

					$version = new Version($rs->idVersion, $users, $rs->name, $rs->description, null);

					$version->setComments(CommentDAO::getByVersion($version));

					$versions[] = $version;
				}
			} catch (PDOException $e) {
				die('Error!: ' . $e->getMessage() . '<br/>');
			}
			return $versions;
		}
	}

	public static function getById ($id) {
		if (get_class( $obj ) == "Version") {
			$version = null;

			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('SELECT * FROM version where idVersion=?');
				$statement->bindParam(1, $id);
				$statement->execute();

				if($rs = $statement->fetch(PDO::FETCH_OBJ)) {
					$users   = HasParticipatedDAO::getByVersionId($rs->idVersion);

					$version = new Version($rs->idVersion, $users, $rs->name, $rs->description, null);

					$version->setComments(CommentDAO::getByVersion($version));
				}
			} catch (PDOException $e) {
				die('Error!: ' . $e->getMessage() . '<br/>');
			}
			return $version;
		}
	}	
}
?>