<!--meta title="Profile"-->
<div id="content">
	<form>
		<dl>
			<dt>login</dt>
			<dd><?= $login ?></dd>
			<dt><label for="mail">email</label></dt>
			<dd><input type="mail" value="<?= $email ?>" /></dd>
			<dt><label for="lastename">Nom</label></dt>
			<dd><input type="lastname" value="" /></dd>
			<dt><label for="firstname">Prénom</label></dt>
			<dd><input type="firstname" value="" /></dd>
		</dl>
		<input type="submit" value="enregistrer"/>
	</form>	
</div>