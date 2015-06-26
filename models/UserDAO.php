<?php

include_once 'SPDO.class.php';
include_once MODELS_INC.'User.class.php';

class UserDAO {

	public static function create (&$user) {
		if (get_class( $obj ) == "User") {
			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('INSERT INTO user(login, password, mail, lastName, firstName) VALUES (?, ?, ?, ?, ?)');
				$log = $user->getLogin();

				if (!isExistLogin($log)){
				$statement->bindParam(1, $log);
				$pwd = $user->getPassword();
				$statement->bindParam(2, $pwd);
				$mail = $user->getMail();
				$statement->bindParam(3, $mail);
				$lastName = $user->getLastName();
				$statement->bindParam(4, $lastName);
				$firstName = $user->getFirstName();
				$statement->bindParam(5, $firstName);
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

	public static function update ($user) {
		if (get_class( $obj ) == "User") {
			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('UPDATE user SET  login=?, password=?, mail=?, lastName=?, firstName=? WHERE id=?');
				$statement->bindParam(1, $user->getAuth()->getId());
				$statement->bindParam(2, $user->getLogin());
				$statement->bindParam(3, $user->getPwd());
				$statement->bindParam(4, $user->getId());
				$statement->execute();

				return $connect->lastInsertId();
			} catch (PDOException $e) {
				die('Error update user!: ' . $e->getMessage() . '<br/>');
			}
		}
	}

	public static function delete ($user) {
		if (get_class( $obj ) == "User") {
			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('DELETE FROM user WHERE id=?');
				$statement->bindParam(1, $user->getId());
				$statement->execute();
			} catch (PDOException $e) {
				die('Error delete user!: ' . $e->getMessage() . '<br/>');
			}
		}
	}

	public static function getAll () {
		if (get_class( $obj ) == "User") {
			$user = array();
			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('SELECT * FROM user');

				$statement->execute();

				while ($rs = $statement->fetch(PDO::FETCH_OBJ))
					$user[]=new User($rs->id, $rs->login, $rs->password, $rs->mail, $rs->lastName, $rs->firstName );
			} catch (PDOException $e) {
				die('Error! getAll:' . $e->getMessage() . '<br/>');
			}
			return $user;
		}
	}

	public static function getById ($id) {
		if (get_class( $obj ) == "User") {
			$user = null;
			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('SELECT * FROM user where id=?');
				$statement->bindParam(1, $id);
				$statement->execute();

				if($rs = $statement->fetch(PDO::FETCH_OBJ))
					$user=new User($rs->id, $rs->login, $rs->password, $rs->mail, $rs->lastName, $rs->firstName );
			} catch (PDOException $e) {
				die('Error! getById:' . $e->getMessage() . '<br/>');
			}
			return $user;
		}
	}

	public static function getByLogin ($login) {
		if (get_class( $obj ) == "User") {
			$user = null;

			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('SELECT * FROM user where login=?');
				$statement->bindParam(1, $login);
				$statement->execute();

				if($rs = $statement->fetch(PDO::FETCH_OBJ))
					$user=new User($rs->id, $rs->login, $rs->password, $rs->mail, $rs->lastName, $rs->firstName );
				} catch (PDOException $e) {
				die('Error! getByLogin:' . $e->getMessage() . '<br/>');
			}
			return $user;
		}
	}

	public static function isExistLogin ($login) {
			if (get_class( $obj ) == "User") {
			$user = null;

			try {
				$connect=SPDO::getInstance();
				$statement = $connect->prepare('SELECT * FROM user where login=?');
				$statement->bindParam(1, $login);
				$statement->execute();

				if($rs = $statement->fetch(PDO::FETCH_OBJ))
					if(empty($rs)) {
						return false;
					} else {
						return true;
					}
				} catch (PDOException $e) {
				die('Error! isExistLogin:' . $e->getMessage() . '<br/>');
			}
		}
	}
}
?>