<!--meta title="Profile" css="style/profile.css"-->
<div id="content">
	<figure>
		<?php if(is_file('data/profiles/'.$user->getId().'.png')){
			echo '<img id ="set" src="data/profiles/'.$user->getId().'.png">';
		} else {
			echo '<img id="unset" src="data/profiles/unset.png">';
		}
		?>
	</figure>	
	<form method="post">
		<?= $login; ?>
		<label for="mail">email</label>
		<input type="text" name="mail" value="<?= $mail ?>" />
		<label for="lastename">Nom</label>
		<input type="text" name="lastName" value="<?php if($lastName == "")echo ""; else echo "$lastName"; ?>" />
		<label for="firstname">Prénom</label>
		<input type="text" name="firstName" value="<?php if($firstName == "")echo ""; else echo "$firstName"; ?>" /></br>
		<input type="submit" value="enregistrer"/>
	</form>	
</div>