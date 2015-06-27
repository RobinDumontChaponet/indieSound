<!--meta title="home" css="" js=""-->
<div id="content">
    <section id="navbar">
        <section id="login">
            <form>
                <input type="text" name="identifiant" placeholder="nom d'utilisateur"/>
                <input type="password" name="password" placeholder="*********"/>
                <input type="submit" name="login" value="login"/>
            </form>
            <a href="logout">logout</a>
            <a href="register">register</a>
        </section>
        <section id="search">
            <form>
                <input type="text" name="search" placeholder="recherche..."/>
                <input type="submit" name="validateSearch" value="search"/>
            </form>
        </section>
    </section>
    <section id="formCreate">
        <form>
            <input type="text" name="userProject" placeholder="Nom du projet"/>
            <select name="permission" size="1">
                <option>publique</option>
                <option>prive</option>
            </select>
            <select name="genre" size="1">
                <option></option>
            </select>
            <input type="textarea" name="description" placeholder="Description..."/>
            <input type="submit" name="valideRegister" value="Confirmer"/>
        </form>
    </section>
</div>
