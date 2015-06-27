<?php

$user = $_SESSION['stUser'];
$login = $user->getLogin();
$email = $user->getMail();
$lastName = $user->getLastName();
$firstName = $user->getFirstName();

include(VIEWS_INC.'profile.php');


?>