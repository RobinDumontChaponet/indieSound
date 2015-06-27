<?php
  
    if(ISSET($_POST['submit']))
{
		include ('validate.transit.inc.php');
		include('conf.inc.php');
		include(MODELS_INC.'UserDAO.php');
//On créer les variables
$password = $_POST['password'];
$verifPassword = $_POST['verifPassword'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$sexe = $_POST['sexe'];
$login = $_POST['user'];
//$password = hash("sha256", $password);


if(valideNom($nom) && validePrenom($prenom) && valideMail($mail) && valideUser($login) && !empty($sexe) && validePwd($password) && $verifPassword==$password)
{
	$user=MembreDAO::create (new Membre('', $login, $password, $mail, $sexe, $nom, $prenom, ''));
header('Location: index.php');

}
}

    include(VIEWS_INC.'register.php');

?>
