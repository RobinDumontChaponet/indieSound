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

	
	
	
  
    if(ISSET($_POST['submit']))
{
		include ('validate.transit.inc.php');
		include('conf.inc.php');
		include(MODELS_INC.'MembreDAO.php');
//On créer les variables
$password = $_POST['password'];
$verifPassword = $_POST['verifPassword'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$sexe = $_POST['sexe'];
$login = $_POST['user'];
//$password = hash("sha256", $password);


if(valideNom($nom) && validePrenom($prenom) && valideMail($mail) && valideUser($login) && !empty($sexe) && validePwd($password) && $verifPassword==$password)
{
	$user=MembreDAO::create (new Membre('', $login, $password, $mail, $sexe, $nom, $prenom, ''));
header('Location: index.php');

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
<link rel="stylesheet" href="assets/css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<script src="script/jquery.js" type="text/javascript"></script>
<script src="script/jquery.validationEngine-fr.js" type="text/javascript"></script>
<script src="script/jquery.validationEngine.js" type="text/javascript"></script>
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
					<form class="register active" id="register" method="post" action="">
						<h3>S'Inscrire</h3>

						<div class="column">
							<div>
								<label>Nom:</label>
								<input type="text" name="nom" placeholder="Nom"/>
							</div>
							<div>
								<label>Prénom:</label>
								<input type="text" name="prenom" placeholder="Prenom"/>
							</div>
							<div>
								<label>Nom d'utilisateur:</label>
								<input type="text" name="user" placeholder="Nom d'utilisateur"/>
							</div>
							<div>
								<label>Sexe:</label>
								<input type="radio" name="sexe" value="female">Female
								<input type="radio" name="sexe" value="male">Male
							</div>
						</div>
						
						<div class="column">	
							<div>
								<label>Email:</label>
								<input type="text" name="mail" placeholder="mail"/>
							</div>
							
							<div>
								<label>Mot de passe:</label>
								<input type="password" name="password" placeholder="Mot de passe"/>
							</div>
							<div>
								<label>Vérification mot de passe:</label>
								<input type="password" name="verifPassword" placeholder="Mot de passe"/>
							</div>
						</div>	

						<div class="bottom">
							<!--<input type="submit" value="S'Inscrire" />-->
							<a href="connection.php" rel="login" class="linkform">Vous avez déjà un compte ? connectez vous ici</a>
							<button type="submit" name="submit" class="btn btn-primary">Inscription</button>
							<div class="clear"></div>
						</div>
					</form>	
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		</div > 
	<footer>
		<p>© 360°TV.FR, TOUS DROITS RESERVES<br>
	</footer>
</body>
</html>