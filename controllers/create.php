<?php
require(MODELS_INC.'GenreDAO.class.php');

$genres = GenreDAO::getAll();

include(VIEWS_INC.'create.php');

?>
