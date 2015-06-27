<?php
include_once MODELS_INC.'Version.class.php';
include_once MODELS_INC.'HasParticipatedDAO.php';
class VersionDAO {
	public static function create (&$version) {
		if (get_class( $version ) == "Version") {
			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('INSERT INTO version(name,views,duration, description, project) VALUES (?,?, ?, ?)');
				$statement->bindParam(1, $version->getName());
				$statement->bindParam(2, $version->getViews());
				$statement->bindParam(3, $version->getDuration());
				$statement->bindParam(4, $version->getDescription());
				$statement->bindParam(5, $version->getProjectId());
				$statement->execute();
//////
				return $connect->lastInsertId();
			} catch (PDOException $e) {
				die('Error create comment!: ' . $e->getMessage() . '<br/>');
			}
		}
	}
	public static function update ($version) {
		if (get_class( $version ) == "Version") {
			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('UPDATE version SET description=? WHERE id=?');
				$description = $version->getDescription();
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
		if (get_class( $version ) == "Version") {
			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('DELETE FROM version WHERE idVersion=?');
				$id = $version->getId();
				$statement->bindParam(1, $id);
				$statement->execute();
			} catch (PDOException $e) {
				die('Error delete user!: ' . $e->getMessage() . '<br/>');
			}
		}
	}
	public static function getAll () {
		try {
			$connect = SPDO::getInstance();
			$statement = $connect->prepare('SELECT * FROM version');
			$statement->execute();
			while ($rs = $statement->fetch(PDO::FETCH_OBJ)) {
				$users   = HasParticipatedDAO::getByVersionId($rs->idVersion);
				$version = new Version($rs->idVersion, $users, $rs->name,$rs->views,$rs->duration, $rs->description, null);
				$version->setComments(CommentDAO::getByVersion($version));
				$versions[] = $version;
			}
		} catch (PDOException $e) {
			die('Error!: ' . $e->getMessage() . '<br/>');
		}
		return $versions;
	}
	public static function getById ($id) {
		try {
			$connect=SPDO::getInstance();
			$statement = $connect->prepare('SELECT * FROM version where idVersion=?');
			$statement->bindParam(1, $id);
			$statement->execute();
			if($rs = $statement->fetch(PDO::FETCH_OBJ)) {
				$users   = HasParticipatedDAO::getByVersionId($rs->idVersion);
				$version = new Version($rs->idVersion, $users, $rs->name,$rs->views,$rs->duration, $rs->description, null);
				$version->setComments(CommentDAO::getByVersion($version));
			}
		} catch (PDOException $e) {
			die('Error!: ' . $e->getMessage() . '<br/>');
		}
		return $version;
	}
	public static function getByNbViews(){
		$version=null;
		try{
			$connect=SPDO::getInstance();
			$statement=$connect->prepare('SELECT * FROM version ORDER BY views DESC LIMIT 20');
			$statement->execute();
			if($rs=$statement->fetch(PDO::FETCH_OBJ))
				$version=new Version($rs->id, $rs->users[], $rs->name,$rs->views,$rs->duration, $rs->description, $rs->commentaires[]);
		} catch (PDOException $e){
			die('Error!: '.$e->getMessage().'<br/>');
		}
		return $version;
	}
}
?>