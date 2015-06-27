<!--meta title="Tous les morceaux"-->
<div id="content">
	<ul>
	<?php
	foreach($projects as $project) {
		echo '<li><a class="aProject" href="project/'.$project->getId().'">'.$project->getName().'</a><a class="aUser" href="#">'.$project->getOwner()->getLogin().'</a></li>';
	}
	?>
	</ul>
</div>