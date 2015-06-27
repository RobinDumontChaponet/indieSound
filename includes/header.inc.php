<header>
	<nav>
		<ul>
			<li><h1><a href="<?= SELF ?>">Sound Tree</a></h1></li>
			<li><a href="#">Tout les morceaux</a></li>
			<li><a href="#">Nouveau projet</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#"> Nom du Compte<!--<?= ($_SESSION['stUser']) ?> --></a>
				<div>
					<a href="#"> Notifications </a>
					<a href="#"> Réglages </a>
				</div>
			</li>
		</ul>
	</nav>
	
	<a href="connection">Se connecter</a>
	<aside>
        <form name="search">
            <input type="text" name="searchValue" placeholder="Recherche..."/>
            <input type="submit" value="Rechercher"/>
        </form>
    </aside>
</header>
