<!--meta title="Connexion"-->
<form class="login active" method="post" action="">
	<h3>Se Connecter</h3>
	<div>
		<label>Nom d'utilisateur:</label>
		<input type="text" name="login" placeholder="Nom d'utilisateur"/>
		<span class="error">This is an error</span>
	</div>
	<div>
		<label>Mot de passe: <a href="forgot_password.html" rel="forgot_password" class="forgot linkform">mot de passe oublié ?</a></label>
		<input type="password" name="password" placeholder="Mot de passe"/>
		<span class="error">This is an error</span>
	</div>
	<div class="bottom">
		<div class="remember"><input type="checkbox" /><span>Rester connecté</span></div>
		<button type="submit" name="submit" class="btn btn-primary">Connexion</button>
		<a href="register.php" rel="register" class="linkform">Vous n'avez pas de compte ? S'inscrire</a>
		<div class="clear"></div>
	</div>
</form>