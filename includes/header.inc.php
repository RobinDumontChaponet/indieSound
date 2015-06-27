<header>
	<h1><a href="<?= SELF ?>"><span>IndieSound</span></a></h1>
	<nav>
		<ul>
			<li<?= ($_GET['requ']=='all')?' class="active" ':'' ?>><a href="all"><span>Tous les morceaux</span></a></li>
			<li<?= ($_GET['requ']=='new')?' class="active" ':'' ?>><a href="new"><span>Nouveau projet</span></a></li>
			<li id="searchLi"><a href="#"><span>Recherche</span></a>
				<form name="search">
					<input type="text" name="searchValue" placeholder="Recherche..."/>
					<input type="submit" value="Rechercher"/>
        		</form>
        	</li>
			<?php if(empty($_SESSION['stUser'])) { ?>
			<li <?= ($_GET['requ']=='connection')?' class="active" ':'' ?>><a href="connection"><span>Se connecter</span></a></li>
			<?php } else { ?>
			<li<?= ($_GET['requ']=='profile')?' class="active" ':'' ?> id="userLi" class="sub"><a href="profile"><?= $_SESSION['stUser']->getLogin() ?></a>
				<ul>
					<li><a href="#">Notifications</a></li>
					<li><a href="parameter">Réglages</a></li>
					<li><a href="logout">Se déconnecter</a></li>
				</ul>
			</li>
			<?php } ?>
		</ul>
	</nav>
</header>