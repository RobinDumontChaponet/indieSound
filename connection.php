<?php

$badAgents = array('Java','Jakarta', 'User-Agent', 'compatible ;', 'libwww, lwp-trivial', 'curl, PHP/', 'urllib', 'GT::WWW', 'Snoopy', 'MFC_Tear_Sample', 'HTTP::Lite', 'PHPCrawl', 'URI::Fetch', 'Zend_Http_Client', 'http client', 'PECL::HTTP');
$bot=false;
$badinput=false;
foreach($badAgents as $agent) {
     if(strpos($_SERVER['HTTP_USER_AGENT'],$agent) !== false)
        $bot=true;
}
session_start();
header("HTTP/1.1 200 OK");

if (isset($_SESSION['login']) && $_SESSION['login']!='')
 header ('Location: index.php');
if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['password'])) {

		include_once('SPDO.class.php');
		include('conf.inc.php');
		include(MODELS_INC.'MembreDAO.php');
		//include_once('includes/passwordHash.inc.php');

		$user=MembreDAO::getByLogin($_POST['login']);
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
 ?>

<!DOCTYPE html>
<!--[if lt IE 7]><html class="lt-ie9 lt-ie8 lt-ie7" xmlns="http://www.w3.org/1999/xhtml"><![endif]-->
<!--[if IE 7]>   <html class="lt-ie9 lt-ie8" xmlns="http://www.w3.org/1999/xhtml"><![endif]-->
<!--[if IE 8]>   <html class="lt-ie9" xmlns="http://www.w3.org/1999/xhtml"><![endif]-->
<!--[if gt IE 8]><html class="get-ie9" xmlns="http://www.w3.org/1999/xhtml"><![endif]-->
<head>
<title>360TV</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Expand, contract, animate forms with jQuery wihtout leaving the page" />
<meta name="keywords" content="expand, form, css3, jquery, animate, width, height, adapt, unobtrusive javascript"/>
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
<link href="style/style.combined.css" rel="stylesheet" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="style/cufon.part.css" />
<script src="script/cufon-yui.js" type="text/javascript"></script>
<script src="script/ChunkFive_400.font.js" type="text/javascript"></script>
<script src="script/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
	/*Cufon.replace('h1',{ textShadow: '1px 1px #fff'});
	Cufon.replace('h2',{ textShadow: '1px 1px #fff'});
	Cufon.replace('h3',{ textShadow: '1px 1px #000'});
	Cufon.replace('.back');*/
</script>
</head>
<body>
	<?php include('header.inc.php');?>
	<div class="wrapper">
		<div class="content">
			<div id="form_wrapper" class="form_wrapper">

				<form class="login active" method="post" action="">
					<h3>Se Connecter</h3>

					<div>
						<label>Nom d'utilisateur:</label>
						<input type="text" name="login" placeholder="Nom d'utilisateur"/>
						<span class="error">This is an error</span>
					</div>
					<div>
						<label>Mot de passe: <a href="forgot_password.html" rel="forgot_password" class="forgot linkform">mot de passe oublié ?</a></label>
						<input type="password" name="password" placeholder="Mot de passe"/>
						<span class="error">This is an error</span>
					</div>

					<div class="bottom">
						<div class="remember"><input type="checkbox" /><span>Rester connecté</span></div>
						<button type="submit" name="submit" class="btn btn-primary">Connexion</button>
						<a href="register.php" rel="register" class="linkform">Vous n'avez pas de compte ? S'inscrire</a>
						<div class="clear"></div>
					</div>
				</form>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
	<footer>
		<p>© 360°TV.FR, TOUS DROITS RESERVES<br>
	</footer>
</body>
</html>