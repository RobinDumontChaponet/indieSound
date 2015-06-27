<?php
include_once MODELS_INC.'Version.class.php';
include_once MODELS_INC.'HasParticipatedDAO.php';
class VersionDAO {
	public static function create (&$version) {
		if (get_class( $version ) == "Version") {
			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('INSERT INTO version(project,name,user,views,duration,description,) VALUES (?,?,?,?,?,?)');
				$statement->bindParam(1, $version->getProject());
				$statement->bindParam(2, $version->getName());
				$statement->bindParam(3, $version->getUsers());
				$statement->bindParam(4, $version->getViews());
				$statement->bindParam(5, $version->getDuration());
				$statement->bindParam(6, $version->getDescription());
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
		$versions=array();
		try {
			$connect = SPDO::getInstance();
			$statement = $connect->prepare('SELECT * FROM version');
			$statement->execute();
			while ($rs = $statement->fetch(PDO::FETCH_OBJ)) {
				$users   = HasParticipatedDAO::getByVersionId($rs->idVersion);
				$version = new Version($rs->idVersion,$rs->views, $rs->duration,$rs->description);
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
		$versions=array();
		try{
			$req=SPDO::getInstance()->query('SELECT * FROM `version` ORDER BY views DESC LIMIT 20');
			$req->execute();
			while($rs = $req->fetch()){
					$version = new Version($rs->idVersion,$rs->users, $rs->name,$rs->project, $rs->views, $rs->duration, $rs->description,$rs->commentaires);
					var_dump($version);
					$versions[] = $version;
				}
		} catch (PDOException $e){
			die('Error!: '.$e->getMessage().'<br/>');
		}
		return $versions;
	}
}
?>