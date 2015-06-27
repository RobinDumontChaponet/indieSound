<!--meta title="trend" css="" js=""-->
<?php
include_once MODELS_INC . 'VersionDAO.class.php';
?>
<div id="content">
    <section id="trend">
        <table>
            <caption>Son a la mode</caption>
            <tr>
                <th>Rang</th>
                <th>Bouton lecture</th>
                <th>Duree</th>
                <th>Titre</th>
            </tr>
            <?php
            $list=VersionDAO::getByNbViews();
            $rang=1;
            var_dump($list);
            /*foreach($list as $trend){

                echo('<tr>
                        <th>' . $rang .'</th>
                        <th><img src="http://t2.gstatic.com/images?q=tbn:ANd9GcQZRIjBf_8WTPwIBb9CEzCnur9SuHiNM0z09nsE78MXdnblRaAAfxBjHgA" alt="play"/></th>
                        <th>'. $trend->getDuration() . '</th>
                        <th>' . $trend->getName() . '</th>
                </tr>');
                $rang++;
            }*/
            ?>
        </table>
    </section>
</div>
