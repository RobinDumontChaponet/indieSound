<!--meta title="Nouveau morceau"-->
<div id="content">
	<form method="post" action="">
		<input type="text" name="projectName" id="projectName" placeholder="Nom du projet" value='<?php if($_POST) {echo $_POST['projectName'];}?>' />
		<select name="genre">
			<option></option>
			<?php foreach ($genres as $genre) {
				echo '<option value="'.$genre->getId().'">' .$genre->getName(). '</option>';
			} ?>
		</select>
		<textarea name="description" id="description" placeholder="Description..."></textarea>

		<input type="submit" name="add" value="Ajouter"/>
	</form>
</div>
