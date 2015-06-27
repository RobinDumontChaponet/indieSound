<?php
if (isset($_SESSION['login']) && $_SESSION['login']!='')
 header ('Location: index.php');
if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['password'])) {

		include_once('SPDO.class.php');
		include('conf.inc.php');
		include(MODELS_INC.'UserDAO.php');
		//include_once('includes/passwordHash.inc.php');

		$user=UserDAO::getByLogin($_POST['login']);
		if ($user != NULL) {
				if (empty($user) || $_POST['password'] != $user->getPassword()) {
					$badinput=true;
					sleep(1);
				} else {
					session_start();
					$_SESSION['login']=$user;
					session_start();
					header ('Location: index.php');
					exit;
				}

		} else {
			$badinput = true;
		}
	}

    include(VIEWS_INC.'connection.php');

?>
