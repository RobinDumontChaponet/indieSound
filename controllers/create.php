<?php
require(MODELS_INC.'GenreDAO.class.php');
require(MODELS_INC.'Project.class.php');
require(MODELS_INC.'ProjectDAO.class.php');

$genres = GenreDAO::getAll();

if ($_POST) {
    if ($_POST['genre'] != NULL && $_POST['projectName']) {
        $project = new Project(null, $_POST['projectName'], $_POST['genre'], $_SESSION['stUser']->getLogin(), $_POST['description'], null, null);
        ProjectDAO::create($project);
    }
    var_dump($project);
}

include(VIEWS_INC.'create.php');

?>
