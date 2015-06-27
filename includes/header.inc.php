<header>
	<h1><a href="<?= SELF ?>">Sound Tree</a></h1>
	<nav>
		<ul>
			<li><a href="#">Tout les morceaux</a></li>
			<li><a href="#">Nouveau projet</a></li>
			<li><a href="#">Contact</a></li>
			<?php if(empty($_SESSION['stUser'])) { ?>
			<li><a href="connection">Se connecter</a></li>
			<?php } else { ?>
			<li class "sub"><a href="#"><?= $_SESSION['stUser']->getLogin() ?></a>
				<ul>
					<li><a href="#">Notifications</a></li>
					<li><a href="#"> Réglages </a></li>
					<li><a href="logout">Se déconnecter</a></li>
				</ul>
			</li>
			<?php } ?>
		</ul>
	</nav>
	
	
	<aside>
        <form name="search">
            <input type="text" name="searchValue" placeholder="Recherche..."/>
            <input type="submit" value="Rechercher"/>
        </form>
    </aside>
</header>
