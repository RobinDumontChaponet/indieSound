<!--meta title="Profile"-->
<div id="content">
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