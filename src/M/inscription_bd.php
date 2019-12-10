<?php

function inscription($login, $last_name, $name, $mail, $password1)
{
	require ('config/database.php');
	if ((pseudo_exist($login) == 1) || (mail_exist($mail) == 1)){
		return 0;
	}
	else
	{
		$pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$inserer = $bdd->prepare('insert into user (login, last_name, name, mail, password, validate, love, orientation, biography, latitude, longitude, notif)
				values (:login, :last_name, :name, :mail, :password, 0, 0, NULL, NULL, NULL, NULL, 0)');

		$inserer->execute(array(
					'login' => $login,
					'last_name' => $last_name,
					'name' => $name,
					'mail' => $mail,
					'password' => $pass_hache
					));
	}
	return 1;
}

function pseudo_exist($login)
{
	require ('config/database.php');
	$req = $bdd->prepare('select * from user where login= ?');
	$req->execute(array($login));
	$data = $req->fetch();
	if ($data == 0){
		return 0;
	}
	else{
		return 1;
	}
}

function mail_exist($mail)
{
	require ('config/database.php');
	$req = $bdd->prepare('select * from user where mail = ?');
	$req->execute(array($mail));
	$data = $req->fetch();
	if ($data == 0)
		return 0;
	else{
		return 1;
	}
}


///initialise lorsqu'un utilisateur se connecte pour la premiere fois
function connexion($mail)
{
	require ('config/database.php');
	$inserer = $bdd->prepare('insert into connexion (creator_mail, connexion, time)
			values (:creator_mail, :connexion, NOW())');
	$inserer->execute(array(
			'creator_mail' => $mail,
			'connexion' => 0
	));
}

?>
