<?php

$badAgents = array('Java','Jakarta', 'User-Agent', 'compatible ;', 'libwww, lwp-trivial', 'curl, PHP/', 'urllib', 'GT::WWW', 'Snoopy', 'MFC_Tear_Sample', 'HTTP::Lite', 'PHPCrawl', 'URI::Fetch', 'Zend_Http_Client', 'http client', 'PECL::HTTP');
$bot=false;
$badinput=false;
foreach($badAgents as $agent) {
     if(strpos($_SERVER['HTTP_USER_AGENT'],$agent) !== false)
        $bot=true;
}

header("HTTP/1.1 200 OK");
if (isset($_SESSION['stUser']) && $_SESSION['stUser']!='')
	header ('Location: index.php');
elseif (isset($_POST['user']) && isset($_POST['password']) && !$bot) {
	if ($_POST['user']=='' || $_POST['password']=='') $badinput=true;
	else {
		include('conf.inc.php');
		include(MODELS_INC.'UserDAO.class.php');
		include_once('passwordHash.inc.php');

		$user = UserDAO::getByLogin ($_POST['login']);

		if ($user != NULL) {
			if (empty($user) || !validate_password($_POST['password'] , $user->getPassword())) {
				$badinput = true;
				sleep(1);
			} else {
				session_start();
				$_SESSION['stUser'] = $user;
				session_start();
				header ('Location: index.php');
				exit;
			}
		} else {
			$badinput = true;
		}
	}
}

include(VIEWS_INC.'connection.php');

?>
