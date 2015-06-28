<?php
require(MODELS_INC.'GenreDAO.class.php');
require(MODELS_INC.'Project.class.php');
require(MODELS_INC.'ProjectDAO.class.php');

$genres = GenreDAO::getAll();

if ($_POST) {
    if ($_POST['genre'] != NULL || $_POST['genre'] == "null") {
        if ($_POST['projectName'] != NULL) {
            $project = new Project(null, $_POST['projectName'], $_POST['genre'], $_SESSION['stUser']->getId(), $_POST['description'], null, '0');
            ProjectDAO::create($project);
        }

    }
}

include(VIEWS_INC.'create.php');

?>
