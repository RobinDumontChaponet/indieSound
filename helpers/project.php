<?php

header('Content-Type: application/json; charset=utf-8');

require('conf.inc.php');

require('csvParser.inc.php');

mb_internal_encoding("UTF-8");
mb_http_output( "UTF-8" );
ob_start("mb_output_handler");

echo json_encode(array());

?>