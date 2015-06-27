<!--meta title="Tous les morceaux"-->
<div id="content">
	<ul>
	<?php
	foreach($projects as $project) {
		echo '<li><p>'.$project->getName().'<span>'.$project->getOwner()->getLogin().'</span></p></li>';
	}
	?>
	</ul>
</div>