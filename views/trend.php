<!--meta title="trend" css="style/trend.css" js=""-->
<?php
include_once MODELS_INC . 'VersionDAO.class.php';
?>
<div id="content">
    <section id="trend">
        <h1>Les sons à la mode</h1>
        <table>
            <tr>
                <th>Rang</th>
                <th>&nbsp;</th>
                <th>Duree</th>
                <th>Titre</th>
            </tr>
            <?php
            $list=VersionDAO::getMostViews();
            $rang=1;
            foreach($list as $trend){

                echo('<tr>
                        <td>' . $rang .'</td>
                        <td><button>Lire</button></td>
                        <td>'. $trend->getDuration() . '</td>
                        <td>' . $trend->getName() . '</td>
                </tr>');
                $rang++;
            }
            ?>
             <tr>
                    <td>1</td>
                    <td><button>Lire</button></td>
                    <td>4:06</td>
                    <td>Bonjour</td>
             </tr>
        </table>
    </section>
</div>
