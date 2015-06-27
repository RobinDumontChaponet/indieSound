<?php

if($_POST) {
	include ('validate.transit.inc.php');
	include(MODELS_INC.'UserDAO.php');

    if( $_POST['login'] != NULL ) {
        $login = $_POST['login'];
        var_dump($login);
    } else {
        $errorLogin = true;
    }

    if( $_POST['password'] != NULL ) {
        $password = $_POST['password'];
        var_dump($password);
    } else {
        $errorPassword = true;
    }

    if( $_POST['mail'] != NULL) {
        $mail = $_POST['mail'];
        var_dump($mail);
    } else {
        $errorMail = true;
    }

    if( $_POST['mailConfirmation'] != NULL ) {
        $mailConfirmation = $_POST['mailConfirmation'];
        var_dump($mailConfirmation);
    } else {
        $errorMailConfirmation = true;
    }

	//$password = hash("sha256", $password);


	/*if(valideNom($nom) && validePrenom($prenom) && valideMail($mail) && valideUser($login) && !empty($sexe) && validePwd($password) && $verifPassword==$password) {
		//$user=MembreDAO::create (new Membre('', $login, $password, $mail, $sexe, $nom, $prenom, ''));
		//header('Location: index.php');
	}*/
}

include(VIEWS_INC.'register.php');

?>
