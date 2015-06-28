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
                    <td>Novo assassino</td>
             </tr>
             <tr>
                    <td>2</td>
                    <td><button>Lire</button></td>
                    <td>5:42</td>
                    <td>Ocean I</td>
             </tr>
             <tr>
                    <td>3</td>
                    <td><button>Lire</button></td>
                    <td>1:20</td>
                    <td>Soldier</td>
             </tr>

        </table>
    </section>
</div>
