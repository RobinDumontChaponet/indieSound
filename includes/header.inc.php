<header>
	<nav>
		<ul>
			<li><a href="#">lien</a></li>
		</ul>
	</nav>
	<aside>
		<h1><a href="<?= SELF ?>">Sound Tree</a></h1>
        <form name="login">
            <input type="text" name="identifiant" placeholder="Nom d'utilisateur"/>
            <input type="password" name="password" placeholder="Mot de passe"/>
            <input type="submit" name="login" value="Connexion"/>
	        <a href="register">S'enregistrer</a>
        </form>
        <form name="searchBar">
            <input type="text" name="search" placeholder="Recherche..."/>
            <input type="submit" name="validateSearch" value="Rechercher"/>
        </form>
    </aside>
</header>
