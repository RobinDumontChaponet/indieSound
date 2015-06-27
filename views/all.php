<!--meta title="all" css="style/project.css"-->
<?php
include_once MODELS_INC . 'ProjectDAO.class.php';
?>
<div id="content">
    <section id="lis">
        <ul>
            <?php
            $list=ProjectDAO::getAll();
            foreach($list as $project){
                var_dump($project);

                echo('
                        <li>' . $project->nom. ' '.' '.$project->getOwner() .'</li>
                ');
            }
            ?>
        </ul>
    </section>
</div>
