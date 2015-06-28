<!--meta title="Tous les morceaux" css="style/all.css"-->
<div id="content">
	<ul>
	<?php
	foreach($projects as $project) {
		echo '<li ><a class="aProject" href="project/'.$project->getId().'">'.$project->getName().'</a>'. '
		' .'<a class="aUser" href="#">'.$project->getOwner()->getLogin().'</a> 57 version disponible
		<div class= "SocialSong">
					<button id="heart"></button>
					<button id="facebook"></button>
					<button id="twitter"></button>
					<button id="google-plus"></button>
				</div></li>';
		}
	?>
	</ul>
</div>