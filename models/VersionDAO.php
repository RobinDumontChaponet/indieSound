<?php

include_once 'SPDO.class.php';
include_once MODELS_INC.'Version.class.php';

class VersionDAO {

	public static function create (&$version) {
		if (get_class( $obj ) == "Version") {
			try {;
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('INSERT INTO version([...],name,duration, description, [...]) VALUES (?,?, ?, ?, ?)');
				$statement->bindParam(1, $[...]);
				$name = $version->getName();
				$views=0;
				$statement->bindParam(2, $name);
				$statement->bindParam(3,$duration);
				$description = $version->getDescription();
				$statement->bindParam(4, $description);
				$statement->bindParam(5, $[...]);
				$statement->execute();

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
				$description = $version->getDescription();
				$statement->bindParam(1, $description);
				$statement->execute();

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
				$statement = $connect->prepare('DELETE FROM version WHERE id=?');
				$id = $version->getId();
				$statement->bindParam(1, $id);
				$statement->execute();
			} catch (PDOException $e) {
				die('Error delete user!: ' . $e->getMessage() . '<br/>');
			}
		}
	}

	public static function getAll () {
		if (get_class( $obj ) == "Version") {
			$version = array();
			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('SELECT * FROM version');

				$statement->execute();

				while ($rs = $statement->fetch(PDO::FETCH_OBJ))
					$version[]=new Version($rs->id, $rs->users[], $rs->name,$rs->views, $rs->description, $rs->commentaires[]);
			} catch (PDOException $e) {
				die('Error!: ' . $e->getMessage() . '<br/>');
			}
			return $version;
		}
	}

	public static function getById ($id) {
		if (get_class( $obj ) == "Version") {
			$version = null;
			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('SELECT * FROM version where id=?');
				$statement->bindParam(1, $id);
				$statement->execute();

				if($rs = $statement->fetch(PDO::FETCH_OBJ))
					$version=new Version($rs->id, $rs->users[], $rs->name,$rs->views,$rs->duration, $rs->description, $rs->commentaires[]);
			} catch (PDOException $e) {
				die('Error!: ' . $e->getMessage() . '<br/>');
			}
			return $version;
		}
	}
	public static function getByNbViews(){
		if(get_class($obj)=="Version"){
			$version=null;
			try{
				$connect=SPDO::getInstance();
				$statement=$connect->prepare('SELECT * FROM version ORDER BY views DESC MAX 20');
				$statement->execute();
				if($rs=$statement->fetch(PDO::FETCH_OBJ))
					$version=new Version($rs->id, $rs->users[], $rs->name,$rs->views,$rs->duration, $rs->description, $rs->commentaires[]);
			} catch (PDOException $e){
				die('Error!: '.$e->getMessage().'<br/>');
			}
			return $version;
		}
	}
}
?>