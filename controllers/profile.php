<?php

$user = $_SESSION['stUser'];
$login = $user->getLogin();
$mail = $user->getMail();
$lastName = $user->getLastName();
$firstName = $user->getFirstName();

if($_POST){

	include ('validate.transit.inc.php');
	include(MODELS_INC.'UserDAO.class.php');

	if( $_POST['lastName'] != NULL ) {
        $lastName = $_POST['lastName'];
        $valid['lastName'] = true;
    } else {
        $valid['lastName'] = false;
    }

    if( $_POST['mail'] != NULL ) {
        $mail = $_POST['mail'];
        $valid['mail'] = true;
    } else {
        $valid['mail'] = false;
    }

    if( $_POST['firstName'] != NULL ) {
        $firstName = $_POST['firstName'];
        $valid['firstName'] = true;
    } else {
        $valid['firstName'] = false;
    }


    if( $valid['firstName'] && $valid['lastName'] && $valid['mail'] ) {
    	$user->setMail($mail);
    	$user->setFirstName($firstName);
    	$user->setLastName($lastName);

    	UserDAO::update($user);
           //header('Location: index.php');
        } else {
            $valid['mailEqual'] = false;
        }

}
include(VIEWS_INC.'profile.php');


?>