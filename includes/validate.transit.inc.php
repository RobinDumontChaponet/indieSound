<?php

function is_valid_phoneNumber ($number) {
	return (!preg_match("/^([+]?\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", preg_replace('/ /', '', $number)))?false:true;
}

function is_valid_email ($str) {
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str))?false:true;
}

function contains_numeric ($str) {
	return preg_match('/[0-9]+/', $str);
}

function format_date ($str) {
	if(strtotime($str)!==false)
		return date('Y-m-d', strtotime($str));

	return false;
}

function is_valid_SQL_date ($date) {
	if (preg_match("/^(\d{4})-(\d{2})-(\d{2})$/", $date, $matches))
		if (checkdate($matches[2], $matches[3], $matches[1]))
			return true;

	return false;
}

/**/

function valideNom($nom){
	if(empty($nom)){
		return false;
	}
	else if(!preg_match("/^[a-zA-Z ]*$/",$nom)){
		return false;
	}
	else{
		return true;
	}
}

function validePrenom($prenom){
	if(empty($prenom)){
		return false;
	}
	else if(!preg_match("/^[a-zA-Z ]*$/",$prenom)){
		return false;
	}
	else{
		return true;
	}
}

function valideMail($mail){
	if(empty($mail)){
		return false;
	}
	else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
		return false;
	}
	else{
		return true;
	}
}

function valideUser($user){
	if(empty($user)){
		return false;
	}
	else if(!preg_match("/^[a-zA-Z ]*$/",$user)){
		return false;
	}
	else{
		return true;
	}
}

function valideSexe($sexe){
	if(empty($sexe)){
		return false;
	}
	else {
		
	}

}

function validePwd($password){
	if (empty($password))
    	return false;
	else if (strlen($password)< 4)
    	return false;
	else
		return true;
}
/*
function valideVerifPwd(){
	if (empty($_POST["verifPassword"])) {
		return false;
	}
	else if (strcmp($_POST["verifPassword"], $_POST["password"] == 0)){
		echo strcmp($_POST["verifPassword"], $_POST["password"]);
		echo $_POST['verifPassword'];
		echo $_POST['password'];
		return true;

	}
	else {
		return false;
	}
}
*/

?>