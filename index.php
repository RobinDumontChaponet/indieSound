<?php

include_once('conf.inc.php');
include_once('SPDO.class.php');

session_start();
/*
if (!isset($_SESSION['user']) || $_SESSION['user']=='') {
	header ('Location: '.constant('SELF').'/connection.php');
	exit();
}
*/
function get_include_contents($filename) {
	if (is_file($filename)) {
		ob_start();
		ob_clean();
		include ($filename);
		return ob_get_clean();
	}
	return false;
}

// Requête par défaut
if(empty($_GET['requ']))
	$_GET['requ']='index';

/*if(($page==null && is_file(CONTROLLERS_INC.$_GET['requ'].'.php')) or !isset($_SESSION['user_auth']['read']) || !$_SESSION['user_auth']['read']) {
	header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden");
	header("Status: 403 Forbidden");
	$_SERVER['REDIRECT_STATUS'] = 403;
	$inc = get_include_contents(CONTROLLERS_INC.'403.php');
} else {*/
if(is_file(CONTROLLERS_INC.$_GET['requ'].'.php'))
	$inc = get_include_contents(CONTROLLERS_INC.$_GET['requ'].'.php');
else {
	header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
	header("Status: 404 Not Found");
	$_SERVER['REDIRECT_STATUS'] = 404;
	$inc = get_include_contents(CONTROLLERS_INC.'404.php');
}

include('datas.transit.inc.php');
// Inclusion meta et dépendances clients
preg_match('/<\!--meta\s*(.*)-->/i', $inc, $matches);
if($matches[1]) {
	$link=''; $script=''; $meta=''; $onload='';
	preg_match_all("/(\\S+)=[\"]?((?:.(?![\"]?\\s+(?:\\S+)=|[\"]))+.)[\"]?/", $matches[1], $tag);
	$tag=rearrange($tag);
	if($tag)
	foreach($tag as $rule) {
		switch($rule[1]){
			case 'title' : $title=$rule[2]; break;
			case 'css'   : $link.='<link rel="stylesheet" type="text/css" href="'.$rule[2].'"/>'."\n"; break;
			case 'js'    : $script.='<script type="text/javascript" src="'.$rule[2].'"></script>'."\n"; break;
			case 'onload': $onload.=$rule[2].'();'; break;
			case 'refresh': $meta.='<meta http-equiv="refresh" content="'.$rule[2].'">'."\n"; break;
			case 'needJs': $meta.='<noscript><meta http-equiv="refresh" content="0; url=nojs"></noscript>'."\n"; break;
		}
	}
	if($onload!='') $script.="\n".'<script type="text/javascript">window.onload=function(){'.$onload.'}</script>';
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="lt-ie9 lt-ie8 lt-ie7" xmlns="http://www.w3.org/1999/xhtml"><![endif]-->
<!--[if IE 7]>   <html class="lt-ie9 lt-ie8" xmlns="http://www.w3.org/1999/xhtml"><![endif]-->
<!--[if IE 8]>   <html class="lt-ie9" xmlns="http://www.w3.org/1999/xhtml"><![endif]-->
<!--[if gt IE 8]><html class="get-ie9" xmlns="http://www.w3.org/1999/xhtml"><![endif]-->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="content-language" content="fr" />
	<meta name="language" content="fr" />
	<base href="<?php echo dirname($_SERVER['PHP_SELF']).'/' ?>">
	<title>Sound Tree<?php if(!empty($title)) echo ' | '.$title; ?></title>
	<link rel="author" href="humans.txt" />
	<!--[if IE]><link rel="shortcut icon" href="style/favicon-32.ico"><![endif]-->
	<link rel="icon" href="style/favicon-96.png">
	<meta name="msapplication-TileColor" content="#FFF">
	<meta name="msapplication-TileImage" content="style/favicon-144.png">
	<?php echo $meta; ?>
	<link rel="apple-touch-icon" href="style/favicon-152.png">
	<link rel="stylesheet" type="text/css" href="style/reset.min.css">
	<link rel="stylesheet" type="text/css" href="style/style.combined.css">
	<link rel="stylesheet" type="text/css" href="style/animations.css">
	<?php echo $link; ?>
	<!--[if lt IE 9]><script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<script>if (!window.JSON) document.write('<script src="script/json2.min.js"><\/script>');</script>
	<?php echo $script; ?>
</head>
<body>
	<div id="wrapper">
		<?php include('header.inc.php');?>
		<?php echo $inc; ?>
	</div>
	<?php /* <footer>
		<p>Beuargh ©<br></p>
	</footer>
	*/?>
<script type="text/javascript">
</script>
</body>
</html>
<?php
$_SESSION['referrer'] = $_GET['requ'];
?>