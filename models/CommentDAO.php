<?php

include_once 'SPDO.class.php';
include_once MODELS_INC.'Comment.class.php';

class CommentDAO {

	public static function create ($comment) {
		try {
			$author = $_SESSION['login']->getLogin();
			$connect=SPDO::getInstance();
			$statement = $connect->prepare('INSERT INTO comment(author, value, time) VALUES (?, ?, NOW())');
			$statement->bindParam(1, $author);
			$comment = $comment->getComment();
			$statement->bindParam(2, $comment);
			$statement->execute();

			return $connect->lastInsertId();
		} catch (PDOException $e) {
			die('Error create comment!: ' . $e->getMessage() . '<br/>');
		}
	}

	public static function update ($comment) {
		try {
			$connect=SPDO::getInstance();
			$statement = $connect->prepare('UPDATE comment SET value=? WHERE id=?');
			$comment = $comment->getcomment();
			$statement->bindParam(1, $comment);
			$statement->execute();

			return $connect->lastInsertId();
		} catch (PDOException $e) {
			die('Error update user!: ' . $e->getMessage() . '<br/>');
		}
	}

	public static function delete ($comment) {
		try {
			$connect=SPDO::getInstance();
			$statement = $connect->prepare('DELETE FROM comment WHERE id=?');
			$id = $comment->getId();
			$statement->bindParam(1, $id);
			$statement->execute();
		} catch (PDOException $e) {
			die('Error delete user!: ' . $e->getMessage() . '<br/>');
		}
	}

	public static function getAll () {
		$comment = array();
		try {
			$connect=SPDO::getInstance();
			$statement = $connect->prepare('SELECT * FROM comment');

			$statement->execute();

			while ($rs = $statement->fetch(PDO::FETCH_OBJ))
				$comment[]=new Comment($rs->id, $rs->author, $rs->comment, $rs->time);
		} catch (PDOException $e) {
			die('Error!: ' . $e->getMessage() . '<br/>');
		}
		return $comment;
	}

	public static function getById ($id) {
		$comment = null;
		try {
			$connect=SPDO::getInstance();
			$statement = $connect->prepare('SELECT * FROM comment where id=?');
			$statement->bindParam(1, $id);
			$statement->execute();

			if($rs = $statement->fetch(PDO::FETCH_OBJ))
				$comment=new Comment($rs->id, $rs->author, $rs->comment, $rs->time);
		} catch (PDOException $e) {
			die('Error!: ' . $e->getMessage() . '<br/>');
		}
		return $comment;
	}	
}
?>