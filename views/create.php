<!--meta title="home" css="" js=""-->
<div id="content">
    <section id="formCreate">
        <form>
            <input type="text" name="userProject" placeholder="Nom du projet"/>
            <select name="genre" size="1">
                <?php
                $genre[]=genreDAO::getAll();
                foreach ($genre as $genre){
                    echo('<option>'+$genre.name+'</option>');
                }
                ?>
            </select>
            <input type="textarea" name="description" placeholder="Description..."/>
            <input type="submit" name="valideRegister" value="Confirmer"/>
        </form>
    </section>
</div>
