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
    <section id="formRegister">
        <form>
            <input type="text" name="username" placeholder="Nom d'utilisateur"/>
            <input type="password"name="password" placeholder="Mot de passe"/>
            <label name="labelEmail">Email</label><input type="email" name="mail"/>
            <label name="labelConfirmationEmail">Confirmation adresse Email</label><input type="email" name="confirmationMail"/>
            <input type="submit" name="valideRegister" value="Confirmer"/>
        </form>
    </section>
    <section id="footer">
        <p>Application developpe par la Team 2A au Hackathon musical</p>
        <a href="right">Mention legal</a>
    </section>
</div>