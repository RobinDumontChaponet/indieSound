<?php
require_once("Project.class.php");
class ProjectDAO {
	public static function getAll() {
		try {
			$req=SPDO::getInstance()->query("SELECT `idProject`, `name`, `genre`, `owner`, `root`, `description`, `parent`, `lock` FROM `project` ORDER BY name");
			$lst=$req->fetchAll();
			$lstObjet=array();
			foreach ($lst as $proj) {
				$lstObjet[]=new Project($proj['idProject'], $proj['name'], $proj['genre'], $proj['owner'], $proj['root'], $proj['description'], $proj['parent'], $proj['lock']);
			}
			return $lstObjet;
		} catch(PDOException $e) {
			die('error get all project '.$e->getMessage().'<br>');
		}
	}
	public static function getById($id) {
		if (is_numeric($id)) {
			try {
				$statement=SPDO::getInstance()->prepare("SELECT `idProject`, `name`, `genre`, `owner`, `root`, `description`, `parent`, `lock` FROM `project` WHERE idProject=?");
				$statement->execute(array($id));
				if ($proj=$statement->fetch()) {
					return new Project($proj['idProject'], $proj['name'], $proj['genre'], $proj['owner'], $proj['root'], $proj['description'], $proj['parent'], $proj['lock']);
				} else {
					return null;
				}
			} catch(PDOException $e) {
				die('error get id project '.$e->getMessage().'<br>');
			}
		}
	}
	public static function create(&$pers) {
		if (get_class($proj)=="Project") {
			try {
				$req = SPDO::getInstance()->prepare("INSERT INTO `projet`(`name`, `genre`, `owner`, `root`, `description`, `parent`, `lock`) VALUES (?,?,?,?,?,?,?)");
				$req->execute(array($proj->getName(), $proj->getGenre(), $proj->getOwner(), $proj->getRoot(), $proj->getDescription(), $proj->getParent(), $proj->getLock() ));
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
				$req = SPDO::getInstance()->prepare("DELETE FROM `projet` WHERE `idProjet`=?");
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
				$req = SPDO::getInstance()->prepare("UPDATE `projet` SET `name`=?,`genre`=?, `owner`=?, `root`=?, `description`=?, `parent`=?, `lock`=? WHERE `idProject`=?");
				$req->execute(array($proj->getName(), $proj->getGenre(), $proj->getOwner(), $proj->getRoot(), $proj->getDescription(), $proj->getParent(), $proj->getLock()));
			} catch(PDOException $e) {
				die('error update projet '.$e->getMessage().'<br>');
			}
		} else {
			die ('Update : paramètre de type projet demandé : '.$proj);
		}
	}
}
?>