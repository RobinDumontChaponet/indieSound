<?php
$valid = array();

if($_POST) {
	include ('validate.transit.inc.php');
	include(MODELS_INC.'UserDAO.php');

    if( $_POST['login'] != NULL ) {
        $login = $_POST['login'];
        $valid['login'] = true;
    } else {
        $valid['login'] = false;
    }

    if( $_POST['password'] != NULL ) {
        $password = $_POST['password'];
        $valid['password'] = true;
    } else {
        $valid['password'] = false;
    }

    if( $_POST['mail'] != NULL) {
        $mail = $_POST['mail'];
        $valid['mail'] = true;
    } else {
        $valid['mail'] = false;
    }

    if( $_POST['mailConfirmation'] != NULL ) {
        $mailConfirmation = $_POST['mailConfirmation'];
        $valid['mailConfirmation'] = true;
    } else {
        $valid['mailConfirmation'] = false;
    }

    if( $valid['login'] && $valid['password'] && $valid['mail'] ) {
        if( $valid['mailConfirmation'] && ($_POST['mail'] == $_POST['mailConfirmation'])) {
            $password = hash("sha256", $password);
            $user = UserDAO::create (new User('', $login, $password, $mail, '', ''));
            header('Location: index.php');
        } else {
            $valid['mailEqual'] = false;
        }
    }


	/*if(valideNom($nom) && validePrenom($prenom) && valideMail($mail) && valideUser($login) && !empty($sexe) && validePwd($password) && $verifPassword==$password) {
		//$user=MembreDAO::create (new Membre('', $login, $password, $mail, $sexe, $nom, $prenom, ''));
		//header('Location: index.php');
	}*/
}

include(VIEWS_INC.'register.php');

?>
