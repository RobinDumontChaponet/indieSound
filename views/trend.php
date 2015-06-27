<!--meta title="home" css="" js=""-->
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
            $list[]=VersionDAO::getByNbViews();
            foreach($list as $trend){
                $rang=1;
                echo('<tr>
                        <th>' . $rang .'</th>
                        <th>boutonlecture</th>
                        <th>'. $trend->getDuration() .'</tr>
                        <th>' . $trend->getName() .'</th>');
                $rang++;
            }
            ?>
        </table>
    </section>
</div>
