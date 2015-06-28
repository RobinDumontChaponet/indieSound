<?php
require_once("Genre.class.php");

class GenreDAO {

    public static function getAll() {
        $list = array();
        try {
            $req = SPDO::getInstance()->query( "SELECT * FROM `genre`" );
            while($res = $req->fetch()) {
                $list[] = new Genre( $res['idGenre'], $res['name'] );
            }
            return $list;
        } catch(PDOException $e) {
			    die( 'Error getAll genre '.$e->getMessage().'<br>' );
		}
    }

    public static function getById($id) {
        try {
            $req = SPDO::getInstance()-> query( "SELECT * FROM `genre` WHERE `idGenre`=?" );
            $req->execute(array($id));
            if ($res = $req->fetch()){
			 return new Genre( $res['idGenre'], $res['name'] );
            } else {
                return null;
            }
        } catch(PDOException $e) {
			    die( 'Error getById genre '.$e->getMessage().'<br>' );
		}
    }

    public static function create( &$obj ) {
        if (get_class( $obj ) == "Genre") {
            try {
                $req = SPDO::getInstance()->prepare("INSERT INTO `genre`(`name`) VALUES (?) ");
                $req-> execute( $obj->getName() );
                $obj->setId( SPDO::getInstance()->LastInsertId() );
                return $obj->getId();
            } catch (PDOException $e) {
                die( 'Error create genre '.$e->getMessage().'<br>' );
            }
        } else {
            die( 'Paramètre de type Genre requis dans GenreDAO.class.php / create' );
        }
    }

    public static function update( $obj ) {
        if (get_class( $obj ) == "Genre") {
            try {
                $req = SPDO::getInstance()->prepare("UPDATE `genre` SET `name`=? WHERE `idGenre`= ? ");
                $req-> execute( array( $obj->getName(), $obj->getId() ) );
            } catch (PDOException $e) {
                die( 'Error update genre '.$e->getMessage().'<br>' );
            }
        } else {
            die( 'Paramètre de type Genre requis dans GenreDAO.class.php / update' );
        }
    }

    public static function delete( $obj ) {
        if (get_class( $obj ) == "Genre") {
            try {
                $req = SPDO::getInstance()->prepare("DELETE FROM `genre` WHERE `idGenre`= ? ");
                $req-> execute( array( $obj->getId() ) );
            } catch (PDOException $e) {
                die( 'Error delete genre '.$e->getMessage().'<br>' );
            }
        } else {
            die( 'Paramètre de type Genre requis dans GenreDAO.class.php / delete' );
        }
    }
}
?>
