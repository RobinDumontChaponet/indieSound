<?php

include MODELS_INC.'ProjectDAO.class.php';

include_once MODELS_INC.'User.class.php';

$projects=ProjectDAO::getAll();


include(VIEWS_INC.'all.php');

?>
