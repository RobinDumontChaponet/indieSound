<?php
require_once("Project.class.php");
require_once("UserDAO.class.php");

class ProjectDAO {
	public static function create(&$pers) {
		if (get_class($proj)=="Project") {
			try {
				$req = SPDO::getInstance()->prepare("INSERT INTO `project`(`name`, `genre`, `owner`, `description`, `parent`, `lock`) VALUES (?,?,?,?,?,?)");
				$req->execute(array($proj->getName(), $proj->getGenre(), $proj->getOwner(), $proj->getDescription(), $proj->getParent(), $proj->getLock() ));
				$pers->setId(SPDO::getInstance()->LastInsertId());
				return $pers->getId();
			} catch(PDOException $e) {
				die('error create projet '.$e->getMessage().'<br>');
			}
		} else {
			die ('Create :  : paramètre de type projet demandé : '.$proj);
		}
	}
	public static function delete($proj) {
		if (get_class($proj)=="Projet") {
			try {
				$req = SPDO::getInstance()->prepare("DELETE FROM `project` WHERE `idProjet`=?");
				$req->execute(array($proj->getId()));
			} catch(PDOException $e) {
				die('error delete projet '.$e->getMessage().'<br>');
			}
		} else {
			die ('Delete : paramètre de type projet demandé : '.$proj);
		}
	}
	public static function update($proj) {
		if (get_class($proj) == "Personne") {
			try {
				$req = SPDO::getInstance()->prepare("UPDATE `project` SET `name`=?,`genre`=?, `owner`=?, `description`=?, `parent`=?, `lock`=? WHERE `idProject`=?");
				$req->execute(array($proj->getName(), $proj->getGenre(), $proj->getOwner(), $proj->getDescription(), $proj->getParent(), $proj->getLock()));
			} catch(PDOException $e) {
				die('error update projet '.$e->getMessage().'<br>');
			}
		} else {
			die ('Update : paramètre de type projet demandé : '.$proj);
		}
	}

	public static function getAll() {
		try {
			$req=SPDO::getInstance()->query("SELECT `idProjet`, `name`, `owner`, `description`, `parent`, `locked` FROM `project` ORDER BY name");
			$lst=$req->fetchAll();
			$lstObjet=array();
			foreach ($lst as $proj) {
				$owner = UserDAO::getById($proj['owner']);
				
				$lstObjet[] = new Project($proj['idProjet'], $proj['name'], /*$genre*/null, $owner, $proj['description'], $proj['parent'], $proj['locked']);
			}
			return $lstObjet;
		} catch(PDOException $e) {
			die('error get all project '.$e->getMessage().'<br>');
		}
	}
	public static function getById($id) {
		if (is_numeric($id)) {
			try {
				$statement=SPDO::getInstance()->prepare("SELECT `idProject`, `name`, `genre`, `owner`, `description`, `parent`, `lock` FROM `project` WHERE idProject=?");
				$statement->execute(array($id));
				if ($proj=$statement->fetch()) {
					return new Project($proj['idProjet'], $proj['name'], $proj['genre'], $proj['owner'], $proj['description'], $proj['parent'], $proj['locked']);
				} else {
					return null;
				}
			} catch(PDOException $e) {
				die('error get id project '.$e->getMessage().'<br>');
			}
		}
	}
}
?>
