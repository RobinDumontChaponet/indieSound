<!--meta title="Profile"-->
<div id="content">
	<figure>
		<?php if(is_file('data/profiles/'.$user->getId().'.png')){
			echo '<img src="data/profiles/'.$user->getId().'.png">';
		} else {
			echo '<img src="data/profiles/unset.png">';
		}
		?>
	</figure>	
	<form method="post">
		<dl>
			<dt>login</dt>
			<dd><?= $login ?></dd>
			<dt><label for="mail">email</label></dt>
			<dd><input type="text" name="mail" value="<?= $mail ?>" /></dd>
			<dt><label for="lastename">Nom</label></dt>
			<dd><input type="text" name="lastName" value="<?php if($lastName == "")echo ""; else echo "$lastName"; ?>" /></dd>
			<dt><label for="firstname">Prénom</label></dt>
			<dd><input type="text" name="firstName" value="<?php if($firstName == "")echo ""; else echo "$firstName"; ?>" /></dd>
		</dl>
		<input type="submit" value="enregistrer"/>
	</form>	
</div>