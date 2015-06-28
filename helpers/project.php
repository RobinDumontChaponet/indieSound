<?php

header('Content-Type: application/json; charset=utf-8');

include('conf.inc.php');
include('SPDO.class.php');

require_once(MODELS_INC.'SoundDAO.class.php');
//require_once(MODELS_INC.'NoteDAO.class.php');

mb_internal_encoding("UTF-8");
mb_http_output( "UTF-8" );
ob_start("mb_output_handler");

echo json_encode(array('samples' => SoundDAO::getByProjectId($_GET['id'])));

?>