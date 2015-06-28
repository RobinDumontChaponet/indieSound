<!--meta title="Nouveau morceau"-->
<div id="content">
	<form  method="post" action="">
		<input type="text" name="userProject" placeholder="Nom du projet"/>
		<select name="genre">
			<?php
			foreach ($genres as $genre)
				echo('<option>' .$genre->getName(). '</option>');
			?>
		</select>
		<textarea name="description" placeholder="Description..."></textarea>
		<input type="submit" name="valideRegister" value="Ajouter"/>
	</form>
</div>
