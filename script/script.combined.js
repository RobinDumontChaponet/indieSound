<?php

header('Content-Type: text/javascript; charset=utf-8');

if(isset($_GET['minify']) || !file_exists('generated/'.basename(__FILE__))) {

	//include('../includes/minify.transit.inc.php');
	//ob_start(/*"minify"*/);

	include('better-dom.min.js');
	include('better-i18n-plugin.js');
	include('better-dateinput-polyfill.js');
	include('better-dateinput-polyfill.fr.js');
	include('polyShims.js');
	include('smooth-scroll.min.js');
	include('utils.transit.js');
	include('delete.js');
	include('back.js');

	/*echo $out = minify(ob_get_clean());
	file_put_contents('generated/'.basename(__FILE__), $out);*/

} else
	include('generated/'.basename(__FILE__));

?>